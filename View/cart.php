

<div id="PageContainer" class="">
	<main class="main-content" role="main">
		<div id="page-wrapper">
			<div class="wrapper">
				<div class="inner">
					<h1>Giỏ hàng</h1>
					<form action="index.php?action=cart&act=update_cart" method="post" novalidate=""
						class="cart table-wrap medium--hide small--hide">
						<table class="cart-table full table--responsive">
							<thead class="cart__row cart__header-labels">
								<tr>
									<th class="text-center"></th>
									<th colspan="2" class="text-center">Đồ ăn</th>
									<th class="text-center">Đơn giá</th>
									<th class="text-center">Số lượng</th>
									<th class="text-right">Thành tiền</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($_SESSION['cart'] as $key => $item) {
									?>
									<!-- Inside the loop for cart items -->
									<input type="hidden" name="original_index[]" value="<?php echo $key; ?>">
									<!-- ... rest of the form elements ... -->
									<tr class="cart__row table__section">
										<td data-label="Sản phẩm">
										
											<a href="index.php?action=cart&act=remove_item&id_product=<?php echo $item['id_product']; ?>"
												class="cart__remove ?>">
												<small>
													<svg class="svg-inline--fa fa-times fa-w-12" aria-hidden="true"
														data-prefix="fas" data-icon="times" role="img"
														xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
														data-fa-i2svg="">
														<path fill="currentColor"
															d="M323.1 441l53.9-53.9c9.4-9.4 9.4-24.5 0-33.9L279.8 256l97.2-97.2c9.4-9.4 9.4-24.5 0-33.9L323.1 71c-9.4-9.4-24.5-9.4-33.9 0L192 168.2 94.8 71c-9.4-9.4-24.5-9.4-33.9 0L7 124.9c-9.4 9.4-9.4 24.5 0 33.9l97.2 97.2L7 353.2c-9.4 9.4-9.4 24.5 0 33.9L60.9 441c9.4 9.4 24.5 9.4 33.9 0l97.2-97.2 97.2 97.2c9.3 9.3 24.5 9.3 33.9 0z">
														</path>
													</svg><!-- <i class="fas fa-times"></i> -->
												</small>
											</a>
										</td>

										<td data-label="Sản phẩm">
											<a href="/products/lau-ga-la-giang-lon" class="cart__image">
												<img src="public\img\<?php echo $item['thumbnail'] ?>"
													alt="Lẩu gà lá giang (L)">

											</a>
										</td>

										<td class="cart-product-title">
											<a href="/products/lau-ga-la-giang-lon" class="h4">
												<?php echo $item['name_product'] ?>
											</a>
										</td>

										<td class="cart-product-price" data-label="Đơn giá">
											<span class="">
												<?php echo $item['regular_price'] ?>
											</span>
										</td>
										<td data-label="Số lượng">
											<div class="js-qty">
												<button type="button"
													class="js-qty__adjust js-qty__adjust--minus icon-fallback-text"
													data-id="<?php echo $item['id_product']; ?>" data-qty="0">
													<!-- ...minus button content... -->
												</button>
												<input type="number" class="js-qty__num"
													value="<?php echo $item['soluong']; ?>" min="1"
													data-id="<?php echo $item['id_product']; ?>" aria-label="quantity"
													pattern="[0-9]*" name="updates[]">
												<button type="button"
													class="js-qty__adjust js-qty__adjust--plus icon-fallback-text"
													data-id="<?php echo $item['id_product']; ?>" data-qty="1">
													<!-- ...plus button content... -->
												</button>
											</div>
										</td>
										<td data-label="Tổng giá" class="cart-product-price text-right">
											<span class="">
												<?php
												$cart = new Cart();
												$itemTotal = $cart->item_sub_total($item['id_product']);
												echo $itemTotal;
												?>
											</span>
										</td>
									<?php } ?>
								</tr>
								<tr class="cart__row cart__row_themdo table__section">
									<td colspan="6" class="text-right"><a
											href="index.php?action=product&act=product" class="btn-themdo">Thêm đồ</a></td>
								</tr>
							</tbody>
						</table>
						<div class="grid cart__row">
							<div class="grid__item one-half small--one-whole">
								<div class="home_register_left ">
									<div class="list_restaurant_place">
										<span class="icon_place"><img
												src="//theme.hstatic.net/1000093072/1001049829/14/place.png?v=162"
												alt="place icon"></span>
										<span class="content_place">CS1: Số 2, ngõ 69 Chùa Láng.
											<br> CS2: Số 13 Mai Hắc Đế.
											<br>CS3: Số 35 Dịch Vọng Hậu.
											<br>CS4: Tòa Golden Palm 21 Lê Văn Lương.
											<br>CS5: T167 TTTM AEON MALL Hà Đông</span>
									</div>
								</div>
							</div>
							<div class="grid__item text-right one-half small--one-whole">
								<p>
									<span class="cart__subtotal-title">Tổng tiền</span>
									<span class="h3 cart__subtotal">
										<?php $total = new Cart();
										echo $total->sub_total();
										?>
									</span>
								</p>


								<button type="submit" name="update" class="btnCart update-cart">Cập nhật</button>
								<a href="index.php?action=checkout" class="btnCart btn btn-datban">Thanh toán</a>
							</div>
						</div>
					</form>


					<form  action="index.php?action=cart&act=update_cart" method="post" novalidate="" class="cart table-wrap large--hide">
					<?php
								foreach ($_SESSION['cart'] as $key => $item) {
									?>
						<div class="grid cart-item mg-left-0">
							<div data-label="Sản phẩm" class="grid__item medium--one-third small--one-third pd-left0">
								<a href="/products/lau-ga-la-giang-lon" class="cart__image">


									<img src="//product.hstatic.net/1000093072/product/lau_ga_la_giang_a704ccce60ba40da80df0e6e376f4867_small.jpg"
										alt="Lẩu gà lá giang (L)">

								</a>
							</div>
							<div class="grid__item medium--two-thirds small--two-thirds pd-left15 cart-product-title">
								<a href="/products/lau-ga-la-giang-lon" class="h4">
									Lẩu gà lá giang (L)
								</a>
								<div data-label="Số lượng">
									<div class="js-qty">
										<button type="button"
											class="js-qty__adjust js-qty__adjust--minus icon-fallback-text" data-id=""
											data-qty="0">
											<span class="icon icon-minus" aria-hidden="true"></span>
											<span class="fallback-text" aria-hidden="true">−</span>
											<span class="visually-hidden">Giảm số lượng sản phẩm đi 1</span>
										</button>
										<input type="number" class="js-qty__num" value="1" min="1" data-id=""
											aria-label="quantity" pattern="[0-9]*" name="updates[]" id="updates_">
										<button type="button"
											class="js-qty__adjust js-qty__adjust--plus icon-fallback-text" data-id=""
											data-qty="11">
											<span class="icon icon-plus" aria-hidden="true"></span>
											<span class="fallback-text" aria-hidden="true">+</span>
											<span class="visually-hidden">Tăng số lượng sản phẩm lên 1</span>
										</button>
									</div>


								</div>
								<div data-label="Đơn giá" class="price">
									<span class="">
										478,000₫
									</span>
								</div>
								<a href="/cart/change?line=1&amp;quantity=0" class="cart__remove">
									<small>Xóa</small>
								</a>
							</div>
						</div>
						<?php } ?>
						<div>
							<a href="index.php?action=product&act=product" class="btn-themdo">Thêm đồ</a>
						</div>
						<table class="cart-table full">




						</table>
						<div class="grid cart__row">

							<div class="grid__item large--two-thirds medium--one-half small--one-whole">

								<div class="home_register_left ">

									<div class="list_restaurant_place">
										<span class="icon_place"><img
												src="//theme.hstatic.net/1000093072/1001049829/14/place.png?v=162"
												alt="place icon"></span>
										<span class="content_place">CS1: Số 2, ngõ 69 Chùa Láng.
											<br> CS2: Số 13 Mai Hắc Đế.
											<br>CS3: Số 35 Dịch Vọng Hậu.
											<br>CS4: Tòa Golden Palm 21 Lê Văn Lương.
											<br>CS5: T167 TTTM AEON MALL Hà Đông</span>
									</div>

								</div>
							</div>

							<div class="grid__item text-right large--one-third medium--one-half small--one-whole">
								<p>
									<span class="cart__subtotal-title">Tổng tiền</span>
									<span class="h3 cart__subtotal">478,000₫</span>
								</p>


								<button type="submit" name="update" class="btnCart update-cart">Cập nhật</button>
								<button type="submit" name="checkout" class="btnCart">Thanh toán</button>
								<a href="https://nhahangphuongnam.vn/pages/dat-ban" class="btnCart btn btn-datban">Đặt
									bàn</a>
							</div>
						</div>
					</form>


				</div>
			</div>
		</div>
	</main>
</div>
<script>
	
</script>