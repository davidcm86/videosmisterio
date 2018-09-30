<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Seo Model
 *
 * @method \App\Model\Entity\Seo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Seo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Seo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Seo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Seo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Seo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Seo findOrCreate($search, callable $callback = null)
 */
class SeoTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('seo');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('keywords_video');

        $validator
            ->allowEmpty('slug_video');

        $validator
            ->integer('posicion_hoy')
            ->allowEmpty('posicion_hoy');

        $validator
            ->integer('posicion_ayer')
            ->allowEmpty('posicion_ayer');

        $validator
            ->dateTime('fecha_hoy')
            ->allowEmpty('fecha_hoy');

        $validator
            ->dateTime('fecha_ayer')
            ->allowEmpty('fecha_ayer');

        return $validator;
    }
}
