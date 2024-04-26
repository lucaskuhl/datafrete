<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CepDistanciaFixture
 */
class CepDistanciaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'cep_distancia';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'cep_origem' => 'Lorem ',
                'cep_destino' => 'Lorem ',
                'distancia_calculada' => 1,
                'data_criacao' => 1714153658,
                'data_atualizacao' => 1714153658,
            ],
        ];
        parent::init();
    }
}
