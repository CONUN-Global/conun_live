var idcheck = function() {
    $.ajax({
        type: 'POST',
        url: '/app/check/idcheck',
        data: {
            //'member_id': encodeURIComponent($('#member_id').val()) // 인코딩
            'member_id': $('#member_id').val()
        },
        cache: false,
        async: false,
        success: function(result) {
            var msg = $('#msg_member_id');

            switch(result) {
                case '110' : msg.html('电子邮件地址太短\n').css('color', 'red'); break;
                case '120' : msg.html('请输入有效的电子邮件地址').css('color', 'red'); break;
                case '130' : msg.html('此电子邮件已存在').css('color', 'red'); break;
                case '140' : msg.html('不是会员').css('color', 'red'); break;
                case '000' : msg.html('电子邮件重复检查通过\n').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            $('#member_id_enabled').val(result);
          
        }
    });
}


var emaiAuth = function () {

    if($('#member_id_enabled').val()=="000"  &&  $("#maile_send").val()!="Y") {

        $.ajax({
            type: 'POST',
            url: '/app/register/auth_mail',
            data: {
                //'member_id': encodeURIComponent($('#member_id').val()) // 인코딩
                'email': $('#member_id').val()
            },
            cache: false,
            async: false,
            success: function (result) {
                var msg = $('#msg_email');
                msg.html('我们通过电子邮件向您发送了验证码.').css('color', '#9aa01a');
                msg.append(result);

            }
        });
    }
}
