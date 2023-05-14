@extends('website.layout.app')

@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Pharmacy</span>
                    <h1 class="text-capitalize mb-5 text-lg">Pharmacy</h1>

                    <ul class="list-inline breadcumb-nav">
                        <li class="list-inline-item"><a href="{{ route('website.home') }}" class="text-white">Home</a>
                        </li>
                        <li class="list-inline-item"><span class="text-white">/</span></li>
                        <li class="list-inline-item"><a href="#" class="text-white-50">Pharmacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section about-page">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-md-9 col-lg-9">
                <header class="woocommerce-products-header">

                </header>
                <div class="woocommerce-notices-wrapper"></div>
                <p class="woocommerce-result-count">
                    Showing all 12 results</p>
                <form class="woocommerce-ordering" method="get">
                    <div class="thsn-select"><select name="orderby" class="orderby" aria-label="Shop order">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select></div>
                    <input type="hidden" name="paged" value="1">
                </form>
                <ul class="products columns-3">
                    <li
                        class="product type-product post-29 status-publish first instock product_cat-decor has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                        <a href="https://doctery-demo.pbminfotech.com/demo1/product/wordpress-pennant/"
                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                            <span class="onsale">Sale!</span>
                            <img width="300" height="300"
                                src="https://doctery-demo.pbminfotech.com/demo1/wp-content/uploads/sites/2/2019/01/shop-01-1.jpg"
                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                decoding="async" loading="lazy"
                                srcset="https://doctery-demo.pbminfotech.com/demo1/wp-content/uploads/sites/2/2019/01/shop-01-1.jpg 300w, https://doctery-demo.pbminfotech.com/demo1/wp-content/uploads/sites/2/2019/01/shop-01-1-150x150.jpg 150w, https://doctery-demo.pbminfotech.com/demo1/wp-content/uploads/sites/2/2019/01/shop-01-1-100x100.jpg 100w"
                                sizes="(max-width: 300px) 100vw, 300px">
                            <h2 class="woocommerce-loop-product__title">Blood Monitor</h2>
                            <span class="price"><del aria-hidden="true"><span
                                        class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">£</span>45.00</bdi></span></del>
                                <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">£</span>35.00</bdi></span></ins></span>
                        </a><a href="?add-to-cart=29" data-quantity="1"
                            class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="29"
                            data-product_sku="wp-pennant" aria-label="Add “Blood Monitor” to your cart"
                            rel="nofollow">Add to cart</a></li>
                   
                    <li
                        class="product type-product post-15 status-publish last instock product_cat-hoodies has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                        <a href="https://doctery-demo.pbminfotech.com/demo1/product/stethoscope/"
                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300"
                                height="300"
                                src="https://doctery-demo.pbminfotech.com/demo1/wp-content/uploads/sites/2/2019/01/shop-02-1.jpg"
                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                decoding="async" loading="lazy"
                                srcset="https://doctery-demo.pbminfotech.com/demo1/wp-content/uploads/sites/2/2019/01/shop-02-1.jpg 300w, https://doctery-demo.pbminfotech.com/demo1/wp-content/uploads/sites/2/2019/01/shop-02-1-150x150.jpg 150w, https://doctery-demo.pbminfotech.com/demo1/wp-content/uploads/sites/2/2019/01/shop-02-1-100x100.jpg 100w"
                                sizes="(max-width: 300px) 100vw, 300px">
                            <h2 class="woocommerce-loop-product__title">Stethoscope</h2>
                            <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                            class="woocommerce-Price-currencySymbol">£</span>45.00</bdi></span></span>
                        </a><a href="?add-to-cart=15" data-quantity="1"
                            class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="15"
                            data-product_sku="woo-hoodie-with-zipper" aria-label="Add “Stethoscope” to your cart"
                            rel="nofollow">Add to cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
