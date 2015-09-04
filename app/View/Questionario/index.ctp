<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Questionario'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="questionario index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('IDquestionario') ?></th>
            <th><?= $this->Paginator->sort('IDfuncionario') ?></th>
            <th><?= $this->Paginator->sort('titulo') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($questionario as $questionario): ?>
        <tr>
            <td><?= $this->Number->format($questionario->IDquestionario) ?></td>
            <td><?= $this->Number->format($questionario->IDfuncionario) ?></td>
            <td><?= h($questionario->titulo) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $questionario->IDquestionario]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionario->IDquestionario]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionario->IDquestionario], ['confirm' => __('Are you sure you want to delete # {0}?', $questionario->IDquestionario)]) ?>
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
