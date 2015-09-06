<div class="funcionarios form">
<?php echo $this->Form->create('Funcionario'); ?>
	<fieldset>
		<legend><?php echo __('Add Funcionario'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('responsavel');
		echo $this->Form->input('departamento');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Funcionarios'), array('action' => 'index')); ?></li>
	</ul>
</div>
