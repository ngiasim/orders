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
                    <form class="form-horizontal">
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
                                    {!! Form::text('status', ($customerData->status == 1)?"Active":"InActive", array('placeholder' => 'Status','class' => 'form-control input-md','maxlength'=>"",'tabindex'=>"4")) !!}
                                       
                                        <!--<span class="help-block">help</span>-->
                                   </div>
                              </div>
                      
                              <div class="form-group col-md-6">
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
          <!-- Customer Info Code End Above -->
     </div>
     <!-- Customer Info Code row End Above -->

     <!-- Order Info Code row Start Below -->
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
     </div>
     <!-- Order Info Code row End Above -->

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
                         <form class="form-horizontal">
                              <fieldset>

                                   <!-- for Error Message you need to add class 'has-error' with 'form-group'-->
                                   <!-- Text input-->
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">First Name:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="First Name" class="form-control input-md" maxlength="" tabindex="13">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Last Name:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="Last Name" class="form-control input-md" maxlength="" tabindex="14">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Company:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="Company" class="form-control input-md" maxlength="" tabindex="15">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Street Address 1:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="Street Address 1" class="form-control input-md" maxlength="" tabindex="16">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Street Address 2:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="Street Address 2" class="form-control input-md" maxlength="" tabindex="17">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Country:</label>
                                        <div class="col-md-8">
                                             <!-- -->
                                             <select name="country" id="country" class="form-control" tabindex="18">
                                                  <option value="0" label="Select a country … " selected="selected">Country …</option>
                                                  <optgroup id="country-optgroup-Africa" label="Africa">
                                                       <option value="DZ" label="Algeria">Algeria</option>
                                                       <option value="AO" label="Angola">Angola</option>
                                                       <option value="BJ" label="Benin">Benin</option>
                                                       <option value="BW" label="Botswana">Botswana</option>
                                                       <option value="BF" label="Burkina Faso">Burkina Faso</option>
                                                       <option value="BI" label="Burundi">Burundi</option>
                                                       <option value="CM" label="Cameroon">Cameroon</option>
                                                       <option value="CV" label="Cape Verde">Cape Verde</option>
                                                       <option value="CF" label="Central African Republic">Central African Republic</option>
                                                       <option value="TD" label="Chad">Chad</option>
                                                       <option value="KM" label="Comoros">Comoros</option>
                                                       <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                                                       <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                                                       <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                                                       <option value="DJ" label="Djibouti">Djibouti</option>
                                                       <option value="EG" label="Egypt">Egypt</option>
                                                       <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                                                       <option value="ER" label="Eritrea">Eritrea</option>
                                                       <option value="ET" label="Ethiopia">Ethiopia</option>
                                                       <option value="GA" label="Gabon">Gabon</option>
                                                       <option value="GM" label="Gambia">Gambia</option>
                                                       <option value="GH" label="Ghana">Ghana</option>
                                                       <option value="GN" label="Guinea">Guinea</option>
                                                       <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                                                       <option value="KE" label="Kenya">Kenya</option>
                                                       <option value="LS" label="Lesotho">Lesotho</option>
                                                       <option value="LR" label="Liberia">Liberia</option>
                                                       <option value="LY" label="Libya">Libya</option>
                                                       <option value="MG" label="Madagascar">Madagascar</option>
                                                       <option value="MW" label="Malawi">Malawi</option>
                                                       <option value="ML" label="Mali">Mali</option>
                                                       <option value="MR" label="Mauritania">Mauritania</option>
                                                       <option value="MU" label="Mauritius">Mauritius</option>
                                                       <option value="YT" label="Mayotte">Mayotte</option>
                                                       <option value="MA" label="Morocco">Morocco</option>
                                                       <option value="MZ" label="Mozambique">Mozambique</option>
                                                       <option value="NA" label="Namibia">Namibia</option>
                                                       <option value="NE" label="Niger">Niger</option>
                                                       <option value="NG" label="Nigeria">Nigeria</option>
                                                       <option value="RW" label="Rwanda">Rwanda</option>
                                                       <option value="RE" label="Réunion">Réunion</option>
                                                       <option value="SH" label="Saint Helena">Saint Helena</option>
                                                       <option value="SN" label="Senegal">Senegal</option>
                                                       <option value="SC" label="Seychelles">Seychelles</option>
                                                       <option value="SL" label="Sierra Leone">Sierra Leone</option>
                                                       <option value="SO" label="Somalia">Somalia</option>
                                                       <option value="ZA" label="South Africa">South Africa</option>
                                                       <option value="SD" label="Sudan">Sudan</option>
                                                       <option value="SZ" label="Swaziland">Swaziland</option>
                                                       <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                                       <option value="TZ" label="Tanzania">Tanzania</option>
                                                       <option value="TG" label="Togo">Togo</option>
                                                       <option value="TN" label="Tunisia">Tunisia</option>
                                                       <option value="UG" label="Uganda">Uganda</option>
                                                       <option value="EH" label="Western Sahara">Western Sahara</option>
                                                       <option value="ZM" label="Zambia">Zambia</option>
                                                       <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                                                  </optgroup>
                                                  <optgroup id="country-optgroup-Americas" label="Americas">
                                                       <option value="AI" label="Anguilla">Anguilla</option>
                                                       <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
                                                       <option value="AR" label="Argentina">Argentina</option>
                                                       <option value="AW" label="Aruba">Aruba</option>
                                                       <option value="BS" label="Bahamas">Bahamas</option>
                                                       <option value="BB" label="Barbados">Barbados</option>
                                                       <option value="BZ" label="Belize">Belize</option>
                                                       <option value="BM" label="Bermuda">Bermuda</option>
                                                       <option value="BO" label="Bolivia">Bolivia</option>
                                                       <option value="BR" label="Brazil">Brazil</option>
                                                       <option value="VG" label="British Virgin Islands">British Virgin Islands</option>
                                                       <option value="CA" label="Canada">Canada</option>
                                                       <option value="KY" label="Cayman Islands">Cayman Islands</option>
                                                       <option value="CL" label="Chile">Chile</option>
                                                       <option value="CO" label="Colombia">Colombia</option>
                                                       <option value="CR" label="Costa Rica">Costa Rica</option>
                                                       <option value="CU" label="Cuba">Cuba</option>
                                                       <option value="DM" label="Dominica">Dominica</option>
                                                       <option value="DO" label="Dominican Republic">Dominican Republic</option>
                                                       <option value="EC" label="Ecuador">Ecuador</option>
                                                       <option value="SV" label="El Salvador">El Salvador</option>
                                                       <option value="FK" label="Falkland Islands">Falkland Islands</option>
                                                       <option value="GF" label="French Guiana">French Guiana</option>
                                                       <option value="GL" label="Greenland">Greenland</option>
                                                       <option value="GD" label="Grenada">Grenada</option>
                                                       <option value="GP" label="Guadeloupe">Guadeloupe</option>
                                                       <option value="GT" label="Guatemala">Guatemala</option>
                                                       <option value="GY" label="Guyana">Guyana</option>
                                                       <option value="HT" label="Haiti">Haiti</option>
                                                       <option value="HN" label="Honduras">Honduras</option>
                                                       <option value="JM" label="Jamaica">Jamaica</option>
                                                       <option value="MQ" label="Martinique">Martinique</option>
                                                       <option value="MX" label="Mexico">Mexico</option>
                                                       <option value="MS" label="Montserrat">Montserrat</option>
                                                       <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
                                                       <option value="NI" label="Nicaragua">Nicaragua</option>
                                                       <option value="PA" label="Panama">Panama</option>
                                                       <option value="PY" label="Paraguay">Paraguay</option>
                                                       <option value="PE" label="Peru">Peru</option>
                                                       <option value="PR" label="Puerto Rico">Puerto Rico</option>
                                                       <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                                                       <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                       <option value="LC" label="Saint Lucia">Saint Lucia</option>
                                                       <option value="MF" label="Saint Martin">Saint Martin</option>
                                                       <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                       <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                       <option value="SR" label="Suriname">Suriname</option>
                                                       <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
                                                       <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                       <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                                       <option value="US" label="United States">United States</option>
                                                       <option value="UY" label="Uruguay">Uruguay</option>
                                                       <option value="VE" label="Venezuela">Venezuela</option>
                                                  </optgroup>
                                                  <optgroup id="country-optgroup-Asia" label="Asia">
                                                       <option value="AF" label="Afghanistan">Afghanistan</option>
                                                       <option value="AM" label="Armenia">Armenia</option>
                                                       <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                                                       <option value="BH" label="Bahrain">Bahrain</option>
                                                       <option value="BD" label="Bangladesh">Bangladesh</option>
                                                       <option value="BT" label="Bhutan">Bhutan</option>
                                                       <option value="BN" label="Brunei">Brunei</option>
                                                       <option value="KH" label="Cambodia">Cambodia</option>
                                                       <option value="CN" label="China">China</option>
                                                       <option value="CY" label="Cyprus">Cyprus</option>
                                                       <option value="GE" label="Georgia">Georgia</option>
                                                       <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
                                                       <option value="IN" label="India">India</option>
                                                       <option value="ID" label="Indonesia">Indonesia</option>
                                                       <option value="IR" label="Iran">Iran</option>
                                                       <option value="IQ" label="Iraq">Iraq</option>
                                                       <option value="IL" label="Israel">Israel</option>
                                                       <option value="JP" label="Japan">Japan</option>
                                                       <option value="JO" label="Jordan">Jordan</option>
                                                       <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                                                       <option value="KW" label="Kuwait">Kuwait</option>
                                                       <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                                                       <option value="LA" label="Laos">Laos</option>
                                                       <option value="LB" label="Lebanon">Lebanon</option>
                                                       <option value="MO" label="Macau SAR China">Macau SAR China</option>
                                                       <option value="MY" label="Malaysia">Malaysia</option>
                                                       <option value="MV" label="Maldives">Maldives</option>
                                                       <option value="MN" label="Mongolia">Mongolia</option>
                                                       <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                                                       <option value="NP" label="Nepal">Nepal</option>
                                                       <option value="NT" label="Neutral Zone">Neutral Zone</option>
                                                       <option value="KP" label="North Korea">North Korea</option>
                                                       <option value="OM" label="Oman">Oman</option>
                                                       <option value="PK" label="Pakistan">Pakistan</option>
                                                       <option value="PS" label="Palestinian Territories">Palestinian Territories</option>
                                                       <option value="YD" label="People's Democratic Republic of Yemen">People's Democratic Republic of Yemen</option>
                                                       <option value="PH" label="Philippines">Philippines</option>
                                                       <option value="QA" label="Qatar">Qatar</option>
                                                       <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                                                       <option value="SG" label="Singapore">Singapore</option>
                                                       <option value="KR" label="South Korea">South Korea</option>
                                                       <option value="LK" label="Sri Lanka">Sri Lanka</option>
                                                       <option value="SY" label="Syria">Syria</option>
                                                       <option value="TW" label="Taiwan">Taiwan</option>
                                                       <option value="TJ" label="Tajikistan">Tajikistan</option>
                                                       <option value="TH" label="Thailand">Thailand</option>
                                                       <option value="TL" label="Timor-Leste">Timor-Leste</option>
                                                       <option value="TR" label="Turkey">Turkey</option>
                                                       <option value="™" label="Turkmenistan">Turkmenistan</option>
                                                       <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
                                                       <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                                                       <option value="VN" label="Vietnam">Vietnam</option>
                                                       <option value="YE" label="Yemen">Yemen</option>
                                                  </optgroup>
                                                  <optgroup id="country-optgroup-Europe" label="Europe">
                                                       <option value="AL" label="Albania">Albania</option>
                                                       <option value="AD" label="Andorra">Andorra</option>
                                                       <option value="AT" label="Austria">Austria</option>
                                                       <option value="BY" label="Belarus">Belarus</option>
                                                       <option value="BE" label="Belgium">Belgium</option>
                                                       <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                       <option value="BG" label="Bulgaria">Bulgaria</option>
                                                       <option value="HR" label="Croatia">Croatia</option>
                                                       <option value="CY" label="Cyprus">Cyprus</option>
                                                       <option value="CZ" label="Czech Republic">Czech Republic</option>
                                                       <option value="DK" label="Denmark">Denmark</option>
                                                       <option value="DD" label="East Germany">East Germany</option>
                                                       <option value="EE" label="Estonia">Estonia</option>
                                                       <option value="FO" label="Faroe Islands">Faroe Islands</option>
                                                       <option value="FI" label="Finland">Finland</option>
                                                       <option value="FR" label="France">France</option>
                                                       <option value="DE" label="Germany">Germany</option>
                                                       <option value="GI" label="Gibraltar">Gibraltar</option>
                                                       <option value="GR" label="Greece">Greece</option>
                                                       <option value="GG" label="Guernsey">Guernsey</option>
                                                       <option value="HU" label="Hungary">Hungary</option>
                                                       <option value="IS" label="Iceland">Iceland</option>
                                                       <option value="IE" label="Ireland">Ireland</option>
                                                       <option value="IM" label="Isle of Man">Isle of Man</option>
                                                       <option value="IT" label="Italy">Italy</option>
                                                       <option value="JE" label="Jersey">Jersey</option>
                                                       <option value="LV" label="Latvia">Latvia</option>
                                                       <option value="LI" label="Liechtenstein">Liechtenstein</option>
                                                       <option value="LT" label="Lithuania">Lithuania</option>
                                                       <option value="LU" label="Luxembourg">Luxembourg</option>
                                                       <option value="MK" label="Macedonia">Macedonia</option>
                                                       <option value="MT" label="Malta">Malta</option>
                                                       <option value="FX" label="Metropolitan France">Metropolitan France</option>
                                                       <option value="MD" label="Moldova">Moldova</option>
                                                       <option value="MC" label="Monaco">Monaco</option>
                                                       <option value="ME" label="Montenegro">Montenegro</option>
                                                       <option value="NL" label="Netherlands">Netherlands</option>
                                                       <option value="NO" label="Norway">Norway</option>
                                                       <option value="PL" label="Poland">Poland</option>
                                                       <option value="PT" label="Portugal">Portugal</option>
                                                       <option value="RO" label="Romania">Romania</option>
                                                       <option value="RU" label="Russia">Russia</option>
                                                       <option value="SM" label="San Marino">San Marino</option>
                                                       <option value="RS" label="Serbia">Serbia</option>
                                                       <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
                                                       <option value="SK" label="Slovakia">Slovakia</option>
                                                       <option value="SI" label="Slovenia">Slovenia</option>
                                                       <option value="ES" label="Spain">Spain</option>
                                                       <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                       <option value="SE" label="Sweden">Sweden</option>
                                                       <option value="CH" label="Switzerland">Switzerland</option>
                                                       <option value="UA" label="Ukraine">Ukraine</option>
                                                       <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet Socialist Republics</option>
                                                       <option value="GB" label="United Kingdom">United Kingdom</option>
                                                       <option value="VA" label="Vatican City">Vatican City</option>
                                                       <option value="AX" label="Åland Islands">Åland Islands</option>
                                                  </optgroup>
                                                  <optgroup id="country-optgroup-Oceania" label="Oceania">
                                                       <option value="AS" label="American Samoa">American Samoa</option>
                                                       <option value="AQ" label="Antarctica">Antarctica</option>
                                                       <option value="AU" label="Australia">Australia</option>
                                                       <option value="BV" label="Bouvet Island">Bouvet Island</option>
                                                       <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                       <option value="CX" label="Christmas Island">Christmas Island</option>
                                                       <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
                                                       <option value="CK" label="Cook Islands">Cook Islands</option>
                                                       <option value="FJ" label="Fiji">Fiji</option>
                                                       <option value="PF" label="French Polynesia">French Polynesia</option>
                                                       <option value="TF" label="French Southern Territories">French Southern Territories</option>
                                                       <option value="GU" label="Guam">Guam</option>
                                                       <option value="HM" label="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                                       <option value="KI" label="Kiribati">Kiribati</option>
                                                       <option value="MH" label="Marshall Islands">Marshall Islands</option>
                                                       <option value="FM" label="Micronesia">Micronesia</option>
                                                       <option value="NR" label="Nauru">Nauru</option>
                                                       <option value="NC" label="New Caledonia">New Caledonia</option>
                                                       <option value="NZ" label="New Zealand">New Zealand</option>
                                                       <option value="NU" label="Niue">Niue</option>
                                                       <option value="NF" label="Norfolk Island">Norfolk Island</option>
                                                       <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
                                                       <option value="PW" label="Palau">Palau</option>
                                                       <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
                                                       <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
                                                       <option value="WS" label="Samoa">Samoa</option>
                                                       <option value="SB" label="Solomon Islands">Solomon Islands</option>
                                                       <option value="GS" label="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                       <option value="TK" label="Tokelau">Tokelau</option>
                                                       <option value="TO" label="Tonga">Tonga</option>
                                                       <option value="TV" label="Tuvalu">Tuvalu</option>
                                                       <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
                                                       <option value="VU" label="Vanuatu">Vanuatu</option>
                                                       <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
                                                  </optgroup>
                                             </select>
                                             <!-- -->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">City Town:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="City Town" class="form-control input-md" maxlength="" tabindex="19">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">State/Province:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="State/Province" class="form-control input-md" maxlength="" tabindex="20">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Contact #:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="number" placeholder="Contact #" class="form-control input-md" maxlength="" tabindex="21">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Email Address:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="email" placeholder="Email Address" class="form-control input-md" maxlength="" tabindex="22">
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
                                             <button id="" name="" class="btn btn-primary">Save</button>
                                        </div>
                                   </div>
                              </fieldset>
                         </form>
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
                         <form class="form-horizontal">
                              <fieldset>

                                   <!-- for Error Message you need to add class 'has-error' with 'form-group'-->
                                   <!-- Text input-->
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">First Name:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="First Name" class="form-control input-md" maxlength="" tabindex="24">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Last Name:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="Last Name" class="form-control input-md" maxlength="" tabindex="25">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Company:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="Company" class="form-control input-md" maxlength="" tabindex="26">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Street Address 1:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="Street Address 1" class="form-control input-md" maxlength="" tabindex="27">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Street Address 2:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="Street Address 2" class="form-control input-md" maxlength="" tabindex="28">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Country:</label>
                                        <div class="col-md-8">
                                             <!-- -->
                                             <select name="country" id="country" class="form-control" tabindex="29">
                                                  <option value="0" label="Select a country … " selected="selected">Country …</option>
                                                  <optgroup id="country-optgroup-Africa" label="Africa">
                                                       <option value="DZ" label="Algeria">Algeria</option>
                                                       <option value="AO" label="Angola">Angola</option>
                                                       <option value="BJ" label="Benin">Benin</option>
                                                       <option value="BW" label="Botswana">Botswana</option>
                                                       <option value="BF" label="Burkina Faso">Burkina Faso</option>
                                                       <option value="BI" label="Burundi">Burundi</option>
                                                       <option value="CM" label="Cameroon">Cameroon</option>
                                                       <option value="CV" label="Cape Verde">Cape Verde</option>
                                                       <option value="CF" label="Central African Republic">Central African Republic</option>
                                                       <option value="TD" label="Chad">Chad</option>
                                                       <option value="KM" label="Comoros">Comoros</option>
                                                       <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                                                       <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                                                       <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                                                       <option value="DJ" label="Djibouti">Djibouti</option>
                                                       <option value="EG" label="Egypt">Egypt</option>
                                                       <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                                                       <option value="ER" label="Eritrea">Eritrea</option>
                                                       <option value="ET" label="Ethiopia">Ethiopia</option>
                                                       <option value="GA" label="Gabon">Gabon</option>
                                                       <option value="GM" label="Gambia">Gambia</option>
                                                       <option value="GH" label="Ghana">Ghana</option>
                                                       <option value="GN" label="Guinea">Guinea</option>
                                                       <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                                                       <option value="KE" label="Kenya">Kenya</option>
                                                       <option value="LS" label="Lesotho">Lesotho</option>
                                                       <option value="LR" label="Liberia">Liberia</option>
                                                       <option value="LY" label="Libya">Libya</option>
                                                       <option value="MG" label="Madagascar">Madagascar</option>
                                                       <option value="MW" label="Malawi">Malawi</option>
                                                       <option value="ML" label="Mali">Mali</option>
                                                       <option value="MR" label="Mauritania">Mauritania</option>
                                                       <option value="MU" label="Mauritius">Mauritius</option>
                                                       <option value="YT" label="Mayotte">Mayotte</option>
                                                       <option value="MA" label="Morocco">Morocco</option>
                                                       <option value="MZ" label="Mozambique">Mozambique</option>
                                                       <option value="NA" label="Namibia">Namibia</option>
                                                       <option value="NE" label="Niger">Niger</option>
                                                       <option value="NG" label="Nigeria">Nigeria</option>
                                                       <option value="RW" label="Rwanda">Rwanda</option>
                                                       <option value="RE" label="Réunion">Réunion</option>
                                                       <option value="SH" label="Saint Helena">Saint Helena</option>
                                                       <option value="SN" label="Senegal">Senegal</option>
                                                       <option value="SC" label="Seychelles">Seychelles</option>
                                                       <option value="SL" label="Sierra Leone">Sierra Leone</option>
                                                       <option value="SO" label="Somalia">Somalia</option>
                                                       <option value="ZA" label="South Africa">South Africa</option>
                                                       <option value="SD" label="Sudan">Sudan</option>
                                                       <option value="SZ" label="Swaziland">Swaziland</option>
                                                       <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                                       <option value="TZ" label="Tanzania">Tanzania</option>
                                                       <option value="TG" label="Togo">Togo</option>
                                                       <option value="TN" label="Tunisia">Tunisia</option>
                                                       <option value="UG" label="Uganda">Uganda</option>
                                                       <option value="EH" label="Western Sahara">Western Sahara</option>
                                                       <option value="ZM" label="Zambia">Zambia</option>
                                                       <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                                                  </optgroup>
                                                  <optgroup id="country-optgroup-Americas" label="Americas">
                                                       <option value="AI" label="Anguilla">Anguilla</option>
                                                       <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
                                                       <option value="AR" label="Argentina">Argentina</option>
                                                       <option value="AW" label="Aruba">Aruba</option>
                                                       <option value="BS" label="Bahamas">Bahamas</option>
                                                       <option value="BB" label="Barbados">Barbados</option>
                                                       <option value="BZ" label="Belize">Belize</option>
                                                       <option value="BM" label="Bermuda">Bermuda</option>
                                                       <option value="BO" label="Bolivia">Bolivia</option>
                                                       <option value="BR" label="Brazil">Brazil</option>
                                                       <option value="VG" label="British Virgin Islands">British Virgin Islands</option>
                                                       <option value="CA" label="Canada">Canada</option>
                                                       <option value="KY" label="Cayman Islands">Cayman Islands</option>
                                                       <option value="CL" label="Chile">Chile</option>
                                                       <option value="CO" label="Colombia">Colombia</option>
                                                       <option value="CR" label="Costa Rica">Costa Rica</option>
                                                       <option value="CU" label="Cuba">Cuba</option>
                                                       <option value="DM" label="Dominica">Dominica</option>
                                                       <option value="DO" label="Dominican Republic">Dominican Republic</option>
                                                       <option value="EC" label="Ecuador">Ecuador</option>
                                                       <option value="SV" label="El Salvador">El Salvador</option>
                                                       <option value="FK" label="Falkland Islands">Falkland Islands</option>
                                                       <option value="GF" label="French Guiana">French Guiana</option>
                                                       <option value="GL" label="Greenland">Greenland</option>
                                                       <option value="GD" label="Grenada">Grenada</option>
                                                       <option value="GP" label="Guadeloupe">Guadeloupe</option>
                                                       <option value="GT" label="Guatemala">Guatemala</option>
                                                       <option value="GY" label="Guyana">Guyana</option>
                                                       <option value="HT" label="Haiti">Haiti</option>
                                                       <option value="HN" label="Honduras">Honduras</option>
                                                       <option value="JM" label="Jamaica">Jamaica</option>
                                                       <option value="MQ" label="Martinique">Martinique</option>
                                                       <option value="MX" label="Mexico">Mexico</option>
                                                       <option value="MS" label="Montserrat">Montserrat</option>
                                                       <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
                                                       <option value="NI" label="Nicaragua">Nicaragua</option>
                                                       <option value="PA" label="Panama">Panama</option>
                                                       <option value="PY" label="Paraguay">Paraguay</option>
                                                       <option value="PE" label="Peru">Peru</option>
                                                       <option value="PR" label="Puerto Rico">Puerto Rico</option>
                                                       <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                                                       <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                       <option value="LC" label="Saint Lucia">Saint Lucia</option>
                                                       <option value="MF" label="Saint Martin">Saint Martin</option>
                                                       <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                       <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                       <option value="SR" label="Suriname">Suriname</option>
                                                       <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
                                                       <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                       <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                                       <option value="US" label="United States">United States</option>
                                                       <option value="UY" label="Uruguay">Uruguay</option>
                                                       <option value="VE" label="Venezuela">Venezuela</option>
                                                  </optgroup>
                                                  <optgroup id="country-optgroup-Asia" label="Asia">
                                                       <option value="AF" label="Afghanistan">Afghanistan</option>
                                                       <option value="AM" label="Armenia">Armenia</option>
                                                       <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                                                       <option value="BH" label="Bahrain">Bahrain</option>
                                                       <option value="BD" label="Bangladesh">Bangladesh</option>
                                                       <option value="BT" label="Bhutan">Bhutan</option>
                                                       <option value="BN" label="Brunei">Brunei</option>
                                                       <option value="KH" label="Cambodia">Cambodia</option>
                                                       <option value="CN" label="China">China</option>
                                                       <option value="CY" label="Cyprus">Cyprus</option>
                                                       <option value="GE" label="Georgia">Georgia</option>
                                                       <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
                                                       <option value="IN" label="India">India</option>
                                                       <option value="ID" label="Indonesia">Indonesia</option>
                                                       <option value="IR" label="Iran">Iran</option>
                                                       <option value="IQ" label="Iraq">Iraq</option>
                                                       <option value="IL" label="Israel">Israel</option>
                                                       <option value="JP" label="Japan">Japan</option>
                                                       <option value="JO" label="Jordan">Jordan</option>
                                                       <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                                                       <option value="KW" label="Kuwait">Kuwait</option>
                                                       <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                                                       <option value="LA" label="Laos">Laos</option>
                                                       <option value="LB" label="Lebanon">Lebanon</option>
                                                       <option value="MO" label="Macau SAR China">Macau SAR China</option>
                                                       <option value="MY" label="Malaysia">Malaysia</option>
                                                       <option value="MV" label="Maldives">Maldives</option>
                                                       <option value="MN" label="Mongolia">Mongolia</option>
                                                       <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                                                       <option value="NP" label="Nepal">Nepal</option>
                                                       <option value="NT" label="Neutral Zone">Neutral Zone</option>
                                                       <option value="KP" label="North Korea">North Korea</option>
                                                       <option value="OM" label="Oman">Oman</option>
                                                       <option value="PK" label="Pakistan">Pakistan</option>
                                                       <option value="PS" label="Palestinian Territories">Palestinian Territories</option>
                                                       <option value="YD" label="People's Democratic Republic of Yemen">People's Democratic Republic of Yemen</option>
                                                       <option value="PH" label="Philippines">Philippines</option>
                                                       <option value="QA" label="Qatar">Qatar</option>
                                                       <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                                                       <option value="SG" label="Singapore">Singapore</option>
                                                       <option value="KR" label="South Korea">South Korea</option>
                                                       <option value="LK" label="Sri Lanka">Sri Lanka</option>
                                                       <option value="SY" label="Syria">Syria</option>
                                                       <option value="TW" label="Taiwan">Taiwan</option>
                                                       <option value="TJ" label="Tajikistan">Tajikistan</option>
                                                       <option value="TH" label="Thailand">Thailand</option>
                                                       <option value="TL" label="Timor-Leste">Timor-Leste</option>
                                                       <option value="TR" label="Turkey">Turkey</option>
                                                       <option value="™" label="Turkmenistan">Turkmenistan</option>
                                                       <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
                                                       <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                                                       <option value="VN" label="Vietnam">Vietnam</option>
                                                       <option value="YE" label="Yemen">Yemen</option>
                                                  </optgroup>
                                                  <optgroup id="country-optgroup-Europe" label="Europe">
                                                       <option value="AL" label="Albania">Albania</option>
                                                       <option value="AD" label="Andorra">Andorra</option>
                                                       <option value="AT" label="Austria">Austria</option>
                                                       <option value="BY" label="Belarus">Belarus</option>
                                                       <option value="BE" label="Belgium">Belgium</option>
                                                       <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                       <option value="BG" label="Bulgaria">Bulgaria</option>
                                                       <option value="HR" label="Croatia">Croatia</option>
                                                       <option value="CY" label="Cyprus">Cyprus</option>
                                                       <option value="CZ" label="Czech Republic">Czech Republic</option>
                                                       <option value="DK" label="Denmark">Denmark</option>
                                                       <option value="DD" label="East Germany">East Germany</option>
                                                       <option value="EE" label="Estonia">Estonia</option>
                                                       <option value="FO" label="Faroe Islands">Faroe Islands</option>
                                                       <option value="FI" label="Finland">Finland</option>
                                                       <option value="FR" label="France">France</option>
                                                       <option value="DE" label="Germany">Germany</option>
                                                       <option value="GI" label="Gibraltar">Gibraltar</option>
                                                       <option value="GR" label="Greece">Greece</option>
                                                       <option value="GG" label="Guernsey">Guernsey</option>
                                                       <option value="HU" label="Hungary">Hungary</option>
                                                       <option value="IS" label="Iceland">Iceland</option>
                                                       <option value="IE" label="Ireland">Ireland</option>
                                                       <option value="IM" label="Isle of Man">Isle of Man</option>
                                                       <option value="IT" label="Italy">Italy</option>
                                                       <option value="JE" label="Jersey">Jersey</option>
                                                       <option value="LV" label="Latvia">Latvia</option>
                                                       <option value="LI" label="Liechtenstein">Liechtenstein</option>
                                                       <option value="LT" label="Lithuania">Lithuania</option>
                                                       <option value="LU" label="Luxembourg">Luxembourg</option>
                                                       <option value="MK" label="Macedonia">Macedonia</option>
                                                       <option value="MT" label="Malta">Malta</option>
                                                       <option value="FX" label="Metropolitan France">Metropolitan France</option>
                                                       <option value="MD" label="Moldova">Moldova</option>
                                                       <option value="MC" label="Monaco">Monaco</option>
                                                       <option value="ME" label="Montenegro">Montenegro</option>
                                                       <option value="NL" label="Netherlands">Netherlands</option>
                                                       <option value="NO" label="Norway">Norway</option>
                                                       <option value="PL" label="Poland">Poland</option>
                                                       <option value="PT" label="Portugal">Portugal</option>
                                                       <option value="RO" label="Romania">Romania</option>
                                                       <option value="RU" label="Russia">Russia</option>
                                                       <option value="SM" label="San Marino">San Marino</option>
                                                       <option value="RS" label="Serbia">Serbia</option>
                                                       <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
                                                       <option value="SK" label="Slovakia">Slovakia</option>
                                                       <option value="SI" label="Slovenia">Slovenia</option>
                                                       <option value="ES" label="Spain">Spain</option>
                                                       <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                       <option value="SE" label="Sweden">Sweden</option>
                                                       <option value="CH" label="Switzerland">Switzerland</option>
                                                       <option value="UA" label="Ukraine">Ukraine</option>
                                                       <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet Socialist Republics</option>
                                                       <option value="GB" label="United Kingdom">United Kingdom</option>
                                                       <option value="VA" label="Vatican City">Vatican City</option>
                                                       <option value="AX" label="Åland Islands">Åland Islands</option>
                                                  </optgroup>
                                                  <optgroup id="country-optgroup-Oceania" label="Oceania">
                                                       <option value="AS" label="American Samoa">American Samoa</option>
                                                       <option value="AQ" label="Antarctica">Antarctica</option>
                                                       <option value="AU" label="Australia">Australia</option>
                                                       <option value="BV" label="Bouvet Island">Bouvet Island</option>
                                                       <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                       <option value="CX" label="Christmas Island">Christmas Island</option>
                                                       <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
                                                       <option value="CK" label="Cook Islands">Cook Islands</option>
                                                       <option value="FJ" label="Fiji">Fiji</option>
                                                       <option value="PF" label="French Polynesia">French Polynesia</option>
                                                       <option value="TF" label="French Southern Territories">French Southern Territories</option>
                                                       <option value="GU" label="Guam">Guam</option>
                                                       <option value="HM" label="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                                       <option value="KI" label="Kiribati">Kiribati</option>
                                                       <option value="MH" label="Marshall Islands">Marshall Islands</option>
                                                       <option value="FM" label="Micronesia">Micronesia</option>
                                                       <option value="NR" label="Nauru">Nauru</option>
                                                       <option value="NC" label="New Caledonia">New Caledonia</option>
                                                       <option value="NZ" label="New Zealand">New Zealand</option>
                                                       <option value="NU" label="Niue">Niue</option>
                                                       <option value="NF" label="Norfolk Island">Norfolk Island</option>
                                                       <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
                                                       <option value="PW" label="Palau">Palau</option>
                                                       <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
                                                       <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
                                                       <option value="WS" label="Samoa">Samoa</option>
                                                       <option value="SB" label="Solomon Islands">Solomon Islands</option>
                                                       <option value="GS" label="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                       <option value="TK" label="Tokelau">Tokelau</option>
                                                       <option value="TO" label="Tonga">Tonga</option>
                                                       <option value="TV" label="Tuvalu">Tuvalu</option>
                                                       <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
                                                       <option value="VU" label="Vanuatu">Vanuatu</option>
                                                       <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
                                                  </optgroup>
                                             </select>
                                             <!-- -->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">City Town:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="City Town" class="form-control input-md" maxlength="" tabindex="30">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">State/Province:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="text" placeholder="State/Province" class="form-control input-md" maxlength="" tabindex="31">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Contact #:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="number" placeholder="Contact #" class="form-control input-md" maxlength="" tabindex="32">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-4 control-label" for="">Email Address:</label>
                                        <div class="col-md-8">
                                             <input id="" name="" type="email" placeholder="Email Address" class="form-control input-md" maxlength="" tabindex="33">
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
                         </form>
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
                    <form class="form-horizontal">
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
                                                       <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                       </tr>
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
                                                       <input type="radio" name="radios" id="send-copy-yes" value="1" checked="checked" maxlength="" tabindex="11">
                                                       <span>Enabled</span>
                                                  </label>
                                                  <label class="radio-inline" for="send-copy-no">
                                                       <input type="radio" name="radios" id="send-copy-no" value="2" maxlength="" tabindex="12">
                                                       <span>Disabled</span>
                                                  </label>
                                             </div>
                                             <!-- -->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-5 control-label no-padding-left txt-align-left" for="">Subject:</label>
                                        <div class="col-md-7">
                                             <input id="" name="" type="text" placeholder="Subject" class="form-control input-md" maxlength="" tabindex="37">
                                             <!--<span class="help-block">help</span>-->
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-5 control-label no-padding-left txt-align-left" for="">Message:</label>
                                        <div class="col-md-7">
                                             <textarea class="form-control" id="textarea" name="textarea" tabindex="38">default text</textarea>
                                        </div>
                                   </div>
                              </div>
                              <!-- -->

                              <!-- Button -->
                              <div class="form-group col-md-12 button-area">
                                   <div class="col-md-1 pull-right">
                                        <button id="" name="" class="btn btn-primary">Save</button>
                                   </div>
                              </div>

                         </fieldset>
                    </form>
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
                                                       <td> {{$item->inventory_code}}
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
                    <form class="form-horizontal">
                         <fieldset>

                        

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
                                                       <th>Ship Qty</th>
                                                       <th>Item #</th>
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
                                                                <!--   <input type="button" class="btn btn-primary" value="Edit"><br />
                                                                 <button class="btn btn-primary">Edit</button> -->
                                                            </div>
                                                       </td>
                                                       <td>
                                                            <img src="https://i.pinimg.com/736x/b3/5d/c6/b35dc64be219dd383c5322d2d5203a95--mens-leather-bomber-jacket-biker-leather.jpg" alt="" class="img-responsive">
                                                       </td>
                                                       <td>
                                                            <!-- -->
                                                            <div class="product-name width-100p">{{$item->product->productsDescription->products_name}}</div>
                                                            <div class="product-name-two width-100p">Platform</div>
                                                            <div class="designer-name width-100p">Robert Clergerie</div>
                                                            <div class="size width-100p margin-top-10">Size: <span class="">Medium</span></div>
                                                           
                              
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
                                                       <div class="col-md-6 font-size-11">Tax :</div> 
                                                       <div class="col-md-3 font-size-11">{{$order->tax}}</div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6 font-size-11">Shipping :</div> 
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
                    </form>
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
@endsection 

