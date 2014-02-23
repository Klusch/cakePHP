<?php
// View/Status/index.ctp
// ------------------------------------
$this->start('frameRequest');
   echo 'true';
$this->end();
// ------------------------------------
?>

<?php
// ------------------------------------
$this->start('breadCrumbs');
   $crumbs = array();
   $crumb = array(
       'text' => __('Filme'),
       'link' => array('action' => 'index')            
       );
   $crumbs[] = $crumb;
   echo $this->App->breadcrumbs($crumbs);
$this->end();
// ------------------------------------
?>

<?php
// ------------------------------------
$this->start('topTiles');
    echo $this->Tile->getCategoryItem('movies');
    echo $this->Tile->emptyTile();
    echo $this->Tile->emptyTilesBar(5);
$this->end();
// ------------------------------------
?>



<div class="status index">
	<h2><?php echo __('Status'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stati as $status): ?>
	<tr>
		<td><?php echo h($status['Status']['id']); ?>&nbsp;</td>
		<td><?php echo h($status['Status']['name']); ?>&nbsp;</td>
		<td><?php echo h($status['Status']['created']); ?>&nbsp;</td>
		<td><?php echo h($status['Status']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $status['Status']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $status['Status']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $status['Status']['id']), null, __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Status'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Movies'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movie'), array('controller' => 'movies', 'action' => 'add')); ?> </li>
	</ul>
</div>
