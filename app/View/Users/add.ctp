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
   echo $this->Input->submit();
   $destination =  array('controller' => 'companies', 'action' => 'index');
   echo $this->User->companyTileBadge($destination, __('List companies'));             
$this->end();
// ----------------------------------


echo $this->Input->formDiv('User', $this->User->createInputFields($this, $selection));
?>

