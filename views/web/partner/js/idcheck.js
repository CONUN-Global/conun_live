
var firstcheck = function() {
    $.ajax({
        type: 'POST',
        url: '/member/check/docheck',
        data: {
            'member_id': encodeURIComponent($('#first_id').val())
        },
        cache: false,
        async: false,
        success: function(result) {
            var msg = $('#msg_first_id');
   
            switch(result) {
                case '110' : msg.html('3자리 숫자 또는 영문,_ 숫자 만 가능합니다').css('color', 'red'); break;
                case '120' : msg.html('3자리 영문_숫자_ 등 입력하여 주세요.').css('color', 'red'); break;
                case '000' : msg.html('존재하지 않는 회원아이디').css('color', 'red'); break;
                case '140' : msg.html('가입회원이 아닙니다.').css('color', 'red'); break;
                case '130' : msg.html('아이디 존재 검증 통과').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            $('#first_id_enabled').val(result);
        }
    });
}

var secondcheck = function() {
    $.ajax({
        type: 'POST',
        url: '/member/check/docheck',
        data: {
            'member_id': encodeURIComponent($('#second_id').val())
        },
        cache: false,
        async: false,
        success: function(result) {
            var msg = $('#msg_second_id');
   
            switch(result) {
                case '110' : msg.html('3자리 숫자 또는 영문,_ 숫자 만 가능합니다').css('color', 'red'); break;
                case '120' : msg.html('3자리 영문_숫자_ 등 입력하여 주세요.').css('color', 'red'); break;
                case '000' : msg.html('존재하지 않는 회원아이디').css('color', 'red'); break;
                case '140' : msg.html('가입회원이 아닙니다.').css('color', 'red'); break;
                case '130' : msg.html('아이디 존재 검증 통과').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            $('#second_id_enabled').val(result);
        }
    });
}