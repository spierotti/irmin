<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Informe Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $fecha_hora_informe
 * @property string $descripcion
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Image[] $images
 */
class Informe extends Entity
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
        'fecha_hora_informe' => true,
        'descripcion' => true,
        'created' => true,
        'modified' => true,
        'images' => true
    ];
}
