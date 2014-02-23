<?php
$this->start('frameRequest');
echo 'false';
$this->end();
?>

<?php
$this->start('topTiles');
echo $this->Tile->getCategoryItem('elektronicparts');
//    $destination = array('controller' => 'costs', 'action' => 'charts');
//    echo $this->Tile->specialTile('icon-chart-alt', $destination, 'bg-yellow', null);
echo $this->Tile->submitTile();
echo $this->Tile->emptyTilesBar(5);
$this->end();
?>

<?php
$this->start('breadCrumbs');
    $crumbs = array(
                 array('text' => __('ElectronicParts'), 'link' => array('controller' => 'ElectronicParts', 'action' => 'index')),
                 array('text' => __('New electronicpart'), 'link' => array('action' => '#'))
              );
    echo $this->App->breadcrumbs($crumbs);
$this->end();
?>

<?php
  echo $this->Input->formDiv('ElectronicPart', $this->ElectronicPart->createInputFields());
?>

<!--
		<li><?php echo $this->Html->link(__('List Electronic Parts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
-->
