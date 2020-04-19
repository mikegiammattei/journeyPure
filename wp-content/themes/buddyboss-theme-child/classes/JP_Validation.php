<?php

/**
 * FileName: JP_Validation.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 2/26/2020
 */

class JP_Validation
{
    private $input;
    private $strLength;
    private $errors = array();

    public function __construct()
    {

    }
    public function setInput($input){
        $this->strLength = strlen($input);
        $this->input = $input;
    }
    public function isMinimum($limit,$error_msg){
        if($this->strLength > $limit){
            $this->errors[] = $error_msg;
        }
    }
    public function isEmpty($errorMsg){
        if(empty($this->input)){
            $this->errors[] = $errorMsg;
        }
    }

    public function deleteErrors()
    {
        $this->errors = array();
    }
    public function getErrors(){
        return $this->errors;
    }

}