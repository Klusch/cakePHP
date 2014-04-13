<?php

App::uses('Component', 'Controller');
App::uses('PropertiesController', 'Controller');
App::uses('BaseData', 'Model');
App::uses('Security', 'Utility');
App::uses('CakeTime', 'Utility');
App::import('Vendor', 'RSA', array('file' => 'PHPSecLib' . DS . 'Crypt' . DS . 'RSA.php'));

class LicenseComponent extends Component {

    public function isLicenseVaild() {
        
        // disabled
        return true;
        
        // Datum überprüfen
        $this->PropertiesController = new PropertiesController();
        $expiryDate = $this->PropertiesController->getValueForProperty('license_expires');
        if (empty($expiryDate)) {
            return false;
        } else {
            if (CakeTime::isPast($expiryDate)) {
                $this->removeAllRights();
                return false;
            }

            if (CakeTime::isToday($expiryDate)) {
                // expires today
            }
        }


        //ToDo: Signatur überprüfen
//        $rsa = new Crypt_RSA();
//        $keys = $rsa->createKey(); // == $rsa->createKey(1024) where 1024 is the key size
//        print_r($keys);
//        $privateKey = $rsa->getPrivateKey();
//        $publicKey = $rsa->getPublicKey();
//
//        echo $publicKey;
//        
//        $plaintext = 'abc';
//        $signature = $rsa->sign($plaintext);
//        
//        echo $rsa->verify($plaintext, $signature) ? 'verified' : 'unverified';

        return true;
    }

    public function addRights($group, $controllers = array()) {
        // Load Model
        $this->BaseData = ClassRegistry::init('BaseData');

        foreach ($controllers as $controller) {
            $this->BaseData->insertACOs($group, $controller);
        }
    }

    public function removeAllRights() {
        // Load Model
        $this->BaseData = ClassRegistry::init('BaseData');
        $this->BaseData->delACOs();
    }    
    
    // Sample for symmetric Cryptography
    private function symmetricCrypto() {
        $key = Security::generateAuthKey('Alex makes Crypto');

        // Encrypt some data.
        $encrypted = Security::rijndael('a secret', $key, 'encrypt');  //Configure::read('Security.key')
        echo $encrypted . "<br>";

        // Later decrypt it.
        $decrypted = Security::rijndael($encrypted, $key, 'decrypt');

        echo $decrypted . "<br>";
    }

}

?>