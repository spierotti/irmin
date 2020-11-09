<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pedidos Model
 *
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\BelongsTo $Clientes
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EstadosTable&\Cake\ORM\Association\BelongsTo $Estados
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\BelongsToMany $Images
 *
 * @method \App\Model\Entity\Pedido get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pedido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pedido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pedido|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedido saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PedidosTable extends Table
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

        $this->setTable('pedidos');

        $this->setDisplayField('id');
        
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'experto_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsToMany('Images', [
            'joinTable' => 'images_pedidos'
        ]);
        $this->belongsTo('UserCancelacion', [
            'propertyName' => 'user_cancelacion',
            'foreignKey' => 'user_cancelacion',
            'joinType' => 'LEFT',
            'className' => 'Users'
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('fecha_solicitud')
            ->requirePresence('fecha_solicitud', 'create')
            ->notEmptyDateTime('fecha_solicitud');

        $validator
            ->date('fecha_inicio', ['dmy'])
            ->requirePresence('fecha_inicio', 'create')
            ->notEmptyDate('fecha_inicio')
            ->notEmptyString('fecha_inicio');
            /*->add('fecha_inicio', 'custom', [
                'rule' => function ($value, $context) {

                    $format = 'ymd';
                    $regex = null;

                    $month = '(0[123456789]|10|11|12)';
                    $separator = '([- /.])';
                    // Don't allow 0000, but 0001-2999 are ok.
                    $fourDigitYear = '(?:(?!0000)[012]\d{3})';
                    $twoDigitYear = '(?:\d{2})';
                    $year = '(?:' . $fourDigitYear . '|' . $twoDigitYear . ')';

                    // 2 or 4 digit leap year sub-pattern
                    $leapYear = '(?:(?:(?:(?!0000)[012]\\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))';
                    // 4 digit leap year sub-pattern
                    $fourDigitLeapYear = '(?:(?:(?:(?!0000)[012]\\d)(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))';
                     
                    $regex['dmy'] = '%^(?:(?:31(\\/|-|\\.|\\x20)(?:0?[13578]|1[02]))\\1|(?:(?:29|30)' .
                    $separator . '(?:0?[1,3-9]|1[0-2])\\2))' . $year . '$|^(?:29' .
                    $separator . '0?2\\3' . $leapYear . ')$|^(?:0?[1-9]|1\\d|2[0-8])' .
                    $separator . '(?:(?:0?[1-9])|(?:1[0-2]))\\4' . $year . '$%';

                    $regex['mdy'] = '%^(?:(?:(?:0?[13578]|1[02])(\\/|-|\\.|\\x20)31)\\1|(?:(?:0?[13-9]|1[0-2])' .
                    $separator . '(?:29|30)\\2))' . $year . '$|^(?:0?2' . $separator . '29\\3' . $leapYear . ')$|^(?:(?:0?[1-9])|(?:1[0-2]))' .
                    $separator . '(?:0?[1-9]|1\\d|2[0-8])\\4' . $year . '$%';

                    $regex['ymd'] = '%^(?:(?:' . $leapYear .
                    $separator . '(?:0?2\\1(?:29)))|(?:' . $year .
                    $separator . '(?:(?:(?:0?[13578]|1[02])\\2(?:31))|(?:(?:0?[1,3-9]|1[0-2])\\2(29|30))|(?:(?:0?[1-9])|(?:1[0-2]))\\2(?:0?[1-9]|1\\d|2[0-8]))))$%';

                    $regex['dMy'] = '/^((31(?!\\ (Feb(ruary)?|Apr(il)?|June?|(Sep(?=\\b|t)t?|Nov)(ember)?)))|((30|29)(?!\\ Feb(ruary)?))|(29(?=\\ Feb(ruary)?\\ ' . $fourDigitLeapYear . '))|(0?[1-9])|1\\d|2[0-8])\\ (Jan(uary)?|Feb(ruary)?|Ma(r(ch)?|y)|Apr(il)?|Ju((ly?)|(ne?))|Aug(ust)?|Oct(ober)?|(Sep(?=\\b|t)t?|Nov|Dec)(ember)?)\\ ' . $fourDigitYear . '$/';

                    $regex['Mdy'] = '/^(?:(((Jan(uary)?|Ma(r(ch)?|y)|Jul(y)?|Aug(ust)?|Oct(ober)?|Dec(ember)?)\\ 31)|((Jan(uary)?|Ma(r(ch)?|y)|Apr(il)?|Ju((ly?)|(ne?))|Aug(ust)?|Oct(ober)?|(Sep)(tember)?|(Nov|Dec)(ember)?)\\ (0?[1-9]|([12]\\d)|30))|(Feb(ruary)?\\ (0?[1-9]|1\\d|2[0-8]|(29(?=,?\\ ' . $fourDigitLeapYear . ')))))\\,?\\ ' . $fourDigitYear . ')$/';

                    $regex['My'] = '%^(Jan(uary)?|Feb(ruary)?|Ma(r(ch)?|y)|Apr(il)?|Ju((ly?)|(ne?))|Aug(ust)?|Oct(ober)?|(Sep(?=\\b|t)t?|Nov|Dec)(ember)?)' .
                    $separator . $fourDigitYear . '$%';

                    $regex['my'] = '%^(' . $month . $separator . $year . ')$%';
                    $regex['ym'] = '%^(' . $year . $separator . $month . ')$%';
                    $regex['y'] = '%^(' . $fourDigitYear . ')$%';

                    $format = is_array($format) ? array_values($format) : [$format];
                    foreach ($format as $key) {
                        if (static::_check($check, $regex[$key]) === true) {
                            return true;
                        }
                    }

                    return false;
                }
            ])*;*/

        $validator
            ->date('fecha_fin')
            ->requirePresence('fecha_fin', 'create')
            ->notEmptyDate('fecha_fin')
            ->notEmptyString('fecha_fin');

        $validator
            ->requirePresence('cliente', 'create');

        /*$validator
            ->dateTime('fecha_evaluacion')
            ->requirePresence('fecha_evaluacion', 'create')
            ->notEmptyDateTime('fecha_evaluacion');*/

        /*$validator
            ->dateTime('fecha_cancelacion')
            ->requirePresence('fecha_cancelacion', 'create')
            ->notEmptyDateTime('fecha_cancelacion');*/

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 255)
            ->requirePresence('descripcion', 'create')
            ->notEmptyString('descripcion');

        /*$validator
            ->scalar('conclusion')
            ->maxLength('conclusion', 255)
            ->requirePresence('conclusion', 'create')
            ->notEmptyString('conclusion');*/

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
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));
        $rules->add($rules->existsIn(['experto_id'], 'Users'));
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));

        return $rules;
    }
}
