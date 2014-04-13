<?php 
// app/View/Users/edit.ctp

// == Breadcrumbs ==
$this->start('breadCrumbs');
    $crumbs = array(
                 array('text' => __('Usermanagement'), 'link' => array('controller' => 'users','action' => 'index')),
                 array('text' => __('User edit'), 'link' => array('action' => '#'))
              );
    echo $this->App->breadcrumbs($crumbs);
$this->end();


$this->start('frameRequest');
   echo 'false';
$this->end();  

$this->start('topTiles');

   echo $this->Category->tile();
   echo $this->Operation->add(null, $groupsExtended['Group']['id']);
   
   if (isset($this->params['data']['User']) &&
       $this->Session->read('Auth.User.username') == $this->params['data']['User']['username']) {
       echo $this->Tile->special('icon-minus-2',	array(), 'bg-grayLight');
   } else {
      echo $this->Operation->delete($this->Form->value('User.id'));
   };
  	
   echo $this->Input->submit();
   $destination =  array('controller' => 'companies', 'action' => 'index');
   echo $this->User->companyTileBadge($destination, __('List companies'));

$this->end();

echo $this->Input->formDivWithId('User', $this->User->createInputFields($this));

?>
