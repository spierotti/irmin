<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $experto_id
 * @property \Cake\I18n\FrozenTime $fecha_solicitud
 * @property \Cake\I18n\FrozenDate $fecha_inicio
 * @property \Cake\I18n\FrozenDate $fecha_fin
 * @property \Cake\I18n\FrozenTime $fecha_evaluacion
 * @property \Cake\I18n\FrozenTime $fecha_cancelacion
 * @property int $estado_id
 * @property string $descripcion
 * @property string $conclusion
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\Image[] $images
 */
class Pedido extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'cliente_id' => true,
        'experto_id' => true,
        'fecha_solicitud' => true,
        'fecha_inicio' => true,
        'fecha_fin' => true,
        'fecha_evaluacion' => true,
        'fecha_cancelacion' => true,
        'motivo_cancelacion' => true,
        'user_cancelacion' => true,
        'estado_id' => true,
        'descripcion' => true,
        'conclusion' => true,
        'created' => true,
        'modified' => true,
        'cliente' => true,
        'user' => true,
        'estado' => true,
        'images' => true
    ];
}
