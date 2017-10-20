@extends('layouts/cockpit_master')
@section('content')
<div class="row">
       <div class="col-md-8">
           <h3>Order num : {{$order->order_id}}</h3>
           <h3>Made on : {{\Carbon\Carbon::parse($order->created_at)->toDayDateTimeString() }}</h3>
       </div>
   </div>
   <div class="row">
       <div class="col-md-12">
           <table class="table table-striped">
               <thead>
               <tr>
                   <th class="col-sm-6">Product</th>
                   <th class="col-sm-4">Product Description</th>
                   <th class="col-sm-2">Quantity</th>
                   <th class="col-sm-2">Price</th>
                   <th class="col-sm-2">Tax</th>
                   <th class="col-sm-2">SubTotal</th>
               </tr>
               </thead>
              @foreach($order->orderItem as $item)
                    <tr>
                       <td>
                         <div class="media">
                             <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                             <div class="media-body">
                                 <h4 class="media-heading"><a href="#">{{$item->product->productsDescription->products_name}}</a></h4>
                                 <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                 <span>Status: </span><span class="text-success"><strong>In Stock</strong></span><br>
                                 <span>inventory: </span><span class="text-success"><strong>{{$item->inventory_code}}</strong></span>
                             </div>
                         </div>
                       </td>
                       <td>{{$item->product->productsDescription->products_description}}</td>
                       <td>{{$item->ordered_quantity}}</td>
                       <td>{{number_format($item->products_price*$item->ordered_quantity,2,'.','')}}</td>
                       <td>{{$item->peritem_tax}}</td>
                       <td>{{(($item->products_price)*$item->ordered_quantity) + $item->peritem_tax}}</td>
                   </tr>
               @endforeach
               <tfoot>
                   <tr>
                       <td>&nbsp;</td>
                       <td>&nbsp;</td>
                       <td colspan="2"><h5>Item total<br>Tax<br>Shipping</h5><h3>Total</h3></td>
                       <td class="text-left"><h5><strong>{{$order->order_total}}<br>{{$order->tax}}<br>free</strong></h5><h3>{{$order->order_final_total}}</h3></td>
                   </tr>
                </tfoot>
           </table>
       </div>
   </div>
@endsection
