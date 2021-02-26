<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">

<div class="col-lg-12 col-xs-12">
	<h3>Products</h3>
	<table class="table table-bordered" id="products-table">
		<thead>
			<tr>
				<th>ID Product</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th></th>
			</tr>
		</thead>

		<tbody>

		<?php
				foreach($allProducts as $product){
				?>
					<tr data-id="<?php echo $product['id_product'] ?>" class="product-row">
						<td class="product-id"><?php echo $product['id_product'] ?></td>
						<td class="product-name"><?php echo $product['name'] ?></td>
						<td class="product-desc"><?php echo $product['desc'] ?></td>
						<td class="product-price"><?php echo $product['price'] ?></td>

						<td>
							<a class="view-product btn btn-sm btn-primary" data-id="<?php echo $product['id_product'] ?>">View</a> -
							<a class="edit-product btn btn-sm btn-secondary" data-id="<?php echo $product['id_product'] ?>">Edit</a> -
							<a class="delete-product btn btn-sm btn-danger" data-id="<?php echo $product['id_product'] ?>">Delete</a>
						</td>

					</tr>
				<?php
				}

			?>
		</tbody>
	</table>
</div>

<div class="col-lg-12 col-xs-12">
	<h3>Orders</h3>
	<table class="table table-bordered" id="order-table">
		<thead>
			<tr>
				<th>ID Order</th>
				<th>Customer</th>
				<th>Total</th>
				<th>Date created</th>
				<th></th>
			</tr>
		</thead>

		<tbody>

		<?php
				foreach($allOrders as $order){
				?>
					<tr data-id="<?php echo $order['id_order'] ?>" class="order-row">
						<td class="order-id"><?php echo $order['id_order'] ?></td>
						<td class="order-custname"><?php echo $order['firstname']  . ' ' . $order['lastname'] ?></td>
						<td class="order-total"><?php echo $order['total_paid'] ?></td>
						<td class="order-date"><?php echo $order['created_at'] ?></td>

						<td>
							<a class="view-order btn btn-sm btn-primary" data-id="<?php echo $order['id_order'] ?>">View</a>

						</td>

					</tr>
				<?php
				}

			?>
		</tbody>
	</table>
</div>




<div class="col-lg-12 col-xs-12">
	<h3>Customers</h3>
	<table class="table table-bordered" id="customer-table">
		<thead>
			<tr>
				<th>ID Customer</th>
				<th>Customer</th>
				<th>Total</th>
				<th>Date created</th>
				<th></th>
			</tr>
		</thead>

		<tbody>

		<?php
				foreach($allCustomer as $customer){
				?>
					<tr data-id="<?php echo $customer['id_customer'] ?>" class="customer-row">
						<td class="customer-id"><?php echo $customer['id_customer'] ?></td>
						<td class="customer-fname"><?php echo $customer['firstname'] ?></td>
						<td class="customer-lname"><?php echo $customer['lastname'] ?></td>
						<td class="customer-addr"><?php echo $customer['address'] ?></td>

						<td>
							<a class="view-customer btn btn-sm btn-primary" data-id="<?php echo $customer['id_customer'] ?>">View</a>
						</td>

					</tr>
				<?php
				}

			?>
		</tbody>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-title">Product <span id="product-id-modal"></span></h5>
				<button type="button" class="close-modal btn btn-default" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="col-lg-12">
					<div id="cart-alert"></div>
					<div class="row">
						<div class="col-lg-4">
							<div class="col-lg-12 form-group">
								<div class="col-lg-12 form-group">
									<label for="select-customer">Product Name: </label>
									<input type="text" id="product-name" class="form-control">

								</div>
							</div>
							<br>
							<div class="col-lg-12 form-group">
								<label for="select-product">Description: </label>
								<input type="text" id="product-desc" class="form-control">
							</div>
							<br>
							<div class="col-lg-12 form-group">
								<label for="quantity">Price: </label>
								<input id="product-price" type="number" class="form-control" min="0" value="0">
							</div>

							<br>

						</div>
					</div>

				</div>

			</div>
			<div class="modal-footer">
				<a class="btn btn-primary" id="save-product">Update order</a>
			</div>
		</div>
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-title">View</h5>
				<button type="button" class="close-modal btn btn-default" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="col-lg-12">
					<div id="cart-alert"></div>
					<div class="row">
						<div class="col-lg-12 view-modal-body">


						</div>
					</div>

				</div>

			</div>

		</div>
	</div>
