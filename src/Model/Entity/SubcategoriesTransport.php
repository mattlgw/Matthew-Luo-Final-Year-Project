<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubcategoriesTransport Entity
 *
 * @property string $id
 * @property string $user_id
 * @property int $subCategory_id
 * @property int $transport_id
 * @property int $proximity
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\SubCategory $sub_category
 * @property \App\Model\Entity\Transport $transport
 */
class SubcategoriesTransport extends Entity
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
        'subCategory_id' => true,
        'transport_id' => true,
        'proximity' => true,
        'user' => true,
        'sub_category' => true,
        'transport' => true,
    ];
}
