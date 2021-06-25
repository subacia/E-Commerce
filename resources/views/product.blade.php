@extends('layouts')
    @section('content')
        
        <div class="container product-page">
            <div class="row">
            <div class="col-md-6">
                    <img
                    src="{{ asset('images/toshiba-img1') }}"
                    alt="Kodak Brownie Flash B Camera"
                    class="image-responsive"
                    />
                </div>

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-12">
                            <h1>Kodak 'Brownie' Flash B Camera</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary">Vintage</span>
                            <span class="monospaced">No. 1960140180</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p class="description">
                            Classic film camera. Uses 620 roll film.
                            Has a 2&frac14; x 3&frac14; inch image size.
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <span class="sr-only">Four out of Five Stars</span>
                            <!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> -->
                            <span class="label label-success">61</span>
                        </div>
                        <div class="col-md-3">
                            <span class="monospaced">Write a Review</span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 bottom-rule">
                            <h2 class="product-price">$129.00</h2>
                        </div>
                    </div>

                    <div class="row add-to-cart">
                        <div class="col-md-5 product-qty">
                            <span class="btn btn-default btn-lg btn-qty">
                                <!-- <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> -->
                            </span>
                            <input class="btn btn-default btn-lg btn-qty" value="1" />

                            <span class="btn btn-default btn-lg btn-qty">
                                <!-- <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> -->
                            </span>

                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-lg btn-brand btn-full-width">
                            Add to Cart
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <span class="monospaced">In Stock</span>
                        </div>
                        <div class="col-md-4 col-md-offset-1 text-center">
                            <a class="monospaced" href="#">Add to Shopping List</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 bottom-rule top-10"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 top-10">
                            <p>To order by telephone, <a href="tel:18005551212">please call 1-800-555-1212</a></p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    @endsection
     
   

