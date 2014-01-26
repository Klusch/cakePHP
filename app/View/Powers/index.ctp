<?php
// -----------------------------------------------------------------------------------
// View/Powers/index.ctp
  $this->start('frameRequest');
    echo 'false';
  $this->end();
// -----------------------------------------------------------------------------------   
?>

<?php
// -----------------------------------------------------------------------------------
  $this->start('breadCrumbs');
    $crumbs = array(array('text' => 'a', 'link' => 'b'));
    echo $this->App->breadcrumbs($crumbs);
  $this->end();
// -----------------------------------------------------------------------------------   
?>

<?php
// -----------------------------------------------------------------------------------
  $this->start('topTiles');
    echo $this->Tile->getCategoryItem('pages');
    echo $this->Tile->emptyTile();
    echo $this->Tile->emptyTilesBar(5);
  $this->end();
// -----------------------------------------------------------------------------------  
?>

<?php
// -----------------------------------------------------------------------------------
  $this->start('sideTiles');
//    echo $this->Tile->getCategoryItem();
//    echo $this->Tile->specialTile('icon-plus-2', null, 'bg-grayLighter', null);
    echo $this->Tile->emptyTilesBar(4);    
  $this->end(); 
// -----------------------------------------------------------------------------------
?> 

<div>
<?php
$colors = $this->Tile->colors;
for ($i=0; $i<6; $i++) {
	echo $this->Tile->emptyTile($colors[$i]);
}
?>
</div>

