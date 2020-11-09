<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clientes Model
 *
 * @method \App\Model\Entity\Cliente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cliente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cliente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cliente|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientesTable extends Table
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

        $this->setTable('clientes');
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
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('cuit')
            ->maxLength('cuit', 11)
            ->requirePresence('cuit', 'create')
            ->notEmptyString('cuit')
            ->add(
                'cuit', 
                'custom', 
                [
                    'rule' => function ($value, $context) {

                        if (strlen($value) == 11){

                            return $this->validarCUIT($value);
                
                        }else{
                
                            if (strlen($value) <= 8){

                                return $this->validarDni($value);
                
                            }else{
                
                                return false;
                
                            }
                        }
                    },
                    'message' => '¡Este CUIT / DNI no es válido!'
                ]
            );

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('telefono')
            ->maxLength('telefono', 50)
            ->requirePresence('telefono', 'create')
            ->notEmptyString('telefono');

        $validator
            ->scalar('celular')
            ->maxLength('celular', 50)
            ->requirePresence('celular', 'create')
            ->notEmptyString('celular');

        $validator
            ->scalar('domicilio')
            ->maxLength('domicilio', 50)
            ->requirePresence('domicilio', 'create')
            ->notEmptyString('domicilio');

        /*$validator
            ->boolean('borrado')
            ->requirePresence('borrado', 'create')
            ->notEmptyString('borrado');*/

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    private function validarCUIT($cuit)
	{
        $digits = array();
                
		for ($i = 0; $i < strlen($cuit); $i++) {
            if (!ctype_digit($cuit[$i])) return false;
            if ($i < 12) {
                $digits[] = $cuit[$i];
            }
        }
        
		$acum = 0;
		foreach (array(5, 4, 3, 2, 7, 6, 5, 4, 3, 2) as $i => $multiplicador) {
			$acum += $digits[$i] * $multiplicador;
		}
		$cmp = 11 - ($acum % 11);
		if ($cmp == 11) $cmp = 0;
		if ($cmp == 10) $cmp = 9;
		return ($cuit[10] == $cmp);
    }
    
    private function validarDni($dni){

        if (strlen($dni) <= 8 && strlen($dni) >= 7) 
        {
            return true;

        } else {

            return false;
        }
    }
}
