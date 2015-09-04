<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Perguntum'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="pergunta index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('IDpergunta') ?></th>
            <th><?= $this->Paginator->sort('IDquestionario') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pergunta as $perguntum): ?>
        <tr>
            <td><?= $this->Number->format($perguntum->IDpergunta) ?></td>
            <td><?= $this->Number->format($perguntum->IDquestionario) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $perguntum->IDpergunta]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $perguntum->IDpergunta]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $perguntum->IDpergunta], ['confirm' => __('Are you sure you want to delete # {0}?', $perguntum->IDpergunta)]) ?>
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
