<div class="cars index">
	<h2><?php echo __('Cars'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('hsn'); ?></th>
			<th><?php echo $this->Paginator->sort('tsn'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cars as $car): ?>
	<tr>
		<td><?php echo h($car['Car']['id']); ?>&nbsp;</td>
		<td><?php echo h($car['Car']['name']); ?>&nbsp;</td>
		<td><?php echo h($car['Car']['hsn']); ?>&nbsp;</td>
		<td><?php echo h($car['Car']['tsn']); ?>&nbsp;</td>
		<td><?php echo h($car['Car']['modified']); ?>&nbsp;</td>
		<td><?php echo h($car['Car']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $car['Car']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $car['Car']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $car['Car']['id']), null, __('Are you sure you want to delete # %s?', $car['Car']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Car'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tires'), array('controller' => 'tires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tire'), array('controller' => 'tires', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
	</ul>
</div>
