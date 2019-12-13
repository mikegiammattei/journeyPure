"use strict";

$(document).ready(function () {
  aboutUsBioSlider();

  function aboutUsBioSlider() {
    var PAGE_ID = '#about-us';
    var SLIDER = PAGE_ID + ' #about-bio-slider';
    var PREV_BTN = PAGE_ID + " .bio-section .see-less-btn";
    var NEXT_BTN = PAGE_ID + " .bio-section .see-more-btn";
    var slidesLeft;

    if (SLIDER.length > 0) {
      setTimeout(function () {
        $(SLIDER).on('init', function (event, slick) {
          var OriginalSlideTOShow;

          if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
            OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
          } else {
            OriginalSlideTOShow = slick.originalSettings.slidesToShow;
          }

          slidesLeft = slick.slideCount - OriginalSlideTOShow;
          $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft);
        });
        $(SLIDER).slick({
          dots: false,
          centerMode: false,
          arrows: true,
          infinite: false,
          adaptiveHeight: true,
          autoplay: false,
          prevArrow: $(PREV_BTN),
          nextArrow: $(NEXT_BTN),
          responsive: [{
            breakpoint: 1200,
            settings: {
              slidesToShow: 2
            }
          }, {
            breakpoint: 767,
            settings: {
              slidesToShow: 1
            }
          }]
        }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
          if (nextSlide > 0 && event.target.id === 'about-bio-slider') {
            // Handle slides remaining to show
            var direction;

            if (Math.abs(nextSlide - currentSlide) === 1) {
              direction = nextSlide - currentSlide > 0 ? "right" : "left";
            } else {
              direction = nextSlide - currentSlide > 0 ? "left" : "right";
            }

            if (direction === 'right') {
              if (slidesLeft !== 0) {
                slidesLeft--;
              }
            } else {
              slidesLeft++;
            }

            $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft);
            console.log(event.target.id); // Toggle Prev Button

            if (nextSlide > 0 && event.target.id) {
              $(PREV_BTN).addClass('has-more');
            } else {
              $(PREV_BTN).removeClass('has-more');
            }
          }
        });
      }, 600);
    }
  }

  fireEachAboutBioMentionSlide();

  function fireEachAboutBioMentionSlide() {
    if ($('#about-us .bio-new-mentions').length > 0) {
      $('#about-us .bio-new-mentions').each(function () {
        var thisSide = $(this);
        aboutUsMentions(thisSide.attr('id'));
      });
    }
  }

  function aboutUsMentions(slideID) {
    var PAGE_ID = '#about-us';
    var SLIDER = PAGE_ID + ' #' + slideID;
    var PREV_BTN = $(SLIDER).parent().find('.see-less-mentions');
    var NEXT_BTN = $(SLIDER).parent().find('.see-more-mentions');
    var slidesLeft;

    if (SLIDER.length > 0) {
      setTimeout(function () {
        $(SLIDER).on('init', function (event, slick) {
          var OriginalSlideTOShow;

          if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
            OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
          } else {
            OriginalSlideTOShow = slick.originalSettings.slidesToShow;
          }

          slidesLeft = slick.slideCount - OriginalSlideTOShow;
          NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft);
        });
        $(SLIDER).slick({
          dots: false,
          centerMode: false,
          arrows: true,
          infinite: false,
          adaptiveHeight: true,
          autoplay: false,
          vertical: true,
          verticalSwiping: true,
          prevArrow: PREV_BTN,
          nextArrow: NEXT_BTN,
          responsive: [{
            breakpoint: 12,
            settings: {
              slidesToShow: 3
            }
          }]
        }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
          // Handle slides remaining to show
          var direction;

          if (Math.abs(nextSlide - currentSlide) === 1) {
            direction = nextSlide - currentSlide > 0 ? "right" : "left";
          } else {
            direction = nextSlide - currentSlide > 0 ? "left" : "right";
          }

          if (direction === 'right') {
            if (slidesLeft !== 0) {
              slidesLeft--;
            }
          } else {
            slidesLeft++;
          }

          NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft); // Toggle Prev Button

          if (nextSlide > 0) {
            PREV_BTN.addClass('has-more');
          } else {
            PREV_BTN.removeClass('has-more');
          }
        });
      }, 600);
    }
  }

  aboutUsMediaSlider('media-con');

  function aboutUsMediaSlider(slideID) {
    var PAGE_ID = '#about-us';
    var SLIDER = PAGE_ID + ' #' + slideID;
    var PREV_BTN = $(SLIDER).parent().find('.see-less-mentions');
    var NEXT_BTN = $(SLIDER).parent().find('.see-more-mentions');
    var slidesLeft;

    if (SLIDER.length > 0) {
      setTimeout(function () {
        $(SLIDER).on('init', function (event, slick) {
          var OriginalSlideTOShow;

          if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
            OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
          } else {
            OriginalSlideTOShow = slick.originalSettings.slidesToShow;
          }

          slidesLeft = slick.slideCount - OriginalSlideTOShow;
          NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft);
        });
        $(SLIDER).slick({
          dots: false,
          centerMode: false,
          arrows: true,
          infinite: false,
          adaptiveHeight: true,
          autoplay: false,
          prevArrow: PREV_BTN,
          nextArrow: NEXT_BTN,
          responsive: [{
            breakpoint: 767,
            settings: {
              slidesToShow: 3
            }
          }]
        }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
          // Handle slides remaining to show
          var direction;

          if (Math.abs(nextSlide - currentSlide) === 1) {
            direction = nextSlide - currentSlide > 0 ? "right" : "left";
          } else {
            direction = nextSlide - currentSlide > 0 ? "left" : "right";
          }

          if (direction === 'right') {
            if (slidesLeft !== 0) {
              slidesLeft--;
            }
          } else {
            slidesLeft++;
          }

          NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft); // Toggle Prev Button

          if (nextSlide > 0) {
            PREV_BTN.addClass('has-more');
          } else {
            PREV_BTN.removeClass('has-more');
          }
        });
      }, 600);
    }
  }
});
"use strict";

