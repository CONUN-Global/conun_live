// 스크롤 감지
var didScroll;
var lastScrollTop = 0;
var delta = 5; //기준
$(document).scroll(function(event){ didScroll = true; });
setInterval(function() { if (didScroll) { hasScrolled(); didScroll = false; } }, 250);
function hasScrolled() {
  var st = $(this).scrollTop();
  if(Math.abs(lastScrollTop - st) <= delta) return;

  if (st > lastScrollTop && st > 30){ // Scroll Down
    $('header').addClass('off');
  } else { // Scroll Up
    if(st + $(window).height() < $(document).height() && st<100) {
      $('header').removeClass('off'); }
    } lastScrollTop = st;
  }

// onload body add class
$(document).ready(function(){
  setTimeout(function(){
    $('body').addClass('on');
  },300);
  if($('input#member_id').val() != null){
     $('span[data="member_id"]').addClass('on');
  }
})
// input focus blur 동작
$('input.default').focus(function(){
  $data = $(this).attr('id');
  $('span[data='+$data+']').addClass('on');
})
$('input.default').blur(function(){
  $data = $(this).attr('id');
  $('span[data='+$data+']').removeClass('on');
  if($(this).val() != ''){
    $('span[data='+$data+']').addClass('fill');
    $(this).addClass('fill');
  }
})
//링크 이동시 화면전환 pre animate
function screenChange(i){
  $target = i;
  $('body').addClass('off');
  setTimeout(function(){
    window.location.href='/conun'+$target;
  }, 310)
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
//뒤로가기

// 모달 여닫기
function openModal(e){
  $('.modal[type=' + e + ']').show();
}
function closeModal(){
  $('.modal').hide();
}
$('.modalbg').on('click',function(){
  closeModal();
})
$('.modal input').on('change', function(){
  setTimeout(function(){
    closeModal();
  }, 200);
})

// 거래내역 팝업
function openReceipt(t, b){
  $el = $('#receipt');
  console.log(t);
  if(t.trans == "RECEIVE"){
    //$el.find('#trans_detail').hide();
    $el.find('#trans_detail').css({'display':'block'});

  }else {
    $el.find('#trans_detail').css({'display':'block'});
  }
  if(t.out == 1){
    $el.attr('type', 'out');
  }else {
    $el.removeAttr('type');
  }
  $el.find('.type').text(t.trans);
  $el.find('.time').text(t.time);

  if(t.trans == "EXCHANGE"){
    $el.find('#txtarget_w').hide();
    $el.find('#txtarget').hide();
  }else{
    $el.find('#txtarget').css({'display':'block'});
    if(t.target == ""){
      $el.find('#txtarget_w').hide();
      $el.find('#txtarget').text(t.wallet);
    }else {
      $el.find('#txtarget_w').css({'display':'block'});
      $el.find('#txtarget').text(t.target);
      $el.find('#txtarget_w').text(t.wallet);
    }
  }



  if(t.trans == "EXCHANGE"){
    $el.find('#trans_detail').children('div.flex.row').eq(2).hide();
    $el.find('#trans_detail').children('div.flex.row').eq(3).css({'display':'flex'});
  }else if(t.trans == "SEND"){
    $el.find('#trans_detail').children('div.flex.row').eq(2).css({'display':'flex'});
    //$el.find('#trans_detail').children('div.flex.row').eq(3).css({'display':'flex'});
    $el.find('#trans_detail').children('div.flex.row').eq(3).hide();
  }else if(t.trans == "RECEIVE"){
    $el.find('#trans_detail').show();
    $el.find('#trans_detail').children('div.flex.row').eq(2).css({'display':'flex'});
    $el.find('#trans_detail').children('div.flex.row').eq(2).css({'display':'flex'});
    //$el.find('#trans_detail').children('div.flex.row').eq(3).css({'display':'flex'});
    $el.find('#trans_detail').children('div.flex.row').eq(3).hide();
  }else{
    $el.find('#trans_detail').children('div.flex.row').eq(2).css({'display':'flex'});
    //$el.find('#trans_detail').children('div.flex.row').eq(3).css({'display':'flex'});
    $el.find('#trans_detail').children('div.flex.row').eq(3).hide();

  }

  if(t.trans == "PAYMENT"){
    $el.find('#txprice').text(t.price + '₩');
    $el.find('#trans_detail').children('div.flex.row').eq(3).css({'display':'flex'});
  }else if(t.trans == "EXCHANGE"){
    $el.find('#txprice').text(t.price + 'CONP');
    $el.find('#trans_detail').children('div.flex.row').eq(3).css({'display':'flex'});
  }else{
    $el.find('#txprice').text(t.val + t.coin);
  }

  $el.find('#txcoin').text(t.coin);
  $el.find('#txval').text(t.val);
  $el.find('#txgas').text(t.gas + ' ETH');
  $el.find('#txadd').text('+ ' + t.add);

  /*
  $el.find('#balcon').text(b.con);
  $el.find('#balconp').text(b.conp);
  $el.find('#balmocp').text(b.mocp);
  $el.find('#baleth').text(b.eth);

   */
  $('#receipt').show();
}
