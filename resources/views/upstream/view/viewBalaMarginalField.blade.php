<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="pull-right font-16"><strong> S/N #{{$M_FIELD->id}} </strong></h4>
                            <h3 class="m-t-0">
                                <img src="{{asset('assets/images/dpr_logo.png')}}" alt="logo" height="32"/>
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong> Company </strong><br> @if($M_FIELD->company) {{$M_FIELD->company->company_name}} @endif </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong> Basin/Terrain </strong><br> @if($M_FIELD->field) {{$M_FIELD->field->field_name}} @endif
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="panel panel-default">
                            <div class="p-2">
                                <h3 class="panel-title font-20"><strong>list Of Marginal Fields </strong></h3>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td class="text-right" width="100%" colspan="2"><strong>Block Name</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-right" width="100%" colspan="2">{{$M_FIELD->blocks}}</td>
                                        </tr>
                                        </tbody>                                     

                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="text-muted text-left" colspan="">
                                                	Uploaded @ {{\Carbon\Carbon::parse($M_FIELD->created_at)->diffForHumans()}}
                                                </td>
                                                <td class="text-muted text-right" colspan="">
                                                	Updated @ {{\Carbon\Carbon::parse($M_FIELD->updated_at)->diffForHumans()}}
                                                </td>
                                            </tr>
                                    </table>
                                </div>

                                <div class="d-print-none mo-mt-2">
                                    <div class="pull-right">
                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-primary waves-effect waves-light">Email</a>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div> <!-- end row -->

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->