function topFunction() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}

$('[data-toggle="tooltip"]').tooltip();
"use strict";
"use strict";

$(document).ready(function () {
  $("#chat-ctm-btn").on('click', function () {
    $('.ctm-chat-widget').fadeToggle(400);
    $('.callout').fadeToggle(400);
    $('#icon-chat').trigger('click');
  });
});
"use strict";

checkInsurance();

function userQuestionClientFormCaptchaCallback() {
  $('.bad-captcha').removeClass('invalid');
}

function checkInsurance() {
  if ($('[data-user-form="check-insurance"]').length > 0) {
    var totalRequiredPart1 = function totalRequiredPart1(thisForm) {
      var returnValue = 0;
      returnValue = thisForm.find('.part-one .form-control:invalid').length;
      returnValue += thisForm.find('.part-one .custom-control-input:invalid').length;
      return returnValue;
    };

    var addRequiredToInputs = function addRequiredToInputs(thisForm, treatmentForState) {
      if (treatmentForState === 'self') {
        thisForm.find('.part-two .self input').each(function () {
          $(this).prop('required', true);
        });
      } else if ('loved_on') {
        thisForm.find('.part-two .loved-one input').each(function () {
          $(this).prop('required', true);
        });
      }
    };

    var formatOutput = function formatOutput(thisForm, treatmentForState) {
      var output = "";

      if (treatmentForState === 'self') {
        output += "Visitor's Info <br>";
        output += "-------------------------------- <br>";
        output += "<strong>Name: </strong>" + thisForm.find('#ins-name').val() + "<br>";
        output += "<strong>Phone: </strong>" + thisForm.find('#ins-phone').val() + "<br>"; //output += "<strong>Email: </strong>" + thisForm.find('#ins-email').val() + "<br>";

        output += "<strong>Treatment For:</strong>  Self<br>";
        output += "<strong>Birthday: </strong> " + thisForm.find('#ins-selfBirthday').val() + "<br>";
        output += "<strong>Insurance Company:</strong> " + thisForm.find('#ins-insuranceName').val() + "<br>";
        output += "<strong>Insurance ID:</strong> " + thisForm.find('#ins-yourInsuranceId').val() + "<br>";
        ;
        output += "<strong>Policy Holder Name:</strong> " + thisForm.find('#ins-policyHolderName').val() + "<br>";
        output += "-------------------------------- <br>";

        __ctm.form.track('app.calltrackingmetrics.com', // the capture host
        'FRT472ABB2C5B9B141A95E7A133293232FB808526BF6B6AB4DD086108422F536032', // this FormReactor
        '8448999541', {
          country_code: "1",
          // the expected country code e.g. +1, +44, +55, +61, etc... the plus is excluded
          name: thisForm.find('#ins-name').val(),
          phone: thisForm.find('#ins-phone').val(),
          email: "pass the lead email address here (optional)",
          custom: {
            "treatment_for": "Self",
            "user_b_day": thisForm.find('#ins-selfBirthday').val(),
            "insurance_company_name": thisForm.find('#ins-insuranceName').val(),
            "insurance_id": thisForm.find('#ins-yourInsuranceId').val(),
            "policy_holder_name": thisForm.find('#ins-policyHolderName').val()
          }
        });
      } else if ('loved_on') {
        output += "Visitor's Info <br>";
        output += "-------------------------------- <br>";
        output += "<strong>Name:</strong> " + thisForm.find('#ins-name').val() + "<br>";
        output += "<strong>Phone:</strong> " + thisForm.find('#ins-name').val() + "<br>"; //output += "<strong>Email:</strong> " + thisForm.find('#ins-email').val() + "<br>";

        output += "<strong>Treatment For: Loved One</strong> <br>";
        output += "-------------------------------- <br><br>";
        output += "Loved One's Info <br>";
        output += "-------------------------------- <br>";
        output += "<strong>Name: </strong>" + thisForm.find('#ins-lovedOneName').val() + "<br>";
        output += "<strong>Birthday: </strong>" + thisForm.find('#ins-lovedOnesBirthday').val() + "<br>";
        output += "<strong>Insurance Company:</strong>" + thisForm.find('#ins-lovedOneInsurance').val() + "<br>";
        output += "<strong>Insurance ID:</strong>" + thisForm.find('#ins-lovedOneInsuranceId').val() + "<br>";
        output += "<strong>Policy Holder Name:</strong>" + thisForm.find('#ins-lovedOnePolicyName').val() + "<br>";
        output += "-------------------------------- <br>";

        __ctm.form.track('app.calltrackingmetrics.com', // the capture host
        'FRT472ABB2C5B9B141A95E7A133293232FBE48796C1A711F71C48458D5D158AF9D0', // this FormReactor
        '8448999541', {
          country_code: "1",
          // the expected country code e.g. +1, +44, +55, +61, etc... the plus is excluded
          name: thisForm.find('#ins-name').val(),
          phone: thisForm.find('#ins-phone').val(),
          email: "pass the lead email address here (optional)",
          custom: {
            "treatment_for": "Loved One",
            "loved_one_name": thisForm.find('#ins-lovedOneName').val(),
            "loved_one_b_day": thisForm.find('#ins-lovedOnesBirthday').val(),
            "loved_one_insurance_company": thisForm.find('#ins-lovedOneInsurance').val(),
            "loved_one_insurance_id": thisForm.find('#ins-lovedOneInsuranceId').val(),
            "loved_one_policy_holder": thisForm.find('#ins-lovedOnePolicyName').val()
          }
        });
      }

      return output;
    };

    var formState = 1;
    var formEl = $('[data-user-form="check-insurance"]');
    $(formEl).find('.alert').css({
      "display": "none"
    });
    formEl.on('click', function () {
      if ($(formEl).find('.alert').length > 0 && $(formEl).find('.alert').hasClass('up')) {
        $(formEl).find('.alert').slideUp(500).removeClass('up');
      }
    });
    formEl.on('submit', function (event) {
      event.preventDefault();
      event.stopPropagation();
      var thisForm = $(this); // Run validation

      thisForm.addClass('was-validated'); // Process form per form section

      switch (formState) {
        case 1:
          if (totalRequiredPart1(thisForm) === 0) {
            // The treatment for radio value
            var treatmentFor = thisForm.find('[name="ins-treatment-for"]:checked').val();
            addRequiredToInputs(thisForm, treatmentFor);
            thisForm.find('.step.two').addClass('on'); // Update the form state for part 2

            formState = 2; // Reset Validation to move to next form part with no errors.

            thisForm.removeClass('was-validated');
            thisForm.find('.part-one').slideUp(400);
            thisForm.find('.part-two').slideDown(400); // Toggle the form either a version for self or for loved one;

            if (treatmentFor === 'self') {
              thisForm.find('.part-two .self').css({
                'display': 'block'
              });
            } else {
              thisForm.find('.part-two .loved-one').css({
                'display': 'block'
              });
            }

            thisForm.find('[type="submit"]').text("Submit");
          }

          break;

        case 2:
          // Execute Validation
          if (thisForm[0].checkValidity() !== false) {
            // Validation was good check captcha

            /*let response = grecaptcha.getResponse();
            if(response.length === 0){
            	thisForm.find('.bad-captcha').addClass('invalid');
            }else {*/
            thisForm.find('.bad-captcha').removeClass('invalid');
            var formData = {
              content: formatOutput(thisForm, thisForm.find('[name="ins-treatment-for"]:checked').val())
            };

            if (thisForm.find('[name="names"]').val() === "") {
              $.post('/wp-admin/admin-ajax.php', {
                'action': 'insurance_form_action_hok',
                data: formData
              }, function (response) {
                if (response === "Success") {
                  thisForm.find('.part-two').slideUp(400);
                  thisForm[0].reset();
                  thisForm.removeClass('was-validated');
                  thisForm.find('.alert').slideDown(500).addClass('up');
                  thisForm.find('[type="submit"]').fadeOut(400);
                }
              });
            } else {
              alert("Don't try to hack us");
            }
            /*$.ajax({
            	method: "POST",
            	url: jp_rest_details.rest_url + 'wp/v2/forms-api',
            	data: {
            		title: jp_rest_details.current_date + ' - Submission',
            		content: formatOutput(thisForm, thisForm.find('[name="ins-treatment-for"]:checked').val()),
            		type: 'post',
            		status: 'publish',
            	},
            	dataType: 'html',
            	beforeSend: function ( xhr ) {
            		xhr.setRequestHeader( 'X-WP-Nonce', jp_rest_details.nonce );
            	},
            	success : function( response ) {
            		let newPostID = response.id;
            			thisForm.find('.part-two').slideUp(400);
            		thisForm[0].reset();
            		thisForm.removeClass('was-validated');
            		thisForm.find('.alert').slideDown(500).addClass('up');
            			grecaptcha.reset();
            		// Save the page ID in case you need it for something
            			thisForm.find('[type="submit"]').fadeOut(400);
            		}
            });*/

          }
          /*}*/


          break;
      }
    });
  }
}
"use strict";

