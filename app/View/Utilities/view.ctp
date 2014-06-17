<div class="utilities view">
<h2><?php echo __('Utility'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($utility['Utility']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($utility['Utility']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shop'); ?></dt>
		<dd>
			<?php echo $this->Html->link($utility['Shop']['name'], array('controller' => 'shops', 'action' => 'view', $utility['Shop']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($utility['Utility']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordered'); ?></dt>
		<dd>
			<?php echo h($utility['Utility']['ordered']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delivered'); ?></dt>
		<dd>
			<?php echo h($utility['Utility']['delivered']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($utility['Utility']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($utility['Utility']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Troubleshooting Id'); ?></dt>
		<dd>
			<?php echo h($utility['Utility']['troubleshooting_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Utility'), array('action' => 'edit', $utility['Utility']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Utility'), array('action' => 'delete', $utility['Utility']['id']), null, __('Are you sure you want to delete # %s?', $utility['Utility']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Utilities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Utility'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shops'), array('controller' => 'shops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop'), array('controller' => 'shops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Troubleshootings'), array('controller' => 'troubleshootings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Troubleshooting'), array('controller' => 'troubleshootings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Troubleshootings'); ?></h3>
	<?php if (!empty($utility['Troubleshooting'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($utility['Troubleshooting'] as $troubleshooting): ?>
		<tr>
			<td><?php echo $troubleshooting['id']; ?></td>
			<td><?php echo $troubleshooting['description']; ?></td>
			<td><?php echo $troubleshooting['modified']; ?></td>
			<td><?php echo $troubleshooting['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'troubleshootings', 'action' => 'view', $troubleshooting['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'troubleshootings', 'action' => 'edit', $troubleshooting['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'troubleshootings', 'action' => 'delete', $troubleshooting['id']), null, __('Are you sure you want to delete # %s?', $troubleshooting['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Troubleshooting'), array('controller' => 'troubleshootings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
