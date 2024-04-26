<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CepDistanciaTableMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->table("cep_distancia")
            ->addColumn("cep_origem","string", ["limit"=> 8])
            ->addColumn("cep_destino","string", ["limit"=> 8])
            ->addColumn("distancia_calculada","float")
            ->addTimestamps("data_criacao","data_atualizacao")
            ->create();
    }
}
