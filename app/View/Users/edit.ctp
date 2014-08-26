<?php 
// app/View/Users/edit.ctp
// --------------------------------
// == Breadcrumbs ==
$this->start('breadCrumbs');
    $crumbs = array(
                 array('text' => __('Usermanagement'), 'link' => array('controller' => 'users','action' => 'index')),
                 array('text' => __('User edit'), 'link' => array('action' => '#'))
              );
    echo $this->App->breadcrumbs($crumbs);
$this->end();
// --------------------------------

// --------------------------------
$this->start('frameRequest');
   echo 'false';
$this->end();  
// --------------------------------

// --------------------------------
$this->start('topTiles');

   echo $this->Category->tile();  
   echo $this->Category->getCategoryHeadline('useredit');
   
   if (!(isset($this->params['data']['User']) &&  $this->Session->read('Auth.User.username') == $this->params['data']['User']['username'])) {
       if (count($cleaningGroups) > 0) {
           // User is mapped on clenaning groups
           $id = $this->Form->value('User.id');
           $warning = __('!!! The user is assigned to cleaning groups and will be removed there !!!') . '\n\n';
           $warning .= __('Continue deleting?');
           echo $this->Operation->deleteByAction('delete/' . $id, $warning);
       } else {
           echo $this->Operation->delete($this->Form->value('User.id'));
       }
   };
  	
$this->end();
// --------------------------------

// ================================
    echo $this->Input->getForm('User', null);
    
    $fields = $this->User->createInputFields($this);
    $buttons = $this->App->getSaveAndDeleteButtons(false);
    $fieldset = $this->Input->getFieldset($fields, $buttons);
    
    echo $fieldset;
    echo $this->Input->closeForm();
?>
