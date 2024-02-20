<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $nonce
 * @property \Cake\I18n\FrozenTime|null $nonce_expiry
 *
 * @property \App\Model\Entity\SearchRecord[] $search_records
 * @property \App\Model\Entity\SubcategoriesTransport[] $subcategories_transports
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
     * @var array<string, bool>
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'password' => true,
        'role' => true,
        'created' => true,
        'modified' => true,
        'nonce' => true,
        'nonce_expiry' => true,
        'search_records' => true,
        'subcategories_transports' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    //Authentication
    protected function _getUserFullDisplay(): string {
        return $this->first_name . ' ' . $this->last_name . ' (' . $this->email . ')';
    }

    /**
     * Hashing password for User entity
     * @param string $password Password field
     * @return string|null hashed password
     */
    protected function _setPassword(string $password): ?string {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return $password;
    }
}
