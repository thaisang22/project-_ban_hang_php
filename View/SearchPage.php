
<div id="PageContainer" class="">
			<main class="main-content" role="main">
				<!-- /templates/search.liquid -->





<div id="page-wrapper">
	<div class="wrapper">
		<div class="grid">
			<div class="grid__item">

				
				
            <h1 class="text-center">Kết quả tìm kiếm cho "<?php echo $searchTerm; ?>":</h1>


				
				

				<form action="/search" method="get" class="input-group search-bar" role="search">
	<input type="hidden" name="type" value="article">
	<input type="search" id="main-search-form-input" name="q" value="" placeholder="Tìm sản phẩm..." class="input-group-field" aria-label="Tìm sản phẩm...">
	<span class="input-group-btn">
		<button type="submit" class="btn icon-fallback-text">
			<svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg><!-- <i class="fa fa-search" aria-hidden="true"></i> -->
		</button>
	</span>
</form>


				

				<hr class="hr--clear">

				<div class="grid-uniform">
					
					
					

					


					
					<!-- begin grid search results-->
					

					<div class="grid__item large--one-third medium--one-half small--one-whole search-item mg-bottom-30">
                    <div class="article-item">
        <?php foreach ($results as $product): ?>
            <div class="article-img">
                <a href="/product/<?php echo $product['id_product']; ?>">
                    <img src="public\img\<?php echo $product['thumbnail'] ?>" alt="<?php echo $product['name_product']; ?>">
                </a>
            </div>
            <div class="article-info-wrapper">
                <div class="article-title">
                    <a href="/product/<?php echo $product['id_product']; ?>"><?php echo $product['name_product']; ?></a>
                </div>
                <div class="article-title">
                    <a href="/product/<?php echo $product['id_product']; ?>"><?php echo $product['regular_price']; ?></a>
                </div>
                <div class="article-desc">
                    <?php echo $product['mota']; ?>
                </div>
                <!-- Add more details as needed -->
            </div>
        <?php endforeach; ?>
    </div>

					</div>
					<!-- //grid search results-->
					


					
					
					

					


		

					
				</div>

				<div class="pagination">
					

<div id="pagination-" class="pagination-custom text-center clear-left">
	
	

	
	
	<span class="page current">1</span>
	
	
	
	<span class="page"><a href="/search?type=article&amp;q=m%C3%B3n%20nh%E1%BA%ADt&amp;page=2">2</a></span>
	
	
	
	<span class="page"><a href="/search?type=article&amp;q=m%C3%B3n%20nh%E1%BA%ADt&amp;page=3">3</a></span>
	
	
	
	<span class="page"><a href="/search?type=article&amp;q=m%C3%B3n%20nh%E1%BA%ADt&amp;page=4">4</a></span>
	
	

	
	<span class="nextPage"><a href="/search?type=article&amp;q=m%C3%B3n%20nh%E1%BA%ADt&amp;page=2"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true" data-prefix="fa" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg><!-- <i class="fa fa-angle-right" aria-hidden="true"></i> --></a></span>
	

	
</div>





				</div>

				

			</div>
		</div>
	</div>
</div>




			</main>
		</div>