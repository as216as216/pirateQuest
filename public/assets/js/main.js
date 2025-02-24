$(document).ready(function () {
    $('#btn_send_aswer').on('click',function (e) {
        var formData = $('#answer_form').serializeArray();
        var questionNumber = $("#question").val();
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/verify/',
            data: formData,
            async: false,
            success: function (res) {
                console.log("Удача!");
                console.log(res.success);
                if (res.success == 'true') {
                    $("#success_div").removeClass('visually-hidden');
                    $("#errors_div").addClass('visually-hidden');
                    setTimeout(function() {
                        window.location.href = "/verify/goodAnswer/" + questionNumber; // Переадресация на другую страницу
                    }, 1000);
                }
                else {
                    $("#success_div").addClass('visually-hidden');
                    $("#errors_div").removeClass('visually-hidden');
                }
            },
            error: function (res) {
                let response=JSON.decode(res.responseText);
                res.message;
            }
        });
    });
});