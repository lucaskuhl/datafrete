<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\cepDistancia[]|\Cake\Collection\CollectionInterface $cepDistancia
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Cadastrar Cep'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('cep_origem') ?></th>
        <th scope="col"><?= $this->Paginator->sort('cep_destino') ?></th>
        <th scope="col"><?= $this->Paginator->sort('Distância Calculada') ?></th>
        <th scope="col"><?= $this->Paginator->sort('Data de Criação') ?></th>
        <th scope="col"><?= $this->Paginator->sort('Data de Atualização') ?></th>
        <th scope="col" class="actions"><?= __('Ações') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($cepDistancia as $cepDist) : ?>
        <tr>
            <td><?= $this->Number->format($cepDist->id) ?></td>
            <td><?= h($cepDist->cep_origem) ?></td>
            <td><?= h($cepDist->cep_destino) ?></td>
            <td><?= $cepDist->distancia_calculada === null ? '' : $this->Number->format($cepDist->distancia_calculada) ?></td>
            <td><?= h($cepDist->data_criacao) ?></td>
            <td><?= h($cepDist->data_atualizacao) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $cepDist->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $cepDist->id], ['title' => __('Edit'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Form->postLink(__('Remover'), ['action' => 'delete', $cepDist->id], ['confirm' => __('Tem certeza que deseja remover o cep # {0}?', $cepDist->id), 'title' => __('Delete'), 'class' => 'btn btn-danger']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('«', ['label' => __('Primeiro')]) ?>
        <?= $this->Paginator->prev('‹', ['label' => __('Anterior')]) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('›', ['label' => __('Próximo')]) ?>
        <?= $this->Paginator->last('»', ['label' => __('Último')]) ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total(is)')) ?></p>
</div>
