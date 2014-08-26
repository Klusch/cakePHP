<?php
// app/View/Users/add.ctp
// ----------------------------------
$this->start('frameRequest');
   echo 'false';
$this->end();    
// ----------------------------------

// ----------------------------------
$this->start('breadCrumbs');
    $crumbs = array(
                 array('text' => __('Usermanagement'), 'link' => array('controller' => 'users', 'action' => 'index')),
                 array('text' => __('New user'), 'link' => array('action' => '#'))
              );
    echo $this->App->breadcrumbs($crumbs);
$this->end();
// ----------------------------------

// ----------------------------------
$this->start('topTiles');
   echo $this->Category->tile();
   echo $this->Category->getCategoryHeadline('useradd');
$this->end();
// ----------------------------------

// ================================
    echo $this->Input->getForm('User', null);
    
    $fields = $this->User->createInputFields($this, $selection);
    $buttons = $this->App->getSaveAndResetButtons();
    $fieldset = $this->Input->getFieldset($fields, $buttons);
    
    echo $fieldset;
    echo $this->Input->closeForm();
?>

