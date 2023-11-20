<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chatify</title>
    <link rel="stylesheet" href="style.css">
    {{-- <style>
        /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #fff; /* Fond blanc */
}

.app {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #e3f2fd; /* Fond bleu ciel */
}

header {
    text-align: center;
    margin-bottom: 20px;
}

h1 {
    color: #1565c0; /* Bleu foncé */
}

input[type="text"] {
    padding: 10px;
    margin-bottom: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
}

#messages {
    max-height: 300px;
    overflow-y: auto;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff; /* Fond blanc */
}

#message_form {
    display: flex;
    margin-top: 10px;
}

#message_input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
}

#message-send {
    padding: 10px;
    background-color: #1565c0; /* Bleu foncé */
    color: #fff; /* Texte blanc */
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
    </style> --}}
</head>
<body>
    <div class="app">
        <header>
            <h1>Let's Talk !</h1>
            <input type="text" name="username" id="username" placeholder="Please Entree a username ..."/>
        </header>
        <div id="messages"></div>
        <form action="" id="message_form">
            <input type="text" name="message" id="message_input" placeholder="Write a message ..."/>
            <button type="submit" id="message-send">Send Message</button>
        </form>
    </div>        
    <script>
        const messages_el = document.getElementById("messages");
        const username_input = document.getElementById("username");
        const message_input = document.getElementById("message_input");
        const message_form = document.getElementById("message_form");
    
        message_form.addEventListener('submit', function (e) {
            e.preventDefault();
    
            let has_errors = false;
    
            if (username_input.value == '') {
                alert("Please enter a username");
                has_errors = true;
            }
    
            if (message_input.value == '') {
                alert("Please enter a message");
                has_errors = true;
            }
    
            if (has_errors) {
                return;
            }
            
            const options = {
                method: 'post',
                url: '/send-message',
                data: {
                    username: username_input.value,
                    message: message_input.value
                }
            }
            axios(options);
        });
    window.Echo.channel('chat')
        .listen('.message',(e) =>{
            console.log(e);
        });
        // window.Echo.channel('chat')
        //     .listen('.message', (e) => {
        //         messages_el.innerHTML += '<div class="message"><strong>' + e.username + ':</strong>'+ e.message +'</div>';
        //     });
    </script>
    </body>
</html>