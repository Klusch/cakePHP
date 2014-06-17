<div class="problems index">
	<h2><?php echo __('Problems'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('problem_location_id'); ?></th>
			<th><?php echo $this->Paginator->sort('priority_id'); ?></th>
			<th><?php echo $this->Paginator->sort('troubleshooting_id'); ?></th>
			<th><?php echo $this->Paginator->sort('solved'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($problems as $problem): ?>
	<tr>
		<td><?php echo h($problem['Problem']['id']); ?>&nbsp;</td>
		<td><?php echo h($problem['Problem']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($problem['ProblemLocation']['name'], array('controller' => 'problem_locations', 'action' => 'view', $problem['ProblemLocation']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($problem['Priority']['name'], array('controller' => 'priorities', 'action' => 'view', $problem['Priority']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($problem['Troubleshooting']['id'], array('controller' => 'troubleshootings', 'action' => 'view', $problem['Troubleshooting']['id'])); ?>
		</td>
		<td><?php echo h($problem['Problem']['solved']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $problem['Problem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $problem['Problem']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $problem['Problem']['id']), null, __('Are you sure you want to delete # %s?', $problem['Problem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Problem'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Problem Locations'), array('controller' => 'problem_locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem Location'), array('controller' => 'problem_locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Priorities'), array('controller' => 'priorities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Priority'), array('controller' => 'priorities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Troubleshootings'), array('controller' => 'troubleshootings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Troubleshooting'), array('controller' => 'troubleshootings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cars'), array('controller' => 'cars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Car'), array('controller' => 'cars', 'action' => 'add')); ?> </li>
	</ul>
</div>
