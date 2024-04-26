<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CepDistancium Entity
 *
 * @property int $id
 * @property int|null $cep_origem
 * @property int|null $cep_destino
 * @property float|null $distancia_calculada
 * @property \Cake\I18n\DateTime $data_criacao
 * @property \Cake\I18n\DateTime|null $data_atualizacao
 */
class CepDistancium extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'cep_origem' => true,
        'cep_destino' => true,
        'distancia_calculada' => true,
        'data_criacao' => true,
        'data_atualizacao' => true,
    ];
}
