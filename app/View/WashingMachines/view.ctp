<div class="washingMachines view">
<h2><?php echo __('Washing Machine'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($washingMachine['WashingMachine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Program'); ?></dt>
		<dd>
			<?php echo $this->Html->link($washingMachine['Program']['name'], array('controller' => 'programs', 'action' => 'view', $washingMachine['Program']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Temperature'); ?></dt>
		<dd>
			<?php echo $this->Html->link($washingMachine['Temperature']['value'], array('controller' => 'temperatures', 'action' => 'view', $washingMachine['Temperature']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Spin'); ?></dt>
		<dd>
			<?php echo $this->Html->link($washingMachine['Spin']['value'], array('controller' => 'spins', 'action' => 'view', $washingMachine['Spin']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Power Consumtion'); ?></dt>
		<dd>
			<?php echo h($washingMachine['WashingMachine']['power_consumtion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($washingMachine['Unit']['unit'], array('controller' => 'units', 'action' => 'view', $washingMachine['Unit']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duration'); ?></dt>
		<dd>
			<?php echo h($washingMachine['WashingMachine']['duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($washingMachine['WashingMachine']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($washingMachine['WashingMachine']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Washing Machine'), array('action' => 'edit', $washingMachine['WashingMachine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Washing Machine'), array('action' => 'delete', $washingMachine['WashingMachine']['id']), null, __('Are you sure you want to delete # %s?', $washingMachine['WashingMachine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Washing Machines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Washing Machine'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Additions'); ?></h3>
	<?php if (!empty($washingMachine['Addition'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Addition'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($washingMachine['Addition'] as $addition): ?>
		<tr>
			<td><?php echo $addition['id']; ?></td>
			<td><?php echo $addition['addition']; ?></td>
			<td><?php echo $addition['created']; ?></td>
			<td><?php echo $addition['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'additions', 'action' => 'view', $addition['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'additions', 'action' => 'edit', $addition['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'additions', 'action' => 'delete', $addition['id']), null, __('Are you sure you want to delete # %s?', $addition['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Addition'), array('controller' => 'additions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
