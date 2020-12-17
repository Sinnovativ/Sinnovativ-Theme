"use strict";

// begin jQuery
( function( $ ) {


////////////////////////////
// Kennzahl Animation
////////////////////////////

let kennzahlTl = gsap.timeline({
    defaults:{ duration: 1.8 },
    scrollTrigger: {
        trigger: '#kennzahlen',
        start: "center 90%",
        end: '+=150px',
        toggleActions: "play none none reverse",
        onEnter: () => {
          kennzahlTl.timeScale(1.0);
        },        
        onEnterBack: () => {
          kennzahlTl.timeScale(4.0);
        },
    }
});

kennzahlTl
    .from(".kennzahl-img", { scale: 0.8, ease: "back.out(6)", stagger: { from: "center", amount: 0.25 } })
    .from(".kennzahl-text-wrapper", { autoAlpha: 0, y: 40, ease: "power4.out", stagger: { from: "center", amount: 0.25 } }, "-=1.6")
    .from(".number", { duration: 3, marginBottom: 30, innerHTML: "0", roundProps: "innerHTML", ease: "power4.out", stagger: { from: "center", amount: 0.25 } }, "-=2")    


////////////////////////////
// Wikungskette Animation
////////////////////////////

//
// Path Animation
//
var wirkungsketteTl = gsap.timeline({defaults: {duration: 1, repeat:0},
    scrollTrigger: {
        trigger: "#wirkungskette",
        scrub: 0.5,
        start: "top 55%",
        end: "bottom 65%",
    }
})

var d = 1;
var maxI = 0;
$($("svg g#path").children().get().reverse()).each(function(i, child){
  wirkungsketteTl.to($(child), d, {"opacity":1});
});

//
// Icons Animation
//

let iconAniTime = 1;
let textAniTime = 1.2;

let wirkungsIconTl1 = gsap.timeline({
    scrollTrigger: { trigger: '#wirkungskette', start: "top 70%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl1.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl1.timeScale(3.0); }}
})
.from(".wirkungskette-icon-1", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
.from(".wk-text-box-1", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

let wirkungsIconTl2 = gsap.timeline({
    scrollTrigger: { trigger: '#wirkungskette', markers: false, start: "25% 66%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl2.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl2.timeScale(3.0); }}
})
.from(".wirkungskette-icon-2", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
.from(".wk-text-box-2", { duration: textAniTime, /*x: 200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

let wirkungsIconTl3 = gsap.timeline({
    scrollTrigger: { trigger: '#wirkungskette', start: "37% 58%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl3.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl3.timeScale(3.0); }}
})
.from(".wirkungskette-icon-3", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
.from(".wk-text-box-3", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

let wirkungsIconTl4 = gsap.timeline({
    scrollTrigger: { trigger: '#wirkungskette', start: "60% 69%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl4.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl4.timeScale(3.0); }}
})
.from(".wirkungskette-icon-4", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
.from(".wk-text-box-4", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

let wirkungsIconTl5 = gsap.timeline({
    scrollTrigger: { trigger: '#wirkungskette', start: "71% 52%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl5.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl5.timeScale(3.0); }}
})
.from(".wirkungskette-icon-5", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
.from(".wk-text-box-5", { duration: textAniTime, /*x: 200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

let wirkungsIconTl6 = gsap.timeline({
    scrollTrigger: { trigger: '#wirkungskette', start: "bottom 66%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl6.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl6.timeScale(3.0); }}
})
.from(".wirkungskette-icon-6", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)"})
.from(".wk-text-box-6", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" )



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