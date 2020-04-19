$(document).ready(function () {
    askYourQuestion();
});

function askYourQuestion() {
    let errors = [];

    if($('.f-ask-your-question').length > 0){
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
        $(obj.seeDetailsBtn + ' [data-action-type]').on('click', function (e) {
            const $this = $(this);
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
                $(obj.questionDetailsBox).stop().slideDown();
            }else{
                $(obj.questionDetailsBox).stop().slideUp();
                obj.error = false;
            }

        });

        keyUpValidation(obj.question,obj.questionErrorBox,'question');
        keyUpValidation(obj.questionDetails,obj.detailsErrorBox,'details');
        function keyUpValidation(objElement,questionErrorBox,errBoxClass){
            $(objElement).on('keyup', function () {



                let questionValue = $(this).val();
                let limit;

                if(errBoxClass === "question"){
                    limit = 150;
                }else if(errBoxClass === "details"){
                    limit = 300
                }
                if(questionValue.length > limit){
                    let errorHtml = "<ul class='error-live-set "+errBoxClass+"'>";
                    if($('.error-live-set.' + errBoxClass).length < 1){
                        $(objElement).css({'background-color': "#ffe6ea"});
                        setTimeout(function () {
                            $(objElement).css({'background-color': "white"});
                        },3000);

                        errorHtml += $(objElement).data('error-msg-limiter');

                        errorHtml += "</ul>";
                        $(questionErrorBox).append(errorHtml);
                        $(questionErrorBox).slideDown();
                    }else{
                        $(questionErrorBox).slideDown();
                    }

                    obj.error = true;
                }else {
                    if($('.error-live-set.' + errBoxClass).length > 0){
                        $(objElement).css({'background-color': "white"});
                        $('.error-live-set.' + errBoxClass).remove();
                    }
                    $(questionErrorBox).slideUp();
                    obj.error = false;
                }

            });
        }
      
        //Process submit
        $(formClass).on('submit', function (e) {
            e.preventDefault();

            const question = $(obj.question).val();

            if(!obj.error){
                $.ajax({
                    url: ajaxurl,
                    data: {
                        'action': 'ask_question_ajax_call',
                        'question': question,
                        'textareaMaxErrMsgData': $(formClass + ' textarea.question').data('error-msg-limiter'),
                        'detailsMaxErrMsgData': $(formClass + ' textarea.details').data('error-msg-limiter'),
                        'showDetails' : obj.detailsIsChecked,
                        'details': $(obj.questionDetails).val()
                    },
                    success:function(data) {
                        let returnData = JSON.parse(data);

                        // Remove existing errors
                        if($('.error-live-set.question').length > 0){

                            $('.error-live-set.question').remove();
                        }
                        if($('.error-live-set.details').length > 0){

                            $('.error-live-set.details').remove();
                        }
                        // question error section
                        if(returnData.question.length > 0){
                            let errorHtml = "<ul class='error-live-set question'>";

                            $(obj.question).css({'background-color': "#ffe6ea"});
                            setTimeout(function () {
                                $(obj.question).css({'background-color': "white"});
                            },3000);

                            $.each(returnData.question, function(key, value) {
                                errorHtml += "<li>" + value + "</li>";
                            });

                            errorHtml += "</ul>";
                            $(obj.questionErrorBox).append(errorHtml);
                            $(obj.questionErrorBox).slideDown();
                        }else{
                            $(obj.questionErrorBox).slideUp();
                        }

                        // Details error section
                        if(typeof returnData.showDetails != "undefined"){
                            if(returnData.showDetails.length > 0){
                                let errorHtml = "<ul class='error-live-set details'>";

                                $(obj.questionDetails).css({'background-color': "#ffe6ea"});
                                setTimeout(function () {
                                    $(obj.questionDetails).css({'background-color': "white"});
                                },3000);

                                $.each(returnData.showDetails, function(key, value) {
                                    errorHtml += "<li>" + value + "</li>";
                                });

                                errorHtml += "</ul>";
                                $(obj.detailsErrorBox).append(errorHtml);
                                $(obj.detailsErrorBox).slideDown();
                            }else{
                                $(obj.detailsErrorBox).slideUp();
                            }

                        }

                        if(returnData.success){
                            $(obj.question).val('');
                            $(obj.questionDetails).val('');
                            $(obj.successMsgBox).slideDown();

                            if(!returnData.loggedIn){
                                window.location.href = "/ask-our-doctors/register";
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
