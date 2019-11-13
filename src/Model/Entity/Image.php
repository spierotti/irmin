<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 *
 * @property \Cake\I18n\FrozenTime $fecha_hora_imagen
 * @property string $photo
 * @property string $photo_dir
 * @property bool $hay_actividad
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Image extends Entity
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
        'fecha_hora_imagen' => true,
        'photo' => true,
        'photo_dir' => true,
        'hay_actividad' => true,
        'created' => true,
        'modified' => true
    ];
}