cta_widget();

function cta_widget() {
  var parentClass = '.cta-widget';
  var cta = {
    el: $(parentClass),
    close: $(parentClass).find('.close-btn'),
    info: $(parentClass).find('.info'),
    callout: $(parentClass).find('.callout'),
    open: $(parentClass).find('.callout')
  }; // Update callout width

  setTimeout(function () {//cta.callout.css({'width' : cta.el.outerWidth() + 'px'});
  }, 500);
  $(window).on('resize', function () {
    cta.callout.css({
      'width': cta.el.outerWidth() + 'px',
      'left': '-2px'
    });
  });
  var startHtml = cta.callout.html();
  var afterHtml = '<i class="fas fa-comments"></i>';
  cta.el.on('click', '.close-btn', function () {
    var lowerAmount;

    if ($('.local-msg').length > 0) {
      lowerAmount = cta.el.outerHeight() + cta.el.find('.local-msg').outerHeight();
    } else {
      lowerAmount = cta.el.outerHeight();
    }

    cta.callout.fadeOut(function () {//cta.callout.html(afterHtml);
    }).addClass('on');
  });
  cta.open.on('click', 'i', function () {
    if (cta.el.hasClass('on')) {
      cta.el.animate({
        'bottom': '0px'
      }, 400, function () {
        cta.callout.html(startHtml);
      }).removeClass('on');
    }
  });
}
"use strict";

