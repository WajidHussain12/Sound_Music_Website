
// SECTION javascript 1

(function () {
  var $$ = function (selector, context) {
    var context = context || document;
    var elements = context.querySelectorAll(selector);
    return [].slice.call(elements);
  };

  function _fncSliderInit($slider, options) {
    var prefix = ".fnc-";

    var $slider = $slider;
    var $slidesCont = $slider.querySelector(prefix + "slider__slides");
    var $slides = $$(prefix + "slide", $slider);
    var $controls = $$(prefix + "nav__control", $slider);
    var $controlsBgs = $$(prefix + "nav__bg", $slider);
    var $progressAS = $$(prefix + "nav__control-progress", $slider);

    var numOfSlides = $slides.length;
    var curSlide = 1;
    var sliding = false;
    var slidingAT =
      +parseFloat(getComputedStyle($slidesCont)["transition-duration"]) * 1000;
    var slidingDelay =
      +parseFloat(getComputedStyle($slidesCont)["transition-delay"]) * 1000;

    var autoSlidingActive = false;
    var autoSlidingTO;
    var autoSlidingDelay = 5000;
    var autoSlidingBlocked = false;

    var $activeSlide;
    var $activeControlsBg;
    var $prevControl;

    function setIDs() {
      $slides.forEach(function ($slide, index) {
        $slide.classList.add("fnc-slide-" + (index + 1));
      });

      $controls.forEach(function ($control, index) {
        $control.setAttribute("data-slide", index + 1);
        $control.classList.add("fnc-nav__control-" + (index + 1));
      });

      $controlsBgs.forEach(function ($bg, index) {
        $bg.classList.add("fnc-nav__bg-" + (index + 1));
      });
    }

    setIDs();

    function afterSlidingHandler() {
      $slider
        .querySelector(".m--previous-slide")
        .classList.remove("m--active-slide", "m--previous-slide");
      $slider
        .querySelector(".m--previous-nav-bg")
        .classList.remove("m--active-nav-bg", "m--previous-nav-bg");

      $activeSlide.classList.remove("m--before-sliding");
      $activeControlsBg.classList.remove("m--nav-bg-before");
      $prevControl.classList.remove("m--prev-control");
      $prevControl.classList.add("m--reset-progress");
      var triggerLayout = $prevControl.offsetTop;
      $prevControl.classList.remove("m--reset-progress");

      sliding = false;
      var layoutTrigger = $slider.offsetTop;

      if (autoSlidingActive && !autoSlidingBlocked) {
        setAutoslidingTO();
      }
    }

    function performSliding(slideID) {
      if (sliding) return;
      sliding = true;
      window.clearTimeout(autoSlidingTO);
      curSlide = slideID;

      $prevControl = $slider.querySelector(".m--active-control");
      $prevControl.classList.remove("m--active-control");
      $prevControl.classList.add("m--prev-control");
      $slider
        .querySelector(prefix + "nav__control-" + slideID)
        .classList.add("m--active-control");

      $activeSlide = $slider.querySelector(prefix + "slide-" + slideID);
      $activeControlsBg = $slider.querySelector(prefix + "nav__bg-" + slideID);

      $slider
        .querySelector(".m--active-slide")
        .classList.add("m--previous-slide");
      $slider
        .querySelector(".m--active-nav-bg")
        .classList.add("m--previous-nav-bg");

      $activeSlide.classList.add("m--before-sliding");
      $activeControlsBg.classList.add("m--nav-bg-before");

      var layoutTrigger = $activeSlide.offsetTop;

      $activeSlide.classList.add("m--active-slide");
      $activeControlsBg.classList.add("m--active-nav-bg");

      setTimeout(afterSlidingHandler, slidingAT + slidingDelay);
    }

    function controlClickHandler() {
      if (sliding) return;
      if (this.classList.contains("m--active-control")) return;
      if (options.blockASafterClick) {
        autoSlidingBlocked = true;
        $slider.classList.add("m--autosliding-blocked");
      }

      var slideID = +this.getAttribute("data-slide");

      performSliding(slideID);
    }

    $controls.forEach(function ($control) {
      $control.addEventListener("click", controlClickHandler);
    });

    function setAutoslidingTO() {
      window.clearTimeout(autoSlidingTO);
      var delay = +options.autoSlidingDelay || autoSlidingDelay;
      curSlide++;
      if (curSlide > numOfSlides) curSlide = 1;

      autoSlidingTO = setTimeout(function () {
        performSliding(curSlide);
      }, delay);
    }

    if (options.autoSliding || +options.autoSlidingDelay > 0) {
      if (options.autoSliding === false) return;

      autoSlidingActive = true;
      setAutoslidingTO();

      $slider.classList.add("m--with-autosliding");
      var triggerLayout = $slider.offsetTop;

      var delay = +options.autoSlidingDelay || autoSlidingDelay;
      delay += slidingDelay + slidingAT;

      $progressAS.forEach(function ($progress) {
        $progress.style.transition = "transform " + delay / 1000 + "s";
      });
    }

    $slider
      .querySelector(".fnc-nav__control:first-child")
      .classList.add("m--active-control");
  }

  var fncSlider = function (sliderSelector, options) {
    var $sliders = $$(sliderSelector);

    $sliders.forEach(function ($slider) {
      _fncSliderInit($slider, options);
    });
  };

  window.fncSlider = fncSlider;
})();


