<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $funcionario->IDfuncionario],
                ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->IDfuncionario)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Funcionario'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="funcionario form large-10 medium-9 columns">
    <?= $this->Form->create($funcionario) ?>
    <fieldset>
        <legend><?= __('Edit Funcionario') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('login');
            echo $this->Form->input('senha');
            echo $this->Form->input('responsavel');
            echo $this->Form->input('departamento');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
