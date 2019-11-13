<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role
 * @property string $email
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class User extends Entity
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
        'username' => true,
        'viejo_password' => true,
        'password' => true,
        'nuevo_password' => true,
        'repetir_nuevo_password' => true,
        'role_id' => true,
        'email' => true,
        'passkey' => true,
        'timeout' => true,
        'created' => true,
        'modified' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'//,
        //'nuevo_password',
        //'repetir_nuevo_password'
    ];

    protected function _setPassword($password){
        if(strlen($password) > 0) {
            return(new DefaultPasswordHasher)->hash($password);
        }
    }

}
