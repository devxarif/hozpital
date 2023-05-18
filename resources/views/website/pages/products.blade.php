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
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
                        <div class="sidebar-widget search  mb-3 ">
                            <h5>Search Here</h5>
                            <form action="#" class="search-form">
                                <input type="text" class="form-control" placeholder="search">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        <div class="sidebar-widget category mb-3">
                            <h5 class="mb-4">Categories</h5>

                            <ul class="list-unstyled">
                                <li class="align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            <a href="javascript:void(0)">Medicine</a>
                                            <span>(2)</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            <a href="javascript:void(0)">Free counselling</a>
                                            <span>(2)</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            <a href="javascript:void(0)">Heart</a>
                                            <span>(2)</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            <a href="javascript:void(0)">Equipments</a>
                                            <span>(2)</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>


                        <div class="sidebar-widget tags mb-3">
                            <h5 class="mb-4">Tags</h5>

                            <a href="#">Doctors</a>
                            <a href="#">agency</a>
                            <a href="#">company</a>
                            <a href="#">medicine</a>
                            <a href="#">surgery</a>
                            <a href="#">Marketing</a>
                            <a href="#">Social Media</a>
                            <a href="#">Branding</a>
                            <a href="#">Laboratory</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="srarch-result d-flex justify-content-between align-items-center">
                            <p>Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} results</p>
                            <select class="form-select form-control" aria-label="Default select example">
                                <option selected="">Default</option>
                                <option value="">Price (Low > High)</option>
                                <option value="1">Price (High > Low)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $product->image }}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">{{ $product->name }}</a></h6>
                                        <h5>
                                            {{ currencyFormat($product->selling_price) }}
                                        </h5>
                                        {{-- <a href="{{ route('website.appointment') }}" class="btn bg-transparent mx-2">
                                            Add to cart
                                        </a> --}}
                                        <a href="{{ route('website.appointment') }}" class="btn border bg-gray mx-2">
                                            Add to cart
                                        </a>
                                        {{-- <a href="{{ route('website.appointment') }}" class="btn btn-main-2 mx-2">
                                            Add to cart
                                        </a> --}}
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row justify-content-center text-center">
                        {{ $products->onEachSide(0)->links('vendor.pagination.product-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection

@section('script')
<script>
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });
</script>
@endsection
@section('links')
<style>

.button {
    margin-top: 1em;
    padding: 10px 22px;
    font-size: 12px;
    line-height: 22px;
    font-weight: 700;
    /* color: #fff; */


    font-size: 100%;
    margin: 0;
    line-height: 1;
    cursor: pointer;
    position: relative;
    text-decoration: none;
    overflow: visible;
    padding: 0.618em 1em;
    font-weight: 700;
    border-radius: 3px;
    left: auto;
    color: #515151;
    background-color: #ebe9eb;
    border: 0;
    display: inline-block;
    background-image: none;
    box-shadow: none;
    text-shadow: none;
}

.filter__item {
    padding-bottom: 20px;
}
.product__item {
    margin-bottom: 50px;
}
.product__item__pic {
    height: 270px;
    position: relative;
    overflow: hidden;
}

.product__item__pic__hover {
    position: absolute;
    left: 0;
    bottom: -50px;
    width: 100%;
    text-align: center;
    -webkit-transition: all, 0.5s;
    -moz-transition: all, 0.5s;
    -ms-transition: all, 0.5s;
    -o-transition: all, 0.5s;
    transition: all, 0.5s;
}

.product__item__pic__hover li {
    list-style: none;
    display: inline-block;
    margin-right: 6px;
}

.product__item__pic__hover li {
    list-style: none;
    display: inline-block;
    margin-right: 6px;
}


.product__item__pic__hover li:last-child {
	margin-right: 0;
}

.product__item__pic__hover li:hover a {
	background: #7fad39;
	border-color: #7fad39;
}

.product__item__pic__hover li:hover a i {
	color: #ffffff;
	transform: rotate(360deg);
}

.product__item__text {
    text-align: center;
    padding-top: 15px;
}

.set-bg {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: top center;
}


.srarch-result {
    background-color: #f5f7fa;
    /* margin-bottom: 50px; */
    padding: 10px 30px;
}

.srarch-result p {
    margin-bottom: 0;
}

.srarch-result .form-select {
    max-width: 200px;
    cursor: pointer;
    border: none;
}
</style>
@endsection
