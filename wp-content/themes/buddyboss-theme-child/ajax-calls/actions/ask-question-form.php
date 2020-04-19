<?php
if ( isset($_REQUEST) ) {

    require_once(AOD_CLASSES . 'JP_Validation.php');
    $JP_Validation = new JP_Validation();

    $returnArr = array();

    $returnArr['success'] = false;
    $returnArr['loggedIn'] = is_user_logged_in();

    $JP_Validation->setInput($_REQUEST['question']);
    $JP_Validation->deleteErrors();
    $JP_Validation->isMinimum(150,$_REQUEST['textareaMaxErrMsgData']);
    $JP_Validation->isEmpty("You did not enter a question.");
    $returnArr['question'] = $JP_Validation->getErrors();

    if($_REQUEST['showDetails'] == 'true'){
        $JP_Validation->setInput($_REQUEST['details']);
        $JP_Validation->deleteErrors();
        $JP_Validation->isEmpty("You did not enter any details.");
        $JP_Validation->isMinimum(300,$_REQUEST['detailsMaxErrMsgData']);
        $returnArr['showDetails'] = $JP_Validation->getErrors();
    }


    if(empty($JP_Validation->getErrors())){
        // Create post object
        $user_question_post = array(
            'post_title'    => wp_strip_all_tags($_REQUEST['question']),
            'post_content'  => '',
            'post_status'   => 'draft',
            'post_author'   => get_current_user_id()
        );

        // Insert the post into the database
        $new_post_id = wp_insert_post( $user_question_post );

        if($_REQUEST['showDetails'] == 'true'){
            update_field('field_5e64059fbd8e5',wp_strip_all_tags($_REQUEST['details'],false),$new_post_id);
        }
        if($returnArr['loggedIn']){
            $current_user = wp_get_current_user();
            update_field('field_5e6405e3bd8e7',$current_user->user_email,$new_post_id);
        }

        $returnArr['success'] = true;

    }

    echo json_encode($returnArr);


}
// Always die in functions echoing ajax content
die();
?>