<div class="escolhas form">
<?php echo $this->Form->create('Escolha'); ?>
	<fieldset>
		<legend><?php echo __('Add Escolha'); ?></legend>
	<?php
		echo $this->Form->input('IDfuncionario');
		echo $this->Form->input('IDopcao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Escolhas'), array('action' => 'index')); ?></li>
	</ul>
</div>
