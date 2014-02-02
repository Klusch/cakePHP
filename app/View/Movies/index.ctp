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
    echo $this->Tile->emptyTile();
    echo $this->Tile->emptyTilesBar(5);
$this->end();
// ------------------------------------
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