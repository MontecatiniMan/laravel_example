<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Product/item model.
 *
 * @property int    $id          ID
 * @property string $image       Image URL
 * @property string $name        Name
 * @property string $category    Category
 * @property int    $created_at  Created timestamp
 * @property int    $updated_at  Updated timestamp
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class Product extends Model {
	const ATTR_ID         = 'id';
	const ATTR_IMAGE      = 'image';
	const ATTR_NAME       = 'name';
	const ATTR_CATEGORY   = 'category';
	const ATTR_CREATED_AT = 'created_at';
	const ATTR_UPDATED_AT = 'updated_at';

	/**
	 * @var string $primaryKey Primary key
	 */
	protected $primaryKey = "name";

	/**
	 * @var array Fillable attributes
	 */
	protected $fillable = ['id', 'name', 'image', 'category'];
}
