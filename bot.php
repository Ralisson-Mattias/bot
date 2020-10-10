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

</head>

<body>

    <div class="wrapper">
        <div class="title">Chatbot</div>
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

    <script>
        $(document).ready(function() {

            var aleatorio = Math.floor(Math.random() * 100000000)
            $('#protocol-info').html('Olá, como posso te ajudar?' + '<br>' + 'Seu número de protocolo é ' + aleatorio)

            $(document).keypress(function(e) {
                if (e.which === 13) {
                    $('#send-btn').click();
                }
            })

            $("#send-btn").on('click', function() {
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                // ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text=' + $value,
                    success: function(result) {

                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                        $(".form").append($replay);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            })
        });
    </script>

</body>

</html>