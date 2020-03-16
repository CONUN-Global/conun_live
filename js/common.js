// url param
function getUrlParams() {
    var params = {};
    window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(str, key, value) { params[key] = value; });
    return params;
}

//copy to clipboard
function copytoClipFF(text) {
    window.prompt("Copy to clipboard: Ctrl C, Enter", text);
}
function copytoClip(target){
    var copyitem = document.getElementById(target);
    copyitem.select();
    copyitem.setSelectionRange(0, 99999);
    //browser test
    try{
        var success = document.execCommand('copy', false, null);
        alert('success');
    } catch (e) {
        copytoClipFF(copyitem.value);
    }
}
function number_format(num, decimals, dec_point, thousands_sep) {
    num = parseFloat(num);
    if(isNaN(num)) return '0';

    if(typeof(decimals) == 'undefined') decimals = 0;
    if(typeof(dec_point) == 'undefined') dec_point = '.';
    if(typeof(thousands_sep) == 'undefined') thousands_sep = ',';
    decimals = Math.pow(10, decimals);

    num = num * decimals;
    num = Math.round(num);
    num = num / decimals;

    num = String(num);
    var reg = /(^[+-]?\d+)(\d{3})/;
    var tmp = num.split('.');
    var n = tmp[0];
    var d = tmp[1] ? dec_point + tmp[1] : '';

    while(reg.test(n)) n = n.replace(reg, "$1"+thousands_sep+"$2");

    return n + d;
}
//날짜구하기
function getToday(){
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;    //1월이 0으로 되기때문에 +1을 함.
    var date = now.getDate();

    if((month + "").length < 2){        //2자리가 아니면 0을 붙여줌.
        month = "0" + month;
    }else{
        // ""을 빼면 year + month (숫자+숫자) 됨.. ex) 2018 + 12 = 2030이 리턴됨.
        month = "" + month;
    }

    if((date + "").length < 2){        //2자리가 아니면 0을 붙여줌.
        date = "0" + date;
    }else{
        // ""을 빼면 year + month (숫자+숫자) 됨.. ex) 2018 + 12 = 2030이 리턴됨.
        date = "" + date;
    }

    return today = year + '-' + month + '-' + date;
}