if (!Cookies.get('exitModal')) {
  Cookies.set('exitModal', 'enabled', {
    expires: 14
  });
}

$(window).on('resize', function () {
  if (Cookies.get('exitModal') === 'enabled' && $(window).width() > 600) {
    mg_center_el('.jp-exit-modal', '.jp-exit-modal .inner');
  }

  if (Cookies.get('exitModal') === 'enabled' && $(window).width() < 600) {
    /** Remove exit modal */
    $('.exit-overlay').remove();
    $('.jp-exit-modal').hide();
  }
}); // Show the insurance exit modal if the user has left the site and has not filled out the form in the past 30 days.

setTimeout(function () {
  $("html").bind("mouseleave", function () {
    if (Cookies.get('exitModal') === 'enabled' && $(window).width() > 600) {
      mg_center_el('.jp-exit-modal', '.jp-exit-modal .inner');
      $("html").unbind("mouseleave");
    }
  });
}, 9 * 1000);

function mg_center_el(outerDiv, innerDiv) {
  var outerBox = outerDiv;
  var innerBox = innerDiv;
  var startHeight = startHeight;
  var overflowEl = '.exit-overlay';
  var win = $(window);
  var heightVariance = win.outerHeight() - $(outerBox).outerHeight();
  var marginValue = heightVariance / 2;
  var fullHeight = Math.floor($(outerBox).outerHeight() + 30);
  /** Create the overlay */

  if ($('.exit-overlay').length === 0 && $('.jp-exit-modal').length > 0) {
    $('body').prepend('<div class="exit-overlay"></div>');
  }
  /** Show the exit modal*/


  $(overflowEl).fadeIn(300, function () {
    $(outerBox).fadeIn(100);
  });

  if (win.outerHeight() >= $(outerBox).outerHeight()) {
    /** Set the top position of the element. */
    $(outerBox).css({
      'top': Math.floor(marginValue) + 'px'
    });
  } else {
    $(outerBox).css({
      'position': 'absolute',
      'top': '15px'
    });
    $('.Content').css({
      'height': fullHeight + 'px'
    });
  } // Click to close.


  $('[data-exit-item="close"]').add(overflowEl).on('click', function () {
    var $thisClose = $(this);
    $(overflowEl).add(outerBox).fadeOut(500);
    $('.Content').removeAttr('style');
    /** Disable the exit modal from showing up for 30 days. */

    Cookies.set('exitModal', 'disabled', {
      expires: 30
    });
  });
}
"use strict";

(function ($) {
  $.fn.flexgal = function () {
    $('body').prepend('<div id="fullimage" style="display: none"></div>');
    $(this).addClass('flex-gallery');
    $('img', this).parent().addClass('image-rate');
    /*$('.image-rate').click(function() {
    	//$('img', this).clone().prependTo('#fullimage');
    	//$( "#fullimage" ).fadeIn("slow");
    });
    	$('#fullimage').click(function() {
    	$(this).fadeOut( "slow", function() {
    		$('img',this).remove();
    	});
    });*/
  };
})(jQuery);
"use strict";

$(".phone-format").keypress(function (e) {
  if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    return false;
  }

  var curchr = this.value.length;
  var curval = $(this).val();

  if (curchr == 3 && curval.indexOf("(") <= -1) {
    $(this).val("(" + curval + ")" + "-");
  } else if (curchr == 4 && curval.indexOf("(") > -1) {
    $(this).val(curval + ")-");
  } else if (curchr == 5 && curval.indexOf(")") > -1) {
    $(this).val(curval + "-");
  } else if (curchr == 9) {
    $(this).val(curval + "-");
    $(this).attr('maxlength', '14');
  }
});
"use strict";

