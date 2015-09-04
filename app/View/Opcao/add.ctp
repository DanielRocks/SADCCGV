<div class="opcaos form">
<?php echo $this->Form->create('Opcao'); ?>
	<fieldset>
		<legend><?php echo __('Add Opcao'); ?></legend>
	<?php
		echo $this->Form->input('IDpergunta');
		echo $this->Form->input('opcao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Opcaos'), array('action' => 'index')); ?></li>
	</ul>
</div>
