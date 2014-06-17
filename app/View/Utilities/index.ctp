<div class="utilities index">
	<h2><?php echo __('Utilities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('shop_id'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('ordered'); ?></th>
			<th><?php echo $this->Paginator->sort('delivered'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('troubleshooting_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($utilities as $utility): ?>
	<tr>
		<td><?php echo h($utility['Utility']['id']); ?>&nbsp;</td>
		<td><?php echo h($utility['Utility']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($utility['Shop']['name'], array('controller' => 'shops', 'action' => 'view', $utility['Shop']['id'])); ?>
		</td>
		<td><?php echo h($utility['Utility']['price']); ?>&nbsp;</td>
		<td><?php echo h($utility['Utility']['ordered']); ?>&nbsp;</td>
		<td><?php echo h($utility['Utility']['delivered']); ?>&nbsp;</td>
		<td><?php echo h($utility['Utility']['modified']); ?>&nbsp;</td>
		<td><?php echo h($utility['Utility']['created']); ?>&nbsp;</td>
		<td><?php echo h($utility['Utility']['troubleshooting_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $utility['Utility']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $utility['Utility']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $utility['Utility']['id']), null, __('Are you sure you want to delete # %s?', $utility['Utility']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Utility'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Shops'), array('controller' => 'shops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop'), array('controller' => 'shops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Troubleshootings'), array('controller' => 'troubleshootings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Troubleshooting'), array('controller' => 'troubleshootings', 'action' => 'add')); ?> </li>
	</ul>
</div>