fncSlider(".example-slider", { autoSlidingDelay: 3000 });

var $demoCont = document.querySelector(".demo-cont");



document
  .querySelector(".js-activate-global-blending")
  .addEventListener("click", function () {
    document
      .querySelector(".example-slider")
      .classList.toggle("m--global-blending-active");
  });

// section 1 javascript end



// Model javascript 

function btn1() {
  var a = document.getElementById("reg-form");
  var b = document.getElementById("login");
  var c = document.getElementById("close-btn");

  if (a.style.display === "block") {
    a.style.display = "none";
    if (c.style.display === "block")
      c.style.display = "none";
  } else {
    a.style.display = "block";
    b.style.display = "none";
    c.style.display = "block";
  }
}



function btn2() {
  if (isLoggedIn()) {
    // Redirect to the user page if the user is logged in
    window.location.href = "user.php";
  } else {
    var b = document.getElementById("login");
    var a = document.getElementById("reg-form");
    var c = document.getElementById("close-btn1");

    if (b.style.display === "block") {
      b.style.display = "none";
      if (c.style.display === "block")
        c.style.display = "none";
    } else {
      b.style.display = "block";
      a.style.display = "none";
      c.style.display = "block";
    }
  }
}



function closemodal() {
  var modal_reg = document.getElementById("reg-form");
  var modal_login = document.getElementById("login");
  var close_btn = document.getElementById("close-btn");

  modal_reg.style.display = "none";
  modal_login.style.display = "none";

  if (close_btn === "block") {
    close_btn.style.display = "none";
  } else {
    close_btn.style.display = "none";
  }
}

function closemodal1() {
  var modal_reg1 = document.getElementById("reg-form");
  var modal_login1 = document.getElementById("login");
  var close_btn1 = document.getElementById("close-btn1");

  modal_reg1.style.display = "none";
  modal_login1.style.display = "none";

  if (close_btn1 === "block") {
    close_btn1.style.display = "none";
  } else {
    close_btn1.style.display = "none";
  }
}


function loginmodal() {
  var modal_reg2 = document.getElementById("reg-form")
  var modal_login2 = document.getElementById("login")
  var c = document.getElementById("close-btn1");

  if (modal_reg2 === "block") {
    modal_reg2.style.display = "none";
  } else {
    modal_reg2.style.display = "none";
    modal_login2.style.display = "block";
    c.style.display = "block";
  }
}

function regmodal() {
  var modal_reg3 = document.getElementById("reg-form")
  var modal_login3 = document.getElementById("login")
  var c = document.getElementById("close-btn");

  if (modal_login3 === "block") {
    modal_login3.style.display = "none";
  } else {
    modal_login3.style.display = "none";
    modal_reg3.style.display = "block";
    c.style.display = "block";
  }
}

// Model javascript end



// card registration btn javascript

function card_btn() {
  if (isLoggedIn()) {
    window.location.href = "user.php";
  } else {
    var regForm = document.getElementById("reg-form");
    var c = document.getElementById("close-btn");


    if (regForm.style.display === "block") {
      regForm.style.display = "none";
      if (c.style.display === "block") {
        c.style.display = "none";
      }
    } else {
      regForm.style.display = "block";
      c.style.display = "block"
    }
  }
}

// card registration btn javascript end



















