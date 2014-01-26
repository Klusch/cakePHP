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

<?php


?>

<div>
<?php
$colors = $this->Tile->colors;
for ($i=0; $i<6; $i++) {
	echo $this->Tile->emptyTile($colors[$i]);
}
?>
</div>

<?php 
  $this->Power->hilf(6, $colors);
  $this->Power->hilf(12, $colors);
  $this->Power->hilf(18, $colors);
  $this->Power->hilf(24, $colors);
  $this->Power->hilf(30, $colors);
  $this->Power->hilf(36, $colors);
  $this->Power->hilf(42, $colors);

  echo "<div style='clear:both'></div>";
  echo "<div>";
  for ($i=48; $i<53; $i++) {
	  echo $this->Tile->emptyTile($colors[$i]);
  }
  echo "</div>";
?>