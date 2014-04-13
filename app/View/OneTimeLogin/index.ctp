<?php
  // app/View/Users/login.ctp
$this->start('frameRequest');
   echo 'true';
$this->end();  

$this->start('topTiles');

   //echo $this->Nav->topTilesTest();
   echo $this->Tile->special('icon-comments-2', null, 'bg-yellow');
   echo $this->Input->submit();
   $destination = array('controller' => 'Users', 'action' => 'login');
  echo $this->Tile->special('icon-key', $destination, 'bg-green', __('Login'));
$this->end();
?>

<?php

  echo $this->Input->formDiv('OneTimeLogin', $this->OneTimeLogin->createInputFields());

?>

<?php echo $this->JSSubmit->enter('OneTimeLoginForm'); ?>