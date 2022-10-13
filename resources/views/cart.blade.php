@extends('layouts.appLayout')
@section('content')

    <div class="container container2">
        <div class="container">
            <h1 class="title-f1" style="color:blue;">Cart</h1>
        </div>
        @php
            $cart = App\Models\Cart::where('user_id',Auth()->user()->id)->count();
        @endphp
        @if($cart > 0)
            @if($cart > 1)
                <input class="form-check-input" type="checkbox" id="select-all">
                <label style="color: blue; font-family: system-ui; font-size: large; font-weight: 300">Select
                    All</label>
            @endif
            <form action="/checkout-item" method="post">
                @csrf
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4 product-card ">
                            <div class="card card-size-2 card-shadow" style="background: mintcream;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="selectItem[]" id="check"
                                           value="{{$product['id']}}"
                                           style="margin-left: -2%; margin-top: 4%; width: 7%; height: 100%;">
                                </div>
                                <div class="card-image2 ">
                                    <img src="{{$product->product->image}}" class="card-img-top img-s" alt="...">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title f2" style="color: black">{{$product->product->name}}</h4>
                                    <h6 class="card-title f1">Price: Rs.{{$product->product->price}}</h6>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="inputQty" class="form-label"
                                                   style="color: black">Quantity</label>
                                            <input type="number" min="1" max="{{$product->product->qty}}"
                                                   name="qty-{{$product['id']}}"
                                                   value="{{$product['product_qty']}}"
                                                   class="form-control" id="inputQty">
                                        </div>
                                    </div>
                                    <div class="container2" style="text-align: left">
                                        <a href="/remove/{{$product['id']}}" class="btn btn-outline-danger">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div style="text-align: center">

                        <button type="submit" id="submitBtn" class="btn btn-success edit-button card-shadow"
                                disabled="disabled">Checkout
                        </button>
                    </div>

                </div>
            </form>
        @else
            <h1 class="title-f1 container2" style="color: blue; text-align: center">Empty Cart</h1>
        @endif

        <input type="hidden" id="cart_count" value="{{$cart}}">
    </div>
    <script>

        let count = $('#cart_count').val();
        if (count == 1) {
            $('.form-check-input').attr('checked', true);
            $('.form-check-input').css('visibility', 'hidden');
            $('#submitBtn').prop('disabled', false);
        } else {
            $(".form-check-input").on("click", function () {
                if ($(".form-check-input:checked").length >= 1) {
                    $('#submitBtn').prop('disabled', false);
                } else {
                    $('#submitBtn').prop('disabled', true);
                }
            });
        }

        $("#check").on("click", function () {
            if ($("#check:checked").length >= 1) {
                $('#submitBtn').prop('disabled', false);
            } else {
                $('#submitBtn').prop('disabled', true);
            }
        });

        document.getElementById('select-all').onclick = function () {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script>

@endsection
