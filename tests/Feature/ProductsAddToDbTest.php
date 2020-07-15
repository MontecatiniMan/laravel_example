<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

/**
 * Save products to database tests.
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class ProductsAddToDbTest extends TestCase {
	/**
	 * Testing product page.
	 *
	 * @return void
	 */
	public function testProductsPage() {
		$response = $this->get('/');
		$response->assertStatus(200);
		$response->assertSee('Products');
	}

	/**
	 * Checking saved into DB.
	 *
	 * @author Mike Shatunov <mixasic@yandex.ru>
	 */
	public function testSaveToDB() {
		$response = $this->post('/1', [
			Product::ATTR_ID       => '7622210713780',
			Product::ATTR_NAME     => 'Belvita chocolat et céréales complètes',
			Product::ATTR_IMAGE    => 'https://static.openfoodfacts.org/images/products/762/221/071/3780/front_fr.66.400.jpg',
			Product::ATTR_CATEGORY => 'Snacks,Petit-déjeuners,Snacks sucrés,Biscuits et gâteaux,Biscuits,Biscuits au chocolat,Biscuits au chocolat noir',
		]);
		$response->assertStatus(200);
		$response->assertSee('Products');
	}
}