if ($('#homepage').length > 0) {
  var homepageReviewSlide = function homepageReviewSlide(pageId) {
    console.log(pageId);
    var PAGE_ID = pageId;
    var SLIDER = PAGE_ID + ' .review-slide';
    var PREV_BTN = PAGE_ID + " .review-slide-container .see-less-btn";
    var NEXT_BTN = PAGE_ID + " .review-slide-container .see-more-btn";
    var slidesLeft;

    if ($(SLIDER).length > 0) {
      setTimeout(function () {
        $(SLIDER).on('init', function (event, slick) {
          var OriginalSlideTOShow;

          if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
            OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
          } else {
            OriginalSlideTOShow = slick.originalSettings.slidesToShow;
          }

          slidesLeft = slick.slideCount - OriginalSlideTOShow;
          $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft);
        });
        $(SLIDER).slick({
          dots: false,
          centerMode: false,
          arrows: true,
          infinite: false,
          adaptiveHeight: true,
          autoplay: false,
          prevArrow: $(PREV_BTN),
          nextArrow: $(NEXT_BTN),
          responsive: [{
            breakpoint: 768,
            settings: {
              slidesToShow: 1
            }
          }]
        }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
          // Handle slides remaining to show
          var direction;

          if (Math.abs(nextSlide - currentSlide) === 1) {
            direction = nextSlide - currentSlide > 0 ? "right" : "left";
          } else {
            direction = nextSlide - currentSlide > 0 ? "left" : "right";
          }

          if (direction === 'right') {
            if (slidesLeft !== 0) {
              slidesLeft--;
            }
          } else {
            slidesLeft++;
          }

          $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft); // Toggle Prev Button

          if (nextSlide > 0) {
            $(PREV_BTN).addClass('has-more');
          } else {
            $(PREV_BTN).removeClass('has-more');
          }
        });
      }, 600);
    }
  };

  $(document).ready(function () {
    setTimeout(function () {
      homepageReviewSlide('#homepage');
    }, 1000);
  });
}
"use strict";

function init() {
  var vidDefer = document.getElementsByTagName('iframe');

  for (var i = 0; i < vidDefer.length; i++) {
    if (vidDefer[i].getAttribute('data-src')) {
      vidDefer[i].setAttribute('src', vidDefer[i].getAttribute('data-src'));
    }
  }
}

if ($('iframe').length > 0) {
  window.onload = init;
}
"use strict";

$(document).ready(function () {
  jp_likes();
});

function jp_likes() {
  var likeSelector = '[data-like-object]';

  if ($(likeSelector).length > 0) {
    $(likeSelector).on('click', function () {
      var thisLike = $(this);
      var likeIdentifier = thisLike.data('like-object');
      var currentCountEl = thisLike.find('data');
      var currentCount = currentCountEl.val();
      $.post('/wp-admin/admin-ajax.php', {
        'action': 'like_action_hok',
        data: likeIdentifier
      }, function (response) {
        if (response) {
          /** Increment Likes */
          currentCount++;
          currentCountEl.val(currentCount).text(" " + currentCount);
          thisLike.tooltip('hide').attr('data-original-title', 'Liked!').tooltip('update').tooltip('show');
        }
      });
    });
  }
}
"use strict";

mobileNav();

function mobileNav() {
  var nav = 'header nav';

  if ($(nav).length > 0) {
    var doneResizing = function doneResizing() {
      if ($(window).width() > 992) {
        if ($(_nav.header).hasClass('mobile-nav-on')) {
          $(_nav.header).removeClass('mobile-nav-on');
          $(_nav.mainWrapper).stop().removeClass('on');
          $(_nav.container).removeAttr('style');
        }
      }
    };

    var $nav = $(_nav);
    var _nav = {
      btn: 'header .mobile-trigger',
      header: 'header',
      container: 'header .nav-col-parent',
      mainWrapper: '.main-wrapper'
    };
    $(_nav.btn).on('click', function () {
      $(_nav.header).toggleClass('mobile-nav-on');
      $(_nav.container).stop().slideToggle(500);
      $(_nav.mainWrapper).stop().toggleClass('on');
    });
    $(_nav.mainWrapper).on('click', function () {
      if ($(_nav.header).hasClass('mobile-nav-on')) {
        $(_nav.header).removeClass('mobile-nav-on');
        $(_nav.container).stop().slideUp(500);
        $(_nav.mainWrapper).stop().removeClass('on');
      }
    });
    var resizeId;
    $(window).resize(function () {
      clearTimeout(resizeId);
      resizeId = setTimeout(doneResizing, 500);
    });
  }
}
"use strict";

var pageId = '#outpatient';

if ($(pageId).length > 0) {
  var outpatientReviewSlide = function outpatientReviewSlide() {
    var PAGE_ID = pageId;
    var SLIDER = PAGE_ID + ' .review-slide';
    var PREV_BTN = PAGE_ID + " .review-slide-container .see-less-btn";
    var NEXT_BTN = PAGE_ID + " .review-slide-container .see-more-btn";
    var slidesLeft;

    if (SLIDER.length > 0) {
      setTimeout(function () {
        $(SLIDER).on('init', function (event, slick) {
          var OriginalSlideTOShow;

          if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
            OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
          } else {
            OriginalSlideTOShow = slick.originalSettings.slidesToShow;
          }

          slidesLeft = slick.slideCount - OriginalSlideTOShow;
          $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft);
        });
        $(SLIDER).slick({
          dots: false,
          centerMode: false,
          arrows: true,
          infinite: false,
          adaptiveHeight: true,
          autoplay: false,
          prevArrow: $(PREV_BTN),
          nextArrow: $(NEXT_BTN),
          responsive: [{
            breakpoint: 768,
            settings: {
              slidesToShow: 1
            }
          }]
        }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
          // Handle slides remaining to show
          var direction;

          if (Math.abs(nextSlide - currentSlide) === 1) {
            direction = nextSlide - currentSlide > 0 ? "right" : "left";
          } else {
            direction = nextSlide - currentSlide > 0 ? "left" : "right";
          }

          if (direction === 'right') {
            if (slidesLeft !== 0) {
              slidesLeft--;
            }
          } else {
            slidesLeft++;
          }

          $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft); // Toggle Prev Button

          if (nextSlide > 0) {
            $(PREV_BTN).addClass('has-more');
          } else {
            $(PREV_BTN).removeClass('has-more');
          }
        });
      }, 600);
    }
  };

  $(document).ready(function () {
    setTimeout(function () {
      outpatientReviewSlide();
    }, 1000);
  });
}
"use strict";

