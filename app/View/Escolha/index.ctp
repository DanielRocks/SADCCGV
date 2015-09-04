<div class="escolhas index">
	<h2><?php echo __('Escolhas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('IDescolha'); ?></th>
			<th><?php echo $this->Paginator->sort('IDfuncionario'); ?></th>
			<th><?php echo $this->Paginator->sort('IDopcao'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($escolhas as $escolha): ?>
	<tr>
		<td><?php echo h($escolha['Escolha']['IDescolha']); ?>&nbsp;</td>
		<td><?php echo h($escolha['Escolha']['IDfuncionario']); ?>&nbsp;</td>
		<td><?php echo h($escolha['Escolha']['IDopcao']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $escolha['Escolha']['IDescolha'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $escolha['Escolha']['IDescolha'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $escolha['Escolha']['IDescolha']), array(), __('Are you sure you want to delete # %s?', $escolha['Escolha']['IDescolha'])); ?>
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
		<li><?php echo $this->Html->link(__('New Escolha'), array('action' => 'add')); ?></li>
	</ul>
</div>
