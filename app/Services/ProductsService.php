<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Http;

/**
 * Products service.
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class ProductsService {
	/**
	 * Get products from OpenFoodFacts.
	 *
	 * @param int $page Current page
	 *
	 * @return object
	 *
	 * @author Mike Shatunov <mixasic@yandex.ru>
	 */
	public function getPage(int $page): object {
		$response = Http::get("https://world.openfoodfacts.org/cgi/search.pl?action=process&sort_by=unique_scans
_n&page_size=20&json=1&page=$page");

		return json_decode($response->body());
	}

	/**
	 * Store product in database.
	 *
	 * @param array $data Product data
	 *
	 * @return Product
	 * @author Mike Shatunov <mixasic@yandex.ru>
	 */
	public function store(array $data): Product {
		return Product::updateOrCreate([Product::ATTR_NAME => $data[Product::ATTR_NAME]], [
			Product::ATTR_ID       => $data[Product::ATTR_ID],
			Product::ATTR_NAME     => $data[Product::ATTR_NAME],
			Product::ATTR_IMAGE    => $data[Product::ATTR_IMAGE],
			Product::ATTR_CATEGORY => $data[Product::ATTR_CATEGORY],
		]);
	}
}
