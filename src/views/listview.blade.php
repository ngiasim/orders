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
               				{!! Form::email('status', null, array('placeholder' => 'Status','class' => 'form-control')) !!}
                     
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
     

        <div class="col-md-8">
            <table class="table table-striped" id="order_table">
                <thead>
                <tr>
                    <th class="col-sm-2">Order ID</th>
                    <th class="col-sm-4">Date</th>
                     <th class="col-sm-4">Email</th>
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
        ajax:'{{ URL::to('order/getdata') }}',
         /* ajax: {
            url: '{{ URL::to('order/getdata') }}',
            data: function (d) {
               d.order_id = $('input[name=order_id]').val();
                d.status = $('input[name=status]').val();
               d.contact_no = $('input[name=contact_no]').val();
            }
        },*/
        columns: [
			{data: 'id', name: 'id', "orderable": false},
            {data: 'order_date', name: 'order_date'},
            {data: 'customer_email', name: 'customer_email'},
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
