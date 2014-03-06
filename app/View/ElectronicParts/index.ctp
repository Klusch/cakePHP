<?php
$this->start('frameRequest');
echo 'false';
$this->end();
?>

<?php
$this->start('topTiles');
  echo $this->Tile->getCategoryItem('elektronicparts');
  echo $this->Tile->addTile();
  echo $this->Tile->tileBadgeForOtherCategory('projects', __('Projects'));
  echo $this->Tile->emptyTilesBar(5);
$this->end();
?>

<?php
$this->start('breadCrumbs');
    $crumbs = array(
                 array('text' => __('ElectronicParts'), 'link' => array('action' => '#')),
              );
    echo $this->App->breadcrumbs($crumbs);
$this->end();
?>

<div class="electronicParts index">
	<h2><?php echo __('Electronic Parts'); ?></h2>
	<table cellpadding="5" cellspacing="0" border="1">
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('conrad_number'); ?></th>
			<th><?php echo $this->Paginator->sort('conrad_price'); ?></th>
			<th><?php echo $this->Paginator->sort('reichelt_number'); ?></th>
			<th><?php echo $this->Paginator->sort('reichelt_price'); ?></th>
			<th><?php echo $this->Paginator->sort('additional_number'); ?></th>
			<th><?php echo $this->Paginator->sort('additional_price'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
	</tr>
	<?php foreach ($electronicParts as $electronicPart): ?>
	<tr>
		<td><?php
                     $destination = array('action' => 'edit', $electronicPart['ElectronicPart']['id']);
                     echo $this->Html->link(h($electronicPart['ElectronicPart']['name']), $destination); 
                     ?>&nbsp;
                </td>
		<td><?php echo h($electronicPart['ElectronicPart']['conrad_number']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['conrad_price']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['reichelt_number']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['reichelt_price']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['additional_number']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['additional_price']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($electronicPart['Project']['name'], array('controller' => 'projects', 'action' => 'view', $electronicPart['Project']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
            <br><br><br>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

