<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Escolha'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="escolha index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('IDescolha') ?></th>
            <th><?= $this->Paginator->sort('IDfuncionario') ?></th>
            <th><?= $this->Paginator->sort('IDopcao') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($escolha as $escolha): ?>
        <tr>
            <td><?= $this->Number->format($escolha->IDescolha) ?></td>
            <td><?= $this->Number->format($escolha->IDfuncionario) ?></td>
            <td><?= $this->Number->format($escolha->IDopcao) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $escolha->IDescolha]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $escolha->IDescolha]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $escolha->IDescolha], ['confirm' => __('Are you sure you want to delete # {0}?', $escolha->IDescolha)]) ?>
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
