<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CepDistancium> $cepDistancia
 */
?>
<div class="cepDistancia index content">
    <?= $this->Html->link(__('New Cep Distancium'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cep Distancia') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cep_origem') ?></th>
                    <th><?= $this->Paginator->sort('cep_destino') ?></th>
                    <th><?= $this->Paginator->sort('distancia_calculada') ?></th>
                    <th><?= $this->Paginator->sort('data_criacao') ?></th>
                    <th><?= $this->Paginator->sort('data_atualizacao') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cepDistancia as $cepDist): ?>
                <tr>
                    <td><?= $this->Number->format($cepDist->id) ?></td>
                    <td><?= $cepDist->cep_origem === null ? '' : $cepDist->cep_origem ?></td>
                    <td><?= $cepDist->cep_destino === null ? '' : $cepDist->cep_destino ?></td>
                    <td><?= $cepDist->distancia_calculada === null ? '' : $cepDist->distancia_calculada ?></td>
                    <td><?= h($cepDist->data_criacao) ?></td>
                    <td><?= $cepDist->data_atualizacao === null ? '--' : h($cepDist->data_atualizacao) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cepDist->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cepDist->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cepDist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cepDist->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
