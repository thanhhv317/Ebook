<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/jquery/jquery-3.2.1.min.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/animsition/js/animsition.min.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/bootstrap/js/popper.js') !!}"></script>
	<script type="text/javascript" src="{!! url('public/page/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/select2/select2.min.js') !!}"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/slick/slick.min.js') !!}"></script>
	<script type="text/javascript" src="{!! url('public/page/js/slick-custom.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/countdowntime/countdowntime.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/lightbox2/js/lightbox.min.js') !!}"></script>
<!--===============================================================================================-->
	<script>
		// add cart
	    var id="";
	    var name="";
	    var price="";
	    var image="";

	    function addCart(idProduct,nameProduct,priceProduct,imageProduct){
	    	id 		=	idProduct;
	    	name 	=	nameProduct;
	    	price 	=	priceProduct;
	    	image 	=	imageProduct;
	    }
	</script>
	<script type="text/javascript" src="{!! url('public/page/vendor/sweetalert/sweetalert.min.js') !!}"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				var item = {id:id, name:name, quantity:1, price:price, image:image};
				item = JSON.stringify(item);
        		localStorage.setItem('ca-'+id,item); 
				swal(nameProduct, "đã được thêm vào giỏ hàng !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

	<script>
		
		function hoverShowCartIcon(){
			var totalPrice = 0;
			var totalquantity = 0;
			for (var i = 0; i < localStorage.length; i++) {
				var key = localStorage.key(i);
				var quantity = 0;
				if(key.charAt(0)=='c' && key.charAt(1)=='a'){
					var product = $.parseJSON(localStorage.getItem(key));
					quantity += product.quantity;
					totalquantity +=quantity;
					totalPrice += (product.quantity * product.price);
					var item = '<li class="header-cart-item">';
					item += '<div class="header-cart-item-img">';
					item += '<img src="'+ "{!! asset('resources/uploads/books') !!}"+'/'+product.image+'" alt="IMG">';
					item += '</div>';
					item += '<div class="header-cart-item-txt">';
					item += '<a href="'+'{!! url('product-detail') !!}'+'/'+product.id+'" class="header-cart-item-name">';
					item += product.name;
					item +='</a>';
					item +='<span class="header-cart-item-info">';
					item +=quantity +' x '+ product.price;
					item +='</span>';
					item +='</div>';
					item +='</li>';
					$('.header-cart-wrapitem').append(item);
				}
			}
			$('.header-cart-total').html('Tổng cộng: '+totalPrice);
			$('.header-icons-noti').html(totalquantity);
		}

		function clickShowCartIcon(){
			$('.header-cart-wrapitem').html('');
			hoverShowCartIcon();
		}

		var totalPrice = 0;
		var totalQuantity = 0;
		function showCart(){
			
			for (var i = 0; i < localStorage.length; i++) {
				var key = localStorage.key(i);
				var quantity = 0;
				var price = 0;
				if(key.charAt(0)=='c' && key.charAt(1)=='a'){
					var product = $.parseJSON(localStorage.getItem(key));

					quantity += product.quantity;
					totalQuantity +=quantity;
					price += (product.quantity * product.price);
					totalPrice += price;

					var item = '<tr class="table-row">';
					item += '<td class="column-1">';
					item +='<div class="cart-img-product b-rad-4 o-f-hidden">';
					item += '<img src="'+ "{!! asset('resources/uploads/books') !!}"+'/'+product.image+'" alt="IMG-PRODUCT">';
					item +='</div>';
					item +='</td>';
					item +='<td class="column-2">'+ product.name+'<p style="color:blue; cursor: pointer" onclick="del('+"'"+product.id+"'"+')">Xóa</p></td>';
					item +='<td class="column-3">'+product.price+'</td>';
					item +='<td class="column-4">';
					item +='<div class="quantity-block" style="width: 110px"><div class="input-group bootstrap-touchspin"><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-down" onclick ="sub('+"'"+product.id+"'"+')" type="button">-</button></span><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input type="tel" readonly class="form-control quantity-r2 quantity product-'+product.id+'" value="'+product.quantity+'" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-up" onclick ="plus('+"'"+product.id+"'"+')" type="button">+</button></span></div>';
					item +='</td>';
					item +='<td class="column-5 price-'+product.id+'">'+price+'</td>';
					item +='</tr>';
					
					$('.table-shopping-cart').append(item);		

				}
			}
			$('.totalPrice').html(totalPrice);
			// $('.header-icons-noti').html(totalquantity);
		}

		function plus(id){
			var tmp = $.parseJSON(localStorage.getItem('ca-'+id));
			var quantity = tmp.quantity + 1;
			var item = {
				id:tmp.id,
				name:tmp.name, 
				quantity:quantity, 
				price: tmp.price, 
				image: tmp.image
			};

			item = JSON.stringify(item);

			localStorage.setItem('ca-'+id,item);

			//set count for quantity
			$('.product-'+tmp.id).attr('value', quantity);


			// totalQuantity++;
			//$('.total-quantity').html(totalQuantity);

			totalPrice += parseInt(tmp.price);
			
			$('.price-'+tmp.id).html(parseInt(tmp.price)*quantity);
			$('.totalPrice').html(totalPrice);
		}

		function sub(id){
			var tmp = $.parseJSON(localStorage.getItem('ca-'+id));
			var quantity = tmp.quantity;
			if(quantity>1){
				quantity--;
				totalQuantity--;
				totalPrice -= parseInt(tmp.price);
			}
			var item = {
				id:tmp.id,
				name:tmp.name, 
				quantity:quantity, 
				price: tmp.price, 
				image: tmp.image
			};

			item = JSON.stringify(item);

			localStorage.setItem('ca-'+id,item);
			//set count for quantity
			$('.product-'+tmp.id).attr('value', quantity);


			$('.total-quantity').html(totalQuantity);
			$('.price-'+tmp.id).html(parseInt(tmp.price)*quantity);
			$('.totalPrice').html(totalPrice);
		}

		function del(id){
			localStorage.removeItem('ca-'+id);
			swal("Thông báo!", "Đã xóa thành công sản phẩm !", "success");
			setTimeout(location.reload.bind(location), 500);
		}

		$(document).ready(function() {
			hoverShowCartIcon();
			showCart();
		});
	</script>

<!--===============================================================================================-->
	<script src="{!! url('public/page/js/main.js') !!}"></script>