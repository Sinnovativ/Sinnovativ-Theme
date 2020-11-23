"use strict"; // begin jQuery

(function ($) {
  ////////////////////////////
  // Kennzahl Animation
  ////////////////////////////
  var kennzahlTl = gsap.timeline({
    defaults: {
      duration: 1.8
    },
    scrollTrigger: {
      trigger: '#kennzahlen',
      start: "center 90%",
      end: '+=150px',
      toggleActions: "play none none reverse",
      onEnter: function onEnter() {
        kennzahlTl.timeScale(1.0);
      },
      onEnterBack: function onEnterBack() {
        kennzahlTl.timeScale(4.0);
      }
    }
  });
  kennzahlTl.from(".kennzahl-img", {
    duration: 1,
    scale: 0,
    ease: "back.out(2)",
    stagger: {
      from: "center",
      amount: 0.25
    }
  }).from(".kennzahl-text-wrapper", {
    autoAlpha: 0,
    y: 40,
    ease: "power4.out",
    stagger: {
      from: "center",
      amount: 0.25
    }
  }, "-=0.8").from(".number", {
    duration: 3,
    marginBottom: 30,
    innerHTML: "0",
    roundProps: "innerHTML",
    ease: "power4.out",
    stagger: {
      from: "center",
      amount: 0.25
    }
  }, "-=2"); ////////////////////////////
  // Wikungskette Animation
  ////////////////////////////
  //
  // Path Animation
  //

  var wirkungsketteTl = gsap.timeline({
    defaults: {
      duration: 1,
      repeat: 0
    },
    scrollTrigger: {
      trigger: "#wirkungskette",
      scrub: 0.5,
      start: "top 55%",
      end: "bottom 65%"
    }
  });
  var d = 1;
  var maxI = 0;
  $($("svg g#path").children().get().reverse()).each(function (i, child) {
    wirkungsketteTl.to($(child), d, {
      "opacity": 1
    });
  }); //
  // Icons Animation
  //

  var wirkungsIconTl1 = gsap.timeline({
    scrollTrigger: {
      trigger: '#wirkungskette',
      start: "top 70%",
      end: '+=100px',
      toggleActions: "play none none reverse",
      onEnter: function onEnter() {
        wirkungsIconTl1.timeScale(1.0);
      },
      onEnterBack: function onEnterBack() {
        wirkungsIconTl1.timeScale(3.0);
      }
    }
  }).from(".wirkungskette-icon-1", {
    duration: 0.8,
    scale: 0,
    transformOrigin: "center",
    ease: "back.out(2)"
  }).from(".wk-text-box-1", {
    duration: 1,
    x: -200,
    opacity: 0,
    ease: "power2.out"
  }, "-=0.6");
  var wirkungsIconTl2 = gsap.timeline({
    scrollTrigger: {
      trigger: '#wirkungskette',
      start: "23% 66%",
      end: '+=100px',
      toggleActions: "play none none reverse",
      onEnter: function onEnter() {
        wirkungsIconTl2.timeScale(1.0);
      },
      onEnterBack: function onEnterBack() {
        wirkungsIconTl2.timeScale(3.0);
      }
    }
  }).from(".wirkungskette-icon-2", {
    duration: 0.8,
    scale: 0,
    transformOrigin: "center",
    ease: "back.out(2)"
  }).from(".wk-text-box-2", {
    duration: 1,
    x: 200,
    opacity: 0,
    ease: "power2.out"
  }, "-=0.6");
  var wirkungsIconTl3 = gsap.timeline({
    scrollTrigger: {
      trigger: '#wirkungskette',
      start: "37% 58%",
      end: '+=100px',
      toggleActions: "play none none reverse",
      onEnter: function onEnter() {
        wirkungsIconTl3.timeScale(1.0);
      },
      onEnterBack: function onEnterBack() {
        wirkungsIconTl3.timeScale(3.0);
      }
    }
  }).from(".wirkungskette-icon-3", {
    duration: 0.8,
    scale: 0,
    transformOrigin: "center",
    ease: "back.out(2)"
  }).from(".wk-text-box-3", {
    duration: 1,
    x: -200,
    opacity: 0,
    ease: "power2.out"
  }, "-=0.6");
  var wirkungsIconTl4 = gsap.timeline({
    scrollTrigger: {
      trigger: '#wirkungskette',
      start: "57% 69%",
      end: '+=100px',
      toggleActions: "play none none reverse",
      onEnter: function onEnter() {
        wirkungsIconTl4.timeScale(1.0);
      },
      onEnterBack: function onEnterBack() {
        wirkungsIconTl4.timeScale(3.0);
      }
    }
  }).from(".wirkungskette-icon-4", {
    duration: 0.8,
    scale: 0,
    transformOrigin: "center",
    ease: "back.out(2)"
  }).from(".wk-text-box-4", {
    duration: 1,
    x: -200,
    opacity: 0,
    ease: "power2.out"
  }, "-=0.6");
  var wirkungsIconTl5 = gsap.timeline({
    scrollTrigger: {
      trigger: '#wirkungskette',
      start: "71% 52%",
      end: '+=100px',
      toggleActions: "play none none reverse",
      onEnter: function onEnter() {
        wirkungsIconTl5.timeScale(1.0);
      },
      onEnterBack: function onEnterBack() {
        wirkungsIconTl5.timeScale(3.0);
      }
    }
  }).from(".wirkungskette-icon-5", {
    duration: 0.8,
    scale: 0,
    transformOrigin: "center",
    ease: "back.out(2)"
  }).from(".wk-text-box-5", {
    duration: 1,
    x: 200,
    opacity: 0,
    ease: "power2.out"
  }, "-=0.6");
  var wirkungsIconTl6 = gsap.timeline({
    scrollTrigger: {
      trigger: '#wirkungskette',
      marker: true,
      start: "bottom 68%",
      end: '+=100px',
      toggleActions: "play none none reverse",
      onEnter: function onEnter() {
        wirkungsIconTl6.timeScale(1.0);
      },
      onEnterBack: function onEnterBack() {
        wirkungsIconTl6.timeScale(3.0);
      }
    }
  }).from(".wirkungskette-icon-6", {
    duration: 0.8,
    scale: 0,
    transformOrigin: "center",
    ease: "back.out(2)"
  }).from(".wk-text-box-6", {
    duration: 1,
    x: -200,
    opacity: 0,
    ease: "power2.out"
  }, "-=0.6"); // end jQuery
})(jQuery);