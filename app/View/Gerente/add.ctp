<div class="gerentes form">
<?php echo $this->Form->create('Gerente'); ?>
	<fieldset>
		<legend><?php echo __('Add Gerente'); ?></legend>
	<?php
		echo $this->Form->input('IDfuncionario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Gerentes'), array('action' => 'index')); ?></li>
	</ul>
</div>
