<div class="problemLocations view">
<h2><?php echo __('Problem Location'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($problemLocation['ProblemLocation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($problemLocation['ProblemLocation']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($problemLocation['ProblemLocation']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($problemLocation['ProblemLocation']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Problem Location'), array('action' => 'edit', $problemLocation['ProblemLocation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Problem Location'), array('action' => 'delete', $problemLocation['ProblemLocation']['id']), null, __('Are you sure you want to delete # %s?', $problemLocation['ProblemLocation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Problem Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem Location'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Problems'); ?></h3>
	<?php if (!empty($problemLocation['Problem'])): ?>
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
	<?php foreach ($problemLocation['Problem'] as $problem): ?>
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
