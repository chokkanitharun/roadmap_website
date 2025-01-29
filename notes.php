<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'skillroute');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($user_id) {
        if (isset($_POST['add_note'])) {
            $note = $_POST['note'];
            $stmt = $conn->prepare("INSERT INTO notes (user_id, notes) VALUES (?, ?)");
            $stmt->bind_param("is", $user_id, $note);
            $stmt->execute();
        }

        if (isset($_POST['edit_note'])) {
            $note_id = $_POST['note_id'];
            $note = $_POST['note'];
            $stmt = $conn->prepare("UPDATE notes SET notes = ? WHERE id = ? AND user_id = ?");
            $stmt->bind_param("sii", $note, $note_id, $user_id);
            $stmt->execute();
        }

        if (isset($_POST['delete_note'])) {
            $note_id = $_POST['note_id'];
            $stmt = $conn->prepare("DELETE FROM notes WHERE id = ? AND user_id = ?");
            $stmt->bind_param("ii", $note_id, $user_id);
            $stmt->execute();
        }
    } else {
        echo "<script>alert('You must log in to manage notes.');</script>";
    }
}

$notes = null;
if ($user_id) {
    $stmt = $conn->prepare("SELECT * FROM notes WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $notes = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        a {
            text-decoration: underline ;
            color: white;
            font-weight: bold;
            font-size:30px;
        }

        .notes-container {
            width: 80%;
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #2e2e2e;
            color: white;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            
            font-size: 2.5em;
            color: #A64D79;
            margin-bottom: 20px;
        }

        textarea, button {
            font-size: 1.2em;
            padding: 12px;
            margin: 10px 0;
            width: 100%;
            border: 2px solid #444;
            border-radius: 8px;
        }

        textarea {
            resize: none;
            background: #333;
            color: white;
        }

        button {
            background: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }

        .note {
            background: #444;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .note textarea {
            background: #555;
            color: white;
        }

        .note button {
            margin: 5px 0;
        }

        .note .delete-btn {
            background: #f44336;
        }

        .note .delete-btn:hover {
            background: #d32f2f;
        }

        .fullscreen-note {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #2e2e2e;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .fullscreen-note textarea {
            width: 90%;
            height: 80%;
            font-size: 1.5em;
        }

        .fullscreen-note button {
            margin-top: 10px;
        }

        .close-fullscreen {
            background: #f44336;
        }

        .close-fullscreen:hover {
            background: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="notes-container">
        <h3 class=><a href="index.php">Home</a></h3>
        <h1>My Notes</h1>

        <?php if ($user_id): ?>
            <form method="POST">
                <textarea id="note-textarea" name="note" rows="5" placeholder="Add a new note..." required></textarea>
                <button type="button" id="start-speech">🎙️ Start Speaking</button>
                <button type="button" id="stop-speech" disabled>🛑 Stop Speaking</button>
                <button type="submit" name="add_note">Add Note</button>
            </form>

            <?php if ($notes): ?>
                <?php while ($note = $notes->fetch_assoc()): ?>
                    <div class="note">
                        <form method="POST">
                            <textarea name="note" rows="4"><?= htmlspecialchars($note['notes']) ?></textarea>
                            <input type="hidden" name="note_id" value="<?= $note['id'] ?>">
                            <button type="button" class="start-speech-edit">🎙️ Start Speaking</button>
                            <button type="submit" name="edit_note">Save</button>
                            <button type="submit" name="delete_note" class="delete-btn">Delete</button>
                            
                            <button type="button" class="fullscreen-btn">🔍 Full Screen</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php else: ?>
            <p style="text-align: center;">Please <a href="login.php">log in</a> to manage your notes.</p>
        <?php endif; ?>
    </div>

    <div id="fullscreen-container" class="fullscreen-note" style="display: none;">
        <textarea readonly></textarea>
        <button class="close-fullscreen">Close</button>
        <button class="read-aloud">🔊 Read Aloud</button>
    </div>

    <script>
        const startSpeechBtn = document.getElementById('start-speech');
        const stopSpeechBtn = document.getElementById('stop-speech');
        const noteTextarea = document.getElementById('note-textarea');
        const fullscreenContainer = document.getElementById('fullscreen-container');
        const fullscreenTextarea = fullscreenContainer.querySelector('textarea');
        const closeFullscreenBtn = fullscreenContainer.querySelector('.close-fullscreen');
        const readAloudBtn = fullscreenContainer.querySelector('.read-aloud');
        let recognition;

        // Start speech recognition
        const startSpeechRecognition = (textarea) => {
            try {
                recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
                recognition.lang = 'en-US';
                recognition.interimResults = true;
                recognition.continuous = true;

                recognition.onresult = (event) => {
                    const transcript = Array.from(event.results)
                        .map(result => result[0].transcript)
                        .join('');
                    textarea.value = transcript;
                };

                recognition.onerror = (event) => {
                    alert(`Speech Recognition Error: ${event.error}`);
                };

                recognition.start();
            } catch (error) {
                alert('Speech recognition is not supported in this browser.');
            }
        };

        startSpeechBtn.addEventListener('click', () => {
            startSpeechRecognition(noteTextarea);
            startSpeechBtn.disabled = true;
            stopSpeechBtn.disabled = false;
        });

        stopSpeechBtn.addEventListener('click', () => {
            if (recognition) recognition.stop();
            startSpeechBtn.disabled = false;
            stopSpeechBtn.disabled = true;
        });

        document.querySelectorAll('.start-speech-edit').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const textarea = e.target.closest('form').querySelector('textarea');
                startSpeechRecognition(textarea);
            });
        });

        // Fullscreen mode
        document.querySelectorAll('.fullscreen-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const note = e.target.closest('form').querySelector('textarea').value;
                fullscreenTextarea.value = note;
                fullscreenContainer.style.display = 'flex';
            });
        });

        closeFullscreenBtn.addEventListener('click', () => {
            fullscreenContainer.style.display = 'none';
        });

        // Text-to-speech functionality
        const readAloud = (text) => {
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'en-US';
            window.speechSynthesis.speak(utterance);
        };

        readAloudBtn.addEventListener('click', () => {
            const noteText = fullscreenTextarea.value;
            if (noteText.trim()) {
                readAloud(noteText);
            } else {
                alert('No text to read aloud!');
            }
        });
    </script>
</body>
</html>
