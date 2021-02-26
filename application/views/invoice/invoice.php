<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">

	<div class="col-lg-12">
		<div id="cart-alert"></div>
		<div class="row">
			<div class="col-lg-4">
				<div class="col-lg-12 form-group">
				
					<div class="col-lg-12 form-group">
				
						<label for="select-customer">Select Customer: </label>
						<select id="select-customer" class="form-control">
							<option value="0" >
								Choose Customer...
							</option>
							<?php 
								foreach($allCustomer as $customer){
							?>
								<option value="<?php echo $customer['id_customer']; ?>">
									<?php echo $customer['firstname'] . ' ' . $customer['lastname']; ?>
								</option>
							<?php
								}
							?>
						</select>
					</div>
					
					<br>
				
					
					<label for="select-product">Select Product: </label>
					<select id="select-product" class="form-control">
							<option value="0" >
								Choose product...
							</option>
						<?php 
							foreach($allProducts as $product){
						?>
							<option value="<?php echo $product['id_product']; ?>" 
								data-price="<?php echo $product['price']; ?>"
								data-name="<?php echo $product['name']; ?>"
							>
								<?php echo $product['name']; ?>
							</option>
						<?php
							}
						?>
					</select>
				</div>
				
				<br>
				
				
				
				
				<div class="col-lg-12 form-group">
					<label for="quantity">Quantity: </label>
					<input id="quantity" type="number" class="form-control" min="0" value="0">
				</div>
				
				<br>
				
				<div class="col-lg-12 form-group">
					<a class="btn btn-primary" id="add-cart">Add to cart</a>
				</div>
				
				<br>
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				Cart
				<table class="table table-bordered" id="cart-table">
					<thead>
						<tr>
							<th>Product</th>
							<th>Quantity</th>
							<th>Unit price</th>
							<th>Product price</th>
							<th></th>
						</tr>
					</thead>
					
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-4">
			
			
				

				<div class="col-lg-12 form-group">
					<label for="shipping-fee">Shipping fee: </label>
					<input id="shipping-fee" type="number" class="form-control" step="0.01" min="0" value="0">
				</div>
				
				<br>
			
				<div class="col-lg-12 form-group">
					<span >Sub total: </span>
					<span id="sub-total"></span>
				</div>
				
				<br>
				
				<div class="col-lg-12 form-group">
					<span >Grand total: </span>
					<span id="grand-total"></span>
				</div>
				
				<br>
				
				
				<div class="col-lg-12 form-group">
					<a class="btn btn-primary" id="save-order">Save order</a>
				</div>
				
				<br>
				
			</div>
		</div>
		
		
	</div>

</div><!-- .container -->

