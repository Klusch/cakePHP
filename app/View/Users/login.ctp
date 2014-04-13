<?php
// app/View/Users/login.ctp
$this->start('frameRequest');
echo 'true';
$this->end();

$this->start('topTiles');

//echo $this->Nav->topTilesTest();
echo $this->Tile->special('icon-key', null, 'bg-green');
echo $this->Input->submit();
$destination = array('controller' => 'pages', 'action' => 'display', 'home');
echo $this->Tile->special('icon-cancel-2', $destination, 'bg-darkRed');

$destination = array('controller' => 'OneTimeLogin', 'action' => 'index');
echo $this->Tile->special('icon-comments-2', $destination, 'bg-yellow');
$this->end();
?>

<?php
echo "<h2>" . __('Login') . "</h2>";
echo $this->Input->formDiv('User', $this->User->createLoginFields());
?>
