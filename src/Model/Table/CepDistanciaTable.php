<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CepDistancia Model
 *
 * @method \App\Model\Entity\cepDistancia newEmptyEntity()
 * @method \App\Model\Entity\cepDistancia newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\cepDistancia> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\cepDistancia get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\cepDistancia findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\cepDistancia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\cepDistancia> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\cepDistancia|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\cepDistancia saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\cepDistancia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\cepDistancia>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\cepDistancia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\cepDistancia> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\cepDistancia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\cepDistancia>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\cepDistancia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\cepDistancia> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CepDistanciaTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cep_distancia');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('cep_origem')
            ->maxLength('cep_origem', 8)
            ->allowEmptyString('cep_origem');

        $validator
            ->scalar('cep_destino')
            ->maxLength('cep_destino', 8)
            ->allowEmptyString('cep_destino');

        $validator
            ->numeric('distancia_calculada')
            ->allowEmptyString('distancia_calculada');

        $validator
            ->dateTime('data_criacao')
            ->notEmptyDateTime('data_criacao');

        $validator
            ->dateTime('data_atualizacao')
            ->allowEmptyDateTime('data_atualizacao');

        return $validator;
    }
}
