<?php
// app/View/Users/index.ctp
// --------------------------------
// == Breadcrumbs ==
$this->start('breadCrumbs');
  $crumbs = array(
    array('text' => __('Usermanagement'), 'link' => array('action' => '#')),
        //array('text' => 'Etage 2', 'link' => array('controller' => 'pages', 'action' => 'home')),
  );
  echo $this->App->breadcrumbs($crumbs);
$this->end();
// --------------------------------

// --------------------------------
// == Frames ==
$this->start('frameRequest');
  echo 'false';
$this->end();
// --------------------------------

// --------------------------------
// == Top-Tiles ==
$this->start('topTiles');
  echo $this->Category->tile();
  echo $this->Category->getCategoryHeadline();
$this->end();
// --------------------------------

// --------------------------------
// == JavaScript ==
$this->start('pageScripts');
echo "<script>
   function contentRequest(element) {
      alert('oh');   
   }
   </script>";
$this->end();
// --------------------------------

// ================================
// == Content ==

echo $this->Input->getFilterField('filterTileSuggestionInputId');

$frames = array();
foreach ($groups as $i => $group) {

    $tmp = $this->Tile->image($group['Group']['picture_url'], array(), __($group['Group']['name']));

    $frames[] = array(
        'head' => __($group['Group']['name']),
        'content' => $this->User->userAsContent($group['Group']['id'], $usersGrouped[$i]),
        'size' => count($usersGrouped[$i]['users']),
        'id' => ' ' . $group['Group']['name']
    );

}

echo $this->App->accordion($frames, $activatedId);

?>