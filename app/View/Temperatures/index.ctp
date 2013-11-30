<div class="temperatures index">
	<h2><?php echo __('Temperatures'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('unit_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($temperatures as $temperature): ?>
	<tr>
		<td><?php echo h($temperature['Temperature']['id']); ?>&nbsp;</td>
		<td><?php echo h($temperature['Temperature']['value']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($temperature['Unit']['unit'], array('controller' => 'units', 'action' => 'view', $temperature['Unit']['id'])); ?>
		</td>
		<td><?php echo h($temperature['Temperature']['created']); ?>&nbsp;</td>
		<td><?php echo h($temperature['Temperature']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $temperature['Temperature']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $temperature['Temperature']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $temperature['Temperature']['id']), null, __('Are you sure you want to delete # %s?', $temperature['Temperature']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Temperature'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Washing Machines'), array('controller' => 'washing_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Washing Machine'), array('controller' => 'washing_machines', 'action' => 'add')); ?> </li>
	</ul>
</div>
