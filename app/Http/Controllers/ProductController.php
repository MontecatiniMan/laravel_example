<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductsService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Main controller.
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class ProductController extends Controller {
	/**
	 * Getting products/items from OpenFoodFacts.
	 *
	 * @param ProductsService $productsService Products service
	 * @param int             $page 		   Current page
	 *
	 * @return View|Factory
	 *
	 * @author Mike Shatunov <mixasic@yandex.ru>
	 */
	public function index(ProductsService $productsService, int $page = 1) {
		$products = $productsService->getPage($page);

		return view('products', ['products' => $products, 'page' => $page]);
	}

	/**
	 * Store product to database.
	 *
	 * @param ProductsService $productsService Product service
	 * @param Request         $request		   Request with product data
	 * @param int             $page            Current page
	 *
	 * @return Factory|View
	 *
	 * @author Mike Shatunov <mixasic@yandex.ru>
	 */
	public function store(ProductsService $productsService, Request $request, int $page = 1) {
		$data = [
			Product::ATTR_ID       => $request->input(Product::ATTR_ID),
			Product::ATTR_NAME     => $request->input(Product::ATTR_NAME),
			Product::ATTR_IMAGE    => $request->input(Product::ATTR_IMAGE),
			Product::ATTR_CATEGORY => $request->input(Product::ATTR_CATEGORY),
		];
		$productsService->store($data);
		$products = $productsService->getPage($page);

		return view('products', ['products' => $products, 'page' => $page]);
	}
}
