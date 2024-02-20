<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property string $id
 * @property string|null $street_no
 * @property string|null $street_name
 * @property string|null $postcode
 * @property string|null $city
 *
 * @property \App\Model\Entity\SearchRecord[] $search_records
 */
class Address extends Entity
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
        'street_no' => true,
        'street_name' => true,
        'postcode' => true,
        'city' => true,
        'search_records' => true,
    ];
}
