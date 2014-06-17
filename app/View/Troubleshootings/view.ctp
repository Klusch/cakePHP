<div class="troubleshootings view">
<h2><?php echo __('Troubleshooting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($troubleshooting['Troubleshooting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($troubleshooting['Troubleshooting']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($troubleshooting['Troubleshooting']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($troubleshooting['Troubleshooting']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Troubleshooting'), array('action' => 'edit', $troubleshooting['Troubleshooting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Troubleshooting'), array('action' => 'delete', $troubleshooting['Troubleshooting']['id']), null, __('Are you sure you want to delete # %s?', $troubleshooting['Troubleshooting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Troubleshootings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Troubleshooting'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Utilities'), array('controller' => 'utilities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Utility'), array('controller' => 'utilities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Problems'); ?></h3>
	<?php if (!empty($troubleshooting['Problem'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Problem Location Id'); ?></th>
		<th><?php echo __('Priority Id'); ?></th>
		<th><?php echo __('Troubleshooting Id'); ?></th>
		<th><?php echo __('Solved'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($troubleshooting['Problem'] as $problem): ?>
		<tr>
			<td><?php echo $problem['id']; ?></td>
			<td><?php echo $problem['description']; ?></td>
			<td><?php echo $problem['problem_location_id']; ?></td>
			<td><?php echo $problem['priority_id']; ?></td>
			<td><?php echo $problem['troubleshooting_id']; ?></td>
			<td><?php echo $problem['solved']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'problems', 'action' => 'view', $problem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'problems', 'action' => 'edit', $problem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'problems', 'action' => 'delete', $problem['id']), null, __('Are you sure you want to delete # %s?', $problem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