</div>



<script>

$(document).ready(function() {
    var dayChartE = document.getElementById('dayChart');
    var monthChartE = document.getElementById('monthChart');
    var yearChartE = document.getElementById('yearChart');

	$(document).on('click', '.close-modal', function(e) {
		$('#view-modal').modal('hide');
		$('#product-modal').modal('hide');
	});

	$(document).on('click', '.create-product', function(e) {
		$('#product-modal').modal('show');
		$('#save-product').html('Save product');
		$('#save-product').attr('mode','save');

		clearProductModal();
	});

	$(document).on('click', '.view-product', function(e) {
		var id = $(this).attr('data-id');
		loadView(id,'getProductView');
	});
	$(document).on('click', '.view-order', function(e) {
		var id = $(this).attr('data-id');
		loadView(id,'getOrderView');
	});
	$(document).on('click', '.view-customer', function(e) {
		var id = $(this).attr('data-id');
		loadView(id,'getCustomerView');
	});

	function loadView(id, url){
		var request = $.ajax({
			url: url,
			type: 'POST',
			data: {
				id: id,
			},
			dataType: "json"
		});
		request.done(function(response) {

			var view = response.view;
			var modalContent = '';
			$.each(view, function(index, value) {
				modalContent += '\
				<div class="col-lg-12">\
					<span class="font-weight-bold">' + index + ': </span>\
					<span >' + value + '</span>\
				</div>\
				<br>\
				';
			});

			if (typeof response.viewOrderDetail !== 'undefined') {
				modalContent += '<table class="table">\
					<thead>\
						<tr>\
						<th>Product</th>\
						<th>Quantity</th>\
						<th>Unit Price</th>\
						<th>Total Price</th>\
						</tr>\
					</thead>\
					<tbody>';

				$.each(response.viewOrderDetail, function(index, value) {
					modalContent += '<tr>\
							<td>' + value.product_name + '</td>\
							<td>' + value.quantity + '</td>\
							<td>' + value.unit_price + '</td>\
							<td>' + value.total_price + '</td>\
						</tr>';
				});

				modalContent += '</tbody>\
				</table>';

			}
			$('.view-modal-body').html(modalContent);

			$('#view-modal').modal('show');
		});
	}

	$(document).on('click', '.edit-product', function(e) {

		$('#save-product').html('Update product');
		$('#save-product').attr('mode','update');
		var id = $(this).attr('data-id');
		$('#product-id-modal').html(id);
		var request = $.ajax({
			url: 'loadEditProduct',
			type: 'POST',
			data: {
				id: id,
			},
			dataType: "json"
		});
		request.done(function(response) {
			var modalSelector = '#product-modal';
			var product = response.product;
			// var orderDetail = response.orderDetail;
			// $(modalSelector + ' #cart-table tbody').html('');
			console.log(response);
			// $.each(orderDetail, function(index, value) {
			// 	var cartTableRow = '\
			// 	<tr class="cart-products" data-id="'+value.id_product+'">\
			// 		<td>'+value.product_name+'</td>\
			// 		<td class="quantity" data-val="'+value.quantity+'">'+value.quantity+'</td>\
			// 		<td class="dataPrice" data-val="'+value.unit_price+'">'+value.unit_price+'</td>\
			// 		<td class="subPrice" data-val="'+value.total_price+'">'+value.total_price+'</td>\
			// 		<td><a class="remove-product-to-cart" data-id="'+value.id_product+'">Remove</a></td>\
			// 	</tr>\
			// 	';
			// 	$(modalSelector + ' #cart-table tbody').append(cartTableRow);
			// });





			$(modalSelector + ' #product-name').val(product.name);
			$(modalSelector + ' #product-desc').val(product.desc);
			$(modalSelector + ' #product-price').val(product.price);
			$('#product-modal').modal('show');

		});


	});


	$(document).on('click', '.delete-product', function(e) {

		if (confirm('Are you sure to delete?')) {

			var id = $(this).attr('data-id');
			var request = $.ajax({
				url: 'deleteProduct',
				type: 'POST',
				data: {
					id: id,
				},
				dataType: "json"
			});
			request.done(function(response) {

				$('tr.product-row[data-id="'+id+'"]').remove();

			});


		} else {

		}
	});



	$(document).on('click', '#save-product', function(e) {

		var thisBtn = this;
		var mode = $(thisBtn).attr('mode');
		var name = $('#product-name').val();
		var desc = $('#product-desc').val();
		var price = $('#product-price').val();
		var errors = [];

		if(name == ''){
			errors.push('Input a name.');
		}
		if(desc == ''){
			errors.push('Input a description.');
		}
		if(price == 0){
			errors.push('Input a price.');
		}


		if(errors.length == 0){
			$(thisBtn).attr('class','btn btn-success disabled');
			$(thisBtn).attr('disabled','disabled');
			$(thisBtn).html('Saving...');

			$('#product-name').attr('disabled','disabled');
			$('#product-desc').attr('disabled','disabled');
			$('#product-price').attr('disabled','disabled');
			$('#add-cart').attr('class','btn btn-success disabled');
			$('#add-cart').attr('disabled','disabled');

			if(mode == 'save' ){
				var ajaxUrl = 'saveProduct';
				var id_product = 0;
			} else {
				var ajaxUrl = 'updateProduct';
				var id_product = $('#product-id-modal').html();
			}
			var request = $.ajax({
				url: ajaxUrl,
				type: 'POST',
				data: {
					id_product: id_product,
					name: name,
					desc: desc,
					price: price,
				},
				dataType: "json"
			});
			request.done(function(response) {

				$(thisBtn).attr('class','btn btn-primary');
				$(thisBtn).attr('disabled','');
				$(thisBtn).html('Save product');

				clearProductModal()

				$('#cart-alert').attr('class','alert alert-success');
				$('#cart-alert').html('Product saved');

				if(mode == 'save' ){
					var product = response.product;

					var cartTableRow = '\
					<tr data-id="'+product.id_product+'" class="product-row">\
						<td class="product-id">'+product.id_product+'</td>\
						<td class="product-name">'+product.name+'</td>\
						<td class="product-desc">'+product.desc+'</td>\
						<td class="product-price">'+product.price+'</td>\
						<td>\
						<a class="edit-product" data-id="'+product.id_product+'">Edit</a> - \
						<a class="delete-product" data-id="'+product.id_product+'">Delete</a>\
					</td>\
					</tr>\
					';
					$('#products-table tbody').append(cartTableRow);



				} else {
					var product = response.product;

					$('.product-row[data-id="'+product.id_product+'"] .product-id').html(product.id_product);
					$('.product-row[data-id="'+product.id_product+'"] .product-name').html(product.name);
					$('.product-row[data-id="'+product.id_product+'"] .product-desc').html(product.desc);
					$('.product-row[data-id="'+product.id_product+'"] .product-price').html(product.price);
					$('#product-modal').modal('hide');

				}
			});

		} else {
			$('#cart-alert').attr('class','alert alert-warning');

			var errrorString = '';
			$.each(errors, function(index, value) {
				errrorString += value + '<br>';
			});
			$('#cart-alert').attr('class','alert alert-warning');
			$('#cart-alert').html(errrorString);
		}
	});



	function clearProductModal()
	{
		$('#product-id-modal').html('');
		$('#product-name').removeAttr('disabled');
		$('#product-desc').removeAttr('disabled');
		$('#product-price').removeAttr('disabled');
		$('#product-name').val('');
		$('#product-desc').val('');
		$('#product-price').val(0);



	}
});

</script>

</div><!-- .container -->
