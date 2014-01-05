<?php
$this->start('frameRequest');
   echo 'true';
$this->end(); 
?>

<?php
$this->start('topTiles');
    echo $this->Tile->getCategoryItem();
    echo $this->Tile->addTile();
    $destination = array('action' => 'overall');
    echo $this->Tile->specialTile('icon-dollar-2', $destination, 'bg-yellow', null);
    echo $this->Tile->emptyTilesBar(4);
$this->end();
?>

<?php
$this->start('sideTiles');
    //echo $this->Tile->specialTile('icon-plus-2', null, 'bg-grayLighter', null);
    echo $this->Tile->emptyTilesBar(4);
$this->end(); 
?> 

<div class="costs index">
	<h2><?php echo __('Costs'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th class="text-left"><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="text-left"><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="text-left"><?php echo $this->Paginator->sort('price'); ?></th>
			<th class="text-left"><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th class="text-left"><?php echo $this->Paginator->sort('sub_category_id'); ?></th>
			<th class="text-left actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($costs as $cost): ?>
	<tr>
		<td><?php echo h($cost['Cost']['id']); ?>&nbsp;</td>
		<td><?php echo h($cost['Cost']['name']); ?>&nbsp;</td>
		<td><?php echo h($cost['Cost']['price']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cost['Category']['name'], array('controller' => 'categories', 'action' => 'view', $cost['Category']['id'])); ?>
		</td>
		<td><?php echo h($cost['SubCategory']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cost['Cost']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cost['Cost']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cost['Cost']['id']), null, __('Are you sure you want to delete # %s?', $cost['Cost']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
    </tbody>
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
		<li><?php echo $this->Html->link(__('New Cost'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
