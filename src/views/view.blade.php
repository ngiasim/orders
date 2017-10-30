<!-- edit.blade.php -->
@extends('layouts.cockpit_master')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.form-outer {
     margin: 15px 0px 0px;
     width: 100%;
     display: block;
}

.form-outer .form-group {
     margin-left: 0px!important;
     margin-right: 0px!important;
}

.form-outer .button-area {
     border-top: 1px solid #e8d7cd;
     margin: 0px!important;
     padding: 10px 0px;
}
.form-outer .txt-align-left {
     text-align: left!important;
}
.form-outer .txt-align-center {
     text-align: center!important;
}
.form-outer label.radio-inline { padding-top: 0px; }
.st-id { font-weight: bold;}
.new-line-txt-un { float: left; width: 100%; text-decoration: underline;}
.no-padding-bottom { padding-bottom: 0px; }
.no-margin-bottom { margin-bottom: 0px; }
.width-100p { width: 100%; float:left; }
.margin-top-10 { margin-top: 10px;}
.margin-top-15 { margin-top: 15px; }
.font-size-11 { font-size: 11px}
.font-size-12 { font-size: 12px}
.border-top-bottom { border-top: 1px solid #000; border-bottom: 1px solid #000; padding-top: 10px; padding-bottom: 10px; }
.no-border-top-bottom { padding-top: 10px; border-bottom: 10px; }
</style>
<div class="main-center-area">
    <div class="row">
          <div class="page-header admin-header">
              <h3 id="page-title">Order #{{$order->order_id}}</h3>
              <div class="order-heading-info">
                   Created By <span>Muhammad Fahim</span> on {{\Carbon\Carbon::parse($order->created_at)->toDayDateTimeString() }}
              </div>
          </div>
     </div>

     <!-- Customer Info Code row Start Below -->
     <div class="row">
          <!-- Customer Info Code Start Below -->
          <div class="panel panel-primary">
               <div class="panel-heading">
                    <h3 class="panel-title">Customer Info</h3>
               </div>
               <div class="form-outer">
                    <!-- -->
                    	{!! Form::model($customerData, ['method' => 'PATCH', 'class' => 'form-horizontal form-label-left', 'route' => ['customers.update', $customerData->users_id]]) !!}
                         <fieldset>

                              <!-- for Error Message you need to add class 'has-error' with 'form-group'-->
                              <!-- Text input-->
                              <div class="form-group col-md-6">
                                   <label class="col-md-4 control-label" for="">Customer ID:</label>
                                   <div class="col-md-8">
                                         {!! Form::text('customer_id', $customerData->users_id, array('placeholder' => 'Customer ID','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"3")) !!}
                                     
                                        <!--<span class="help-block">help</span>-->
                                   </div>
                              </div>
                              <div class="form-group col-md-6">
                                   <label class="col-md-4 control-label" for="">Email Address:</label>
                                   <div class="col-md-8">
                                                                      {!! Form::email('email', $customerData->email, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                       
                                        <!--<span class="help-block">help</span>-->
                                   </div>
                              </div>
                              <div class="form-group col-md-6">
                                   <label class="col-md-4 control-label" for="">First Name:</label>
                                   <div class="col-md-8">
                                      {!! Form::text('first_name', $customerData->first_name, array('placeholder' => 'First Name','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"5")) !!}
                                      
                                        <!--<span class="help-block">help</span>-->
                                   </div>
                              </div>
                              <div class="form-group col-md-6">
                                   <label class="col-md-4 control-label" for="">Last Name:</label>
                                   <div class="col-md-8">
                                      {!! Form::text('last_name', $customerData->last_name, array('placeholder' => 'Last Name','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"6")) !!}
                                      
                                        <!--<span class="help-block">help</span>-->
                                   </div>
                              </div>
                              <div class="form-group col-md-6">
                                   <label class="col-md-4 control-label" for="">Contact #:</label>
                                   <div class="col-md-8">
                                   {!! Form::number('contact_no', isset($customerData['customer']->contact_no)?$customerData['customer']->contact_no:"", array('placeholder' => 'Contact #','class' => 'form-control')) !!}
                                      
                                        <!--<span class="help-block">help</span>-->
                                   </div>
                              </div>
                                      <div class="form-group col-md-6">
                                   <label class="col-md-4 control-label" for="">Customer Status:</label>
                                   <div class="col-md-8">

                                    {!! Form::select('status',$statuses, $customerData->status, array('class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"4")) !!}
                                       
                                        <!--<span class="help-block">help</span>-->
                                   </div>
                              </div>
                      
                             {{-- <div class="form-group col-md-6">
                                   <label class="col-md-4 control-label" for="">Alt Contact #:</label>
                                   <div class="col-md-8">
                                        <input id="" name="" type="number" placeholder="Alt Contact #" class="form-control input-md" maxlength="" tabindex="9">
                                        <!--<span class="help-block">help</span>-->
                                   </div>
                              </div>
                              <div class="form-group col-md-6">
                                   <label class="col-md-4 control-label" for="">Alt Phone #:</label>
                                   <div class="col-md-8">
                                        <input id="" name="" type="number" placeholder="Alt Phone #" class="form-control input-md" maxlength="" tabindex="10">
                                        <!--<span class="help-block">help</span>-->
                                   </div>
                              </div> --}}

                              <!-- Button -->
                              <div class="form-group col-md-12 button-area">
                                   <div class="col-md-1 pull-right">
                                   	<button type="submit" class="btn btn-primary" name="from_order" value="{{$order->order_id}}">Save</button>
                                   </div>
                              </div>
                         </fieldset>
                  {!! Form::close() !!}
                    <!-- -->
               </div>
          </div>
          <!-- Customer Info Code End Above -->
     </div>
     <!-- Customer Info Code row End Above -->

     <!-- Order Info Code row Start Below -->
   {{--  <div class="row">
          <!-- Order Info Code Start Below -->
          <div class="panel panel-primary">
               <div class="panel-heading">
                    <h3 class="panel-title">Order Info</h3>
               </div>
               <div class="form-outer">
                    <!-- -->
                    <form class="form-horizontal">
                         <fieldset>

                              <!-- for Error Message you need to add class 'has-error' with 'form-group'-->
                              <!-- Text input-->
                              <div class="form-group col-md-12">
                                   <label class="col-md-2 control-label" for="">Created:</label>
                                   <div class="col-md-10 control-label txt-align-left">
                                        08:52:23 AM PAKISTAN DAYLIGHT TIME OCT 18, 2017
                                   </div>
                              </div>
                              <div class="form-group col-md-12">
                                   <label class="col-md-2 control-label" for="">Shipment Charges:</label>
                                   <div class="col-md-10">
                                        <!-- -->
                                        <table class="table table-bordered no-margin-bottom">
                                             <colgroup>
                                                  <col span="1" style="width: 20%;">
                                                  <col span="1" style="width: 13%;">
                                                  <col span="1" style="width: 24%;">
                                                  <col span="1" style="width: 14%;">
                                                  <col span="1" style="width: 15%;">
                                                  <col span="1" style="width: 14%;">
                                             </colgroup>
                                             <thead class="">
                                                  <tr>
                                                       <th>Shipment Charges ID</th>
                                                       <th>Tracking ID</th>
                                                       <th>Ship Date</th>
                                                       <th>Response Date</th>
                                                       <th>Refund</th>
                                                       <th>Force Delivered</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td>1074897 (1) <span class="st-id">(Store ID: 0)<span> <a href="" title="View XML" class="new-line-txt-un">View XML</a></span></td>
                                                       <td>
                                                            <!--
                                                                 Note: for save side i show two type of button here, use one as per required and remove <br /> tag
                                                            -->
                                                            <a href="" class="btn btn-primary">Edit</a><br />
                                                            <input type="button" class="btn btn-primary" value="Edit"><br />
                                                            <button class="btn btn-primary">Edit</button>
                                                       </td>
                                                       <td>08:52:23 AM PAKISTAN DAYLIGHT TIME OCT 18, 2017</td>
                                                       <td>&nbsp;</td>
                                                       <td><a href="" title="Make a Refund" class="new-line-txt-un">Make a Refund</a></td>
                                                       <td>&nbsp;</td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                        <!-- -->
                                   </div>
                              </div>
                              <div class="form-group col-md-12">
                                   <label class="col-md-2 control-label" for="">Automatic Charges:</label>
                                   <div class="col-md-10">
                                        <!-- -->
                                        <!-- Multiple Radios (inline) -->
                                             <div class="form-group">
                                                  <div class="control-label txt-align-left">
                                                       <label class="radio-inline" for="radios-0">
                                                            <input type="radio" name="radios" id="radios-0" value="1" checked="checked" maxlength="" tabindex="11">
                                                            <span>Enabled</span>
                                                       </label>
                                                       <label class="radio-inline" for="radios-1">
                                                            <input type="radio" name="radios" id="radios-1" value="2" maxlength="" tabindex="12">
                                                            <span>Disabled</span>
                                                       </label>
                                                  </div>
                                             </div>
                                        <!-- -->
                                   </div>
                              </div>
                              <div class="form-group col-md-12">
                                   <label class="col-md-2 control-label" for="">Created:</label>
                                   <div class="col-md-10 control-label txt-align-left">
                                        New - Not Shipped
                                   </div>
                              </div>
                              <div class="form-group col-md-12">
                                   <label class="col-md-2 control-label" for="">Created:</label>
                                   <div class="col-md-10 control-label txt-align-left">
                                        NA
                                   </div>
                              </div>
                              <!-- Button -->
                              <div class="form-group col-md-12 button-area">
                                   <div class="col-md-1 pull-right">
                                        <button id="" name="" class="btn btn-primary">Save</button>
                                   </div>
                              </div>
                         </fieldset>
                    </form>
                    <!-- -->
               </div>
          </div>
          <!-- Order Info Code End Above -->
     </div>  --}}
     <!-- Order Info Code row End Above -->
<div class="row">
          <!-- Order Info Code Start Below -->
          <div class="panel panel-primary">
               <div class="panel-heading">
                    <h3 class="panel-title">Order Info</h3>
               </div>
               <div class="form-outer">
                    <!-- -->
                    <form class="form-horizontal">
                         <fieldset>

                              <!-- for Error Message you need to add class 'has-error' with 'form-group'-->
                              <!-- Text input-->
                        
                              <div class="form-group col-md-12">
                                   <label class="col-md-2 control-label" for="">Shipment Charges:</label>
                                   <div class="col-md-10">
                                        <!-- -->
                                        <table class="table table-bordered no-margin-bottom">
                                             <colgroup>
                                                  <col span="1" style="width: 20%;">
                                                  <col span="1" style="width: 13%;">
                                                  <col span="1" style="width: 24%;">
                                                  <col span="1" style="width: 14%;">
                                                  <col span="1" style="width: 15%;">
                                                  <col span="1" style="width: 14%;">
                                             </colgroup>
                                             <thead class="">
                                                  <tr>
                                                       <th>Shipment Charges ID</th>
                                                       <th>Tracking ID</th>
                                                   
                                                       <th>Status</th>
                                                       <th>Ship Date</th>
                                                       <th>Response Date</th>
                                                       <th>Refund</th>
                                                       <th>Force Delivered</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             @if(count($shipping_details) > 0)
                                             @foreach($shipping_details as $key=>$shipment)
                                                  <tr>
                                                       <td>{{$shipment->shipment_id}}</td>
                                                       <td>{{$shipment->tracking}}</td>
                                                       <td>{{$shipment->shipmentStatus['status_name']}}</td>
                                                       <td>@if($shipment->shipmentStatus['shipment_status_id'] == 2) {{$shipment->updated_at}} @endif</td>
                                                       <td>&nbsp;</td>
                                                       <td><a href="" title="Make a Refund" class="new-line-txt-un">Make a Refund</a></td>
                                                       <td>&nbsp;</td>
                                                  </tr>
                                                  @endforeach
                                                @endif  
                                             </tbody>
                                        </table>
                                        <!-- -->
                                   </div>
                              </div>
                              <div class="form-group col-md-12">
                                   <label class="col-md-2 control-label" for="">Automatic Charges:</label>
                                   <div class="col-md-10">
                                        <!-- -->
                                        <!-- Multiple Radios (inline) -->
                                             <div class="form-group">
                                                  <div class="control-label txt-align-left">
                                                       <label class="radio-inline" for="radios-0">
                                                            <input type="radio" name="radios" id="radios-0" value="1" checked="checked" maxlength="" tabindex="11">
                                                            <span>Enabled</span>
                                                       </label>
                                                       <label class="radio-inline" for="radios-1">
                                                            <input type="radio" name="radios" id="radios-1" value="2" maxlength="" tabindex="12">
                                                            <span>Disabled</span>
                                                       </label>
                                                  </div>
                                             </div>
                                        <!-- -->
                                   </div>
                              </div>
                     
                         </fieldset>
                    </form>
                    <!-- -->
               </div>
          </div>
          <!-- Order Info Code End Above -->
     </div>
     <!-- Shipping/Billing Detail Code row Start Below -->
     <div class="row">

          <!-- Shipping Detail Colum Start Below -->
          <div class="col-md-6 no-padding-left">
               <!-- Shipping Detail Code Start Below -->
               <div class="panel panel-primary">
                    <div class="panel-heading">
                         <h3 class="panel-title">Shipping Details</h3>
                    </div>
                    <div class="form-outer">
                         <!-- -->
                   {{  Form::open(array('url'=>'saveAddress', 'method' => 'post','class'=>'form-horizontal')) }}	
                              <fieldset>
								<input type="hidden" name="order_id" id="order_id" value="{{$order->order_id}}">
								<input type="hidden" name="address_id" id="address_id" value="{{$order['shippingAddress']->address_id}}">
                                   <!-- for Error Message you need to add class 'has-error' with 'form-group'-->
                                   <!-- Text input-->
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">First Name:</label>
                                        <div class="col-md-8">
                                           {!! Form::text('shipping[first_name]', $order['shippingAddress']->first_name, array('placeholder' => 'First Name','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"13")) !!}
                                         
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Last Name:</label>
                                        <div class="col-md-8">
                                          {!! Form::text('shipping[last_name]', $order['shippingAddress']->last_name, array('placeholder' => 'Last Name','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"14")) !!}
                                            
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
            
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Street Address 1:</label>
                                        <div class="col-md-8">
                                          {!! Form::text('shipping[line1]', $order['shippingAddress']->line1, array('placeholder' => 'Street Address 1','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"16")) !!}
                                          
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Street Address 2:</label>
                                        <div class="col-md-8">
                                          {!! Form::text('shipping[line2]', $order['shippingAddress']->line2, array('placeholder' => 'Street Address 2','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"17")) !!}
                                           
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Country:</label>
                                        <div class="col-md-8">
                                             <!-- -->
   											 {!! Form::select('shipping[fk_country]',[""=>'Select Country']+$countries,$order['shippingAddress']->fk_country,array('class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"18")) !!}
                                             <!-- -->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">City Town:</label>
                                        <div class="col-md-8">
                                          {!! Form::text('shipping[city]', $order['shippingAddress']->city, array('placeholder' => 'City','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"19")) !!}
                                        
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">State/Province:</label>
                                        <div class="col-md-8">
                                          {!! Form::text('shipping[state]',$order['shippingAddress']->state, array('placeholder' => 'State','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"20")) !!}

                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Contact #:</label>
                                        <div class="col-md-8">
                                          {!! Form::text('shipping[phone1]',$order['shippingAddress']->phone1, array('placeholder' => 'Contact #','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"21")) !!}

                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Email Address:</label>
                                        <div class="col-md-8">
                                          {!! Form::email('shipping[email]', $order['shippingAddress']->email, array('placeholder' => 'Email','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"22")) !!}
                                        
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Shipping Method:</label>
                                        <div class="col-md-8">
                                             <select name="country" id="country" class="form-control" tabindex="23">
                                                  <option value="0" label="Select a Shipping Method … " selected="selected">Shipping Method …</option>
                                                  <option value="" label="Fedex International">Fedex International</option>
                                                       <option value="" label="Fedex International">Fedex International</option>
                                             </select>
                                        </div>
                                   </div>

                                   <!-- Button -->
                                   <div class="form-group col-md-12 button-area">
                                        <div class="col-md-2 pull-right">
                                             <button id="" name="" type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                   </div>
                              </fieldset>
                              {!! Form::close() !!}
                    </div>
               </div>
               <!-- Shipping Detail Code End Above -->
          </div>
          <!-- Shipping Detail Colum End Above -->

          <!-- Billing Detail Colum Start Below -->
          <div class="col-md-6 no-padding-right">
               <!-- Billing Detail Code Start Below -->
               <div class="panel panel-primary">
                    <div class="panel-heading">
                         <h3 class="panel-title">Billing Details</h3>
                    </div>
                    <div class="form-outer">
                         <!-- -->
                          {{  Form::open(array('url'=>'saveAddress', 'method' => 'post','class'=>'form-horizontal')) }}	
                              <fieldset>
								<input type="hidden" name="order_id" id="order_id" value="{{$order->order_id}}">
								<input type="hidden" name="address_id" id="address_id" value="{{$order['billingAddress']->address_id}}">
                                   <!-- for Error Message you need to add class 'has-error' with 'form-group'-->
                                   <!-- Text input-->
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">First Name:</label>
                                        <div class="col-md-8">
                                           {!! Form::text('billing[first_name]', $order['billingAddress']->first_name, array('placeholder' => 'First Name','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"24")) !!}
                                           
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Last Name:</label>
                                        <div class="col-md-8">
                                               {!! Form::text('billing[last_name]', $order['billingAddress']->last_name, array('placeholder' => 'Last Name','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"25")) !!}
                                            
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                    
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Street Address 1:</label>
                                        <div class="col-md-8">
                                        	  {!! Form::text('billing[line1]', $order['billingAddress']->line1, array('placeholder' => 'Street Address 1','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"27")) !!}
												  
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Street Address 2:</label>
                                        <div class="col-md-8">
                                           {!! Form::text('billing[line2]', $order['billingAddress']->line2, array('placeholder' => 'Street Address 2','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"28")) !!}
													  
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Country:</label>
                                        <div class="col-md-8">
                                        	{!! Form::select('billing[fk_country]',[""=>'Select Country']+$countries,$order['billingAddress']->fk_country,array('class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"29")) !!}

                                             <!-- -->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">City Town:</label>
                                        <div class="col-md-8">
											{!! Form::text('billing[city]', $order['billingAddress']->city, array('placeholder' => 'City','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"30")) !!}
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">State/Province:</label>
                                        <div class="col-md-8">
                                           {!! Form::text('billing[state]',$order['billingAddress']->state, array('placeholder' => 'State','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"31")) !!}
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Contact #:</label>
                                        <div class="col-md-8">
                                        
										{!! Form::text('billing[phone1]',$order['billingAddress']->phone1, array('placeholder' => 'Contact #','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"32")) !!}
                                         
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Email Address:</label>
                                        <div class="col-md-8">
                                          {!! Form::email('billing[email]', $order['billingAddress']->email, array('placeholder' => 'Email','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"33")) !!}
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Profile ID:</label>
                                        <div class="col-md-8 control-label txt-align-left">US (000000)</div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Card Type:</label>
                                        <div class="col-md-8">
                                             <select name="country" id="country" class="form-control" tabindex="34">
                                                  <option value="0" label="Select a Card Type … " selected="selected">Card Type …</option>
                                                  <option value="" label="Master Card">Master Card</option>
                                                       <option value="" label="Visa Card">Visa Card</option>
                                                       <option value="" label="Paypal">Paypal</option>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Credit Card #:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="number" placeholder="Credit Card #" class="form-control input-md" maxlength="" tabindex="35">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Expiration:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="date" placeholder="Credit Card #" class="form-control input-md" maxlength="" tabindex="36">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Pending Paypal Payment:</label>
                                        <div class="col-md-8 control-label txt-align-left"><a href="" title="Confirm Paypal Payment" class="new-line-txt-un">Confirm Paypal Payment</a></div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Duty Status:</label>
                                        <div class="col-md-8 control-label txt-align-left"><span class="new-line-txt-un">NA</span ></div>
                                   </div>

                                   <!-- Button -->
                                   <div class="form-group col-md-12 button-area">
                                        <div class="col-md-2 pull-right">
                                             <button id="" name="" class="btn btn-primary">Save</button>
                                        </div>
                                   </div>
                              </fieldset>
                           {!! Form::close() !!}
                    </div>
               </div>
               <!-- Billing Detail Code End Above -->
          </div>
          <!-- Billing Detail Colum  End Above -->
     </div>
     <!-- Shipping/Billing Detail Code row End Above -->

     <!-- Comments History Code row Start Below -->
  <div class="row">
          <div class="panel panel-primary">
               <div class="panel-heading">
                    <h3 class="panel-title">Comments History</h3>
               </div>
               <div class="form-outer">

                    	{{  Form::open(array('url'=>'addComment/'.$order->order_id, 'method' => 'post','class'=>'form-horizontal')) }}	
                         <fieldset>
                              <!-- All Customer Comments Section Start Below -->
                              <div class="form-group col-md-7">
                                   <div class="form-group">
                                        <div class="col-md-12">All Customer Comments</div>
                                   </div>
                                   <div class="form-group">
                                        <div class="col-md-12">
                                             <!-- -->
                                             <table class="table table-bordered no-margin-bottom">
                                                  <colgroup>
                                                       <col span="1" style="width: 17%;">
                                                       <col span="1" style="width: 20%;">
                                                       <col span="1" style="width: 17%;">
                                                       <col span="1" style="width: 23%;">
                                                       <col span="1" style="width: 23%;">
                                                  </colgroup>
                                                  <thead class="">
                                                       <tr>
                                                            <th>Date</th>
                                                            <th>Email Sent?</th>
                                                            <th>By</th>
                                                            <th>Subject</th>
                                                            <th>Message</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                  @if(count($order['orderComment']) > 0 )
                                                  @foreach($order['orderComment'] as $key=>$comment)
                                                       <tr>
                                                            <td>{{App\Lib\Helper::formatDate($comment->created_at)}}</td>
                                                            <td>@if($comment->is_emailed == '0') No @else  Yes @endif</td>
                                                            <td> {{$comment->user['first_name']." ".$comment->user['last_name']}}</td>
                                                            <td>{{$comment->subject}}</td>
                                                            <td>{{$comment->message}}</td>
                                                       </tr>
                                                       @endforeach
                                                   @endif
                                                  </tbody>
                                             </table>
                                             <!-- -->
                                        </div>
                                   </div>
                              </div>
                            <!-- All Customer Comments Section End Above -->
    					
                              <!-- -->
                              <div class="form-group col-md-5">
                                   <div class="form-group">
                                        <div class="col-md-12 txt-align-left no-padding-left">Add a Comment</div>
                                   </div>
                                   
                                   <div class="form-group">
                                        <!-- -->
                                        <label class="col-md-5 control-label no-padding-left txt-align-left" for="">Send Copy to Customer:</label>
                                        <div class="col-md-7">
                                             <!-- -->
                                             <!-- Multiple Radios (inline) -->
                                             <div class="control-label txt-align-left">
                                                  <label class="radio-inline" for="send-copy-yes">
                                                       <input type="radio" name="is_emailed" id="send-copy-yes" value="1" checked="checked" maxlength="" tabindex="11">
                                                       <span>Enabled</span>
                                                  </label>
                                                  <label class="radio-inline" for="send-copy-no">
                                                       <input type="radio" name="is_emailed" id="send-copy-no" value="0" maxlength="" tabindex="12">
                                                       <span>Disabled</span>
                                                  </label>
                                             </div>
                                             <!-- -->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-5 control-label no-padding-left txt-align-left" for="">Subject:</label>
                                        <div class="col-md-7">
                                             <input id="subject" name="subject" type="text" placeholder="Subject"  required = "required" class="form-control input-md" maxlength="" tabindex="37">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-5 control-label no-padding-left txt-align-left" for="">Message:</label>
                                        <div class="col-md-7">
                                             <textarea class="form-control" placeholder="Message" id="message" name="message" required = "required" tabindex="38"></textarea>
                                        </div>
                                   </div>
                              </div>
                              <!-- -->

                              <!-- Button -->
                              <div class="form-group col-md-12 button-area">
                                   <div class="col-md-1 pull-right">
                                        <button  type="submit" class="btn btn-primary">Save</button>
                                   </div>
                              </div>
 						{!! Form::close() !!}
                         </fieldset>
                   
               </div>
          </div>
     </div> 
     <!-- Comments History Code row Start Below -->

     <!-- Item Orders Code row Start Below -->
    {{--  <div class="row">
          <!-- Item Orders Code Start Below -->
          <div class="panel panel-primary">
               <div class="panel-heading">
                    <h3 class="panel-title">Item Orders</h3>
               </div>
               <div class="form-outer">
                    <!-- -->
                    <form class="form-horizontal">
                         <fieldset>

                              <!-- for Error Message you need to add class 'has-error' with 'form-group'-->
                              <!-- Text input-->
                              <div class="form-group col-md-4">
                                   <label class="col-md-9 control-label txt-align-left" for="">Display Currency:</label>
                                   <div class="col-md-3 control-label txt-align-left">GBP £</div>
                              </div>
                              <div class="form-group col-md-4">
                                   <label class="col-md-5 control-label txt-align-left no-padding-left" for="">Purchase Currency:</label>
                                   <div class="col-md-7 control-label txt-align-left no-padding-right">USD $</div>
                              </div>
                              <div class="form-group col-md-4">
                                   <label class="col-md-9 control-label txt-align-left" for="">Display Currency Exchange Rate:</label>
                                   <div class="col-md-3 control-label txt-align-left">0.7</div>
                              </div>
                              <div class="form-group col-md-4">
                                   <label class="col-md-10 control-label txt-align-left" for="">Purchase Currency Exchange Rate:</label>
                                   <div class="col-md-2 control-label txt-align-left">1</div>
                              </div>
                              <div class="form-group col-md-4">
                                   <label class="col-md-5 control-label txt-align-left no-padding-left" for="">Show:</label>
                                   <div class="col-md-7 control-label txt-align-left no-padding-right">
                                        <select name="country" id="country" class="form-control" tabindex="39">
                                             <option value="0" label="Select a Shipping Method … " selected="selected">Shipping Method …</option>
                                             <option value="" label="Fedex International">Fedex International</option>
                                                  <option value="" label="Fedex International">Fedex International</option>
                                        </select>
                                   </div>
                              </div>

                              <!-- Table -->
                              <div class="form-group row">
                                   <div class="col-md-12">
                                        <!-- -->
                                        <table class="table table-bordered no-margin-bottom">
                                             <colgroup>
                                                  <col span="1" style="width: 11%;"><!--10-->
                                                  <col span="1" style="width: 7%;"><!--17-->
                                                  <col span="1" style="width: 12%;"><!--29-->
                                                  <col span="1" style="width: 9%;"><!--39-->
                                                  <col span="1" style="width: 11%;"><!--53-->
                                                  <col span="1" style="width: 7%;"><!--57-->
                                                  <col span="1" style="width: 5%;"><!--62-->
                                                  <col span="1" style="width: 5%;"><!--67-->
                                                  <col span="1" style="width: 8%;"><!--75-->
                                                  <col span="1" style="width: 7%;"><!--82-->
                                                  <col span="1" style="width: 9%;"><!--91-->
                                                  <col span="1" style="width: 9%;"><!--100-->
                                             </colgroup>
                                             <thead class="">
                                                  <tr>
                                                       <th>Warehouse</th>
                                                       <th>Ship Qty</th>
                                                       <th>Item #</th>
                                                       <th>Image</th>
                                                       <th>Name</th>
                                                       <th>Order/<br />Ship Qty</th>
                                                       <th>Delete</th>
                                                       <th>Split Item</th>
                                                       <th>Retail</th>
                                                       <th>Discount</th>
                                                       <th>Purchase</th>
                                                       <th>Sub Total</th>
                                                  </tr>
                                             </thead>
                                             <tbody style="font-size: 9px;">
                                                  <tr>
                                                       <td>
                                                            <div class="col-md-12 control-label no-padding">
                                                                 <select name="country" id="country" class="form-control" tabindex="40" style="font-size: 9px;">
                                                                      <option value="0" label="Please Select … " selected="selected">Please Select …</option>
                                                                      <option value="" label="One">One</option>
                                                                      <option value="" label="Two">Two</option>
                                                                 </select>
                                                            </div>
                                                       </td>
                                                       <td>
                                                            <div class="col-md-12 control-label no-padding">
                                                                 <select name="country" id="country" class="form-control" tabindex="41" style="font-size: 9px;">
                                                                      <option value="0" label="Ship Qty … " selected="selected">Ship Qty …</option>
                                                                      <option value="" label="1">1</option>
                                                                      <option value="" label="2">2</option>
                                                                 </select>
                                                            </div>
                                                       </td>
                                                       <td> 
                                                            <div class="col-md-12 control-label no-padding">
                                                           
                                                                 <select name="country" id="country" class="form-control" tabindex="42" style="font-size: 9px;">
                                                                      <option value="0" label="Item # … " selected="selected">Item # …</option>
                                                                      <option value="" label="FRCE_8KSS3616">FRCE_8KSS3616</option>
                                                                      <option value="" label="FRCE_8KSS3616">FRCE_8KSS3616</option>
                                                                 </select>
                                                            </div>
                                                            <div class="col-md-12 control-label no-padding txt-align-center">
                                                                 <!--
                                                                      Note: for save side i show two type of button here, use one as per required and remove <br /> tag
                                                                 -->
                                                                 <a href="" class="btn btn-primary">Edit</a><br />
                                                                 <input type="button" class="btn btn-primary" value="Edit"><br />
                                                                 <button class="btn btn-primary">Edit</button>
                                                            </div>
                                                       </td>
                                                       <td>
                                                            <img src="https://i.pinimg.com/736x/b3/5d/c6/b35dc64be219dd383c5322d2d5203a95--mens-leather-bomber-jacket-biker-leather.jpg" alt="" class="img-responsive">
                                                       </td>
                                                       <td>
                                                            <!-- -->
                                                            <div class="product-name width-100p">Pinto Raffia Expert</div>
                                                            <div class="product-name-two width-100p">Platform</div>
                                                            <div class="designer-name width-100p">Robert Clergerie</div>
                                                            <div class="size width-100p margin-top-10">Size: <span class="">Medium</span></div>
                                                            <div class="commodity-class width-100p margin-top-10">Commodity Class: <span class="width-100p">6405.20.1666</span></div>
                                                            <div class="material width-100p margin-top-10">Material: <span class="width-100p">100% natural Raffia</span></div>
                                                            <div class="material width-100p margin-top-10">Country of Manufacture: <span class="width-100p">MA</span></div>
                                                            <div class="material width-100p margin-top-10">Returnable:
                                                                 <div class="width-100p">
                                                                      <!-- -->
                                                                      <div class="col-md-12 no-padding control-label txt-align-left">
                                                                           <label class="radio-inline" for="return-yes">
                                                                                <input type="radio" name="radios" id="return-yes" value="1" checked="checked" tabindex="43">
                                                                                <span class="control-label txt-align-left">Yes</span>
                                                                           </label>
                                                                           <label class="radio-inline" for="return-no">
                                                                                <input type="radio" name="radios" id="return-no" value="2" tabindex="44">
                                                                                <span>No</span>
                                                                           </label>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                            <!-- -->
                                                       </td>
                                                       <td class="txt-align-center">1/0</td>
                                                       <td></td>
                                                       <td></td>
                                                       <td>
                                                            <span class="disp-currency txt-align-center width-100p">GBP £ 185.00</span>
                                                            <span class="purc-currency txt-align-center width-100p">(US $ 225.00)</span>
                                                       </td>
                                                       <td>
                                                            <span class="disp-currency txt-align-center width-100p">GBP £ 0.00</span>
                                                            <span class="purc-currency txt-align-center width-100p">(US $ 0.00)</span>
                                                       </td>
                                                       <td>
                                                            <span class="disp-currency txt-align-center width-100p">GBP £ 185.00</span>
                                                            <span class="purc-currency txt-align-center width-100p">(US $ 225.00)</span>
                                                       </td>
                                                       <td>
                                                            <span class="disp-currency txt-align-center width-100p">GBP £ 185.00</span>
                                                            <span class="purc-currency txt-align-center width-100p">(US $ 225.00)</span>
                                                       </td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                        <!-- -->
                                   </div>
                              </div>

                              <div class="form-group row">
                                   <div class="col-md-6">
                                        <div class="form-group col-md-12 no-padding-left">Customer/Admin/Message</div>
                                        <div class="form-group col-md-10 no-padding-left">
                                             <textarea class="form-control" id="textarea" name="textarea" tabindex="45">default text</textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div clas="">
                                             <div class="heading">
                                                  <div class="col-md-6"></div>
                                                  <div class="col-md-3 font-size-11">Display Currency</div>
                                                  <div class="col-md-3 font-size-11">Default Currency</div>
                                             </div>
                                             <div class="detail-row-outer margin-top-15 width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">MERCHANDISE RETAIL TOTAL :</div>
                                                       <div class="col-md-3 font-size-11">GBP £626.50</div>
                                                       <div class="col-md-3 font-size-11">(US $985.00)</div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">DISCOUNTS :</div>
                                                       <div class="col-md-3 font-size-11">GBP £0.0</div>
                                                       <div class="col-md-3 font-size-11">(US $0.00)</div>
                                                  </div>
                                             </div>
                                             <div class="detail-row-outer margin-top-15 width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">TAX :</div>
                                                       <div class="col-md-3 font-size-11">GBP £0.00</div>
                                                       <div class="col-md-3 font-size-11">(US $0.00)</div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">ORIGINAL sHIPPING & HANDLING (FEDEX INTERNATIONAL PRIORITY) :</div>
                                                       <div class="col-md-3 font-size-11">GBP £0.0</div>
                                                       <div class="col-md-3 font-size-11">(US $0.00)</div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">GIFT WRAP :</div>
                                                       <div class="col-md-3 font-size-11">GBP £0.0</div>
                                                       <div class="col-md-3 font-size-11">(US $0.00)</div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">GIFT CERTIFICATION :</div>
                                                       <div class="col-md-3 font-size-11">(GBP £0.0)</div>
                                                       <div class="col-md-3 font-size-11">&nbsp;</div>
                                                  </div>
                                             </div>
                                             <div class="detail-row-outer margin-top-15 width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">DUTY :</div>
                                                       <div class="col-md-3 font-size-11">GBP £0.00</div>
                                                       <div class="col-md-3 font-size-11">(US $0.00)</div>
                                                  </div>
                                             </div>
                                             <div class="detail-row-outer margin-top-15 width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11 no-border-top-bottom">TOTAL :</div>
                                                       <div class="col-md-3 font-size-11 border-top-bottom">GBP £626.50</div>
                                                       <div class="col-md-3 font-size-11 border-top-bottom">(US $895.00)</div>
                                                  </div>
                                             </div>
                                             <div class="detail-row-outer width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11 no-border-top-bottom">CHECKOUT TOTAL :</div>
                                                       <div class="col-md-3 font-size-11 no-border-top-bottom">GBP £626.50</div>
                                                       <div class="col-md-3 font-size-11 no-border-top-bottom">(US $895.00)</div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>

                              <!-- Button -->
                              <div class="form-group col-md-12 button-area">
                                   <div class="col-md-1 pull-right">
                                        <button id="" name="" class="btn btn-primary">Save</button>
                                   </div>
                              </div>
                         </fieldset>
                    </form>
                    <!-- -->
               </div>
          </div>
          <!-- Item Orders Code End Above -->
     </div> --}}
     <!-- Item Orders Code row End Above -->
 <div class="row">
          <!-- Item Orders Code Start Below -->
          <div class="panel panel-primary">
               <div class="panel-heading">
                    <h3 class="panel-title">Item Orders</h3>
               </div>
               <div class="form-outer">
                    <!-- -->
                    	{{  Form::open(array('url'=>'order/update/'.$order->order_id, 'method' => 'post','class'=>'form-horizontal')) }}	
                         <fieldset>

                        

                              <!-- Table -->
                              <div class="form-group row">
                                   <div class="col-md-12">
                                        <!-- -->
                                        <table class="table table-bordered no-margin-bottom">
                                             <colgroup>
                                                  <col span="1" style="width: 20%;"><!--10-->
                                                  <col span="1" style="width: 7%;"><!--17-->
                                                  <col span="1" style="width: 12%;"><!--29-->
                                                  <col span="1" style="width: 9%;"><!--39-->
                                                  <col span="1" style="width: 11%;"><!--53-->
                                                  <col span="1" style="width: 7%;"><!--57-->
                                                  <col span="1" style="width: 5%;"><!--62-->
                                                  <col span="1" style="width: 5%;"><!--67-->
                                                  <col span="1" style="width: 8%;"><!--75-->
                                                  <col span="1" style="width: 7%;"><!--82-->
                                                  <col span="1" style="width: 9%;"><!--91-->
                                                  <col span="1" style="width: 9%;"><!--100-->
                                             </colgroup>
                                             <thead class="">
                                                  <tr>
                                                   	<th>Warehouses</th> 
                                                     <!--  <th>Ship Qty</th> 
                                                       <th>Item #</th> -->
                                                       <th>Image</th>
                                                       <th>Name</th>
                                                       <th>Order/<br />Ship Qty</th>
                                                       <th>Retail</th>
                                                       <th>Discount</th>
                                                       <th>Purchase</th>
                                                       <th>Sub Total</th>
                                                  </tr>
                                             </thead>
                                             <tbody style="font-size: 9px;">
                                              @foreach($order->orderItem as $item)
                         						<tr>
                                                       <td>
                                                             <div class="col-md-12 control-label no-padding">
                                                              @if($item->fk_warehouse > 0)
                                                              {!! Form::select('warehouse['.$item->order_product_id.']',["0"=>'Select Warehouse']+$item->warehouses,$item->fk_warehouse,array('class' => 'form-control warehouse','disabled'=>'disabled','maxlength'=>"",'tabindex'=>"40",'style'=>'font-size: 9px;')) !!}
                                                              @else
                                                              {!! Form::select('warehouse['.$item->order_product_id.']',["0"=>'Select Warehouse']+$item->warehouses,$item->fk_warehouse,array('class' => 'form-control warehouse','maxlength'=>"",'tabindex'=>"40",'style'=>'font-size: 9px;')) !!}
                                                              @endif
                                                               
                                                            </div>
                                                       </td>
                                                      {{-- <td>
                                                            <div class="col-md-12 control-label no-padding">
                                                                 <select name="country" id="country" class="form-control" tabindex="41" style="font-size: 9px;">
                                                                      <option value="0" label="Ship Qty … " selected="selected">Ship Qty …</option>
                                                                      <option value="" label="1">1</option>
                                                                      <option value="" label="2">2</option>
                                                                 </select>
                                                            </div>
                                                       </td> 
                                                       <td>
                                                            <div class="col-md-12 control-label no-padding">
                                                                 <select name="country" id="country" class="form-control" tabindex="42" style="font-size: 9px;">
                                                                      <option value="0" label="Item # … " selected="selected">Item # …</option>
                                                                      <option value="" label="FRCE_8KSS3616">FRCE_8KSS3616</option>
                                                                      <option value="" label="FRCE_8KSS3616">FRCE_8KSS3616</option>
                                                                 </select>
                                                            </div>
                                                            <div class="col-md-12 control-label no-padding txt-align-center">
                                                            
                                                                 <a href="" class="btn btn-primary">Edit</a><br />
                                                                <!--   <input type="button" class="btn btn-primary" value="Edit"><br />
                                                                 <button class="btn btn-primary">Edit</button> -->
                                                            </div>
                                                       </td> --}}
                                                       <td>
                                                            <img src="https://i.pinimg.com/736x/b3/5d/c6/b35dc64be219dd383c5322d2d5203a95--mens-leather-bomber-jacket-biker-leather.jpg" alt="" class="img-responsive">
                                                       </td>
                                                       <td>
                                                            <!-- -->
                                                            <div class="product-name width-100p">{{$item->product->productsDescription->products_name}}</div>
                                                           <!--  
                                                           	<div class="product-name-two width-100p">Platform</div>
                                                            <div class="designer-name width-100p">Robert Clergerie</div> 
                                                            -->
                                                            <div class="size width-100p margin-top-10">Inventory: <span class="">{{$item->inventory_code}}</span></div>
                                                           
                              
                                                            </div>
                                                            <!-- -->
                                                       </td>
                                                       <td class="txt-align-center">{{$item->ordered_quantity}}</td>
                                                      
                                                       <td>
                                                            <span class="disp-currency txt-align-center width-100p">{{number_format($item->products_price,2,'.','')}}</span>
                                          
                                                       </td>
                                                       <td>
                                                            <span class="disp-currency txt-align-center width-100p"> 0.00</span>
                                                         
                                                       </td>
                                                       <td>
														<span class="disp-currency txt-align-center width-100p">{{number_format($item->products_price,2,'.','')}}</span>
                                                       </td>
                                                       <td>
                                                           <span class="disp-currency txt-align-center width-100p">{{number_format($item->products_price*$item->ordered_quantity,2,'.','')}}</span>

                                                       </td>
                                                  </tr>
                                                  @endforeach
                                             </tbody>
                                        </table>
                               
                               <div class="row"> 
                                    
		                            <!--  <div class="col-md-12 button-area">
		                                   <div class="col-md-1 pull-left">
		                                        <button id="assign" name="assign" class="btn btn-primary">Assign</button>
		                                   </div>
		                              </div> -->
		                              @if($orderItemCount != $shipItemCount)
			                        <div class="col-md-12 ">
			                      		{{ Config::get('services.shipping.company_name')}}
			                        </div>
			                        
			                        <div class=" col-md-12 ">
			                         	{!! Form::select('method',[""=>'Select Method']+$shipping_methods,null,array('class' => 'form-control input-md')) !!}
			                        </div>
			                           <div class="col-md-12 button-area">
		                                   <div class="col-md-1 ">
		                                        <button id="pick" name="pick"  value="pick" class="btn btn-primary">Pick</button>
		                                   </div>
		                              </div>
		                            
		                            
		                            @endif  
		                            
		                            @if($shipItemCount > 0)
		                              <div class="col-md-12 button-area">
		                                   <div class="col-md-1 ">
		                                        <button id="ship" name="ship" value="ship" class="btn btn-primary">Ship</button>
		                                   </div>
		                              </div>
		                            @endif
                                 </div> 
                                        <!-- -->
                                   </div>
                              </div>

                              <div class="form-group row">
                                   <div class="col-md-6">
                                        <div class="form-group col-md-12 no-padding-left">Customer/Admin/Message</div>
                                        <div class="form-group col-md-10 no-padding-left">
                                             <textarea class="form-control" id="textarea" name="textarea" tabindex="45">default text</textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                       <!--   <div clas="">
                                             <div class="heading">
                                                  <div class="col-md-6"></div>
                                                  <div class="col-md-3 font-size-11">Display Currency</div>
                                                  <div class="col-md-3 font-size-11">Default Currency</div>
                                             </div>
                                             <div class="detail-row-outer margin-top-15 width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">MERCHANDISE RETAIL TOTAL :</div>
                                                       <div class="col-md-3 font-size-11">GBP £626.50</div>
                                                       <div class="col-md-3 font-size-11">(US $985.00)</div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">DISCOUNTS :</div>
                                                       <div class="col-md-3 font-size-11">GBP £0.0</div>
                                                       <div class="col-md-3 font-size-11">(US $0.00)</div>
                                                  </div>
                                             </div>
                                             <div class="detail-row-outer margin-top-15 width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">TAX :</div>
                                                       <div class="col-md-3 font-size-11">GBP £0.00</div>
                                                       <div class="col-md-3 font-size-11">(US $0.00)</div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">ORIGINAL sHIPPING & HANDLING (FEDEX INTERNATIONAL PRIORITY) :</div>
                                                       <div class="col-md-3 font-size-11">GBP £0.0</div>
                                                       <div class="col-md-3 font-size-11">(US $0.00)</div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">GIFT WRAP :</div>
                                                       <div class="col-md-3 font-size-11">GBP £0.0</div>
                                                       <div class="col-md-3 font-size-11">(US $0.00)</div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">GIFT CERTIFICATION :</div>
                                                       <div class="col-md-3 font-size-11">(GBP £0.0)</div>
                                                       <div class="col-md-3 font-size-11">&nbsp;</div>
                                                  </div>
                                             </div>
                                             <div class="detail-row-outer margin-top-15 width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">DUTY :</div>
                                                       <div class="col-md-3 font-size-11">GBP £0.00</div>
                                                       <div class="col-md-3 font-size-11">(US $0.00)</div>
                                                  </div>
                                             </div>
                                             <div class="detail-row-outer margin-top-15 width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11 no-border-top-bottom">TOTAL :</div>
                                                       <div class="col-md-3 font-size-11 border-top-bottom">GBP £626.50</div>
                                                       <div class="col-md-3 font-size-11 border-top-bottom">(US $895.00)</div>
                                                  </div>
                                             </div>
                                             <div class="detail-row-outer width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11 no-border-top-bottom">CHECKOUT TOTAL :</div>
                                                       <div class="col-md-3 font-size-11 no-border-top-bottom">GBP £626.50</div>
                                                       <div class="col-md-3 font-size-11 no-border-top-bottom">(US $895.00)</div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>-->
                                    <div class="detail-row-outer margin-top-15 width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">MERCHANDISE RETAIL TOTAL :</div>
                                                       <div class="col-md-3 font-size-11">{{$order->order_total}}</div>
                                                      
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">DISCOUNTS :</div> 
                                                       <div class="col-md-3 font-size-11">0.00</div>
                                                  </div>
                                             
                                                          <div class="row">
                                                       <div class="col-md-6 font-size-11">TAX :</div> 
                                                       <div class="col-md-3 font-size-11">{{$order->tax}}</div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">SHIPPING :</div> 
                                                       <div class="col-md-3 font-size-11">free</div>
                                                  </div>
                                             </div>
                                             
                                                       <div class="detail-row-outer width-100p">
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11 no-border-top-bottom">CHECKOUT TOTAL :</div>
                                                       <div class="col-md-3 font-size-11 no-border-top-bottom">{{$order->order_final_total}}</div>
                                                      
                                                  </div>
                                             </div>

                              </div>

                              <!-- Button -->
                              <div class="form-group col-md-12 button-area">
                                   <div class="col-md-1 pull-right">
                                        <button id="" name="" class="btn btn-primary">Save</button>
                                   </div>
                              </div>
                         </fieldset>
                    {!! Form::close() !!}
                    <!-- -->
               </div>
          </div>
          <!-- Item Orders Code End Above -->
     </div>
     <!-- Order Processing Log/Customer Status Change Log Code row Start Below -->
     <div class="row">

          <!-- Order Processing Log Colum Start Below -->
          <div class="col-md-6 no-padding-left">
               <!-- Order Processing Log Code Start Below -->
               <div class="panel panel-primary">
                    <div class="panel-heading">
                         <h3 class="panel-title">Order Processing Log</h3>
                    </div>
                    <div class="form-outer">
                         <!-- All Customer Comments Section Start Below -->
                         <div class="form-group row">
                              <div class="col-md-12">
                                   <!-- -->
                                   <table class="table table-bordered no-margin-bottom">
                                        <colgroup>
                                             <col span="1" style="width: 20%;">
                                             <col span="1" style="width: 20%;">
                                             <col span="1" style="width: 35%;">
                                             <col span="1" style="width: 25%;">
                                        </colgroup>
                                        <thead class="">
                                             <tr>
                                                  <th>DATE</th>
                                                  <th>ORDER ID</th>
                                                  <th>ACTION</th>
                                                  <th>USER NAME</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>206347</td>
                                                  <td>Dispatch/Return done</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>206347</td>
                                                  <td>Dispatch/Return done</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>206347</td>
                                                  <td>Dispatch/Return done</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>206347</td>
                                                  <td>Dispatch/Return done</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>206347</td>
                                                  <td>Dispatch/Return done</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>206347</td>
                                                  <td>Dispatch/Return done</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>206347</td>
                                                  <td>Dispatch/Return done</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>206347</td>
                                                  <td>Dispatch/Return done</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>206347</td>
                                                  <td>Dispatch/Return done</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>206347</td>
                                                  <td>Dispatch/Return done</td>
                                                  <td>dev</td>
                                             </tr>
                                        </tbody>
                                   </table>
                                   <!-- -->
                              </div>
                         </div>

                         <!-- All Customer Comments Section End Above -->
                    </div>
               </div>
               <!-- Order Processing Log Code End Above -->
          </div>
          <!-- Order Processing Log Colum End Above -->

          <!-- Customer Status Change Log Colum Start Below -->
          <div class="col-md-6 no-padding-right">
               <!-- Customer Status Change Log Code Start Below -->
               <div class="panel panel-primary">
                    <div class="panel-heading">
                         <h3 class="panel-title">Customer Status Change Log</h3>
                    </div>
                    <div class="form-outer">
                         <!-- All Customer Comments Section Start Below -->
                         <div class="form-group row">
                              <div class="col-md-12">
                                   <!-- -->
                                   <table class="table table-bordered no-margin-bottom">
                                        <colgroup>
                                             <col span="1" style="width: 20%;">
                                             <col span="1" style="width: 25%;">
                                             <col span="1" style="width: 30%;">
                                             <col span="1" style="width: 25%;">
                                        </colgroup>
                                        <thead class="">
                                             <tr>
                                                  <th>DATE</th>
                                                  <th>FROM</th>
                                                  <th>TO</th>
                                                  <th>USER NAME</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>Verified</td>
                                                  <td>Excellent</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>Verified</td>
                                                  <td>Excellent</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>Verified</td>
                                                  <td>Excellent</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>Verified</td>
                                                  <td>Excellent</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>Verified</td>
                                                  <td>Excellent</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>Verified</td>
                                                  <td>Excellent</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>Verified</td>
                                                  <td>Excellent</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>Verified</td>
                                                  <td>Excellent</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>Verified</td>
                                                  <td>Excellent</td>
                                                  <td>dev</td>
                                             </tr>
                                             <tr>
                                                  <td>Aug 18, 2017</td>
                                                  <td>Verified</td>
                                                  <td>Excellent</td>
                                                  <td>dev</td>
                                             </tr>
                                        </tbody>
                                   </table>
                                   <!-- -->
                              </div>
                         </div>

                         <!-- All Customer Comments Section End Above -->
                    </div>
               </div>
               <!--Customer Status Change Log Code End Above -->
          </div>
          <!-- Customer Status Change Log Colum End Above -->
     </div>
     <!-- Shipping/Billing Detail Code row End Above -->

</div>


{{--<div class="row">
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
   </div> --}}
   @section('script')
	<script type="text/javascript">

	$('.warehouse').on('change', function() {
		if(this.value == "0")
		{
			 $('.warehouse').attr('disabled',false);
		}
		else
		{
		  $('.warehouse option[value!="'+this.value+'"]').attr('disabled',true);
		  $('.warehouse option[value="0"]').attr('disabled',false);
		}
	})
   	</script>
   @endsection 
   
@endsection 

