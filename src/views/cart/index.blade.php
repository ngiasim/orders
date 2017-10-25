@if (count($cartItems) > 0)
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $var = 0; ?>
                  @foreach($cartItems as $rows)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{$rows->name}}</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span><br>
                                <span>inventory: </span><span class="text-success"><strong>{{$rows->options->invsku}}</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                          @if($rows->options->qty_unlimited == 1)
                              <input min="1" type="number" class="form-control" id="qty-filed-{{$rows->rowId}}" value="{{$rows->qty}}"><br>
                          @else
                                <input min="1" max="{{$rows->options->max_qty}}" type="number" class="form-control" id="qty-filed-{{$rows->rowId}}" value="{{$rows->qty}}"><br>
                          @endif      
                        <button type="button" class="btn btn-xs btn-success" onclick="updatecart('{{$rows->rowId}}');">
                          <span class="glyphicon glyphicon-update"></span>Update
                        </button>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$rows->price}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$rows->subtotal}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                          <!-- <button type='button' onclick='addtocart(".$row->product_id.");' class='btn-danger glyphicon glyphicon-remove'></button> -->
                          <button type="button" class="btn btn-danger" onclick="deletecartitem('{{$rows->rowId}}');">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                    <?php $var += $rows->subtotal; ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><h5>Item total<br>Tax<br>Shipping</h5><h3>Total</h3></td>
                        <td class="text-right"><h5><strong>{{$var}}<br>{{$total_tax}}<br>free</strong></h5><h3>{{$total}}</h3></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                      <!--  <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button>--></td>
                        <td>
                        <button type="button" class="btn btn-success" onclick="placeorder();">
                            Place Order <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@else
  <div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1">
        <p>You have no items in the shopping cart</p>
    </div>
  </div>
@endif
