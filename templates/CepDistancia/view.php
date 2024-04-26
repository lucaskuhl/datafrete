<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CepDistancium $cepDistancia
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cep Distancium'), ['action' => 'edit', $cepDistancia->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cep Distancium'), ['action' => 'delete', $cepDistancia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cepDistancia->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cep Distancia'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cep Distancium'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cepDistancia view content">
            <h3><?= h($cepDistancia->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cepDistancia->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cep Origem') ?></th>
                    <td><?= $cepDistancia->cep_origem === null ? '' : $this->Number->format($cepDistancia->cep_origem) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cep Destino') ?></th>
                    <td><?= $cepDistancia->cep_destino === null ? '' : $this->Number->format($cepDistancia->cep_destino) ?></td>
                </tr>
                <tr>
                    <th><?= __('Distancia Calculada') ?></th>
                    <td><?= $cepDistancia->distancia_calculada === null ? '' : $this->Number->format($cepDistancia->distancia_calculada) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Criacao') ?></th>
                    <td><?= h($cepDistancia->data_criacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Atualizacao') ?></th>
                    <td><?= h($cepDistancia->data_atualizacao) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
