$(document).ready(function(){


	$('.increment-btn').click(function(e){
		e.preventDefault();

		var jumlah =$(this).closest('.produk_data').find('.input-qty').val();
		var value = parseInt(jumlah, 10);
		value = isNaN(value) ? 0 : value;
		if(value < 10){
			value++;
			$(this).closest('.produk_data').find('.input-qty').val(value);
		}
	});

	$('.decrement-btn').click(function(e){
		e.preventDefault();

		var jumlah =$(this).closest('.produk_data').find('.input-qty').val();
		var value = parseInt(jumlah, 10);
		value = isNaN(value) ? 0 : value;
		if(value > 1 ){
			value--;
			$(this).closest('.produk_data').find('.input-qty').val(value);
		}
	});

	$('.addToCartBtn').click(function(e){
		e.preventDefault();

		var jumlah =$(this).closest('.produk_data').find('.input-qty').val();
		var produk_id = $(this).val();

		$.ajax({
			method: "POST",
			url: "handlecart.php",
			data: {
				"produk_id": produk_id,
				"jumlah": jumlah,
				"scope":"add"
			},
			success: function(response){
				if(response == 201){
					alertify.success("Product add to cart");
					$('#mycart').load(location.href + "mycart");
				} else if(response == "existing"){
					alertify.success("Product already in cart");
				} else if(response == 401){
					alertify.success("Login to continue");
				} else if(response == 500){
					alertify.success("Something went wrong");
				}
			}
		})
	});	

	$(document).on('click', '.deleteItem', function(){
		var cart_id = $(this).val();

		$.ajax({
			method: "POST",
			url: "handlecart.php",
			data: {
				"cart_id": cart_id,
				"scope": "delete"
			},
			success: function(response){
				if(response == 200){
					alertify.success("Item deleted successfully");
					$('#mycart').load(location.href + "mycart");
				} else {
					alertify.success(response);
				}
			}
		})
	});
});

 