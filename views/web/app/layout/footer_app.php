
<!-- vendor css -->
<link href="<?=$skin_dir?>/css/font-awesome.css" rel="stylesheet">
<link href="<?=$skin_dir?>/css/ionicons.css" rel="stylesheet">
<link href="<?=$skin_dir?>/css/perfect-scrollbar.css" rel="stylesheet">
<link href="<?=$skin_dir?>/css/jquery.switchButton.css" rel="stylesheet">

<link href="<?=$skin_dir?>/css/select2.min.css" rel="stylesheet">
<!-- Bracket CSS -->
<link rel="stylesheet" href="<?=$skin_dir?>/css/bracket.css">


<script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/popper.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/bootstrap.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/perfect-scrollbar.jquery.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/moment.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/jquery-ui.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.switchButton.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.peity.js"></script>


<script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.flot.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.flot.resize.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.flot.spline.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.sparkline.min.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/echarts.min.js"></script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/select2.full.min.js"></script>

<script type="text/javascript"  src="<?=$skin_dir?>/js/bracket.js"></script>

<script type="text/javascript"  src="<?=$skin_dir?>/js/ResizeSensor.js"></script>

    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>
<script type="text/javascript"  src="<?=$skin_dir?>/js/qrcode.js"></script>
 

  </body>
</html>

    