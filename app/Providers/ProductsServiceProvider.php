<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\ProductsService;
use Illuminate\Support\ServiceProvider;

/**
 * ProductsService provider
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class ProductsServiceProvider extends ServiceProvider {
	/**
	 * Register services.
	 *
	 * @return void
	 *
	 * @author Mike Shatunov <mixasic@yandex.ru>
	 */
	public function register() {
		$this->app->bind(ProductsService::class);
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}
}
