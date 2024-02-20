<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transports Model
 *
 * @property \App\Model\Table\CategoryTransportsTable&\Cake\ORM\Association\HasMany $CategoryTransports
 *
 * @method \App\Model\Entity\Transport newEmptyEntity()
 * @method \App\Model\Entity\Transport newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Transport[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transport get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transport findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Transport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transport[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transport|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transport saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transport[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transport[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transport[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transport[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TransportsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('transports');
        $this->setDisplayField('mode');
        $this->setPrimaryKey('id');

        $this->hasMany('CategoryTransports', [
            'foreignKey' => 'transport_id',
        ]);
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
            ->scalar('mode')
            ->maxLength('mode', 255)
            ->allowEmptyString('mode');

        return $validator;
    }
}
