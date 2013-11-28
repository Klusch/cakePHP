<div class="bankTypes view">
<h2><?php echo __('Bank Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bankType['BankType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($bankType['BankType']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bankType['BankType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($bankType['BankType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bank Type'), array('action' => 'edit', $bankType['BankType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bank Type'), array('action' => 'delete', $bankType['BankType']['id']), null, __('Are you sure you want to delete # %s?', $bankType['BankType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bank Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Banks'), array('controller' => 'banks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank'), array('controller' => 'banks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Banks'); ?></h3>
	<?php if (!empty($bankType['Bank'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Iban'); ?></th>
		<th><?php echo __('Bic'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Bank Type Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bankType['Bank'] as $bank): ?>
		<tr>
			<td><?php echo $bank['id']; ?></td>
			<td><?php echo $bank['name']; ?></td>
			<td><?php echo $bank['iban']; ?></td>
			<td><?php echo $bank['bic']; ?></td>
			<td><?php echo $bank['created']; ?></td>
			<td><?php echo $bank['modified']; ?></td>
			<td><?php echo $bank['bank_type_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'banks', 'action' => 'view', $bank['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'banks', 'action' => 'edit', $bank['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'banks', 'action' => 'delete', $bank['id']), null, __('Are you sure you want to delete # %s?', $bank['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bank'), array('controller' => 'banks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
