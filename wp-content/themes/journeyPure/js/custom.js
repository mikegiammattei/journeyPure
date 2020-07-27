"use strict";

function topFunction() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}

jQuery('[data-toggle="tooltip"]').tooltip();
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
      var aboutBioSlider = function aboutBioSlider() {
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
      };

      // Process slider if desktop or mobile
      var status = "desktop";

      if ($(window).width() > 767) {
        aboutBioSlider();
      }

      var resizeTimer;
      $(window).on('resize', function (e) {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
          if ($(window).width() > 767) {
            aboutBioSlider();
          } else {
            fireEachAboutBioMentionSlide();
            $(SLIDER).slick('unslick');
          }
        }, 250);
      });
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
"use strict";

callBackInput();

function callBackInput() {
  var EL_CLASS = '.call-back-input';
  var FORM = EL_CLASS + ' form';
  $(FORM).on('submit', function (e) {
    e.preventDefault();
    var form = {
      phone: $(this).find('[data-type="phone"]')
    };

    if (isValid(form.phone.val())) {
      form.phone.popover({
        content: "Set data endpoint",
        placement: "top",
        template: '<div class="popover success fade bs-popover-top show" role="tooltip" x-placement="top"><div class="arrow" style="left: 42px;"></div><div class="popover-body"></div></div>'
      }).popover('show'); //let popoverId = form.phone.attr('aria-describedby');

      form.phone.on('click', function () {
        form.phone.popover('dispose');
      });
    } else if (!isValid(form.phone.val())) {
      form.phone.popover({
        content: "Invalid Phone",
        placement: "top",
        template: '<div class="popover error fade bs-popover-top show" role="tooltip" x-placement="top"><div class="arrow" style="left: 42px;"></div><div class="popover-body">Invalid Phone</div></div>'
      }).popover('show'); //let popoverId = form.phone.attr('aria-describedby');

      form.phone.on('click', function () {
        form.phone.popover('dispose');
      });
    }
  });

  function isValid($value) {
    var valueDigitsOnly = $value.replace(/\D/g, '');

    if (valueDigitsOnly.length === 10) {
      return true;
    } else {
      return false;
    }
  }
}
"use strict";

