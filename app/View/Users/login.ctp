<?php

// app/View/Users/login.ctp
// --------------------------------
$this->start('frameRequest');
   echo 'true';
$this->end();
// --------------------------------

// --------------------------------
$this->start('topTiles');
  echo $this->Category->tile('userlogin');
  echo $this->Category->getCategoryHeadline('userlogin');
$this->end();
// --------------------------------

// ================================
    echo $this->Input->getForm('User', null);
    
    $fields = $this->User->createLoginFields();
    $buttons = $this->User->getLoginButtons();
    $fieldset = $this->Input->getFieldset($fields, $buttons);
    
    echo $fieldset;
    echo $this->Input->closeForm();
?>
