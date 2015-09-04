<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Opcao'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="opcao index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('IDopcao') ?></th>
            <th><?= $this->Paginator->sort('IDpergunta') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($opcao as $opcao): ?>
        <tr>
            <td><?= $this->Number->format($opcao->IDopcao) ?></td>
            <td><?= $this->Number->format($opcao->IDpergunta) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $opcao->IDopcao]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $opcao->IDopcao]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $opcao->IDopcao], ['confirm' => __('Are you sure you want to delete # {0}?', $opcao->IDopcao)]) ?>
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
