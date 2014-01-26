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
    echo $this->Tile->specialTile('icon-chronometer', null, 'bg-green', null);
    
    $parameters = array('tileSize' => null,
	  	                'color' => 'bg-emerald',
		                'icon' => 'icon-cycle',
                        'image' => null,
		                'destination' => array(),
		                'title' => 'Schrittmotor',
		                'text' => 'Schrittmotor'
		               );
    echo $this->Tile->iconTile($parameters);    
    
    echo $this->Tile->emptyTilesBar(2);
  $this->end();
// -----------------------------------------------------------------------------------
?>


<div>
<?php
  $parameters = array( 'tileSize' => 'double',
		               'color' => 'bg-emerald',
		               'icon' => 'icon-compass-3',
                       'image' => '',
		               'destination' => array(),
		               'title' => 'Kugelumlaufspindel',
		               'text' => 'Kugelumlaufspindel'
		              );
  echo $this->Tile->iconTile($parameters);

  
  
  $parameters = array( 'tileSize' => null,
		               'color' => 'bg-emerald',
		               'icon' => null,
                       'image' => $this->Html->image('Projekte/trapezgewindemutter.jpg'),
		               'destination' => 'http://www.mixware.de/index2.html',
		               'title' => 'Trapezgewindemutter',
		               'text' => 'Trapezgewindemutter'
		              );
  echo $this->Tile->iconTile($parameters);

  echo $this->Tile->emptyTilesBar(3);
?>
</div>

<div style="clear:both"></div>

<div> 
<?php
  $parameters = array( 'tileSize' => 'double',
		               'color' => 'bg-yellow',
		               'icon' => 'icon-compass-3',
                       'image' => null,
		               'destination' => array(),
		               'title' => 'Linearantrieb',
		               'text' => 'Linearantrieb'
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
		               'destination' => 'http://www.befestigungsfuchs.de/Befestigungstechnik/Gewindestangen-DIN-975-976/Trapezgewinde',
		               'title' => 'Trapezgewindestangen',
		               'text' => 'Trapezgewindestangen'
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