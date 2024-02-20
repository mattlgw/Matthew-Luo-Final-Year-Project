<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubcategoriesTransports Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SubCategoriesTable&\Cake\ORM\Association\BelongsTo $SubCategories
 * @property \App\Model\Table\TransportsTable&\Cake\ORM\Association\BelongsTo $Transports
 *
 * @method \App\Model\Entity\SubcategoriesTransport newEmptyEntity()
 * @method \App\Model\Entity\SubcategoriesTransport newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SubcategoriesTransport[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubcategoriesTransport get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubcategoriesTransport findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SubcategoriesTransport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubcategoriesTransport[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubcategoriesTransport|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubcategoriesTransport saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubcategoriesTransport[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubcategoriesTransport[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubcategoriesTransport[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubcategoriesTransport[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SubcategoriesTransportsTable extends Table
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

        $this->setTable('subcategories_transports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SubCategories', [
            'foreignKey' => 'subCategory_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Transports', [
            'foreignKey' => 'transport_id',
            'joinType' => 'INNER',
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
            ->scalar('user_id')
            ->maxLength('user_id', 36)
            ->notEmptyString('user_id');

        $validator
            ->integer('subCategory_id')
            ->notEmptyString('subCategory_id');

        $validator
            ->integer('transport_id')
            ->notEmptyString('transport_id');

        $validator
            ->integer('proximity')
            ->requirePresence('proximity', 'create')
            ->notEmptyString('proximity');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('subCategory_id', 'SubCategories'), ['errorField' => 'subCategory_id']);
        $rules->add($rules->existsIn('transport_id', 'Transports'), ['errorField' => 'transport_id']);

        return $rules;
    }
}
