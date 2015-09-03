<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Relatorio'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="relatorio index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('IDrelatorio') ?></th>
            <th><?= $this->Paginator->sort('IDfuncionario') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($relatorio as $relatorio): ?>
        <tr>
            <td><?= $this->Number->format($relatorio->IDrelatorio) ?></td>
            <td><?= $this->Number->format($relatorio->IDfuncionario) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $relatorio->IDrelatorio]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $relatorio->IDrelatorio]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $relatorio->IDrelatorio], ['confirm' => __('Are you sure you want to delete # {0}?', $relatorio->IDrelatorio)]) ?>
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
