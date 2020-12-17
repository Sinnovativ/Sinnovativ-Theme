"use strict";

// begin jQuery
( function( $ ) {


////////////////////////////
// Timeline Animation
////////////////////////////
ScrollTrigger.batch(".path-wrapper div:not(.tl-number)", {
  start: "top 60%",
  end: '+=100px',
  onEnter: batch => gsap.to(batch, {opacity: 1, scale: 0.8, ease: "back.out(8)"}),
  onLeaveBack: batch => gsap.to(batch, {opacity: 0.5, scale: 0.5, overwrite: true}),
});

$('.timeline-block').each(function(){
    const tlNumber = $(this).find('.tl-number');
    const tlText = $(this).find('.tl-text-box');
    const tlImage = $(this).find('.tl-image-box');
    let timelineTl = gsap.timeline({
        scrollTrigger: { 
            //markers: true,
            trigger: tlNumber,
            start: "top 60%",
            end: "bottom 60%",
            toggleActions: "play none none reverse",
            onEnter: () => {
                timelineTl.timeScale(1.0);
            },
            onEnterBack: () => {
                timelineTl.timeScale(3.0);
            }
        }
    })
    .to(tlNumber, { duration: 0.8, opacity: 1, scale: 2.2, ease: "back.out(2)" })
    .to(tlText, {duration: 0.8, x: 0, opacity: 1}, "-=0.4")
    .to(tlImage, {duration: 0.8, x: 0, opacity: 1}, "-=0.8");
});


////////////////////////////
// Map
////////////////////////////

var $landObj = $('#land-objekt path');
var $nameObj = $('#land-namen image');

$landObj.on('click', function () {
    gsap.to(".poup-map", {duration: 0.3, ease: "back.out(1)", scale: 0, transformOrigin:"50% 50%"});
    let $modalOb = $(".popup-" + $(this).attr('id')).show();
    gsap.to($modalOb, {duration: 0.5, ease: "back.out(1)", scale: 1, opacity: 1,transformOrigin:"50% 50%"});
});

$nameObj.on('click', function () {
    gsap.to(".poup-map", {duration: 0.3, ease: "back.out(1)", scale: 0, transformOrigin:"50% 50%"});
    let $modalOb = $(".popup-" + $(this).attr('class')).show();
    gsap.to($modalOb, {duration: 0.5, ease: "back.out(1)", scale: 1, opacity: 1, transformOrigin:"50% 50%"});
});

$(".close-popup, .close-popup::after").on('click', function () {
    gsap.to(".poup-map", {duration: 0.3, ease: "back.out(1)", scale: 0, opacity: 0, transformOrigin:"50% 50%"});
});

// Hover for Lands
$landObj.on('mouseenter', function(e) {
  $(this).addClass('active');
  gsap.to($("." + $(this).attr('id')), 0.3, {scale: 1.4, delay: 0.1, transformOrigin:"50% 50%", ease: "power2.out"});
});
$landObj.on('mouseleave', function(e) {
  $(this).removeClass('active');
  gsap.to($("." + $(this).attr('id')), 0.3, {scale: 1, delay: 0.1, transformOrigin:"50% 50%"});
});

// Hover for Names
$nameObj.on('mouseenter', function(e) {
  $("." + $(this).attr('id')).addClass('active');
  gsap.to($(this), 0.3, {scale: 1.4, delay: 0.1, transformOrigin:"50% 50%", ease: "power2.out"});
});
$nameObj.on('mouseleave', function(e) {
  $("." + $(this).attr('id')).removeClass('active');
  gsap.to($(this), 0.3, {scale: 1, delay: 0.1, transformOrigin:"50% 50%"});
});

// end jQuery
} )( jQuery );