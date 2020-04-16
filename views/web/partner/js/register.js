var goldpayidcheck = function() {
    $.ajax({
        type: 'GET',
        url: 'http://igdpay.sayfox.com/member/check/goldpayidcheck',
		data: {
            'member_id': encodeURIComponent($('#goldpay_id').val())
        },
        crossDomain: true,
        cache: false,
        async: false,
        dataType : 'jsonp',
        //jsonp : 'callback',
        
         success: function(result) {
            var msg = $('#msg_goldpay_id');
   
            switch(result) {
                case '110' : msg.html('3자리 숫자 또는 영문,_ 숫자 만 가능합니다').css('color', 'red'); break;
                case '120' : msg.html('3자리 영문_숫자_ 등 입력하여 주세요.').css('color', 'red'); break;
                case '130' : msg.html('가입회원이 아닙니다.').css('color', 'red'); break;
                case '140' : msg.html('가입회원이 아닙니다.').css('color', 'red'); break;
                case '000' : msg.html('아이디 검증 통과').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            
            $('#goldpay_id_enabled').val(result);
        }
        
        
        

    });
}


var account_idcheck = function() {
    $.ajax({
        type: 'POST',
        url: '/member/check/account_idcheck',
        data: {
            'account_id': encodeURIComponent($('#account_id').val())
        },
        cache: false,
        async: false,
        success: function(result) {
            var msg = $('#msg_account_id');
   
            switch(result) {
                case '110' : msg.html('3자리 숫자 또는 영문,_ 숫자 만 가능합니다').css('color', 'red'); break;
                case '120' : msg.html('3자리 영문_숫자_ 등 입력하여 주세요.').css('color', 'red'); break;
                case '130' : msg.html('이미 존재 하는 ID 입니다').css('color', 'red'); break;
                case '140' : msg.html('가입회원이 아닙니다.').css('color', 'red'); break;
                case '000' : msg.html('아이디 검증 통과').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            $('#account_id_enabled').val(result);
        }
    });
}


var idcheck = function() {
    $.ajax({
        type: 'POST',
        url: '/member/check/idcheck',
        data: {
            'member_id': encodeURIComponent($('#member_id').val())
        },
        cache: false,
        async: false,
        success: function(result) {
            var msg = $('#msg_member_id');
   
            switch(result) {
                case '110' : msg.html('3자리 숫자 또는 영문,_ 숫자 만 가능합니다').css('color', 'red'); break;
                case '120' : msg.html('3자리 영문_숫자_ 등 입력하여 주세요.').css('color', 'red'); break;
                case '130' : msg.html('이미 존재 하는 ID 입니다').css('color', 'red'); break;
                case '140' : msg.html('가입회원이 아닙니다.').css('color', 'red'); break;
                case '000' : msg.html('아이디 검증 통과').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            $('#member_id_enabled').val(result);
        }
    });
}

var mbcheck = function() {
    $.ajax({
        type: 'POST',
        url: '/member/check/mbcheck',
        data: {
            'member_id': encodeURIComponent($('#member_id').val())
        },
        cache: false,
        async: false,
        success: function(result) {
            var msg = $('#msg_member_id');
   
            switch(result) {
                case '110' : msg.html('3자리 숫자 또는 영문,_ 숫자 만 가능합니다').css('color', 'red'); break;
                case '120' : msg.html('3자리 영문_숫자_ 등 입력하여 주세요.').css('color', 'red'); break;
                case '000' : msg.html('존재하지 않는 회원아이디').css('color', 'red'); break;
                case '140' : msg.html('가입회원이 아닙니다.').css('color', 'red'); break;
                case '130' : msg.html('아이디 존재 검증 통과').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            $('#member_id_enabled').val(result);
        }
    });
}



var recheck = function() {
    $.ajax({
        type: 'POST',
        url: '/member/check/recheck',
        data: {
            'recommend_id': encodeURIComponent($('#recommend_id').val())
        },
        cache: false,
        async: false,
        success: function(result) {
            var msg = $('#msg_re_id');
            switch(result) {
                case '110' : msg.html('3자리 숫자 또는 영문,_ 숫자 만 가능합니다').css('color', 'red'); break;
                case '120' : msg.html('3자리 영문_숫자_ 등 입력하여 주세요.').css('color', 'red'); break;
                case '130' : msg.html('찾을수 없는 아이디 입니다.').css('color', 'red'); break;
                case '140' : msg.html('가입회원이 아닙니다.').css('color', 'red'); break;
                case '000' : msg.html('추천인 확인 통과').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            $('#re_id_enabled').val(result);
        }
    });
}

var spcheck = function() {
    $.ajax({
        type: 'POST',
        url: '/member/check/spcheck',
        data: {
            'sponsor_id': encodeURIComponent($('#sponsor_id').val())
        },
        cache: false,
        async: false,
        success: function(result) {
            var msg = $('#msg_sp_id');
            switch(result) {
                case '110' : msg.html('3자리 숫자 또는 영문,_ 숫자 만 가능합니다').css('color', 'red'); break;
                case '120' : msg.html('3자리 영문_숫자_ 등 입력하여 주세요.').css('color', 'red'); break;
               
                case '140' : msg.html('가입회원이 아닙니다.').css('color', 'red'); break;
                case '130' : msg.html('후원인이 없거나 좌우에 어카운트가 존재').css('color', 'red'); break;
                case '000' : msg.html('후원인 확인 통과').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            $('#sp_id_enabled').val(result);
        }
    });
}
