<?php
$this->start('frameRequest');
   echo 'false';
$this->end(); 
?>

<?php
$this->start('topTiles');
    echo $this->Tile->getCategoryItem('pages');
//    $destination = array('controller' => 'costs', 'action' => 'charts');
//    echo $this->Tile->specialTile('icon-chart-alt', $destination, 'bg-yellow', null);
    echo $this->Tile->emptyTilesBar(6);
$this->end();
?>

<?php
$this->start('sideTiles');
    echo $this->Tile->getCategoryItem();
    echo $this->Tile->emptyTilesBar(3);
$this->end(); 
?>

<div>
<div class="tile double bg-emerald">
  <a href='projects/schrittmotor'>
  <div class="tile-content image">
     <img src="img/">
  </div>
  </a>
</div>
<?php
echo $this->Tile->emptyTilesBar(4);
?>
</div>
<div style="clear:both"></div>
<div> 
<?php
echo $this->Tile->emptyTilesBar(6);
?></div>
<div style="clear:both"></div>
<div> 
<?php
echo $this->Tile->emptyTilesBar(6);
?></div>
<div style="clear:both"></div>
<div> 
<?php
echo $this->Tile->emptyTilesBar(6);
?></div>