$(document).ready(function () {
  function slickImageGallery() {
    if ($('#single-location .image-gallery').length > 0) {
      setTimeout(function () {
        $('#single-location .image-gallery').slick({
          slidesToScroll: 1,
          dots: false,
          centerMode: false,
          arrows: false,
          infinite: false,
          adaptiveHeight: true,
          //speed: 300,
          autoplay: false //autoplaySpeed: 2000,

        });
      }, 2000);
    }
  }
});
$(document).ready(function () {
  rehabLocationBioSlider();

  function rehabLocationBioSlider() {
    var PAGE_ID = '#single-location';
    var SLIDER = PAGE_ID + ' .bio-slider';
    var PREV_BTN = PAGE_ID + " .bio-section .see-less-btn";
    var NEXT_BTN = PAGE_ID + " .bio-section .see-more-btn";
    var slidesLeft;

    if (SLIDER.length > 0) {
      setTimeout(function () {
        $(SLIDER).on('init', function (event, slick) {
          var OriginalSlideTOShow;

          if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
            OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
          } else {
            OriginalSlideTOShow = slick.originalSettings.slidesToShow;
          }

          slidesLeft = slick.slideCount - OriginalSlideTOShow;
          $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft);
        });
        $(SLIDER).slick({
          dots: false,
          centerMode: false,
          arrows: true,
          infinite: false,
          adaptiveHeight: true,
          autoplay: false,
          prevArrow: $(PREV_BTN),
          nextArrow: $(NEXT_BTN),
          responsive: [{
            breakpoint: 768,
            settings: {
              slidesToShow: 2
            }
          }]
        }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
          // Handle slides remaining to show
          var direction;

          if (Math.abs(nextSlide - currentSlide) === 1) {
            direction = nextSlide - currentSlide > 0 ? "right" : "left";
          } else {
            direction = nextSlide - currentSlide > 0 ? "left" : "right";
          }

          if (direction === 'right') {
            if (slidesLeft !== 0) {
              slidesLeft--;
            }
          } else {
            slidesLeft++;
          }

          $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft); // Toggle Prev Button

          if (nextSlide > 0) {
            $(PREV_BTN).addClass('has-more');
          } else {
            $(PREV_BTN).removeClass('has-more');
          }
        });
      }, 600);
    }
  }

  rehabLocationReviewSlide();

  function rehabLocationReviewSlide() {
    var PAGE_ID = '#single-location';
    var SLIDER = PAGE_ID + ' .review-slide';
    var PREV_BTN = PAGE_ID + " .review-slide-container .see-less-btn";
    var NEXT_BTN = PAGE_ID + " .review-slide-container .see-more-btn";
    var slidesLeft;

    if (SLIDER.length > 0) {
      setTimeout(function () {
        $(SLIDER).on('init', function (event, slick) {
          var OriginalSlideTOShow;

          if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
            OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
          } else {
            OriginalSlideTOShow = slick.originalSettings.slidesToShow;
          }

          slidesLeft = slick.slideCount - OriginalSlideTOShow;
          $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft);
        });
        $(SLIDER).slick({
          dots: false,
          centerMode: false,
          arrows: true,
          infinite: false,
          adaptiveHeight: true,
          autoplay: false,
          prevArrow: $(PREV_BTN),
          nextArrow: $(NEXT_BTN),
          responsive: [{
            breakpoint: 768,
            settings: {
              slidesToShow: 1
            }
          }]
        }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
          // Handle slides remaining to show
          var direction;

          if (Math.abs(nextSlide - currentSlide) === 1) {
            direction = nextSlide - currentSlide > 0 ? "right" : "left";
          } else {
            direction = nextSlide - currentSlide > 0 ? "left" : "right";
          }

          if (direction === 'right') {
            if (slidesLeft !== 0) {
              slidesLeft--;
            }
          } else {
            slidesLeft++;
          }

          $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft); // Toggle Prev Button

          if (nextSlide > 0) {
            $(PREV_BTN).addClass('has-more');
          } else {
            $(PREV_BTN).removeClass('has-more');
          }
        });
      }, 600);
    }
  }
});
$(document).ready(function () {
  if ($('.image-gallery').length > 0) {
    setTimeout(function () {
      $('.image-gallery').flexgal();
    }, 400);
  }
});
"use strict";

reviewPage();

