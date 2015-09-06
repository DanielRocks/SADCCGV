<div class="relatorios index">
	<h2><?php echo __('Relatorios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID do Relatorio'); ?></th>
			<th><?php echo $this->Paginator->sort('ID do Funcionario'); ?></th>
			<th><?php echo $this->Paginator->sort('avaliacao'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($relatorios as $relatorio): ?>
	<tr>
		<td><?php echo h($relatorio['Relatorio']['IDrelatorio']); ?>&nbsp;</td>
		<td><?php echo h($relatorio['Relatorio']['IDfuncionario']); ?>&nbsp;</td>
		<td><?php echo h($relatorio['Relatorio']['avaliacao']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $relatorio['Relatorio']['IDrelatorio'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $relatorio['Relatorio']['IDrelatorio'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $relatorio['Relatorio']['IDrelatorio']), array(), __('Are you sure you want to delete # %s?', $relatorio['Relatorio']['IDrelatorio'])); ?>
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
		<li><?php echo $this->Html->link(__('Novo Relatorio'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Funcionários'), array('action' => '../Funcionario/index')); ?></li>
	</ul>
</div>
