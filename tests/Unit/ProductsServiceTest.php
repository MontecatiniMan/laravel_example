<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Services\ProductsService;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use PHPUnit\Framework\TestCase;

/**
 * Products service test.
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class ProductsServiceTest extends TestCase {
	/**
	 *
	 * @var ProductsService
	 */
	protected $productService;

	/**
	 * Setup.
	 *
	 * @author Mike Shatunov <mixasic@yandex.ru>
	 */
	public function setup(): void {
		$app = new Container();
		$app->singleton('app', 'Illuminate\Container\Container');

		/**
		 * Set $app as FacadeApplication handler
		 */
		Facade::setFacadeApplication($app);
		$this->productService = new ProductsService;
	}
	/**
	 * Check correct answer from OpenFoodFacts.
	 *
	 * @return void
	 */
	public function testProductsExists() {
		$response = $this->productService->getPage(1);
		$this->assertTrue($response->count > 0);
	}
}
