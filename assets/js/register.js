var idcheck = function() {
    $.ajax({
        type: 'POST',
        url: '/member/check/idcheck',
        data: {
            //'member_id': encodeURIComponent($('#member_id').val()) // 인코딩
            'member_id': $('#member_id').val()
        },
        cache: false,
        async: false,
        success: function(result) {
            var msg = $('#msg_member_id');
   
            switch(result) {
                case '110' : msg.html('Your email address is too short').css('color', 'red'); break;
                case '120' : msg.html('Please enter your correct email address').css('color', 'red'); break;
                case '130' : msg.html('Email already exists').css('color', 'red'); break;
                case '140' : msg.html('You are not a member.').css('color', 'red'); break;
                case '000' : msg.html('Passed verification').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            $('#member_id_enabled').val(result);
        }
    });
}