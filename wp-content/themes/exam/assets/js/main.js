//slider
$(".home-mainvisual__slider").slick({
  fade: true,
  speed: 1100,
  infinite: true,
  autoplay: true,
  arrows: false,
});

//slider interview
$('.home-interview__slider').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  dots: true,
  autoplay: true,
  centerMode: true,
  centerPadding: '90px',
  focusOnSelect: true,
  variableWidth: true, 
  prevArrow: $(".home-interview__prev"),
  nextArrow: $(".home-interview__next"),

  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows:false,
      },
    },
  ],
});

$(".company-single__slider").slick({
  fade: true,
  speed: 1100,
  infinite: true,
  autoplay: false,
  arrows: false,
  dots: true
});

$(".company-single__select").slick({
  speed: 1100,
  infinite: false,
  autoplay: false,
  arrows: false,
  dots: false,
  swipe: false
});

//back to top
$(".c-backtotop").click(function () {
$("html, body").animate({ scrollTop: 0 });
  return false;
})

//menu mobile
$(document).ready(function () {
"use strict";
$(".c-header__hamburger").click(function (e) {
    e.preventDefault();
    $("body").toggleClass("is-fixed");
    $(this).toggleClass('active');
    $(".c-header__navmb").toggleClass("opened");
});
});

$(".c-header__linkmb").click(function () {
var item = $(this).next();
if (item.length > 0) {
  $(".c-header__navmb").animate({scrollTop: 0},0);
}
else {
  $(".c-header__navmb").toggleClass("opened");
  $(".c-header__hamburger").removeClass("active");
  $('body').toggleClass("is-fixed");
}
});
$(".c-header__btnclose").click(function () {
  $(".c-header__navmb").removeClass("opened");
  $(".c-header__hamburger").removeClass("active");
})

//validate form
$(".mw_wp_form form").validate({
    rules: {
      "name": {
        required: true
      },
      "email": {
        required: true,
        email: true,
      },
      "phone": {
        required: true,
        fnType: true,
        maxlength: 13,
        minlength:10,
      },
      "message": {
        required: true
      },
    },
    messages: {
      "name": {
        required: "『氏名』を入力してください。"
      },
      "phone": {
        required: "『電話番号』を入力してください。",
        fnType: "無効な電話番号",
        maxlength: "無効な電話番号",
        minlength: "無効な電話番号",
      },
      "email": {
        required: "『メールアドレス』を入力してください。",
        email: "example@gmail.com"
      },
      "message": {
        required: "『お問い合わせ内容』を入力してください。"
      },
    },
  });

$.validator.addMethod('email', function (value) {
  return value.match(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/);
}, 'Enter valid email');

$.validator.addMethod('fnType', function (value) {
  return value.match(/^(?:\d{10}|\d{11}|\d{3}-\d{3}-\d{4}|\d{2}-\d{4}-\d{4}|\d{3}-\d{4}-\d{4})$/);
}, 'Enter valid phone number');

$(".contact-form__btn").click(function () {
  if($(".contact-form__content").valid()){
    window.location.reload();
  }
  else{
    $(".contact-form__alert").addClass('is-alert');
  }
});
