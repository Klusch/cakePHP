<?php
// app/View/Users/index.ctp
// == Breadcrumbs ==
$this->start('breadCrumbs');
  $crumbs = array(
    array('text' => __('Usermanagement'), 'link' => array('action' => '#')),
        //array('text' => 'Etage 2', 'link' => array('controller' => 'pages', 'action' => 'home')),
  );
  echo $this->App->breadcrumbs($crumbs);
$this->end();

// == Frames ==
$this->start('frameRequest');
  echo 'false';
$this->end();

// == Top-Tiles ==
$this->start('topTiles');
  echo $this->Category->tile();
  echo $this->Operation->add('', null, 'preselection');
  $destination = array('controller' => 'companies', 'action' => 'index');
  echo $this->Tile->special('icon-layers', $destination, 'bg-orange', __('List companies'));
$this->end();
?>

<?php
// == Content ==
echo "<div>";

$frames = array();
foreach ($groups as $i => $group) {

    $tmp = $this->Tile->image($group['Group']['picture_url'], array(), __($group['Group']['name']));

    $frames[] = array(
        'head' => __($group['Group']['name']),
        'content' => $this->User->userAsContent($tmp, $usersGrouped[$i]),
        'size' => count($usersGrouped[$i]['users'])
    );

}
echo "</div><div style='clear:both'></div>";

echo "<div class='listview'>";
echo $this->App->accordion($frames, $activatedId);
echo "</div>";


// --- JavaScript ---
echo $this->Html->script('hagleitner/user-preselection.js');
?>