<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 *
	 * @author Mike Shatunov <mixasic@yandex.ru>
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->string('id')->nullable();
			$table->string('image')->nullable();
			$table->string('name');
			$table->string('category')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('products');
	}
}
