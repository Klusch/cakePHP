<?php
$this->start('frameRequest');
   echo 'false';
$this->end(); 
?>

<?php
$this->start('topTiles');
    echo $this->Tile->getCategoryItem('pages');
    echo $this->Tile->emptyTile();
    echo $this->Tile->emptyTilesBar(5);
$this->end();
?>

<?php
$this->start('sideTiles');
//    echo $this->Tile->getCategoryItem();
//    echo $this->Tile->specialTile('icon-plus-2', null, 'bg-grayLighter', null);
    echo $this->Tile->emptyTilesBar(4);
$this->end(); 
?> 

<div>
<?php
echo $this->Tile->emptyTilesBar(6);
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