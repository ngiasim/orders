@extends('layouts/cockpit_master')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.error{
  color:#ff7272;
  }
  input[type="text"] {
    color: black !important;
  }
</style>

<!--
<script src="{{url('ckeditor/ckeditor.js')}}"></script> -->

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Phone Order</div>

                <div class="panel-body">

                {!! Form::open(['method'=>'patch','url' => "",'name'=>"frm_porder",'id'=>"frm_porder"]) !!}
                @if (count($curr_reg_country_numm) > 0)
                <div class="form-group row">
                    {{ Form::label('Select Country: ', null, ['class' => 'col-sm-2 col-form-label col-form-label-lg']) }}
                  <div class="col-sm-4">
                    {{ Form::select('region_country', $countries,$curr_reg_country_numm[0]->country_id,array("id"=>"region_country","onchange"=>"hidall();")) }}
                  </div>
                </div>
                @else
                <div class="form-group row">
                    {{ Form::label('Select Country: ', null, ['class' => 'col-sm-2 col-form-label col-form-label-lg']) }}
                  <div class="col-sm-4">
                    {{ Form::select('region_country', $countries,'233',array("id"=>"region_country","onchange"=>"hidall();")) }}
                  </div>
                </div>

                @endif
                @if (count($curr_num) > 0)
                <div class="form-group row">
                    {{ Form::label('Select Currency: ', null, ['class' => 'col-sm-2 col-form-label col-form-label-lg']) }}
                  <div class="col-sm-4">
                    {{ Form::select('checkout_currency', $currencies,$curr_num[0]->currency_id,array("id"=>"checkout_currency","onchange"=>"hidall();")) }}
                  </div>
                </div>
                @else
                <div class="form-group row">
                    {{ Form::label('Select Currency: ', null, ['class' => 'col-sm-2 col-form-label col-form-label-lg']) }}
                  <div class="col-sm-4">
                    {{ Form::select('checkout_currency', $currencies,'1',array("id"=>"checkout_currency","onchange"=>"hidall();")) }}
                  </div>
                </div>

                @endif

                <div class="form-group row">
                  {{ Form::label('Search Customer: ', null, ['class' => 'col-sm-2 col-form-label col-form-label-lg']) }}

                    <div class="col-sm-4">
                        {{ Form::text('src_customer','', array('required','id' => 'src_customer',
                            'class'=>'form-control form-control-lg ','placeholder'=>'Enter email Address'))
                        }}
                        <input type="hidden" name="clid" id="clid" value="" />
                        <input type="hidden" name="b_addressid" id="b_addressid" value="" />
                        <input type="hidden" name="s_addressid" id="s_addressid" value="" />
                    </div>
                    <div class="col-sm-4">
                      <button type="button" class="btn btn-success" onClick="lookupcustomer();" >
                          Show List <span class="glyphicon glyphicon-play"></span>
                      </button>
                      <a class="btn btn-success" href="{{ url('/customers/create') }}" onClick="addNewCustomer();">Add New</a>

                    </div>
                    <!-- <div class="col-sm-2">
                        <!-- <button type="button" class="btn btn-success" onClick="lookupcustomer();" > -->
                          <!-- <a class="btn btn-success" href="{{ url('/customers/create') }}" onClick="addNewCustomer();">Add New</a>
                        <!-- </button> -->
                    <!-- </div> -->
                  </div>
                  <div id="customers-view" class="form-group row">
                      @include('orders::selectedcustomer')
                  </div>
				  </div>
          @if (count($customers) > 0)
                <div id="product-section" style="display:;" class="panel-body">
          @else
                <div id="product-section" style="display:none;" class="panel-body">
          @endif


                {!! Form::open(['method'=>'patch','url' => "",'name'=>"frm_porder",'id'=>"frm_porder"]) !!}

                <div class="form-group row">
                  {{ Form::label('Add Item: Select Product Id ', null, ['class' => 'col-sm-2 col-form-label col-form-label-lg']) }}

                    <div class="col-sm-4">
                        {{ Form::text('product_id','', array('required','id' => 'product_id',
                            'class'=>'form-control form-control-lg ','placeholder'=>'Enter Product id'))
                        }}


                    </div>

                    <div class="col-sm-4">
					<button type="button" class="btn btn-success" onClick="lookup();" >
                            Look Up <span class="glyphicon glyphicon-play"></span>
                        </button>
                    </div>
                  </div>
				  <div id="product-view"class="form-group row">
				  </div>
				  </div>
          @if (count($customers) > 0)
                <div id="cart-section" style="display:;" class="panel-body">
          @else
                <div id="cart-section" style="display:none;" class="panel-body">
          @endif
				  <div class="panel-heading">Cart</div>
					  <div id="cartviewlist" class="form-group row">
					  @include('cart::index')
					  </div>
				  </div>
        </div>
			</div>
		</div>
	</div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<script>
