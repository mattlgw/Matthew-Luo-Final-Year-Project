<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContentImages Model
 *
 * @method \App\Model\Entity\ContentImage newEmptyEntity()
 * @method \App\Model\Entity\ContentImage newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ContentImage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContentImage get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContentImage findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ContentImage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContentImage[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContentImage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentImage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentImage[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContentImage[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContentImage[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContentImage[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContentImagesTable extends Table
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

        $this->setTable('content_images');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('parent')
            ->maxLength('parent', 128)
            ->requirePresence('parent', 'create')
            ->notEmptyString('parent');

        $validator
            ->scalar('hint')
            ->maxLength('hint', 128)
            ->requirePresence('hint', 'create')
            ->notEmptyString('hint');

        $validator
            ->scalar('image_file')
            ->maxLength('image_file', 128)
            ->allowEmptyFile('image_file');

        $validator
            ->scalar('previous_value')
            ->allowEmptyString('previous_value');

        return $validator;
    }
}
