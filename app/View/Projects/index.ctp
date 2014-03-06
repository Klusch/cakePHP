<?php
$this->start('frameRequest');
echo 'false';
$this->end();
?>

<?php
$this->start('topTiles');
echo $this->Tile->getCategoryItem();
echo $this->Tile->addTile();
//    $destination = array('controller' => 'costs', 'action' => 'charts');
//    echo $this->Tile->specialTile('icon-chart-alt', $destination, 'bg-yellow', null);
echo $this->Tile->emptyTilesBar(5);
$this->end();
?>

<?php
$this->start('breadCrumbs');
    $crumbs = array(
                 array('text' => __('Projects'), 'link' => array('action' => '#')),
              );
    echo $this->App->breadcrumbs($crumbs);
$this->end();
?>

<div>
    <?php
    echo $this->Tile->emptyTile();
    
    $parameters = array('tileSize' => 'double',
        'color' => 'bg-emerald',
        'icon' => 'icon-cycle',
        'image' => $this->Html->image('cake.icon.png'),
        'destination' => array('controller' => 'projects', 'action' => 'schrittmotor'),
        'title' => 'Schrittmotor',
        'text' => 'Schrittmotor',
        'id' => ''
    );
    echo $this->Tile->iconTile($parameters);

    echo $this->Tile->emptyTilesBar(4);
    ?>
</div>
<div style="clear:both"></div>
<div>
    <?php
    echo $this->Tile->emptyTile();
    $parameters = array('tileSize' => 'double',
        'color' => 'bg-emerald',
        'icon' => 'icon-cars',
        'image' => $this->Html->image('cake.icon.png'),
        'destination' => array('controller' => 'projects', 'action' => 'carentertainment'),
        'title' => 'Car Entertainment',
        'text' => 'Car Entertainment',
        'id' => ''
    );
    echo $this->Tile->iconTile($parameters);

    echo $this->Tile->emptyTilesBar(4);
    ?></div>
<div style="clear:both"></div>
<div> 
    <?php
    echo $this->Tile->emptyTilesBar(7);
    ?></div>
<div style="clear:both"></div>
<div> 
    <?php
    echo $this->Tile->emptyTilesBar(7);
    ?></div>