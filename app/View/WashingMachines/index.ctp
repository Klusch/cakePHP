<div class="washingMachines index">
	<h2><?php echo __('Washing Machines'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('program_id'); ?></th>
			<th><?php echo $this->Paginator->sort('temperature_id'); ?></th>
			<th><?php echo $this->Paginator->sort('spin_id'); ?></th>
			<th><?php echo $this->Paginator->sort('power_consumtion'); ?></th>
			<th><?php echo $this->Paginator->sort('unit_id'); ?></th>
			<th><?php echo $this->Paginator->sort('duration'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($washingMachines as $washingMachine): ?>
	<tr>
		<td><?php echo h($washingMachine['WashingMachine']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($washingMachine['Program']['name'], array('controller' => 'programs', 'action' => 'view', $washingMachine['Program']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($washingMachine['Temperature']['value'], array('controller' => 'temperatures', 'action' => 'view', $washingMachine['Temperature']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($washingMachine['Spin']['value'], array('controller' => 'spins', 'action' => 'view', $washingMachine['Spin']['id'])); ?>
		</td>
		<td><?php echo h($washingMachine['WashingMachine']['power_consumtion']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($washingMachine['Unit']['unit'], array('controller' => 'units', 'action' => 'view', $washingMachine['Unit']['id'])); ?>
		</td>
		<td><?php echo h($washingMachine['WashingMachine']['duration']); ?>&nbsp;</td>
		<td><?php echo h($washingMachine['WashingMachine']['created']); ?>&nbsp;</td>
		<td><?php echo h($washingMachine['WashingMachine']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $washingMachine['WashingMachine']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $washingMachine['WashingMachine']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $washingMachine['WashingMachine']['id']), null, __('Are you sure you want to delete # %s?', $washingMachine['WashingMachine']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Washing Machine'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Programs'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Temperatures'), array('controller' => 'temperatures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Temperature'), array('controller' => 'temperatures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Spins'), array('controller' => 'spins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spin'), array('controller' => 'spins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Additions'), array('controller' => 'additions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Addition'), array('controller' => 'additions', 'action' => 'add')); ?> </li>
	</ul>
</div>
