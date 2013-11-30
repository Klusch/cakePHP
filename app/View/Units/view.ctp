<div class="units view">
<h2><?php echo __('Unit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['unit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Unit'), array('action' => 'edit', $unit['Unit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Unit'), array('action' => 'delete', $unit['Unit']['id']), null, __('Are you sure you want to delete # %s?', $unit['Unit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Units'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Spins'), array('controller' => 'spins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spin'), array('controller' => 'spins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Temperatures'), array('controller' => 'temperatures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Temperature'), array('controller' => 'temperatures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Washing Machines'), array('controller' => 'washing_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Washing Machine'), array('controller' => 'washing_machines', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Spins'); ?></h3>
	<?php if (!empty($unit['Spin'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Unit Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($unit['Spin'] as $spin): ?>
		<tr>
			<td><?php echo $spin['id']; ?></td>
			<td><?php echo $spin['value']; ?></td>
			<td><?php echo $spin['unit_id']; ?></td>
			<td><?php echo $spin['created']; ?></td>
			<td><?php echo $spin['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'spins', 'action' => 'view', $spin['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'spins', 'action' => 'edit', $spin['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'spins', 'action' => 'delete', $spin['id']), null, __('Are you sure you want to delete # %s?', $spin['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Spin'), array('controller' => 'spins', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Temperatures'); ?></h3>
	<?php if (!empty($unit['Temperature'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Unit Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($unit['Temperature'] as $temperature): ?>
		<tr>
			<td><?php echo $temperature['id']; ?></td>
			<td><?php echo $temperature['value']; ?></td>
			<td><?php echo $temperature['unit_id']; ?></td>
			<td><?php echo $temperature['created']; ?></td>
			<td><?php echo $temperature['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'temperatures', 'action' => 'view', $temperature['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'temperatures', 'action' => 'edit', $temperature['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'temperatures', 'action' => 'delete', $temperature['id']), null, __('Are you sure you want to delete # %s?', $temperature['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Temperature'), array('controller' => 'temperatures', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Washing Machines'); ?></h3>
	<?php if (!empty($unit['WashingMachine'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Program Id'); ?></th>
		<th><?php echo __('Temperature Id'); ?></th>
		<th><?php echo __('Spin Id'); ?></th>
		<th><?php echo __('Power Consumtion'); ?></th>
		<th><?php echo __('Unit Id'); ?></th>
		<th><?php echo __('Duration'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($unit['WashingMachine'] as $washingMachine): ?>
		<tr>
			<td><?php echo $washingMachine['id']; ?></td>
			<td><?php echo $washingMachine['program_id']; ?></td>
			<td><?php echo $washingMachine['temperature_id']; ?></td>
			<td><?php echo $washingMachine['spin_id']; ?></td>
			<td><?php echo $washingMachine['power_consumtion']; ?></td>
			<td><?php echo $washingMachine['unit_id']; ?></td>
			<td><?php echo $washingMachine['duration']; ?></td>
			<td><?php echo $washingMachine['created']; ?></td>
			<td><?php echo $washingMachine['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'washing_machines', 'action' => 'view', $washingMachine['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'washing_machines', 'action' => 'edit', $washingMachine['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'washing_machines', 'action' => 'delete', $washingMachine['id']), null, __('Are you sure you want to delete # %s?', $washingMachine['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Washing Machine'), array('controller' => 'washing_machines', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
