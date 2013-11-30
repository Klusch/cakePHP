<div class="additions view">
<h2><?php echo __('Addition'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($addition['Addition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Addition'); ?></dt>
		<dd>
			<?php echo h($addition['Addition']['addition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($addition['Addition']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($addition['Addition']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Addition'), array('action' => 'edit', $addition['Addition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Addition'), array('action' => 'delete', $addition['Addition']['id']), null, __('Are you sure you want to delete # %s?', $addition['Addition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Additions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Addition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Washing Machines'), array('controller' => 'washing_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Washing Machine'), array('controller' => 'washing_machines', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Washing Machines'); ?></h3>
	<?php if (!empty($addition['WashingMachine'])): ?>
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
	<?php foreach ($addition['WashingMachine'] as $washingMachine): ?>
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
