$(document).ready(function() {

    var up = $('#wrapper-box').hasClass('wrapper-up')
    var down = $('#wrapper-box').hasClass('wrapper-down')
    var initial = $('#wrapper-box').hasClass('wrapper-initial')


    console.log(up)
    console.log(down)
    console.log(initial)

    $('#sub-title').on('click', () => {
        $('#wrapper-box').toggleClass('wrapper-up')
        $('#arrow').toggleClass('icon-arrow-up')
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