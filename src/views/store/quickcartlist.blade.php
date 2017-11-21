@if (count($cartItems) > 0)
<span class="box-center">
@php $var = 0; @endphp
@foreach($cartItems as $rows)
<span class="item-area">
  <span class="box-cell img pull-left">
    <img src="{{URL::asset("images/store/cart.jpg")}}" alt="femi9 instagram" class="img-responsive">
  </span>
  <span class="box-cell detail pull-right">
    <span class="detail-inner">
      <span class="d-title">{{$rows->name}}</span>
      <span class="d-color"><span>Inventory:</span>{{$rows->options->invsku}}</span>
      <span class="d-qty"><span>QTY:</span>{{$rows->qty}}</span>
      <span class="d-price">
        <span>Price:</span>
        @if($currencyObj->checkout->direction == "left")
          {{$currencyObj->checkout->currency_symbol}} {{$rows->subtotal}}
        @else
          {{$rows->subtotal}} {{$currencyObj->checkout->currency_symbol}}
        @endif
      </span>
    </span>
    <span class="remove-btn">
      <a href="javascript:void(0)" onclick="deletecartitem('{{$rows->rowId}}');" title="Remove">Remove</a>
    </span>
  </span>
</span>
@php $var += $rows->subtotal; @endphp
@endforeach
<span class="item-price">
  <span class="price-txt">TOTAL

    @if($currencyObj->checkout->direction == "left")
      {{$currencyObj->checkout->currency_symbol}} {{$total}}
    @else
      {{$total}} {{$currencyObj->checkout->currency_symbol}}
    @endif

  </span>
  <span class="tax-txt">including Taxes</span>
</span>
</span>
<span class="box-footer">
<a href="{{ url('/product/p') }}" class="btn btn-primary con-shop pull-left" title="CONTINUE SHOPPING">CONTINUE SHOPPING</a>
<a href="javascript:void(0)" class="btn btn-primary chkout pull-right" title="CHECKOUT">CHECKOUT</a>
</span>



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
