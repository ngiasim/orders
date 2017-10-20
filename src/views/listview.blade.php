@extends('layouts/cockpit_master')
@section('content')
<div class="row">
        <div class="col-md-12">
            <h2>Orders</h2>
        </div>
    </div>
    <div class="row">

        <div id="filter-panel" class="filter-panel collapse in" >
            <div class="panel panel-default">
                <div class="panel-body">
                {!! Form::open(array('id' => 'search-form','method'=>'POST', 'class'=>'form-inline ')) !!}
              
                        <div class="form-group">
                         {!! Form::text('order_id', null, array('placeholder' => 'Order Id','class' => 'form-control')) !!}

                        </div>
                        	<div class="form-group">
               				{!! Form::select('order_source',[""=>'All order']+['p'=>'Phone','s'=>'Store'],'',array('class' => 'form-control')) !!}
                     
                        </div>
               			<div class="form-group">
               				{!! Form::select('status',[""=>'Select Status']+$order_statuses,'',array('class' => 'form-control')) !!}
                     
                        </div>
                                  <div class="form-group">
                         {!! Form::text('customer',null, array('placeholder' => 'Customer Name/Email','class' => 'form-control')) !!}

                        </div>
                            <div class="form-group">
                         {!! Form::text('contact_no',null, array('placeholder' => 'Contact #','class' => 'form-control')) !!}

                        </div>
                        
              
                        <div class="form-group">    
                            <button type="submit" class="btn btn-primary filter-col">
                                 Search
                            </button>  
                        </div>
                    	{!! Form::close() !!}
                </div>
            </div>
        </div>    
     

        <div class="">
            <table class="table table-striped" id="order_table">
                <thead>
                <tr>
                    <th class="col-sm-2">Order ID</th>
                
                     <th class="col-sm-3">Customer </th>
                     <th class="col-sm-3">Contact #</th>
         
                      <th class="col-sm-3">Status</th>
                      <th class="col-sm-3">Order Source</th>
                         <th class="col-sm-8">Order Date</th>
                          <th class="col-sm-8">Delivery Date</th>
                    <th class="col-sm-2">Action</th>
                </tr>
                </thead>
              

            </table>
        </div>
    </div>
@endsection
@section('script')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	 var oTable =  $('#order_table').DataTable({
		"bFilter": false,
        processing: true,
        serverSide: true,
        //ajax:'{{ URL::to('order/getdata') }}',
          ajax: {
            url: '{{ URL::to('order/getdata') }}',
            data: function (d) {
               d.order_id = $('input[name=order_id]').val();
                d.status = $('input[name=status]').val();
               d.contact_no = $('input[name=contact_no]').val();
               d.source = $('input[name=source]').val();
               d.customer = $('input[name=customer]').val();
            }
        },
        columns: [
			{data: 'id', name: 'id', "orderable": false},
            {data: 'customer_name', name: 'customer_name'},
            {data: 'customer_no', name: 'customer_no'},
            {data: 'status', name: 'status'},
            {data: 'order_source', name: 'order_source'},
            {data: 'order_date', name: 'order_date'},
            {data: 'delivery_date', name: 'delivery_date'},
            
            {data: 'action', name: 'action'},
        ]
    });

	 $('#search-form').on('submit', function(e) {
		    oTable.draw();
		    e.preventDefault();
		});
});


</script>
@endsection
