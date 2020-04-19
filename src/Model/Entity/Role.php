<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $descripcion
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User[] $users
 */
class Role extends Entity
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
        'name' => true,
        'descripcion' => true,
        'created' => true,
        'modified' => true,
        'users' => true,
        'ver_pedidos' => true,
        'nuevo_pedido' => true,
        'modificar_pedido' => true,
        'eliminar_pedido' => true,
        'evaluar_pedido' => true,
        'ver_clientes' => true,
        'nuevo_cliente' => true,
        'modificar_cliente' => true,
        'eliminar_cliente' => true,
        'ver_imagenes' => true,
        'nueva_imagen' => true,
        'modificar_imagen' => true,
        'eliminar_imagen' => true,
        'ver_roles' => true,
        'nueva_rol' => true,
        'modificar_rol' => true,
        'eliminar_rol' => true,
        'ver_usuarios' => true,
        'nueva_usuario' => true,
        'modificar_usuario' => true,
        'eliminar_usuario' => true,
        'ver_informes' => true
    ];
}
