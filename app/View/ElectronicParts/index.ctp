<?php
$this->start('frameRequest');
echo 'false';
$this->end();
?>

<?php
$this->start('topTiles');
echo $this->Tile->getCategoryItem('elektronicparts');
echo $this->Tile->addTile();
//    $destination = array('controller' => 'costs', 'action' => 'charts');
//    echo $this->Tile->specialTile('icon-chart-alt', $destination, 'bg-yellow', null);
echo $this->Tile->emptyTilesBar(6);
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
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('conrad_number'); ?></th>
			<th><?php echo $this->Paginator->sort('conrad_price'); ?></th>
			<th><?php echo $this->Paginator->sort('reichelt_number'); ?></th>
			<th><?php echo $this->Paginator->sort('reichelt_price'); ?></th>
			<th><?php echo $this->Paginator->sort('additional_number'); ?></th>
			<th><?php echo $this->Paginator->sort('additional_price'); ?></th>
			<th><?php echo $this->Paginator->sort('selection'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($electronicParts as $electronicPart): ?>
	<tr>
		<td><?php echo h($electronicPart['ElectronicPart']['id']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['name']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['conrad_number']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['conrad_price']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['reichelt_number']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['reichelt_price']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['additional_number']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['additional_price']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['selection']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($electronicPart['Project']['name'], array('controller' => 'projects', 'action' => 'view', $electronicPart['Project']['id'])); ?>
		</td>
		<td><?php echo h($electronicPart['ElectronicPart']['created']); ?>&nbsp;</td>
		<td><?php echo h($electronicPart['ElectronicPart']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $electronicPart['ElectronicPart']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $electronicPart['ElectronicPart']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $electronicPart['ElectronicPart']['id']), null, __('Are you sure you want to delete # %s?', $electronicPart['ElectronicPart']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Electronic Part'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
