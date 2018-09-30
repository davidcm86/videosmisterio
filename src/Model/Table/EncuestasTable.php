<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Encuestas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categorias
 *
 * @method \App\Model\Entity\Encuesta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Encuesta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Encuesta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Encuesta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Encuesta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Encuesta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Encuesta findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EncuestasTable extends Table
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

        $this->table('encuestas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
            'joinType' => 'INNER'
        ]);
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
            ->allowEmpty('nombre');

        $validator
            ->allowEmpty('pregunta_principal');

        $validator
            ->allowEmpty('pregunta_radio_0');

        $validator
            ->allowEmpty('pregunta_radio_1');

        $validator
            ->allowEmpty('pregunta_radio_2');

        $validator
            ->allowEmpty('pregunta_radio_3');

        $validator
            ->allowEmpty('resultado_radio_0');

        $validator
            ->allowEmpty('resultado_radio_1');

        $validator
            ->allowEmpty('resultado_radio_2');

        $validator
            ->allowEmpty('resultado_radio_3');

        $validator
            ->boolean('activo')
            ->allowEmpty('activo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));

        return $rules;
    }
}
