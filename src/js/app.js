import $ from 'jquery'
import magnificPopup from 'magnific-popup'
import LazyLoad from 'vanilla-lazyload'

const AppInit = () => {
  const myLazyLoad = new LazyLoad({
    elements_selector: '.lazy',
    class_loading: 'lazy--loading',
    class_loaded: 'lazy--loaded',
    callback_load: function(el) {
      const imgWrapper = el.parentNode
      imgWrapper.classList.add('hide-spinner')
    }
  })
  // Halt TouchScroll
  const freezeVp = function(e) {
    e.preventDefault()
  }
  function stopBodyScrolling (bool) {
    if (bool === true) {
      document.body.addEventListener('touchmove', freezeVp, false);
    } else {
      document.body.removeEventListener('touchmove', freezeVp, false);
    }
  }
  const noScrollOpen = () => {
    $('html').addClass('no-scroll')
    $('body').addClass('no-scroll')
    stopBodyScrolling(true)
  }
  const noScrollClose = () => {
    $('html').removeClass('no-scroll')
    $('body').removeClass('no-scroll')
    stopBodyScrolling(false)
  }
  // SOME HANDY VARS
  AppInit.imgUrl = ''
  // INITIALIZE POPUPS
  const mfpOpen = () => {
    noScrollOpen()
  }
  const mfpClose = () => {
    noScrollClose()
  }
  const spinner = () => {
    const spinnerMarkup = `
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" width="32" height="32">
        <g class="nc-icon-wrapper" fill="#111111"><g class="nc-loop_circle-04-32"> <path data-cap="butt" fill="none" stroke="#111111" stroke-width="2" stroke-miterlimit="10" d="M2.30867,22.13668 C1.46776,20.26345,1,18.18635,1,16C1,7.71573,7.71573,1,16,1s15,6.71573,15,15s-6.71573,15-15,15 c-3.61453,0-6.93046-1.27847-9.52027-3.40787" transform="rotate(234.13100000005215 16 16)" stroke-linecap="butt" stroke-linejoin="miter"></path> </g>
        <script>!function(){function t(t){this.element=t,this.circle=this.element.getElementsByTagName("path")[0],this.animationId,this.start=null,this.init()}if(!window.requestAnimationFrame){var i=null;window.requestAnimationFrame=function(t,n){var e=(new Date).getTime();i||(i=e);var a=Math.max(0,16-(e-i)),o=window.setTimeout(function(){t(e+a)},a);return i=e+a,o}}t.prototype.init=function(){var t=this;this.animationId=window.requestAnimationFrame(t.triggerAnimation.bind(t))},t.prototype.reset=function(){var t=this;window.cancelAnimationFrame(t.animationId)},t.prototype.triggerAnimation=function(t){var i=this;this.start||(this.start=t);var n=t-this.start;720>n||(this.start=this.start+720),this.circle.setAttribute("transform","rotate("+Math.min(n/2,360)+" 16 16)");if(document.documentElement.contains(this.element))window.requestAnimationFrame(i.triggerAnimation.bind(i))};var n=document.getElementsByClassName("nc-loop_circle-04-32"),e=[];if(n)for(var a=0;n.length>a;a++)!function(i){e.push(new t(n[i]))}(a);document.addEventListener("visibilitychange",function(){"hidden"==document.visibilityState?e.forEach(function(t){t.reset()}):e.forEach(function(t){t.init()})})}();</script></g>
      </svg>`
    return spinnerMarkup
  }
  // SINGLE IMAGE POPUP
  if ($('.single-image-popup').length > 0) {
    $('.single-image-popup').magnificPopup({
      disableOn: 100,
      type: 'image',
      mainClass: 'mfp-fade',
      removalDelay: 50,
      preloader: true,
      tLoading: spinner(),
      fixedContentPos: true,
      showCloseBtn: true,
      closeBtnInside: false,
      callbacks: {
        elementParse: function(item, template) {
          AppInit.imgUrl = item.src
        },
        markupParse: function(template, values, item) {
          $(template[0]).append('<div class="mfp-bg-img" style="background-image:url(' + item.src + ')"></div>')
        },
        open: function() {
          mfpOpen()
        },
        close: function() {
          mfpClose()
        }
      },
      image: {
        markup: '<div class="mfp-figure">'+
                  '<div class="mfp-close"></div>'+
                  '<div class="mfp-img"></div>'+
                '</div>',
        cursor: 'no-scroll',
        verticalFit: false,
        tError: '<a href="%url%">The image</a> could not be loaded.'
      }
    })
  }
  // Slideshow-Popup
  if ($('.slideshow-popup').length > 0) {
    $('.slideshow-popup').magnificPopup({
      disableOn: 100,
      type: 'image',
      mainClass: 'mfp-fade',
      removalDelay: 50,
      preloader: true,
      tLoading: spinner(),
      fixedContentPos: true,
      showCloseBtn: true,
      closeBtnInside: false,
      callbacks: {
        open: function() {
          mfpOpen()
        },
        close: function() {
          mfpClose()
        }
      },
      gallery: {
        enabled: true,
        preload: [0,1],
        navigateByImgClick: false,
        arrowMarkup: '<button type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
        tPrev: '',
        tNext: '',
        tCounter: '<span class="mfp-counter">%curr% / %total%</span>'
      }
    })
  }
  // Details-Popup
  if ($('.details-popup').length > 0) {
    $('.details-popup').each(function() {
      $(this).magnificPopup({
        delegate: 'a',
        disableOn: 100,
        type: 'image',
        mainClass: 'mfp-fade',
        removalDelay: 50,
        preloader: true,
        fixedContentPos: true,
        showCloseBtn: true,
        closeBtnInside: false,
        tLoading: spinner(),
        callbacks: {
          open: function() {
            mfpOpen()
          },
          close: function() {
            mfpClose()
          }
        },
        gallery: {
          enabled: true,
          preload: [0,1],
          navigateByImgClick: false,
          arrowMarkup: '<button type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
          tPrev: '',
          tNext: '',
          tCounter: '<span class="mfp-counter">%curr% / %total%</span>'
        }
      })
    })
  }
  // Mobile NAV
  $('.menu-button').click((e) => {
    if (!$('header').hasClass('open')) {
      $('header').addClass('open')
      noScrollOpen()
    } else {
      $('header').removeClass('open')
      noScrollClose()
    }
  })
  // Init SmoothScroll
  $('a[href*="#"]')
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 350, function() {
          var $target = $(target);
          $target.focus();
          if ($target.is(':focus')) {
            return false;
          } else {
            $target.attr('tabindex','-1');
            $target.focus();
          };
        });
      }
    }
  });
  // IS TOUCH?
  window.addEventListener('touchstart', function onFirstTouch() {
    document.body.classList.add('user-is-touching');
    window.removeEventListener('touchstart', onFirstTouch, false)
  }, false)
}

window.onload = AppInit()
