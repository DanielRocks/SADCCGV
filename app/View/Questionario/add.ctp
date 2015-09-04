<div class="questionarios form">
<?php echo $this->Form->create('Questionario'); ?>
	<fieldset>
		<legend><?php echo __('Add Questionario'); ?></legend>
	<?php
		echo $this->Form->input('IDfuncionario');
		echo $this->Form->input('titulo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Questionarios'), array('action' => 'index')); ?></li>
	</ul>
</div>
