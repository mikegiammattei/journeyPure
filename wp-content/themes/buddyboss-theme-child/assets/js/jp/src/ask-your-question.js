jQuery(document).ready(function () {
    window.jQueryJP = jQuery;
    askYourQuestion();
    activationPage();
});

function askYourQuestion() {
    let errors = [];

    if(jQuery('.f-ask-your-question').length > 0){
        const formClass = '.f-ask-your-question';

        const obj = {
            btn : formClass + ' .submit-btn',
            questionErrorBox : formClass + ' .error.question',
            detailsErrorBox : formClass + ' .error.details',
            successMsgBox : formClass + ' .success',
            question : formClass + ' textarea.question',
            questionDetails : formClass + ' textarea.details',
            questionDetailsBox : formClass + ' .question-details',
            seeDetailsBtn : formClass + ' .see-details',
            detailsIsChecked: false,
            error : false
        };

        // See more button action  script

        jQuery(obj.seeDetailsBtn + ' [data-action-type]').on('click', function (e) {
            const $this = jQuery(this);
            const $actionType = $this.data('action-type');

            function detailsIsChecked () {
                if($actionType === 'details-label'){
                    e.preventDefault();

                    if($this.parent().find('[type="checkbox"]').is(':checked')){
                        $this.parent().find('[type="checkbox"]').prop('checked', false);
                        return false;
                    }else {
                        $this.parent().find('[type="checkbox"]').prop('checked', true);
                        return true;
                    }
                }else if($actionType === 'details-input'){
                    if($this.parent().find('[type="checkbox"]').is(':checked')){
                        return true
                    }else{
                        return false;
                    }
                }
            }

            obj.detailsIsChecked = detailsIsChecked();

            // Show more if details is checked

            if(obj.detailsIsChecked){
                jQuery(obj.questionDetailsBox).stop().slideDown();
            }else{
                jQuery(obj.questionDetailsBox).stop().slideUp();
                obj.error = false;
            }
        });

        keyUpValidation(obj.question,obj.questionErrorBox,'question');
        keyUpValidation(obj.questionDetails,obj.detailsErrorBox,'details');

        function keyUpValidation(objElement,questionErrorBox,errBoxClass){
            jQuery(objElement).on('keyup', function () {
                let questionValue = jQuery(this).val();
                let limit;

                if(errBoxClass === "question"){
                    limit = 150;
                }else if(errBoxClass === "details"){
                    limit = 300
                }

                if(questionValue.length > limit){
                    let errorHtml = "<ul class='error-live-set "+errBoxClass+"'>";

                    if(jQuery('.error-live-set.' + errBoxClass).length < 1){
                        jQuery(objElement).css({'background-color': "#ffe6ea"});

                        setTimeout(function () {
                            jQuery(objElement).css({'background-color': "white"});
                        },3000);

                        errorHtml += jQuery(objElement).data('error-msg-limiter');
                        errorHtml += "</ul>";

                        jQuery(questionErrorBox).append(errorHtml);
                        jQuery(questionErrorBox).slideDown();
                    }else{
                        jQuery(questionErrorBox).slideDown();
                    }

                    obj.error = true;
                }else {
                    if(jQuery('.error-live-set.' + errBoxClass).length > 0){
                        jQuery(objElement).css({'background-color': "white"});
                        jQuery('.error-live-set.' + errBoxClass).remove();
                    }

                    jQuery(questionErrorBox).slideUp();
                    obj.error = false;
                }
            });
        }

        // Process submit

        jQuery(formClass).on('submit', function (e) {
            e.preventDefault();

            const question = jQuery(obj.question).val();

            if(!obj.error){
                jQuery.ajax({
                    url: ajaxurl,

                    data: {
                        'action': 'ask_question_ajax_call',
                        'question': question,
                        'textareaMaxErrMsgData': jQuery(formClass + ' textarea.question').data('error-msg-limiter'),
                        'detailsMaxErrMsgData': jQuery(formClass + ' textarea.details').data('error-msg-limiter'),
                        'showDetails' : obj.detailsIsChecked,
                        'details': jQuery(obj.questionDetails).val()
                    },

                    success:function(data) {
                        let returnData = JSON.parse(data);

                        // Remove existing errors

                        if(jQuery('.error-live-set.question').length > 0){
                            jQuery('.error-live-set.question').remove();
                        }

                        if(jQuery('.error-live-set.details').length > 0){
                            jQuery('.error-live-set.details').remove();
                        }

                        // Question error section

                        if(returnData.question.length > 0){
                            let errorHtml = "<ul class='error-live-set question'>";

                            jQuery(obj.question).css({'background-color': "#ffe6ea"});

                            setTimeout(function () {
                                jQuery(obj.question).css({'background-color': "white"});
                            },3000);

                            jQuery.each(returnData.question, function(key, value) {
                                errorHtml += "<li>" + value + "</li>";
                            });

                            errorHtml += "</ul>";

                            jQuery(obj.questionErrorBox).append(errorHtml);
                            jQuery(obj.questionErrorBox).slideDown();
                        }else{
                            jQuery(obj.questionErrorBox).slideUp();
                        }

                        // Details error section

                        if(typeof returnData.showDetails != "undefined"){
                            if(returnData.showDetails.length > 0){
                                let errorHtml = "<ul class='error-live-set details'>";

                                jQuery(obj.questionDetails).css({'background-color': "#ffe6ea"});

                                setTimeout(function () {
                                    jQuery(obj.questionDetails).css({'background-color': "white"});
                                },3000);

                                jQuery.each(returnData.showDetails, function(key, value) {
                                    errorHtml += "<li>" + value + "</li>";
                                });

                                errorHtml += "</ul>";
                                jQuery(obj.detailsErrorBox).append(errorHtml);
                                jQuery(obj.detailsErrorBox).slideDown();
                            }else{
                                jQuery(obj.detailsErrorBox).slideUp();
                            }
                        }

                        if(returnData.success){
                            jQuery(obj.question).val('');
                            jQuery(obj.questionDetails).val('');

                            if (!returnData.loggedIn) {
                                // window.location.href = "/ask-our-doctors/register";

                                const html = `
                                    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="bp-feedback error question" style="border-bottom: 1px solid #d33; margin: 0;">
                                                    <span class="bp-icon" aria-hidden="true"></span>
                                                    <div style="padding: 8px 5px;">If you typed a question, it’s saved, but will only submit after you sign up.</div>
                                                </div>
                                                <div class="modal-body" style="margin: 0; padding: 0;">
                                                    <iframe src="/ask-our-doctors/register?modal=1&question=${returnData.postId}" frameborder="0" allowtransparency="true" style="width: 100%; height: 800px;"></iframe>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                `;

                                jQuery('body').append(html);
                                jQueryJP("#register-modal").modal();
                            } else {
                                jQuery(obj.successMsgBox).slideDown();
                            }
                        }
                    },

                    error: function(errorThrown){
                        console.log(errorThrown);
                    }
                });
            }

            return false;
        });
    }
}

function activationPage() {
    if (jQuery('#activation-page-modal').length > 0) {
        jQueryJP('#activation-page-modal').modal('show');
    }
}