<script>
	$(document).ready(function() {
		
		
		$(document).on('keyup', '#shipping-fee', function(e) {
			var prices = calculatePrices();
			
			$('#sub-total').html(prices.subPrice);
			$('#grand-total').html(prices.grandPrice);
		});
		
		
		$(document).on('click', '#add-cart', function(e) {
			
			var selectedProduct = $('#select-product').val();
			var quantity = parseFloat($('#quantity').val());
			var dataPrice = parseFloat($('option:selected', '#select-product').attr('data-price'));
			var dataName = $('option:selected', '#select-product').attr('data-name');
			
			var subPrice = parseFloat(dataPrice) * parseFloat(quantity);

			var errors = [];
			if(selectedProduct == 0){
				
				errors.push('Please select a product.');
			}
			if(quantity == 0){
				
				errors.push('Please input a quantity.');
			}
			
			if(errors.length == 0){
				
				$('#cart-alert').attr('class','');
				$('#cart-alert').html('');
				var cartTableRow = '\
				<tr class="cart-products" data-id="'+selectedProduct+'">\
					<td>'+dataName+'</td>\
					<td class="quantity" data-val="'+quantity+'">'+quantity+'</td>\
					<td class="dataPrice" data-val="'+dataPrice+'">'+dataPrice+'</td>\
					<td class="subPrice" data-val="'+subPrice+'">'+subPrice+'</td>\
					<td><a class="remove-product-to-cart" data-id="'+selectedProduct+'">Remove</a></td>\
				</tr>\
				';
				$('#cart-table tbody').append(cartTableRow);
				
				$('#select-product').val(0);
				$('#quantity').val(0);
				
				
				var prices = calculatePrices();
			
				$('#sub-total').html(prices.subPrice);
				$('#grand-total').html(prices.grandPrice);
				
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
		
		$(document).on('click', '.remove-product-to-cart', function(e) {
			var thisId = $(this).attr('data-id');
			$('tr.cart-products[data-id="'+thisId+'"]').remove();
			
			var prices = calculatePrices();
			
			$('#sub-total').html(prices.subPrice);
			$('#grand-total').html(prices.grandPrice);
		});
			
			
		$(document).on('click', '#save-order', function(e) {
			
			var thisBtn = this;
			var id_customer = $('#select-customer').val();
			var errors = [];
			if(id_customer == 0){
				
				errors.push('Please select a customer.');
			}
			
			var prices = calculatePrices();
			
			if(prices.productLines.length == 0){
				errors.push('Cart is empty.');
			}
			
			if(errors.length == 0){
				$(thisBtn).attr('class','btn btn-success disabled');
				$(thisBtn).attr('disabled','disabled');
				$(thisBtn).html('Saving...');
				
				$('#select-customer').attr('disabled','disabled');
				$('#select-product').attr('disabled','disabled');
				$('#quantity').attr('disabled','disabled');
				$('#shipping-fee').attr('disabled','disabled');
				$('#add-cart').attr('class','btn btn-success disabled');
				$('#add-cart').attr('disabled','disabled');
				
				
				var ajaxUrl = 'saveOrders';
				var request = $.ajax({
					url: ajaxUrl,
					type: 'POST',
					data: {
						id_customer: id_customer,
						
						shippingFee: prices.shippingFee,
						subPrice: prices.subPrice,
						grandPrice: prices.grandPrice,
						
						productLines: prices.productLines,
					},
					dataType: "json"
				});
				request.done(function(response) {
					
					$('tr.cart-products').remove();
					
					$(thisBtn).attr('class','btn btn-primary');
					$(thisBtn).attr('disabled','');
					$(thisBtn).html('Save order');
					
					$('#select-customer').attr('disabled','');
					$('#select-product').attr('disabled','');
					$('#quantity').attr('disabled','');
					$('#shipping-fee').attr('disabled','');
					$('#add-cart').attr('class','btn btn-primary');
					$('#add-cart').attr('disabled','');
					
					$('#cart-alert').attr('class','alert alert-success');
					$('#cart-alert').html('Order saved');
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
		
		
		function calculatePrices(){
			
			var shippingFee = parseFloat($('#shipping-fee').val());
			var cartSubPrice = 0;
			var cartGrandPrice = 0;
			var productLines = [];
			$('.cart-products').each( function() {
				
				var selectedProduct = $(this).attr('data-id');
				var quantity = parseFloat($(this).find('.quantity').attr('data-val'));
				var dataPrice = parseFloat($(this).find('.dataPrice').attr('data-val'));
				var subPrice = parseFloat($(this).find('.subPrice').attr('data-val'));
				
				cartSubPrice += subPrice;
				cartGrandPrice += subPrice;
				
				productLines.push({
					selectedProduct:selectedProduct,
					quantity:quantity,
					dataPrice:dataPrice,
					subPrice:subPrice,
				});
			});
			
			cartGrandPrice += shippingFee;
			
			return {
				'shippingFee': shippingFee,
				'subPrice': cartSubPrice,
				'grandPrice': cartGrandPrice,
				'productLines': productLines,
			};
			
			
		}
	});
</script>
