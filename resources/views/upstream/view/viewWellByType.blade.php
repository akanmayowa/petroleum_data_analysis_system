
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="pull-right font-16"><strong> S/N # {{$WELL_TYPE->id}} </strong></h4>
                            <h3 class="m-t-0">
                                <img src="{{asset('assets/images/dpr_logo.png')}}" alt="logo" height="32"/>
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <address>
                                    <strong>Month:</strong> {{$WELL_TYPE->month}} <br>
                                </address>
                            </div>
                            <div class="col-4 text-center">
                                <address>
                                    <strong>Year:</strong> {{$WELL_TYPE->year}}  <br>
                                </address>
                            </div>
                            <div class="col-4 text-right">
                                <address>
                                    <strong>Company:</strong> @if($WELL_TYPE->company) {{$WELL_TYPE->company->company_name}} @endif <br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="panel panel-default">
                            <div class="p-2">
                                <h3 class="panel-title font-20"><strong>Well Activities By Type</strong></h3>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td class="text-left" width="16%"><strong>Oil Producer</strong></td>
                                            <td class="text-left" width="16%"><strong>Gas Producer</strong></td>
                                            <td class="text-left" width="16%"><strong>Gas Injector </strong></td>
                                            <td class="text-left" width="16%"><strong>Water Injector</strong></td>
                                            <td class="text-left" width="16%"><strong>Others</strong></td>
                                            <td class="text-right" width="16%"><strong>Total</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left">{{$WELL_TYPE->oil_producer}} </td>
                                            <td class="text-left">{{$WELL_TYPE->gas_producer}}</td>
                                            <td class="text-left">{{$WELL_TYPE->gas_injector}}</td>
                                            <td class="text-left">{{$WELL_TYPE->water_injector}}</td>
                                            <td class="text-left">{{$WELL_TYPE->others}}</td>
                                            <td class="text-right">{{$WELL_TYPE->total}}</td>
                                        </tr>
                                        </tbody>


                                       

                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="text-muted text-left" colspan="3">
                                                	Uploaded @ {{\Carbon\Carbon::parse($WELL_TYPE->created_at)->diffForHumans()}}
                                                </td>
                                                <td class="text-muted text-right" colspan="3">
                                                	Updated @ {{\Carbon\Carbon::parse($WELL_TYPE->updated_at)->diffForHumans()}}
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






