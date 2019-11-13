<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property string $razon_social
 * @property string $cuit
 * @property string $email
 * @property string $telefono
 * @property string $celular
 * @property string $domicilio
 * @property bool $borrado
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Cliente extends Entity
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
        'razon_social' => true,
        'cuit' => true,
        'email' => true,
        'telefono' => true,
        'celular' => true,
        'domicilio' => true,
        'borrado' => true,
        'created' => true,
        'modified' => true
    ];
}
