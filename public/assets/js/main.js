$(document).ready(function () {
    console.log('Ееее, Нигга!');
    $('#submit').on('click',function (e) {
        var formData = $('#filter-form').serializeArray();
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/verify/',
            data: formData,
            async: false,
            // beforeSend: function() {
            //     $('.progs_content').addClass('loading');
            // },
            success: function (res) {
                console.log("УУдача!")
                console.log(res['valid'])
                // $('.progs_content').removeClass('loading');
                // let items = $('.progs_item');
                // items.each(function () {
                //     $(this).css('display','none');
                // });

            },
            error: function (res) {
                let response=JSON.decode(res.responseText);
                res.message;
            }
        });
    });

});