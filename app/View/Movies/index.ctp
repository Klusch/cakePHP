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
    echo $this->Tile->getCategoryItem();
    echo $this->Tile->specialTile('icon-plus-2', null, 'bg-grayLighter', null);
    echo $this->Tile->emptyTilesBar(4);
$this->end(); 
?> 

<div class="tile double">
  <div class="tile-content image">
     <img src="img/Eiskoenigin/3.jpg">
  </div>
</div>

<div class="tile double">
  <div class="tile-content image">
     <img src="img/Eiskoenigin/2.jpg">
  </div>
</div>

<div class="tile double">
  <div class="tile-content image">
     <img src="img/Eiskoenigin/1.jpg">
  </div>
</div>