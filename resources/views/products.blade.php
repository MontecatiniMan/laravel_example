<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Products</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
				<h1>Products</h1>
				@if ($errors->any())
					<ul>
						@foreach($errors->all() as $error)
							<li style="color: red">
								{{ $error }}
							</li>
						@endforeach
					</ul>
				@endif
				<table class="table table-hover">
					<th>ID</th>
					<th>Image</th>
					<th>Name</th>
					<th>Category</th>
					<th>Actions</th>
					@foreach($products->products as $product)
						<tr>
							<td>{{ $product->id ?? null}}</td>
							<td class="text-center">
								@if (property_exists($product, 'image_url'))
									<img src="{{ $product->image_url }}" alt="{{ $product->product_name }}" style="max-width: 120px; max-height: 60px">
								@endif

							</td>
							<td>{{ $product->product_name }}</td>
							<td>{{ $product->categories }}</td>
							<td>
{{--								There are some products without ID. Using product_name instead--}}
								<form action="{{ route('store', ['product_name' => $product->product_name, 'page' => $page]) }}" method="post">
									@csrf
									<input type="hidden" name="{{ \App\Models\Product::ATTR_ID }}" value="{{ $product->id ?? null }}" />
									<input type="hidden" name="{{ \App\Models\Product::ATTR_NAME }}" value="{{ $product->product_name }}" />
									@if (property_exists($product, 'image_url'))
										<input type="hidden" name="{{ \App\Models\Product::ATTR_IMAGE }}" value="{{ $product->image_url }}" />
									@endif
									<input type="hidden" name="{{ \App\Models\Product::ATTR_CATEGORY }}" value="{{ $product->categories }}" />
									<button type="submit" class="btn btn-success">Save to DB</button>
								</form>
							</td>
						</tr>
					@endforeach
				</table>
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item {{ $page === 1 ? 'disabled' : ''  }}"><a class="page-link" href="{{ route('products', ['page' => ($page > 1 ? $page - 1 : '')]) }}">Previous 20</a></li>
						<li class="page-item"><a class="page-link" href="{{ route('products', ['page' => ($page + 1)]) }}">Next 20</a></li>
					</ul>
				</nav>
            </div>
        </div>
    </body>
</html>
