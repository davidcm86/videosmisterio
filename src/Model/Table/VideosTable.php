<?php
namespace App\Model\Table;
//namespace App\Model\Behavior;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
//use Cake\ORM\Behavior;

/**
 * Videos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Categorias
 *
 * @method \App\Model\Entity\Video get($primaryKey, $options = [])
 * @method \App\Model\Entity\Video newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Video[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Video|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Video patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Video[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Video findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VideosTable extends Table
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
        //$this->addBehavior('Sitemap');
        $this->table('videos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->notEmpty('titulo')
            ->add('titulo', [
                'minLength' => [
                    'rule' => ['minLength', 5],
                    'last' => true,
                    'message' => 'El título del video necesita al menos 5 caracteres.'
                    ],
                'maxLength' => [
                    'rule' => ['maxLength', 80],
                    'message' => 'El título del video no debe exceder más de 80 caracteres.'
                    ],
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Ya existe un título con ese nombre. Puedes ser más específico o añadir alguna distinción.'
                ]
            ]);

        $validator
            ->allowEmpty('slug_titulo');

        $validator
            ->notEmpty('enlace')
            ->add('enlace', [
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Ya existe un enlace igual. Prueba con otro enlace de otro video.'
                ],
                'custom' => [
                    'rule' => [$this, "validarEnlace"],
                    'message' => 'El enlace no es correcto. Asegúrese de haberlo copiado bien.',
                ]
            ]);

        $validator
            ->notEmpty('descripcion')
            ->add('descripcion', [
                'minLength' => [
                    'rule' => ['minLength', 200],
                    'last' => true,
                    'message' => 'La descripción debe tener al menos 100 caracteres. Procura repetir las palabras del título en la descripción.'
                    ],
                'maxLength' => [
                    'rule' => ['maxLength', 5000],
                    'message' => 'La descripción no debe tener más de 1000 caracteres.'
                    ],
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Ya existe un título con ese nombre. Puedes ser más específico o añadir alguna distinción.'
                ]
            ]);
        $validator
            ->integer('publicado')
            ->allowEmpty('publicado');

        $validator
            ->integer('verde')
            ->allowEmpty('verde');

        $validator
            ->integer('naranja')
            ->allowEmpty('naranja');

        $validator
            ->integer('rojo')
            ->allowEmpty('rojo');

        $validator
            ->integer('total_votos')
            ->allowEmpty('total_votos');

        $validator
            ->allowEmpty('keywords');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));

        return $rules;
    }

    /* Validar enlace de youtube */
	public function validarEnlace($value, $context){
		//Enlace completo es quíen tiene toda la ruta, y no solo enlace que esa nos sive para validar si ya existe o no.
        if (strpos($context['data']['enlace_completo'], 'youtu')) {		
		    $enlaceInsertar = explode('/', $context['data']['enlace_completo']);
            if (isset($enlaceInsertar[3])) {
                $tamanio = strlen($enlaceInsertar[3]);
            } else {
                return false;
            }
            if(!empty($enlaceInsertar[3]) && $tamanio < 28){
                //Esto significa que nos llega una url del tipo: http://youtu.be/WdmBAlIBdv8
                return true;
            }else{
                //Nos llega una url del tipo: http://www.youtube.com/watch?v=BVZ2u8xQ_nM&feature=share 
                $enlaceInsertar1 = explode('=', $context['data']['enlace_completo']);
                $enlaceInsertar2 = explode('&', $enlaceInsertar1[1]);							
                if (!empty($enlaceInsertar2)) {
                    return true;
                } else {				
                    //Cualquier otro texto nos da fallo,por lo que devolvemos vacio
                    return false;
                }
            }
        } else {
            return false;
        }
	}
}
