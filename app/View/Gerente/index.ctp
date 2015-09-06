<div class="gerentes index">
	<h2><?php echo __('Gerentes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php echo $this->Paginator->sort('IDgerente'); ?></th>-->
			<th><?php echo $this->Paginator->sort('Nome'); ?></th>
			<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php foreach ($gerentes as $gerente): ?>
	<tr>
		<td><?php echo h($gerente['Gerente']['nome']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $gerente['Gerente']['IDgerente'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $gerente['Gerente']['IDgerente'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $gerente['Gerente']['IDgerente']), array(), __('Are you sure you want to delete # %s?', $gerente['Gerente']['IDgerente'])); ?>
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
        <li><?php echo $this->Html->link(__('Inicio'), array('action' => '../Funcionario/index')); ?></li>
		<li><?php echo $this->Html->link(__('Novo Gerente'), array('action' => 'add')); ?></li>
	</ul>
</div>
