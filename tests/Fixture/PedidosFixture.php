<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PedidosFixture
 */
class PedidosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'cliente_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'experto_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fecha_solicitud' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fecha_inicio' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fecha_fin' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fecha_evaluacion' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fecha_cancelacion' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'estado_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'descripcion' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'conclusion' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'estado_id' => ['type' => 'index', 'columns' => ['estado_id'], 'length' => []],
            'cliente_id' => ['type' => 'index', 'columns' => ['cliente_id'], 'length' => []],
            'experto_id' => ['type' => 'index', 'columns' => ['experto_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'clientes_pedido_fk' => ['type' => 'foreign', 'columns' => ['cliente_id'], 'references' => ['clientes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'estados_pedido_fk' => ['type' => 'foreign', 'columns' => ['estado_id'], 'references' => ['estados', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'usuarios_pedido_fk' => ['type' => 'foreign', 'columns' => ['experto_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'cliente_id' => 1,
                'experto_id' => 1,
                'fecha_solicitud' => '2019-10-10 09:58:33',
                'fecha_inicio' => '2019-10-10',
                'fecha_fin' => '2019-10-10',
                'fecha_evaluacion' => '2019-10-10 09:58:33',
                'fecha_cancelacion' => '2019-10-10 09:58:33',
                'estado_id' => 1,
                'descripcion' => 'Lorem ipsum dolor sit amet',
                'conclusion' => 'Lorem ipsum dolor sit amet',
                'created' => '2019-10-10 09:58:33',
                'modified' => '2019-10-10 09:58:33'
            ],
        ];
        parent::init();
    }
}
