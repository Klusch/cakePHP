<?php

class OneTimeLoginHelper extends AppHelper {
    
    public $helpers = array('Input');

    function createInputFields() {
        $fields = array();
        $fields[] = $this->Input->createTextInputField('user_name', __('Username'));
        $fields[] = $this->Input->createTextInputField('otp', __('One time password'));
        $fields[] = $this->Input->createInputField('new_password', __('New password'), 'password');
        $fields[] = $this->Input->createInputField('re_new_password', __('Retype new password'), 'password');
        return $fields;
    }

}

?>
