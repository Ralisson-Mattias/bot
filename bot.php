<?php

// print_r($_POST);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBot</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/0d539b01fd.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="script.js"></script>

</head>

<body>

    
    <div id="wrapper-box" class="wrapper-initial">
        <div class="wrapper">
            <div class="title">
                <div id="sub-title" class="sub-title">
                    Chatbot
                    <i id="arrow" class="fas fa-arrow-up icon-arrow-initial"></i>
                </div>
            </div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <p id="protocol-info">
                        </p>
                    </div>
                </div>

            </div>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Digite algo aqui" required>
                    <button id="send-btn">Enviar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>