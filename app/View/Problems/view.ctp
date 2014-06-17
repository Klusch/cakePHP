<div class="problems view">
<h2><?php echo __('Problem'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Problem Location'); ?></dt>
		<dd>
			<?php echo $this->Html->link($problem['ProblemLocation']['name'], array('controller' => 'problem_locations', 'action' => 'view', $problem['ProblemLocation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Priority'); ?></dt>
		<dd>
			<?php echo $this->Html->link($problem['Priority']['name'], array('controller' => 'priorities', 'action' => 'view', $problem['Priority']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Troubleshooting'); ?></dt>
		<dd>
			<?php echo $this->Html->link($problem['Troubleshooting']['id'], array('controller' => 'troubleshootings', 'action' => 'view', $problem['Troubleshooting']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Solved'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['solved']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Problem'), array('action' => 'edit', $problem['Problem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Problem'), array('action' => 'delete', $problem['Problem']['id']), null, __('Are you sure you want to delete # %s?', $problem['Problem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Cars'); ?></h3>
	<?php if (!empty($problem['Car'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Hsn'); ?></th>
		<th><?php echo __('Tsn'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($problem['Car'] as $car): ?>
		<tr>
			<td><?php echo $car['id']; ?></td>
			<td><?php echo $car['name']; ?></td>
			<td><?php echo $car['hsn']; ?></td>
			<td><?php echo $car['tsn']; ?></td>
			<td><?php echo $car['modified']; ?></td>
			<td><?php echo $car['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cars', 'action' => 'view', $car['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cars', 'action' => 'edit', $car['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cars', 'action' => 'delete', $car['id']), null, __('Are you sure you want to delete # %s?', $car['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Car'), array('controller' => 'cars', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
