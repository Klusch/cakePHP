<?php
// -----------------------------------------------------------------------------------
  $this->start('frameRequest');
    echo 'false';
  $this->end(); 
// -----------------------------------------------------------------------------------
?>

<?php
// -----------------------------------------------------------------------------------
  $this->start('topTiles');
    echo $this->Tile->getCategoryItem('pages');
    echo $this->Tile->emptyTilesBar(6);
  $this->end();
// -----------------------------------------------------------------------------------  
?>

<?php
// -----------------------------------------------------------------------------------
  $this->start('sideTiles');
    echo $this->Tile->getCategoryItem();
    
    $parameters = array('tileSize' => null,
		                'color' => 'bg-emerald',
		                'icon' => 'icon-cars',
                        'image' => $this->Html->image('cake.icon.png'),
		                'destination' => array(),
		                'title' => 'Car Entertainment',
		                'text' => 'Car Entertainment'
		               );
    echo $this->Tile->iconTile($parameters);
    
    echo $this->Tile->emptyTilesBar(2);
  $this->end();
// -----------------------------------------------------------------------------------
?>

<div>
<?php
  $parameters = array('tileSize' => null,
		              'color' => 'bg-indigo',
		              'icon' => 'icon-compass-3',
                      'image' => null,
		              'destination' => 'http://www.inrixtraffic.com/',
		              'title' => 'Inrix Navigation',
		              'text' => 'Inrix Navigation'
		             );
  echo $this->Tile->iconTile($parameters);


  $parameters = array('tileSize' => null,
		              'color' => 'bg-indigo',
		              'icon' => 'icon-fire',
                      'image' => null,
		              'destination' => 'http://www.navgear.de/Autoradio-PX-8345-919.shtml',
		              'title' => 'Cooles Produkt',
		              'text' => 'Cooles Produkt'
		             );
  echo $this->Tile->iconTile($parameters);
  echo $this->Tile->emptyTilesBar(4);
?>
</div>

<div style="clear:both"></div>

<div> 
<?php
  $parameters = array( 'tileSize' => null,
		               'color' => 'bg-brown',
		               'icon' => 'icon-cart',
                       'image' => null,
		               'destination' => 'http://de.eachbuyer.com/car-obd-c15387/',
		               'title' => 'OBD-Stuff',
		               'text' => 'OBD-Stuff'
		              );
  echo $this->Tile->iconTile($parameters);
  
  echo $this->Tile->emptyTilesBar(5);
?>
</div>

<div style="clear:both"></div>

<div> 
<?php
  echo $this->Tile->emptyTilesBar(6);
?>
</div>

<div style="clear:both"></div>

<div> 
<?php
  echo $this->Tile->emptyTilesBar(6);
?>
</div>