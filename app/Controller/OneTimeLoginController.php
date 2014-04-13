<?php

App::uses('AppController', 'Controller');
App::import('Vendor', 'Crypt_Hash', array('file' => 'PHPSecLib' . DS . 'Crypt' . DS . 'Hash.php'));

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class OneTimeLoginController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index() {
        if ($this->request->is('post')) {
            $form = $this->request->data;

            $username = $form['OneTimeLogin']['user_name'];
            if ($this->OneTimeLogin->isAdmin($username) == true) {
                $password = $form['OneTimeLogin']['new_password'];
                if ($this->checkPasswords($form['OneTimeLogin']['otp'], $password, $form['OneTimeLogin']['re_new_password']) == true) {
                    if ($this->OneTimeLogin->changePassword($username, $password) == true) {
                        $this->Session->setFlash(__('Password changed'), 'success');
                    } else {
                        $this->Session->setFlash(__('Password does not satisfy constaints'), 'failure');
                    }
                } else {
                    $this->Session->setFlash(__('Passwords did not match'), 'failure');
                }
            } else {
                $this->Session->setFlash(__('Wrong username, password or userrole'), 'failure');
            }
        }
    }

    private function checkPasswords($otp, $passwd, $rePasswd) {
        // Load Component
        $this->GoogleAuthenticator = $this->Components->load('GoogleAuthenticator');

        $secret = 'PCTOMSCGYWB4NO2V';
        //$code = $this->GoogleAuthenticator->getCode($secret);
        if ($this->GoogleAuthenticator->verifyCode($secret, $otp) == true) {
            if (strcmp($passwd, $rePasswd) == 0) {
                return true;
            }
        }
        return false;
    }

}
