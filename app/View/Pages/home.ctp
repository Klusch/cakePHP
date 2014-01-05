<?php
$this->start('frameRequest');
   echo 'false';
$this->end(); 
?>

<?php
$this->start('topTiles');
    echo $this->Tile->getCategoryItem();
    echo $this->Tile->emptyTile();
    $destination = array('controller' => 'costs', 'action' => 'charts');
    echo $this->Tile->specialTile('icon-chart-alt', $destination, 'bg-yellow', null);
    echo $this->Tile->emptyTilesBar(4);
$this->end();
?>

<?php
$this->start('sideTiles');
    echo $this->Tile->specialTile('icon-plus-2', null, 'bg-grayLighter', null);
    echo $this->Tile->emptyTilesBar(4);
$this->end(); 
?>


<div>
<?php 
echo $this->Tile->emptyTilesBar(5);
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
echo $this->Tile->emptyTilesBar(4);
?></div>
<div style="clear:both"></div>
<div> 
<?php
echo $this->Tile->emptyTilesBar(6);
?></div>