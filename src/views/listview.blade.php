@extends('layouts/cockpit_master')
@section('content')
<div class="row">
        <div class="col-md-12">
            <h2>Orders</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-sm-2">Order ID</th>
                    <th class="col-sm-4">Date</th>
                    <th class="col-sm-2">Action</th>
                </tr>
                </thead>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->order_id}}</td>
                        <td><a href="/order/{{$order->order_id}}"> {{\Carbon\Carbon::parse($order->created_at)->toDayDateTimeString() }}</a></td>
                        <td><a href="/order/{{$order->order_id}}"><i class="fa fa-search-plus"></i></a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
