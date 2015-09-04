<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Funcionario'), ['action' => 'edit', $funcionario->IDfuncionario]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Funcionario'), ['action' => 'delete', $funcionario->IDfuncionario], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->IDfuncionario)]) ?> </li>
        <li><?= $this->Html->link(__('List Funcionario'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="funcionario view large-10 medium-9 columns">
    <h2><?= h($funcionario->IDfuncionario) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nome') ?></h6>
            <p><?= h($funcionario->nome) ?></p>
            <h6 class="subheader"><?= __('Login') ?></h6>
            <p><?= h($funcionario->login) ?></p>
            <h6 class="subheader"><?= __('Senha') ?></h6>
            <p><?= h($funcionario->senha) ?></p>
            <h6 class="subheader"><?= __('Departamento') ?></h6>
            <p><?= h($funcionario->departamento) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('IDfuncionario') ?></h6>
            <p><?= $this->Number->format($funcionario->IDfuncionario) ?></p>
            <h6 class="subheader"><?= __('Responsavel') ?></h6>
            <p><?= $this->Number->format($funcionario->responsavel) ?></p>
        </div>
    </div>
</div>
