<div class="subCategories view">
<h2><?php echo __('Sub Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subCategory['SubCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($subCategory['SubCategory']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sub Category'), array('action' => 'edit', $subCategory['SubCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sub Category'), array('action' => 'delete', $subCategory['SubCategory']['id']), null, __('Are you sure you want to delete # %s?', $subCategory['SubCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Costs'), array('controller' => 'costs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cost'), array('controller' => 'costs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Costs'); ?></h3>
	<?php if (!empty($subCategory['Cost'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Sub Category Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($subCategory['Cost'] as $cost): ?>
		<tr>
			<td><?php echo $cost['id']; ?></td>
			<td><?php echo $cost['name']; ?></td>
			<td><?php echo $cost['price']; ?></td>
			<td><?php echo $cost['category_id']; ?></td>
			<td><?php echo $cost['sub_category_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'costs', 'action' => 'view', $cost['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'costs', 'action' => 'edit', $cost['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'costs', 'action' => 'delete', $cost['id']), null, __('Are you sure you want to delete # %s?', $cost['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cost'), array('controller' => 'costs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