//var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  function hidall()
  {
    $("#product-section").hide();
    $("#customers-view").hide();
  }
  function placeorder()
  {
    $.ajax({
          url: "/placeOrder",
          dataType: 'JSON',
          type:'POST',
          data:{"_token": "{{ csrf_token() }}","source":"p","checkout_currency_code":"USD"},
          success: function (res) {
            if (res.success)
            {
              location.href = "/order/"+res.order_id;
            }
          }
        });
  }
  function selectcustomer(id){
   $("#clid").val(id);
   var region_country = $("#region_country").val();
   var checkout_currency = $("#checkout_currency").val();
   $.ajax({
         url: "/addCartCustomer",
         dataType: 'JSON',
         type:'POST',
         data:{"_token": "{{ csrf_token() }}",customer_id: id,"region_country":region_country,"checkout_currency":checkout_currency},
         success: function (res) {
           if (res.success)
           {
             $("#customers-view").html(res.customerView);
             $("#customers-view").show();
             $("#product-section").show();
           }
         //location.href = "/phoneorder";
         }
       });
  }
  function lookupcustomer()
   {
    var customer = $("#src_customer").val();
    $.ajax({
          url: "/getCustomers/" + customer,
          dataType: 'JSON',
          success: function (res) {
            if (res.success)
            {
                $("#customers-view").html(res.customerView);
                $("#customers-view").show();
            }
          }
        });
   }
  function lookup()
	 {
		var productId = $("#product_id").val();
		$.ajax({
          url: "/getProduct/" + productId,
          dataType: 'JSON',
          success: function (res) {
            if (res.success)
            {
                $("#product-view").html(res.productView);
                $("#cart-section").show();
            }
              // /$("#product-view").html(res);
          }
        });
	 }
	 function addtocart(id){
     var invsku = $("#"+id+"-invsku").val();
     var invId =$("#"+id+"-invId").val();
    //  console.log(invsku);
    //  console.log(invId);
		$.ajax({
          url: "/addcart",
          dataType: 'JSON',
          type:'POST',
          data:{"_token": "{{ csrf_token() }}",product_id: id,invsku:invsku,invId:invId},
          success: function (res) {
            if (res.success)
            {
              $("#cartviewlist").html(res.cartview);
            }
          //location.href = "/phoneorder";
          }
        });
	 }
   function updatecart(rowid){
     var qty = $("#qty-filed-"+rowid).val();
     var updateitemsarr = {
       "qty": qty
     };
     $.ajax({
            url: "/updatecart",
            dataType: 'JSON',
            type:'POST',
            data:{"_token": "{{ csrf_token() }}","rowid": rowid,"updateitemsarr":updateitemsarr},
            success: function (res) {
              if (res.success)
              {
                $("#cartviewlist").html(res.cartview);
              }
            }
      });
}
      function deletecartitem(rowid){
        $.ajax({
               url: "/deletecartitem",
               dataType: 'JSON',
               type:'POST',
               data:{"_token": "{{ csrf_token() }}","rowid": rowid},
               success: function (res) {
               location.href = "/phoneorder";
               }
         });
  }
</script>

@endsection
