<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SearchRecord Entity
 *
 * @property string $id
 * @property string $user_id
 * @property string $address_id
 * @property int $score
 * @property \Cake\I18n\FrozenTime $searched
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Address $address
 */
class SearchRecord extends Entity
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
        'user_id' => true,
        'address_id' => true,
        'user' => true,
        'address' => true,
        'score' => true,
        'searched' => true,
    ];
}
