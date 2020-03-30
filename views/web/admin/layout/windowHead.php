<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=1200">
<link rel="stylesheet" type="text/css" href="/views/web/admin/css/common.css?2016022205">
<link rel="stylesheet" type="text/css" href="/views/web/admin/css/window.css?2016022205">
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="/views/web/views/admin/css/ie7?2016022205.css">
<![endif]-->
<link rel="shortcut icon" href="/views/web/admin/images/common/favicon.ico" type="image/x-icon">
<link rel="icon" href="/views/web/admin/images/common/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="/views/web/admin/images/common/apple_icon.png" />


<script type="text/javascript" src="/views/web/admin/js/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>


<script type="text/javascript" src="/views/web/admin/js/common.js"></script>
<script type="text/javascript" src="/views/web/admin/js/jquery.selectric.js"></script>
    <script type="text/javascript">

        jQuery(function(){

            // 숫자 제외하고 모든 문자 삭제.

            $.fn.removeText = function(_v){

                //console.log("removeText: 숫자 제거 합니다.");

                if (typeof(_v)==="undefined")

                {

                    $(this).each(function(){

                        this.value = this.value.replace(/[^0-9]/g,'');

                    });

                }

                else

                {

                    return _v.replace(/[^0-9]/g,'');

                }

            };



            // php의 number_format과 같은 효과.

            $.fn.numberFormat = function(_v){

                this.proc = function(_v){

                    var tmp = '',

                        number = '',

                        cutlen = 3,

                        comma = ','

                    i = 0,

                        len = _v.length,

                        mod = (len % cutlen),

                        k = cutlen - mod;



                    for (i; i < len; i++)

                    {

                        number = number + _v.charAt(i);

                        if (i < len - 1)

                        {

                            k++;

                            if ((k % cutlen) == 0)

                            {

                                number = number + comma;

                                k = 0;

                            }

                        }

                    }

                    return number;

                };



                var proc = this.proc;

                if (typeof(_v)==="undefined")

                {

                    $(this).each(function(){

                        this.value = proc($(this).removeText(this.value));

                    });

                }

                else

                {

                    return proc(_v);

                }

            };

            $.fn.onlyNumber = function (p) {

                $(this).each(function(i) {

                    $(this).attr({'style':'text-align:left;width:80px;'});







                    this.value = $(this).removeText(this.value);

                    this.value = $(this).numberFormat(this.value);



                    $(this).bind('keypress keyup',function(e){

                        this.value = $(this).removeText(this.value);

                        this.value = $(this).numberFormat(this.value);

                    });

                });

            };

            $('.numberformat').onlyNumber();

        });

    </script>
<body>

<div id="wrap">



