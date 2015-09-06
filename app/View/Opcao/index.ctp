<div class="opcaos index">
	<h2><?php echo __('Opcaos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php echo $this->Paginator->sort('IDopcao'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('IDpergunta'); ?></th>-->
			<th><?php echo $this->Paginator->sort('opcao'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($opcaos as $opcao): ?>
	<tr>
		<!--<td><?php echo h($opcao['Opcao']['IDopcao']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($opcao['Opcao']['IDpergunta']); ?>&nbsp;</td>-->
		<td><?php echo h($opcao['Opcao']['opcao']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $opcao['Opcao']['IDopcao'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $opcao['Opcao']['IDopcao'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $opcao['Opcao']['IDopcao']), array(), __('Are you sure you want to delete # %s?', $opcao['Opcao']['IDopcao'])); ?>
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
        <li><?php echo $this->Html->link(__('Início'), array('action' => '../Funcionario/index')); ?></li>
		<li><?php echo $this->Html->link(__('Nova Opcao'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Escolhas'), array('action' => '../Escolha/index')); ?></li>
	</ul>
</div>
