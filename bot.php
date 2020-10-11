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

    <div id="wrapper-button" class="wrapper-button">
        <i class="fas fa-headset fa-2x"></i>
    </div>

    <div id="wrapper-box" class="wrapper-box-exit">
        <div class="wrapper">
            <div class="title">
                <div id="sub-title" class="sub-title">
                    Chatbot
                    <i class="fas fa-arrow-down"></i>
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

    <script>
        $(document).ready(function() {



            function getPosicaoElemento(elemID) {
                var offsetTrail = document.getElementById(elemID);
                var offsetLeft = 0;
                var offsetTop = 0;
                while (offsetTrail) {
                    offsetLeft += offsetTrail.offsetLeft;
                    offsetTop += offsetTrail.offsetTop;
                    offsetTrail = offsetTrail.offsetParent;
                }
                if (navigator.userAgent.indexOf("Mac") != -1 &&
                    typeof document.body.leftMargin != "undefined") {
                    offsetLeft += document.body.leftMargin;
                    offsetTop += document.body.topMargin;
                }
                return {
                    left: offsetLeft,
                    top: offsetTop
                };
            }

            console.log("esquerda:" + getPosicaoElemento("wrapper-box").left)
            console.log("topo:" + getPosicaoElemento("wrapper-box").top)


            let down = $('#wrapper-box').hasClass('wrapper-down')
            let up = $('#wrapper-box').hasClass('wrapper-box-enter')

            $('#wrapper-button').on('click', () => {
                $('#wrapper-box').addClass('wrapper-box-enter')

                console.log("esquerda:" + getPosicaoElemento("wrapper-box").left)
                console.log("topo:" + getPosicaoElemento("wrapper-box").top)
            })
            
            $('#sub-title').on('click', () => {
                $('#wrapper-box').addClass('wrapper-down')

                console.log("esquerda:" + getPosicaoElemento("wrapper-box").left)
                console.log("topo:" + getPosicaoElemento("wrapper-box").top)
            })


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