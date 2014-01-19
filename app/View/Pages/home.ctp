<?php
$this->start('frameRequest');
   echo 'false';
$this->end(); 
?>

<?php
$this->start('topTiles');
    echo $this->Tile->getCategoryItem();
    echo $this->Tile->getCategoryItem('userlogin');
//    $destination = array('controller' => 'costs', 'action' => 'charts');
//    echo $this->Tile->specialTile('icon-chart-alt', $destination, 'bg-yellow', null);
    echo $this->Tile->emptyTilesBar(5);
$this->end();
?>

<?php
$this->start('sideTiles');
    echo $this->Tile->emptyTilesBar(4);
$this->end(); 
?>


<div>
<?php
echo $this->Tile->getCategoryItem('costs');
echo $this->Tile->getCategoryItem('movies');
echo $this->Tile->emptyTilesBar(4);
?>
</div>
<div style="clear:both"></div>
<div> 
<?php
echo $this->Tile->emptyTile();
echo $this->Tile->getCategoryItem('joomlas');
echo $this->Tile->getCategoryItem('banks');
echo $this->Tile->emptyTilesBar(3);
?></div>
<div style="clear:both"></div>
<div> 
<?php
echo $this->Tile->emptyTilesBar(2);
echo $this->Tile->getCategoryItem('powers');
echo $this->Tile->getCategoryItem('projects');
echo $this->Tile->emptyTilesBar(2);
?></div>
<div style="clear:both"></div>
<div> 
<?php
echo $this->Tile->emptyTilesBar(6);
?></div>