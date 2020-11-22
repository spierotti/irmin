<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;                                                                                                   

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles');

        $this->belongsTo('Clientes');
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
            ->scalar('username')
            ->maxLength('username', 50)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->nonNegativeInteger('role_id')
            ->requirePresence('role_id', 'create')
            ->notEmptyString('role_id');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        return $validator;
    }

    /**
     * CHANGE PASSWORD VALIDATION RULES
     * 
     * @param 
     * @return 
     */
    public function validationPassword(Validator $validator)
    {
        $validator
            ->add('viejo_password','custom',[  
                'rule'=>  function($value, $context){ 
                    $user = $this->get($context['data']['id']);
                    //debug($user) ;
                    if ($user) {  
                        if ((new DefaultPasswordHasher)->check($value, $user->password)) { 
                            return true;  
                        }  
                    }  
                    return false;  
                },  
                'message'=>'¡La contraseña no es la correcta!', 
            ])  
            ->notEmpty('viejo_password');

        $validator
            ->notSameAs('nuevo_password', 'viejo_password', '¡La nueva contraseña debe ser diferente a la anterior!')
            ->scalar('nuevo_password')
            ->minLength('nuevo_password', 6)
            ->maxLength('nuevo_password', 255)
            ->requirePresence('nuevo_password', 'false')
            ->notEmptyString('nuevo_password');

        $validator
            ->sameAs('repetir_nuevo_password', 'nuevo_password', '¡La nueva contraseña no coincide!');

        return $validator;
    }    

    /**
     *  FORGOT PASSWORD VALIDATION RULES
     */
    public function validationReset(Validator $validator)
    {

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'update')
            ->notEmptyString('password');

        $validator
            ->sameAs('repetir_nuevo_password', 'password', '¡La nueva contraseña no coincide!');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    public function findRole(\Cake\ORM\Query $query, array $options)
    {
        $query->contain(['Roles','Clientes']);

        return $query;
    }
}
