
@if (count($customers) > 0)
<div class="row">
    <div class="col-md-8 col-md-offset-1">
          <div class="panel panel-default">
                <div class="panel-body">
                        <div class="form-group row">
                            <div class="col-sm-4">
                            First Name:
                            </div>
                            <div class="col-sm-4">
                            {{$customers[0]->first_name}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                              Last Name:
                            </div>
                            <div class="col-sm-4">
                              {{$customers[0]->last_name}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                              Email Address:
                            </div>
                            <div class="col-sm-4">
                              {{$customers[0]->email}}
                            </div>
                        </div>
                   </div>
              </div>
           </div>
    </div>
</div>
@endif
