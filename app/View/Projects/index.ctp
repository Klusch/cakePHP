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
<?php 
$parameters = array( 'tileSize' => 'double',
		             'color' => 'bg-emerald',
		             'icon' => 'icon-cycle',
                     'image' => $this->Html->image('cake.icon.png'),
		             'destination' => array('controller' => 'projects', 'action' => 'schrittmotor'),
		             'title' => 'Schrittmotor',
		             'text' => 'Schrittmotor'
		            );
echo $this->Tile->iconTile($parameters);

echo $this->Tile->emptyTilesBar(4);
?>
</div>
<div style="clear:both"></div>
<div>
<?php 
$parameters = array( 'tileSize' => 'double',
		             'color' => 'bg-emerald',
		             'icon' => 'icon-cars',
                     'image' => $this->Html->image('cake.icon.png'),
		             'destination' => array('controller' => 'projects', 'action' => 'carentertainment'),
		             'title' => 'Car Entertainment',
		             'text' => 'Car Entertainment'
		            );
echo $this->Tile->iconTile($parameters);

echo $this->Tile->emptyTilesBar(4);
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