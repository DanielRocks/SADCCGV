<div class="funcionarios index">
	<h2><?php echo __('Funcionarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php echo $this->Paginator->sort('IDfuncionario'); ?></th>-->
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('login'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('senha'); ?></th>-->
			<th><?php echo $this->Paginator->sort('responsavel'); ?></th>
			<th><?php echo $this->Paginator->sort('departamento'); ?></th>
			<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php foreach ($funcionarios as $funcionario): ?>
	<tr>
		<!--<td><?php echo h($funcionario['Funcionario']['IDfuncionario']); ?>&nbsp;</td>-->
		<td><?php echo h($funcionario['Funcionario']['nome']); ?>&nbsp;</td>
		<!--<td><?php echo h($funcionario['Funcionario']['login']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($funcionario['Funcionario']['senha']); ?>&nbsp;</td>-->
		<td><?php echo h($funcionario['Funcionario']['responsavel']); ?>&nbsp;</td>
		<td><?php echo h($funcionario['Funcionario']['departamento']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $funcionario['Funcionario']['IDfuncionario'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $funcionario['Funcionario']['IDfuncionario'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $funcionario['Funcionario']['IDfuncionario']), array(), __('Are you sure you want to delete # %s?', $funcionario['Funcionario']['IDfuncionario'])); ?>
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
		<li><?php echo $this->Html->link(__('Novo Funcionario'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Questionarios'), array('action' => '../Questionario/index')); ?></li>
        <li><?php echo $this->Html->link(__('Relatorios'), array('action' => '../Relatorio/index')); ?></li>
	</ul>
</div>