function reviewPage() {
  var pageId = '#reviews-page';

  if ($(pageId).length > 0) {
    var reviewPageSlide = function reviewPageSlide(slideId) {
      var PAGE_ID = pageId;
      var SLIDER = PAGE_ID + ' #' + slideId;
      var PREV_BTN = $(SLIDER).parent().find('.see-less-btn');
      var NEXT_BTN = $(SLIDER).parent().find('.see-more-btn');
      var slidesLeft;

      if (SLIDER.length > 0) {
        setTimeout(function () {
          $(SLIDER).on('init', function (event, slick) {
            var OriginalSlideTOShow;

            if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
              OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
            } else {
              OriginalSlideTOShow = slick.originalSettings.slidesToShow;
            }

            slidesLeft = slick.slideCount - OriginalSlideTOShow;
            $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft);
          });
          $(SLIDER).slick({
            dots: false,
            centerMode: false,
            arrows: true,
            lazyLoad: "ondemand",
            infinite: false,
            adaptiveHeight: true,
            autoplay: false,
            prevArrow: PREV_BTN,
            nextArrow: NEXT_BTN,
            slidesToShow: 1,
            responsive: [{
              breakpoint: 768,
              settings: {
                slidesToShow: 1
              }
            }]
          }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            // Handle slides remaining to show
            var direction;

            if (Math.abs(nextSlide - currentSlide) === 1) {
              direction = nextSlide - currentSlide > 0 ? "right" : "left";
            } else {
              direction = nextSlide - currentSlide > 0 ? "left" : "right";
            }

            if (direction === 'right') {
              if (slidesLeft !== 0) {
                slidesLeft--;
              }
            } else {
              slidesLeft++;
            }

            NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft); // Toggle Prev Button

            if (nextSlide > 0) {
              PREV_BTN.addClass('has-more');
            } else {
              PREV_BTN.removeClass('has-more');
            }
          });
        }, 600);
      }
    };

    var reviewVideoSlide = function reviewVideoSlide() {
      var PAGE_ID = pageId;
      var SLIDER = PAGE_ID + ' .video-preview-slider';
      var PREV_BTN = $(SLIDER).parent().find('.see-less-btn');
      var NEXT_BTN = $(SLIDER).parent().find('.see-more-btn');
      var slidesLeft;

      if (SLIDER.length > 0) {
        setTimeout(function () {
          $(SLIDER).on('init', function (event, slick) {
            var OriginalSlideTOShow;

            if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
              OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
            } else {
              OriginalSlideTOShow = slick.originalSettings.slidesToShow;
            }

            slidesLeft = slick.slideCount - OriginalSlideTOShow;
            $(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft);
          });
          $(SLIDER).slick({
            dots: false,
            centerMode: false,
            arrows: true,
            infinite: false,
            adaptiveHeight: true,
            autoplay: false,
            prevArrow: PREV_BTN,
            nextArrow: NEXT_BTN,
            responsive: [{
              breakpoint: 768,
              settings: {
                slidesToShow: 1
              }
            }, {
              breakpoint: 1200,
              settings: {
                slidesToShow: 2
              }
            }]
          }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            // Handle slides remaining to show
            var direction;

            if (Math.abs(nextSlide - currentSlide) === 1) {
              direction = nextSlide - currentSlide > 0 ? "right" : "left";
            } else {
              direction = nextSlide - currentSlide > 0 ? "left" : "right";
            }

            if (direction === 'right') {
              if (slidesLeft !== 0) {
                slidesLeft--;
              }
            } else {
              slidesLeft++;
            }

            NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft); // Toggle Prev Button

            if (nextSlide > 0) {
              PREV_BTN.addClass('has-more');
            } else {
              PREV_BTN.removeClass('has-more');
            }
          });
        }, 600);
      }
    };

    $(pageId).find(".review-slider").each(function () {
      var thisSlider = $(this);
      var slideId = thisSlider.attr("id");
      reviewPageSlide(slideId);
    });
    reviewVideoSlide();

    if ($('[data-video-status]').length > 0) {
      $('body').on('click', '[data-video-status],#first-video-play-btn', function () {
        var $this = $(this);
        var thisVideoId = $this.data('video-id');
        var thisVideoStatus = $this.data('video-status');
        var key = 'AIzaSyDwoQ63Mff3mW9-u2fQUhnlMBmX752RKds';

        if ($this.attr('class') === 'content-container') {
          document.getElementById('feature-video-container').scrollIntoView(true);
        }

        if ($this.hasClass('first-video')) {
          $this.removeClass('first-video');
          loadVideo($this);
        } else if (thisVideoStatus === 'idle') {
          loadVideo($this);
          $('.img-box-reviews').removeClass('on');
          $this.find('.img-box-reviews').addClass('on');
        }

        if ($('#first-video-play-btn').length > 0) {
          $('#first-video-play-btn').remove();
        }

        function loadVideo($this) {
          $('#iframeHolder').attr('src', "https://www.youtube.com/embed/" + thisVideoId + "?rel=0&showinfo=0&autoplay=1").animate({
            'opacity': '1'
          }, 500);
          $.get('https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics&id=' + thisVideoId + '&key=' + key, {
            dataType: 'html'
          }, function (data) {
            $('#video-title').text(data.items[0].snippet.title);
            $('#video-description').html(data.items[0].snippet.description.replace(/\n/g, "<br>"));
          });
        }
      });
    }
  }
}
"use strict";

