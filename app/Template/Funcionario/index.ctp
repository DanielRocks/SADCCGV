<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Funcionario'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="funcionario index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('IDfuncionario') ?></th>
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th><?= $this->Paginator->sort('login') ?></th>
            <th><?= $this->Paginator->sort('senha') ?></th>
            <th><?= $this->Paginator->sort('responsavel') ?></th>
            <th><?= $this->Paginator->sort('departamento') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($funcionario as $funcionario): ?>
        <tr>
            <td><?= $this->Number->format($funcionario->IDfuncionario) ?></td>
            <td><?= h($funcionario->nome) ?></td>
            <td><?= h($funcionario->login) ?></td>
            <td><?= h($funcionario->senha) ?></td>
            <td><?= $this->Number->format($funcionario->responsavel) ?></td>
            <td><?= h($funcionario->departamento) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $funcionario->IDfuncionario]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $funcionario->IDfuncionario]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $funcionario->IDfuncionario], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->IDfuncionario)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
