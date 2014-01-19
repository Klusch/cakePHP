<div class="banks view">
<h2><?php echo __('Bank'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iban'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['iban']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bic'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['bic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bank['BankType']['id'], array('controller' => 'bank_types', 'action' => 'view', $bank['BankType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate Of Interest'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['rate_of_interest']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate Available'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['rate_available']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exemption Order For Capital Gains'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['exemption_order_for_capital_gains']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exemption Order Available'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['exemption_order_available']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exemption Order Used'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['exemption_order_used']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exemption Order Proof'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['exemption_order_proof']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Balance'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['bank_balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Balance Proof'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['bank_balance_proof']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo h($bank['Bank']['product']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bank'), array('action' => 'edit', $bank['Bank']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bank'), array('action' => 'delete', $bank['Bank']['id']), null, __('Are you sure you want to delete # %s?', $bank['Bank']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Banks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bank Types'), array('controller' => 'bank_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank Type'), array('controller' => 'bank_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
