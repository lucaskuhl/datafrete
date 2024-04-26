<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\cepDistancia $cepDistancia
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Editar Cep'), ['action' => 'edit', $cepDistancia->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Remover Cep'), ['action' => 'delete', $cepDistancia->id], ['confirm' => __('Tem certeza que deseja remover o cep # {0}?', $cepDistancia->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('Listar Ceps'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('Cadastrar Cep'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="cepDistancia view large-9 medium-8 columns content">
    <h3>Cep id: <?= h($cepDistancia->id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Cep Origem') ?></th>
                <td><?= h($cepDistancia->cep_origem) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Cep Destino') ?></th>
                <td><?= h($cepDistancia->cep_destino) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Distância Calculada') ?></th>
                <td><?= $cepDistancia->distancia_calculada === null ? '' : $this->Number->format($cepDistancia->distancia_calculada) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Data Criação') ?></th>
                <td><?= h($cepDistancia->data_criacao) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Data Atualização') ?></th>
                <td><?= h($cepDistancia->data_atualizacao) ?></td>
            </tr>
        </table>
    </div>
</div>