<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query'])) {
    $query = trim($_POST['query']);

    // Validate if the query is non-empty
    if (empty($query)) {
        echo "Please enter a valid query.";
        exit;
    }

    // Keywords to check relevance
    $relevantKeywords = ['programming', 'coding', 'technology', 'software', 'developer', 'IT', 'language'];

    // Wikipedia API endpoint
    $url = "https://en.wikipedia.org/w/api.php?action=query&list=search&srsearch=" . urlencode($query) . "&utf8=&format=json";

    // Fetch data from Wikipedia
    $response = file_get_contents($url);
    if ($response) {
        $data = json_decode($response, true);
        if (isset($data['query']['search'][0])) {
            $title = $data['query']['search'][0]['title'];
            $snippet = strip_tags($data['query']['search'][0]['snippet']);
            $link = "https://en.wikipedia.org/wiki/" . urlencode($title);

            // Check relevance based on keywords
            $relevant = false;
            foreach ($relevantKeywords as $keyword) {
                if (stripos($snippet, $keyword) !== false) {
                    $relevant = true;
                    break;
                }
            }

            if ($relevant) {
                echo "$snippet... Read more at: $link";
            } else {
                echo "The results might not be relevant to IT, coding, or technology. Please ask a more specific query.";
            }
        } else {
            echo "Sorry, I couldn't find relevant information for your query. Try rephrasing it.";
        }
    } else {
        echo "Error fetching data from Wikipedia. Please try again.";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Chatbot</title>
    <style>
        /* Same CSS as before */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .chat-container {
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .chat-header {
            background: #4CAF50;
            color: #ffffff;
            padding: 10px 15px;
            text-align: center;
            font-size: 1.5rem;
        }

        .chat-messages {
            height: 400px;
            overflow-y: auto;
            padding: 15px;
            background: #f9f9f9;
        }

        .chat-messages .message {
            margin: 10px 0;
        }

        .chat-messages .user-message {
            text-align: right;
        }

        .chat-messages .bot-message {
            text-align: left;
            background: #e0e0e0;
            padding: 8px 12px;
            border-radius: 8px;
            display: inline-block;
        }

        .chat-input {
            display: flex;
            padding: 10px;
            background: #ffffff;
            border-top: 1px solid #ddd;
        }

        .chat-input input {
            flex: 1;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .chat-input button {
            background: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            margin-left: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .chat-input button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">IT Chatbot</div>
        <div id="chat-messages" class="chat-messages"></div>
        <div class="chat-input">
            <input type="text" id="user-input" placeholder="Ask about IT industry, coding, or technology...">
            <button id="send-btn">Send</button>
        </div>
    </div>

    <script>
        const chatMessages = document.getElementById('chat-messages');
        const userInput = document.getElementById('user-input');
        const sendBtn = document.getElementById('send-btn');

        const appendMessage = (message, type) => {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${type}-message`;
            messageDiv.innerText = message;
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        };

        sendBtn.addEventListener('click', () => {
            const userQuery = userInput.value.trim();
            if (userQuery) {
                appendMessage(userQuery, 'user');
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `query=${encodeURIComponent(userQuery)}`,
                })
                .then(response => response.text())
                .then(data => {
                    appendMessage(data, 'bot');
                })
                .catch(error => {
                    appendMessage('Error: Unable to fetch data. Please try again.', 'bot');
                });

                userInput.value = '';
            }
        });

        userInput.addEventListener('keypress', (event) => {
            if (event.key === 'Enter') {
                sendBtn.click();
            }
        });
    </script>
</body>
</html>
