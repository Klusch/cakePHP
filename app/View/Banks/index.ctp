<div class="banks index">
	<h2><?php echo __('Banks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('iban'); ?></th>
			<th><?php echo $this->Paginator->sort('bic'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_type_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($banks as $bank): ?>
	<tr>
		<td><?php echo h($bank['Bank']['id']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['name']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['iban']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['bic']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['created']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['modified']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['bank_type_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bank['Bank']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bank['Bank']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bank['Bank']['id']), null, __('Are you sure you want to delete # %s?', $bank['Bank']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Bank'), array('action' => 'add')); ?></li>
	</ul>
</div>
