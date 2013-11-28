<div class="incomes index">
	<h2><?php echo __('Incomes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sub_category_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($incomes as $income): ?>
	<tr>
		<td><?php echo h($income['Income']['id']); ?>&nbsp;</td>
		<td><?php echo h($income['Income']['name']); ?>&nbsp;</td>
		<td><?php echo h($income['Income']['price']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($income['Category']['name'], array('controller' => 'categories', 'action' => 'view', $income['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($income['SubCategory']['name'], array('controller' => 'sub_categories', 'action' => 'view', $income['SubCategory']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $income['Income']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $income['Income']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $income['Income']['id']), null, __('Are you sure you want to delete # %s?', $income['Income']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Income'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Categories'), array('controller' => 'sub_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub Category'), array('controller' => 'sub_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