userQuestionClientForm();

function userQuestionClientFormCaptchaCallback() {
  $('.bad-captcha').removeClass('invalid');
}

function userQuestionClientForm() {
  if ($('[data-user-form="ask question"]').length > 0) {
    var formEl = $('[data-user-form="ask question"]');
    $(formEl).find('.alert').css({
      "display": "none"
    });
    formEl.on('click', function () {
      if ($(formEl).find('.alert').length > 0 && $(formEl).find('.alert').hasClass('up')) {
        $(formEl).find('.alert').slideUp(500).removeClass('up');
      }
    });
    formEl.on('submit', function (event) {
      event.preventDefault();
      event.stopPropagation();
      var thisForm = $(this); // Execute Validation

      if (thisForm[0].checkValidity() !== false) {
        // Validation was good check captcha
        var response = grecaptcha.getResponse();

        if (response.length === 0) {
          thisForm.find('.bad-captcha').addClass('invalid');
        } else {
          thisForm.find('.bad-captcha').removeClass('invalid');
          $.ajax({
            method: "POST",
            url: jp_rest_details.rest_url + 'wp/v2/user-question-api',
            data: {
              title: jp_rest_details.current_date + ' - Question',
              content: thisForm.find('#question').val(),
              type: 'post',
              status: 'publish'
            },
            dataType: 'json',
            beforeSend: function beforeSend(xhr) {
              xhr.setRequestHeader('X-WP-Nonce', jp_rest_details.nonce);
            },
            success: function success(response) {
              var newPostID = response.id;
              thisForm[0].reset();
              thisForm.removeClass('was-validated');
              $(formEl).find('.alert').slideDown(500).addClass('up');
              grecaptcha.reset(); // Save the page ID in case you need it for something
            }
          });
        }
      } else {}

      thisForm.addClass('was-validated');
    });
  }
}
"use strict";

writeAReview();

function userReviewClientFormCaptchaCallback() {
  $('[data-user-form="leave-a-review"] .bad-captcha').removeClass('invalid');
}

function writeAReview() {
  if ($('[data-user-form="leave-a-review"]').length > 0) {
    var formatOutput = function formatOutput(thisForm) {
      var output = ""; //output += "<img src=" + document.location.origin  +  "'/wp-content/themes/journeyPure/assets/img/logo.png' width='200' height='61'> <br>";

      output += "Review Data <br>";
      output += "-------------------------------- <br>";
      output += "<strong>Name: </strong>" + thisForm.find('#review-name').val() + "<br>";
      output += "<strong>Email: </strong>" + thisForm.find('#review-email').val() + "<br>";
      output += "<strong>Rating: </strong> " + thisForm.find('#review-rating').val() + "<br>";
      output += "<strong>Review:</strong> " + thisForm.find('#review-content').val() + "<br>";
      output += "-------------------------------- <br>";
      return output;
    };

    var formEl = $('[data-user-form="leave-a-review"]');
    $(formEl).find('.alert').css({
      "display": "none"
    });
    formEl.on('click', function () {
      if ($(formEl).find('.alert').length > 0 && $(formEl).find('.alert').hasClass('up')) {
        $(formEl).find('.alert').slideUp(500).removeClass('up');
      }
    });
    formEl.on('submit', function (event) {
      event.preventDefault();
      event.stopPropagation();
      var thisForm = $(this); // Run validation

      thisForm.addClass('was-validated'); // Execute Validation

      if (thisForm[0].checkValidity() !== false) {
        // Validation was good check captcha
        var response = grecaptcha.getResponse();
        $.post('/wp-admin/admin-ajax.php', {
          'action': 'email_action_hok',
          'data': formatOutput(thisForm)
        }, function (response) {
          if (response) {
            thisForm.find('.part-one').slideUp(400);
            thisForm[0].reset();
            thisForm.removeClass('was-validated');
            thisForm.find('.alert').slideDown(500).addClass('up');
            grecaptcha.reset(); // Save the page ID in case you need it for something

            thisForm.find('[type="submit"]').fadeOut(400);
          }
        });
        /*$.ajax({
        	method: "POST",
        	url: jp_rest_details.rest_url + 'wp/v2/user-reviews-api',
        	data: {
        		title: jp_rest_details.current_date + ' - User Review',
        		content: formatOutput(thisForm),
        		type: 'post',
        		status: 'publish',
        	},
        	dataType: 'html',
        	beforeSend: function ( xhr ) {
        		xhr.setRequestHeader( 'X-WP-Nonce', jp_rest_details.nonce );
        	},
        	success : function( response ) {
        		let newPostID = response.id;
        			thisForm.find('.part-one').slideUp(400);
        		thisForm[0].reset();
        		thisForm.removeClass('was-validated');
        		thisForm.find('.alert').slideDown(500).addClass('up');
        			grecaptcha.reset();
        		// Save the page ID in case you need it for something
        			thisForm.find('[type="submit"]').fadeOut(400);
        		}
        });
        */

        /*if(response.length === 0){
        	thisForm.find('.bad-captcha').addClass('invalid');
        }else {
        	thisForm.find('.bad-captcha').removeClass('invalid');
        		//  Had Ajax here after captcha is fixed
        }*/
      }
    });
  }
}