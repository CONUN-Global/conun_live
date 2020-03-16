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
                case '110' : msg.html('이메일주소가 너무 짧습니다').css('color', 'red'); break;
                case '120' : msg.html('올바른 이메일주소를 입력해주세요').css('color', 'red'); break;
                case '130' : msg.html('이미 존재 하는 이메일 입니다').css('color', 'red'); break;
                case '140' : msg.html('가입회원이 아닙니다.').css('color', 'red'); break;
                case '000' : msg.html('이메일 중복확인 통과').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            $('#member_id_enabled').val(result);
        }
    });
}
