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
                case '110' : msg.html('メールアドレスが短すぎます').css('color', 'red'); break;
                case '120' : msg.html('有効なメールアドレスを入力してください').css('color', 'red'); break;
                case '130' : msg.html('既に存在しているメールです').css('color', 'red'); break;
                case '140' : msg.html('登録したメンバーがありません。').css('color', 'red'); break;
                case '000' : msg.html('メールの重複チェックを通過').css('color', '#9aa01a'); break;
                default : alert( 'Wrong approach.\n\n' + result ); break;
            }
            $('#member_id_enabled').val(result);
        }
    });
}

