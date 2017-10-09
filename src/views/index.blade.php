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
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Phone Order</div>

                <div class="panel-body">

                {!! Form::open(['method'=>'patch','url' => "",'name'=>"frm_porder",'id'=>"frm_porder"]) !!}

                <div class="form-group row">
                  {{ Form::label('Search Customer: ', null, ['class' => 'col-sm-2 col-form-label col-form-label-lg']) }}

                    <div class="col-sm-5">
                        {{ Form::text('src_customer','', array('required','id' => 'src_customer',
                            'class'=>'form-control form-control-lg ','placeholder'=>'Enter email Address'))
                        }}
                        <input type="hidden" name="clid" id="clid" value="" />
                        <input type="hidden" name="b_addressid" id="b_addressid" value="" />
                        <input type="hidden" name="s_addressid" id="s_addressid" value="" />

                    </div>
                    <div class="col-sm-4">
                        or <a href="javascript:void(0)" onClick="addNewCustomer();">Add New</a>
                    </div>
                  </div>
				  </div>

				  <div class="panel-body">

                {!! Form::open(['method'=>'patch','url' => "",'name'=>"frm_porder",'id'=>"frm_porder"]) !!}

                <div class="form-group row">
                  {{ Form::label('Add Item: Select Product Id ', null, ['class' => 'col-sm-2 col-form-label col-form-label-lg']) }}

                    <div class="col-sm-5">
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
				  <div class="panel-heading">Cart</div>
				  <div class="panel-body">
					  <div class="form-group row">
					  @include('cart.index')
					  </div>
				  </div>
			</div>
		</div>
	</div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<script>

//var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  function lookup()
	 {
		var productId = $("#product_id").val();
		$.ajax({
          url: "http://cockpit.femi9.local/getProduct/" + productId,
          dataType: 'JSON',
          success: function (res) {
              $("#product-view").html(res);
          }
        });
	 }

	 function addtocart(id){
		$.ajax({
          url: "http://cockpit.femi9.local/addcart",
          dataType: 'JSON',
          type:'POST',
          data:{"_token": "{{ csrf_token() }}",product_id: id},
          success: function (res) {
          location.href = "/phoneorder";
          }
        });
	 }
   function updatecart(rowid){
     var qty = $("#qty-filed-"+rowid).val();
     var updateitemsarr = {
       "qty": qty
     };
     $.ajax({
            url: "http://cockpit.femi9.local/updatecart",
            dataType: 'JSON',
            type:'POST',
            data:{"_token": "{{ csrf_token() }}","rowid": rowid,"updateitemsarr":updateitemsarr},
            success: function (res) {
            location.href = "/phoneorder";
            }
      });
  }
</script>

@endsection
