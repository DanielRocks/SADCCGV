<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Relatorio'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="relatorio form large-10 medium-9 columns">
    <?= $this->Form->create($relatorio) ?>
    <fieldset>
        <legend><?= __('Add Relatorio') ?></legend>
        <?php
            echo $this->Form->input('IDfuncionario');
            echo $this->Form->input('avaliacao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