$(document).ready(function () {
  if (!/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
    $("#chat-ctm-btn").on('click', function () {//$('.ctm-chat-widget').fadeToggle(400);
      //$('.callout').fadeToggle(400);
      //$('#icon-chat').trigger('click');
    });
  }
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
  // CTM implementation code block
  var ctm_frame = jQuery("iframe[src*='https://130400.tctm.co/form/FRT472ABB2C5B9B141A95E7A133293232FBB3EFEC59E103154BC3C3A194C8DE5FD3.html']").get(0);
  jQuery(ctm_frame).on('load', function () {
    ctm_frame.contentWindow.postMessage(window.JSON.stringify({
      action: 'showForm'
    }), ctm_frame.src);
  });
  var parentClass = '.cta-widget';
  var cta = {
    el: jQuery(parentClass),
    close: jQuery(parentClass).find('.close-btn'),
    info: jQuery(parentClass).find('.info'),
    callout: jQuery(parentClass).find('.callout'),
    open: jQuery(parentClass).find('.callout')
  }; // Update callout width

  setTimeout(function () {//cta.callout.css({'width' : cta.el.outerWidth() + 'px'});
  }, 500);
  jQuery(window).on('resize', function () {
    cta.callout.css({
      'width': cta.el.outerWidth() + 'px',
      'left': '-2px'
    });
  });
  var startHtml = cta.callout.html();
  var afterHtml = '<i class="fas fa-comments"></i>';
  jQuery('html').on('click', '.close-btn', function () {
    var lowerAmount;

    if (jQuery('.local-msg').length > 0) {
      lowerAmount = cta.el.outerHeight() + cta.el.find('.local-msg').outerHeight();
    } else {
      lowerAmount = cta.el.outerHeight();
    }

    jQuery('.callout').fadeOut(function () {//cta.callout.html(afterHtml);
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

// Frontman integration
jQuery(document).ready(function () {
  // Add hidden button HTML to the body
  var html = '<a class="mr-btn-wrapper-jp-text hide" href="tel:1-844-505-4799"><div class="mr-btn-wrapper-jp-text-top">Get Help Now!</div><div class="mr-btn-wrapper-jp-text-bottom"><i class="fas fa-phone-alt"></i><span class="call"> Call</span> (844) 505-4799</div></a>';

  if (!jQuery('body').hasClass('page-template-template-virtual-rehab')) {
    jQuery('body').append(html);
  } // IE


  if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.userAgent.indexOf('Trident') !== -1) {
    jQuery('.mr-btn-wrapper-jp-text').addClass('msie');
  } // Only when the chat widget is ready/loaded
  // window.addEventListener('message', function(e) {
  // 	if ('signal' === e.data.type) {
  // Show the button HTML as soon the external API sends a "signal" message to the window


  jQuery('.mr-btn-wrapper-jp-text').removeClass('hide'); // 	}
  // });
  // On button click on desktop, shows the chat modal

  jQuery(document).on('click', '.mr-btn-wrapper-jp-text', function (e) {
    if (window.innerWidth >= 768) {
      e.preventDefault();

      if (jQuery('.mr-btn-wrapper').length > 0) {
        jQuery('.mr-btn-wrapper').trigger('click');
      }
    }
  }); // Only when the chat widget is ready/loaded
  // window.addEventListener('message', function(e) {
  // 	if ('signal' === e.data.type) {
  // Not IE

  if (navigator.userAgent.indexOf('MSIE') === -1 && navigator.userAgent.indexOf('Trident') === -1) {
    // Make all the Insurances CTA open the new chat instead
    jQuery('[data-toggle="modal"][data-target="#main-insurance-form"]').each(function () {
      jQuery(this).removeAttr('data-toggle').removeAttr('data-target').addClass('frontman-cta-insurance');
    });
  } // On CTA click, shows the chat modal with the Insurance tab open


  jQuery(document).on('click', '.frontman-cta-insurance', function (e) {
    e.preventDefault();
    document.location.hash = '#Insurance';
    var customButton = jQuery('.mr-btn-wrapper');

    if (customButton.length > 0) {
      customButton.trigger('click');
    }

    var chatIframe = jQuery('#makerobos_chat');

    if (chatIframe.length > 0) {
      chatIframe.attr('src', chatIframe.attr('src'));
    }
  }); // 	}
  // });
});
"use strict";

$(document).ready(function () {
  setTimeout(function () {
    $.getScript("//130400.tctm.co/t.js"); // ---

    (function (w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKJHBM9'); // ---


    $(".ctm-call-widget").each(function () {
      $(this).attr('src', $(this).data('url-value'));
    });
  }, 2000); // CTA Trigger

  var CTA_STATE = false;
  $(document).on('click', '.bottom-cta .drop', function () {
    if (!CTA_STATE) {
      $('.ctm-call-widget-container').append('<iframe class="ctm-call-widget" src="https://app.calltrackingmetrics.com/form_reactors/FRT472ABB2C5B9B141A95E7A133293232FB64726C81D4381AEFF2617EDD86B68F50" style="width:100%;height:300px;border:none"></iframe>');
      CTA_STATE = true;
    }
  }); // ---

  $(document).on('click', '.youtube-video-place', function () {
    var thisVidUrl = $(this);
    console.log('test', thisVidUrl);
    thisVidUrl.html('<iframe allowfullscreen allow="autoplay; encrypted-media" frameborder="0" class="embed-responsive-item" src="' + thisVidUrl.data('yt-url') + '?rel=0&showinfo=0&autoplay=1&cc_load_policy=1"></iframe>');
    thisVidUrl.addClass('playing');
  }); // ---

  $(document).on('click', '.video-cta', function () {
    var thisTrigger = $(this);
    var thisVideContainerId = thisTrigger.data('target');
    $(thisVideContainerId).find('.youtube-video-place').trigger('click');
  }); // If there is an image inside a slick slider, on image load, resize the slider height

  jQuery('img.lazy').each(function () {
    this.onload = function () {
      var slider = jQuery(this).closest('.slick-slider.slick-initialized');

      if (slider.length > 0) {
        slider.slick('setPosition');
      }
    };
  });
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
        }); // On slider image loads, resize the slider

        $(SLIDER).find('img').each(function () {
          var img = this;

          if (img.complete) {
            $(SLIDER).slick('setPosition');
          } else {
            img.addEventListener('load', function () {
              $(SLIDER).slick('setPosition');
            });
          }
        });
      }, 600);
    }
  }; // script for tab steps


  $(document).ready(function () {
    setTimeout(function () {
      homepageReviewSlide('#homepage');
    }, 1000);
  });
  $('.process-model a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var href = $(e.target).attr('href');
    var $curr = $(".process-model a[href='" + href + "']").parent();
    $('.process-model li').removeClass();
    $curr.addClass("active");
    $curr.prevAll().addClass("visited");
  }); // end  script for tab steps
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
"use strict";

$(document).ready(function () {
  jp_likes();
});

function jp_likes() {
  jQuery(document).on('click', '[data-like-object]', function () {
    var thisLike = $(this);
    var likeIdentifier = thisLike.data('like-object');
    var currentCountEl = thisLike.find('data');
    var currentCount = currentCountEl.val();
    $.post('/wp-admin/admin-ajax.php', {
      'action': 'like_action_hok',
      'data': likeIdentifier
    }, function (response) {
      if (response) {
        currentCount++;
        currentCountEl.val(currentCount).text(" " + currentCount);
        thisLike.tooltip('hide').attr('data-original-title', 'Liked!').tooltip('update').tooltip('show');
      }
    });
  });
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

$(document).ready(function () {
  if ($(window).width() < 767) {
    $('#chat-ctm-btn').on('click', function () {
      location.href = 'sms:+18445054799';
    });
  }
});
"use strict";

/**
 * OP CTP
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */
// OP CTP template
if ($('#jp-op').length > 0) {
  // Section Bios
  var slider = $('.bio-slider');
  var prev_btn = $('.bio-section .see-less-btn');
  var next_btn = $('.bio-section .see-more-btn');
  var slides_left;

  if (slider.length > 0) {
    setTimeout(function () {
      $(slider).on('init', function (event, slick) {
        var original_slide_to_show;

        if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
          original_slide_to_show = slick.originalSettings.responsive[0].settings.slidesToShow;
        } else {
          original_slide_to_show = slick.originalSettings.slidesToShow;
        }

        slides_left = slick.slideCount - original_slide_to_show;
        next_btn.find('data').val(slides_left).text(slides_left);
      });
      $(slider).slick({
        dots: false,
        centerMode: false,
        arrows: true,
        infinite: false,
        adaptiveHeight: true,
        autoplay: false,
        prevArrow: prev_btn,
        nextArrow: next_btn,
        responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        }]
      }).on('beforeChange', function (event, slick, current_slide, next_slide) {
        // Handle slides remaining to show
        var direction;

        if (Math.abs(next_slide - current_slide) === 1) {
          direction = next_slide - current_slide > 0 ? 'right' : 'left';
        } else {
          direction = next_slide - current_slide > 0 ? 'left' : 'right';
        }

        if (direction === 'right') {
          if (slides_left !== 0) {
            slides_left--;
          }
        } else {
          slides_left++;
        }

        next_btn.find('data').val(slides_left).text(slides_left); // Toggle Prev Button

        if (next_slide > 0) {
          prev_btn.addClass('has-more');
        } else {
          prev_btn.removeClass('has-more');
        }
      });
    }, 600);
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
  pressPageBioSlider();

  function pressPageBioSlider() {
    var PAGE_ID = '#press-page';
    var SLIDER = PAGE_ID + ' #press-bio-slider';
    var PREV_BTN = PAGE_ID + " .bio-section .see-less-btn";
    var NEXT_BTN = PAGE_ID + " .bio-section .see-more-btn";
    var slidesLeft;

    if (SLIDER.length > 0) {
      var pressSlider = function pressSlider() {
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
            if (nextSlide > 0 && event.target.id === 'press-bio-slider') {
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
      };

      // Process slider if desktop or mobile
      var status = "desktop";

      if ($(window).width() > 767) {
        pressSlider();
      }

      var resizeTimer;
      $(window).on('resize', function (e) {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
          if ($(window).width() > 767) {
            pressSlider();
          } else {
            fireEachPressBioMentionSlide();
            $(SLIDER).slick('unslick');
          }
        }, 250);
      });
    }
  }

  fireEachPressBioMentionSlide();

  function fireEachPressBioMentionSlide() {
    if ($('#press-page .bio-new-mentions').length > 0) {
      $('#press-page .bio-new-mentions').each(function () {
        var thisSide = $(this);
        pressPageMentions(thisSide.attr('id'));
      });
    }
  }

  function pressPageMentions(slideID) {
    var PAGE_ID = '#press-page';
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
    var PAGE_ID = '#press-page';
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

/*
$(document).ready(function () {
	if($('#single-location .image-gallery').length > 0){
		setTimeout(function () {
			$('#single-location .image-gallery').slick({
				slidesToScroll: 1,
				dots: false,
				centerMode: false,
				arrows: false,
				infinite: false,
				adaptiveHeight: true,
				//speed: 300,
				autoplay: false,
				//autoplaySpeed: 2000,
				responsive: [
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 1,
						}
					}
				],

			});
		}, 2000);
	}

});
*/
$(document).ready(function () {
  setTimeout(function () {
    $('.image-gallery').flexgal();
  }, 400);
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

  if ($('#single-location .process-model').length > 0) {
    // script for tab steps
    $('.process-model a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      var href = $(e.target).attr('href');
      var $curr = $(".process-model a[href='" + href + "']").parent();
      $('.process-model li').removeClass();
      $curr.addClass("active");
      $curr.prevAll().addClass("visited");
    }); // end  script for tab steps
  }
});
"use strict";

jQuery(document).ready(function () {
  // Videos section
  // On square thumbnail click, replace/play the video on the placeholder
  jQuery(document).on('click', '.jp-reviews-videos-video-image-wrapper', function () {
    var _this = jQuery(this);

    var youtubeId = _this.data('youtube-video-id');

    var image = _this.data('image');

    var placeholder = '.jp-reviews-videos-featured .embed-responsive';
    var html = '<div class="embed-responsive embed-responsive-16by9 youtube-video-place" style="background-image: url(\'' + image + '\')" data-yt-url="https://www.youtube.com/embed/' + youtubeId + '"><span class="play-button"></span></div>';
    jQuery(placeholder).replaceWith(html);
    setTimeout(function () {
      jQuery(placeholder).trigger('click');
    }, 500);
  }); // Videos section
  // Slider

  var slider = jQuery('.jp-reviews-videos-video-slider');
  slider.each(function () {
    var _this = jQuery(this);

    var prevButton = _this.parent().find('.see-less-btn');

    var nextButton = _this.parent().find('.see-more-btn');

    var slidesLeft;

    _this.on('init', function (event, slick) {
      slidesLeft = slick.slideCount - slick.originalSettings.slidesToShow;
      nextButton.find('data').val(slidesLeft).text(slidesLeft);
    });

    _this.slick({
      dots: false,
      centerMode: false,
      arrows: true,
      infinite: false,
      adaptiveHeight: true,
      autoplay: false,
      prevArrow: prevButton,
      nextArrow: nextButton,
      slidesToShow: 1
    }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
      var direction;

      if (Math.abs(nextSlide - currentSlide) === 1) {
        direction = nextSlide - currentSlide > 0 ? 'right' : 'left';
      } else {
        direction = nextSlide - currentSlide > 0 ? 'left' : 'right';
      }

      if (direction === 'right') {
        if (slidesLeft !== 0) {
          slidesLeft--;
        }
      } else {
        slidesLeft++;
      }

      nextButton.find('data').val(slidesLeft).text(slidesLeft); // Toggle Prev Button

      if (nextSlide > 0) {
        prevButton.addClass('has-more');
      } else {
        prevButton.removeClass('has-more');
      }
    });
  }); // Reviews section
  // Read more

  jQuery(document).on('click', '.jp-reviews-reviews-review-text-more', function () {
    var _this = jQuery(this);

    var shortText = _this.closest('.jp-reviews-reviews-review-text');

    var longText = shortText.next('.jp-reviews-reviews-review-text');
    shortText.addClass('hide');
    longText.removeClass('hide');
  }); // Reviews section
  // Load more items

  jQuery(document).on('click', '.jp-reviews-reviews-loading-button', function () {
    window.reviewsLoadItems(false);
  });
  jQuery(document).on('change', '.jp-reviews-reviews-filter #sort', function () {
    window.reviewsLoadItems(true);
  });
  jQuery('.jp-reviews-reviews-reviews').on('scroll', function () {
    // Only desktop
    if (jQuery(window).width() >= 1024) {
      var _this = jQuery(this);

      if (_this.scrollTop() + _this.innerHeight() >= this.scrollHeight) {
        window.reviewsLoadItems(false);
      }
    }
  });

  window.reviewsLoadItems = function (reset) {
    var box = jQuery('.jp-reviews-reviews-box');
    var placeholder = jQuery('.jp-reviews-reviews-reviews-inner');
    box.addClass('loading');
    var page = parseInt(box.data('page')) + 1;
    var sort = jQuery('#sort').val();
    var url = box.data('url');
    var nonce = box.data('nonce');
    var documentScroll = jQuery(document).scrollTop();
    var placeholderScroll = placeholder.parent().scrollTop();

    if (reset) {
      page = 1;
      placeholderScroll = 0;
    }

    jQuery.post(url, {
      'action': 'get_reviews',
      'nonce': nonce,
      'page': page,
      'sort': sort
    }, function (html) {
      if (html != '') {
        // Insert HTML
        if (reset) {
          placeholder.html(html);
        } else {
          placeholder.append(html);
        } // Fix scroll


        jQuery(document).scrollTop(documentScroll);
        placeholder.parent().scrollTop(placeholderScroll); // Trigger lazy load images (W3 Total Cache)

        if (typeof window.w3tc_lazyload !== 'undefined') {
          window.w3tc_lazyload.update();
        } // Trigger tooltips (Bootstrap)


        placeholder.find('[data-toggle="tooltip"]').tooltip(); // Update data

        box.data('page', page);
      } else {
        box.removeClass('done');
      }
    }).always(function () {
      box.removeClass('loading');
    });
  };
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
        var key = jp_rest_details.google_API_key;

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

/**
 * Template Virtual Rehab
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */
// Template Virtual Rehab
if ($('#jp-vr').length > 0) {
  // Section Bios
  var slider = $('.bio-slider');
  var prev_btn = $('.bio-section .see-less-btn');
  var next_btn = $('.bio-section .see-more-btn');
  var slides_left;

  if (slider.length > 0) {
    setTimeout(function () {
      $(slider).on('init', function (event, slick) {
        var original_slide_to_show;

        if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
          original_slide_to_show = slick.originalSettings.responsive[0].settings.slidesToShow;
        } else {
          original_slide_to_show = slick.originalSettings.slidesToShow;
        }

        slides_left = slick.slideCount - original_slide_to_show;
        next_btn.find('data').val(slides_left).text(slides_left);
      });
      $(slider).slick({
        dots: false,
        centerMode: false,
        arrows: true,
        infinite: false,
        adaptiveHeight: true,
        autoplay: false,
        prevArrow: prev_btn,
        nextArrow: next_btn,
        responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        }]
      }).on('beforeChange', function (event, slick, current_slide, next_slide) {
        // Handle slides remaining to show
        var direction;

        if (Math.abs(next_slide - current_slide) === 1) {
          direction = next_slide - current_slide > 0 ? 'right' : 'left';
        } else {
          direction = next_slide - current_slide > 0 ? 'left' : 'right';
        }

        if (direction === 'right') {
          if (slides_left !== 0) {
            slides_left--;
          }
        } else {
          slides_left++;
        }

        next_btn.find('data').val(slides_left).text(slides_left); // Toggle Prev Button

        if (next_slide > 0) {
          prev_btn.addClass('has-more');
        } else {
          prev_btn.removeClass('has-more');
        }
      });
    }, 600);
  }
}
"use strict";

