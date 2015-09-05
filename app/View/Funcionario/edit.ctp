<div class="funcionarios form">
<?php echo $this->Form->create('Funcionario'); ?>
	<fieldset>
		<legend><?php echo __('Editar Funcionario'); ?></legend>
	<?php
		echo $this->Form->input('IDfuncionario');
		echo $this->Form->input('nome');
		echo $this->Form->input('login');
		echo $this->Form->input('senha');
		echo $this->Form->input('responsavel');
		echo $this->Form->input('departamento');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Editar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Funcionario.IDfuncionario')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Funcionario.IDfuncionario'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Funcionarios'), array('action' => 'index')); ?></li>
	</ul>
</div>
