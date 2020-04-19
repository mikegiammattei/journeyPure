<form class="f-ask-your-question">
    <div class="bp-feedback success" style="display: none;">
        <span class="bp-icon" aria-hidden="true"></span>
        <p>Thank you! The doctors usually answer within 72 hours. You’ll get an email. Check back any time.</p>
    </div>
           <textarea
               class="question"
               data-error-msg-limiter="Questions are limited to 150 characters to encourage you to ask in a way that is more generally relevant to the community rather than too specific to one situation."
               placeholder="Hi! Type your addiction, drug, alcohol or mental health question here."
           ></textarea>
    <div class="bp-feedback error question" style="display: none;">
        <span class="bp-icon" aria-hidden="true"></span>
    </div>
    <div class="question-details">
               <textarea
                   class="details mt-3"
                   placeholder="(Optional) Enter additional details here."
                   data-error-msg-limiter="Detail section is limited to 300 characters. You can tell your full story in your profile."
               ></textarea>
        <div class="bp-feedback error details" style="display: none;">
            <span class="bp-icon" aria-hidden="true"></span>
        </div>
    </div>

    <div class="i-action">
        <div class="d-flex mt-3">
            <div class="flex-fill">
                <div class="see-details">
                    <input data-action-type="details-input" type="checkbox"><label data-action-type="details-label"> I want to add more details</label>
                </div>
                
            </div>
            <div class="flex-fill align-self-center">
                <button class="submit-btn btn btn-secondary" type="submit">Ask Our Doctors Now</button>
                <p><i class="fas fa-clock"></i> Last question answered <?php
                    // Get latest post date "ago"
                    $latest_cpt = get_posts("post_type=post&numberposts=1");
                    $latestPostId =  $latest_cpt[0]->ID;
                    $lastmodified = get_the_modified_time('U');
                    $posted = get_the_time('U',$latestPostId);
                    echo human_time_diff($posted,current_time( 'U' )). " ago";
                    ?>
                </p>
            </div>
        </div>
    </div>
</form>