jQuery(document).ready(function () {
  if (jQuery('[data-target="#user-question-form-container"]').length > 0 || jQuery('#chat-ctm-btn').length > 0) {
    if (jQuery(window).outerWidth() > 767) {
      jQuery('[data-target="#user-question-form-container"]').add('#chat-ctm-btn').css({
        'cursor ': 'pointer'
      }).attr('disabled', 'disabled').attr('data-placement', 'top').attr('data-html', 'true').attr('data-trigger', 'click').attr('title', 'Text <span>(855) 952-0303</span> on your mobile phone to chat with us now.').tooltip('update');
    } // Disable Chat


    jQuery('#user-question-form-container').remove();
  }

  if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
    jQuery('[data-target="#user-question-form-container"]').on('click', function () {
      location.href = 'sms:+18445054799';
    });
  } else {
    userQuestionClientForm();
  }
});

function userQuestionClientFormCaptchaCallback() {
  jQuery('.bad-captcha').removeClass('invalid');
}

function userQuestionClientForm() {
  if (jQuery('[data-user-form="ask question"]').length > 0) {
    var formEl = jQuery('[data-user-form="ask question"]');
    jQuery(formEl).find('.alert').css({
      "display": "none"
    });
    formEl.on('click', function () {
      if (jQuery(formEl).find('.alert').length > 0 && jQuery(formEl).find('.alert').hasClass('up')) {
        jQuery(formEl).find('.alert').slideUp(500).removeClass('up');
      }
    });
    formEl.on('submit', function (event) {
      event.preventDefault();
      event.stopPropagation();
      var thisForm = jQuery(this); // Execute Validation

      if (thisForm[0].checkValidity() !== false) {
        // Validation was good check captcha
        var response = grecaptcha.getResponse();

        if (response.length === 0) {
          thisForm.find('.bad-captcha').addClass('invalid');
        } else {
          thisForm.find('.bad-captcha').removeClass('invalid');
          jQuery.ajax({
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
              jQuery(formEl).find('.alert').slideDown(500).addClass('up');
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