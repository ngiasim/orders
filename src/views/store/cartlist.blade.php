@if (count($cartItems) > 0)
    <div class="cart container">
        <div class="row top-heading">
            <h1 class="text-center text-uppercase">Shopping Bag</h1>
            <p class="text-center text-uppercase">{{$total_items}} item</p>
        </div>

        <div class="button-wrpper">
             <a href="{{ url('/product/p') }}" class="btn btn-lg btn-default">Continue Shoping</a>
             <a href="javascript:void(0)" class="btn btn-lg btn-primary pull-right">Proceed to Secure Checkout</a>
        </div>
        <div class="clearfix"></div>
        <hr/>
        <div class="shopping-cart">
            <div class="column-labels">
                <label class="product-image">ITEM</label>
                <label class="product-details">DESCRIPTION</label>
                <label class="product-color">COLOR</label>
                <label class="product-size">SIZE</label>
                <label class="product-quantity">QUANTITY</label>
                <label class="product-action">ACTIONS</label>
                <label class="product-line-price">PRICE</label>
                <label class="product-line-price">SUBTOTAL</label>
            </div>
            @php $var = 0; @endphp
            @foreach($cartItems as $rows)

            <div class="product">
                <div class="product-image">
                    <img src='{{URL::asset("images/store/cart.jpg")}}' alt="femi9" class="img-responsive">
                </div>
                <div class="product-details">
                    <div class="product-title">{{$rows->name}}</div>
                    <p class="product-description ">{{$rows->options->invsku}}</p>
                </div>
                <div class="product-color"><span class="value">Brown</span></div>
                <div class="product-size"><span class="value">M</span></div>
                <div class="product-quantity">
                  <!-- <span class="value">5</span> -->
                  @if($rows->options->qty_unlimited == 1)
                      <input min="1" type="number" class="value" id="qty-filed-{{$rows->rowId}}" value="{{$rows->qty}}"><br>
                  @else
                        <input min="1" max="{{$rows->options->max_qty}}" type="number" class="value" id="qty-filed-{{$rows->rowId}}" value="{{$rows->qty}}"><br>
                  @endif
                </div>
                <div class="product-action">
                    <a href="#" class="btn btn-primary" onclick="updatecart('{{$rows->rowId}}');">Update</a>
                    <a href="#" class="btn btn-default" onclick="deletecartitem('{{$rows->rowId}}');" >Remove</a>
                </div>
                @if($currencyObj->checkout->direction == "left")
                <div class="product-line-price">{{$currencyObj->checkout->currency_symbol}} {{$rows->price}}  </div>
                <div class="product-line-sub_price">{{$currencyObj->checkout->currency_symbol}} {{$rows->subtotal}} </div>
                @else
                <div class="product-line-price">{{$rows->price}} {{$currencyObj->checkout->currency_symbol}} </div>
                <div class="product-line-sub_price">{{$rows->subtotal}} {{$currencyObj->checkout->currency_symbol}}</div>
                @endif
            </div>
            @php $var += $rows->subtotal; @endphp
            @endforeach

        <div class="col-md-8">
            <p class="lead">Estimated Delivery Time: 1 - 2 working days after dispatch.</p>
            <div class="col-md-4">
                <h5>Our Services</h5>
                <ul class="list">
                    <li>FREE DELIVERY</li>
                    <li>FREE EXCHANGES</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Payment Methods</h5>
                <img src='{{URL::asset("images/store/Payment_Methods.jpg")}}' alt="femi9" class="img-responsive">
            </div>
            <div class="col-md-4">
                <h5>Full Security</h5>
                <img src='{{URL::asset("images/store/full-security.jpg")}}' alt="femi9" class="img-responsive">
            </div>
        </div>
        <div class="col-md-4">
            <h4>ORDER SUMMARY</h4>
            <hr>
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control input-lg" id="" placeholder="Enter Your Promo Code">
                </div>
                <button type="submit" class="btn btn-lg btn-primary text-uppercase">APPLY</button>
            </form>
            <div class="totals">
                <div class="totals-item">
                    <label>Subtotal</label>
                    @if($currencyObj->checkout->direction == "left")
                     <div class="totals-value" id="cart-subtotal">{{$currencyObj->checkout->currency_symbol}} {{$var}}</div>
                    @else
                      <div class="totals-value" id="cart-subtotal">{{$var}} {{$currencyObj->checkout->currency_symbol}}</div>
                    @endif

                </div>
                <div class="totals-item">
                    <label>Tax (5%)</label>
                    @if($currencyObj->checkout->direction == "left")
                    <div class="totals-value" id="cart-tax">{{$currencyObj->checkout->currency_symbol}} {{$total_tax}} </div>
                    @else
                    <div class="totals-value" id="cart-tax">{{$total_tax}} {{$currencyObj->checkout->currency_symbol}}</div>
                    @endif
                </div>
                <div class="totals-item totals-item-total">
                    <label>TOTAL</label>
                    @if($currencyObj->checkout->direction == "left")
                    <div class="totals-value" id="cart-total">{{$currencyObj->checkout->currency_symbol}} {{$total}} </div>
                    @else
                      <div class="totals-value" id="cart-total">{{$total}} {{$currencyObj->checkout->currency_symbol}}</div>
                    @endif
                </div>
                <a href="#" class="text-right">Custom & Duties</a>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="button-wrpper">
            <a href="#" class="btn btn-lg btn-default">Continue Shoping</a>
            <a href="#" class="btn btn-lg btn-primary pull-right">Proceed to Secure Checkout</a>
        </div>
    </div>

</div>

@else
  <div class="row">
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        &nbsp;
      </div>

  </div>
  <div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1">
        <center><p>You have no items in the shopping cart</p></center>
    </div>
  </div>
@endif
