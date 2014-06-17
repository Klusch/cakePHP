<div class="shops view">
<h2><?php echo __('Shop'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($shop['Shop']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shop'), array('action' => 'edit', $shop['Shop']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Shop'), array('action' => 'delete', $shop['Shop']['id']), null, __('Are you sure you want to delete # %s?', $shop['Shop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Shops'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Utilities'), array('controller' => 'utilities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Utility'), array('controller' => 'utilities', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Utilities'); ?></h3>
	<?php if (!empty($shop['Utility'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Shop Id'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Ordered'); ?></th>
		<th><?php echo __('Delivered'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($shop['Utility'] as $utility): ?>
		<tr>
			<td><?php echo $utility['id']; ?></td>
			<td><?php echo $utility['name']; ?></td>
			<td><?php echo $utility['shop_id']; ?></td>
			<td><?php echo $utility['price']; ?></td>
			<td><?php echo $utility['ordered']; ?></td>
			<td><?php echo $utility['delivered']; ?></td>
			<td><?php echo $utility['modified']; ?></td>
			<td><?php echo $utility['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'utilities', 'action' => 'view', $utility['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'utilities', 'action' => 'edit', $utility['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'utilities', 'action' => 'delete', $utility['id']), null, __('Are you sure you want to delete # %s?', $utility['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Utility'), array('controller' => 'utilities', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
