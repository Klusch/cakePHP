<?php
  // app/View/Users/login.ctp
$this->start('frameRequest');
   echo 'true';
$this->end();  

$this->start('topTiles');
   echo $this->Tile->getCategoryItem('userlogin');
   echo $this->Tile->submitTile();
   
   $destination = array('controller' => 'pages', 'action' => 'display', 'home');
   echo $this->Tile->cancelTile($destination);
   
   echo $this->Tile->emptyTilesBar(4);
$this->end();
?>

<?php
echo "<h2>".__('Login')."</h2>";
echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'),
                                       //'align' => 'center'
                                       )
                         );
echo $this->Form->input('User.username', array('label' => __('Username'),
                                               //'align' => 'center'
                                               )
                       );
echo $this->Form->input('User.password', array('label' => __('Password'), 'id' => 'password'));
echo $this->Form->end();
?>

<script>
   (function execute() {
     $( "#submitTileId" ).click(function() {
	$( "#UserLoginForm" ).submit();
     });
   })();
   
   $( "#UserLoginForm" ).keypress(function(e) {
      if (e.keyCode == 13) {
          $( "#UserLoginForm" ).submit();
      }
   });
</script>