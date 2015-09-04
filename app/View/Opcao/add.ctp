<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Opcao'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="opcao form large-10 medium-9 columns">
    <?= $this->Form->create($opcao) ?>
    <fieldset>
        <legend><?= __('Add Opcao') ?></legend>
        <?php
            echo $this->Form->input('IDpergunta');
            echo $this->Form->input('opcao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
