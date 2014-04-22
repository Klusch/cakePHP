<?php
// View/Movies/index.ctp
// ------------------------------------
$this->start('frameRequest');
   echo 'false';
$this->end();
// ------------------------------------
?>

<?php
// ------------------------------------
$this->start('breadCrumbs');
   $crumbs = array();
   $crumb = array(
       'text' => __('Filme'),
       'link' => array('action' => 'index')            
       );
   $crumbs[] = $crumb;
   echo $this->App->breadcrumbs($crumbs);
$this->end();
// ------------------------------------
?>

<?php
// ------------------------------------
$this->start('topTiles');
    echo $this->Tile->getCategoryItem('movies');
    
    $parameters = array('tile-size' => null,
                        'color-bigarea' => 'bg-orange',
                        'icon-bigarea'  => 'icon-layers',
                        'image-bigarea' => null, //$this->Html->image(...),
                        'destination-smallarea' => array('controller' => 'status', 'action' => 'add'),
          	        'text-overlay' => null,
      	                'text-overlay-color' => 'fg-white',
      	                'badge-color' => 'bg-emerald',
      	                'badge-icon' => 'icon-plus-2',
                        'badge-valueAsIcon' => 'xxx',
      	                'destination-bigarea' => array('controller' => 'status', 'action' => 'index'),
      	                'title-bigarea' => __('Status'),
      	                'title-smallarea' => null
      	);
    echo $this->Tile->tileBadge($parameters);
    echo $this->Tile->emptyTilesBar(5);
$this->end();
// ------------------------------------
?>

<?php

  $parameters = array( 'tileSize' => 'double',
      	               'color' => null,
      	               'icon' => null,
                       'image' => 'img/Filme/Background/3.jpg',
      	               'destination' => null,
      	               'title' => 'Die Eiskönigin',
      	               'text' => 'Die Eiskönigin'
      	             );
  echo $this->Tile->iconTile($parameters);

?>

<div class="tile double">
  <div class="tile-content image">
     <img src="img/Filme/Background/3.jpg">
  </div>
</div>

<div class="tile double">
  <div class="tile-content image">
     <img src="img/Filme/Background/2.jpg">
  </div>
</div>

<div class="tile double">
  <div class="tile-content image">
     <img src="img/Filme/Background/1.jpg">
  </div>
</div>

<?php
    $pictures = array('mainPicture' => array('source' => 'Programme/Abbyy_FineReader_11.jpg', 'alt' => 'Text'),
                      'overlayPicture' => 'ok.jpg',
                      'statusPictures' => array(array ('source' => 'falsch.jpg', 'alt' => 'Text',
                                                       'title' => 'Text', 'link' => array('controller' => 'Status', 'action' => 'index')
                                                      ),
                                                array ('source' => 'ok.jpg', 'alt' => 'Text',
                                                       'title' => 'Text', 'link' => array('controller' => 'Status', 'action' => 'index')
                                                      ),
                                                array ('source' => 'falsch.jpg', 'alt' => 'Text',
                                                       'title' => 'Text')                          
                                                )
                     );
    $link = array('id' => 'idxxx', 'link' => array('controller' => 'AController', 'action' => 'index'));
    $text = array('zeile1', 'zeile2', 'zeile3');
    
   echo $this->ProjectSpecific->statusTile($link, $pictures, $text);
?>