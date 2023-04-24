
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="pull-right font-16"><strong> S/N # {{$REF_PERFORMANCE->id}} </strong></h4>
                            <h3 class="m-t-0">
                                <img src="{{asset('assets/images/dpr_logo.png')}}" alt="logo" height="32"/>
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Refinery:</strong><br> @if($REF_PERFORMANCE->refinery) {{$REF_PERFORMANCE->refinery->plant_location_name}} @endif
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>Ownership:</strong><br> @if($REF_PERFORMANCE->ownership) {{$REF_PERFORMANCE->ownership->ownership_name}} @endif
                                </address>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>State:</strong><br> @if($REF_PERFORMANCE->state) {{$REF_PERFORMANCE->state->state_name}} @endif
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>Location:</strong><br> {{$REF_PERFORMANCE->location}}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-left">
                                <address>
                                    <strong>Configuration:</strong><br> @if($REF_PERFORMANCE->configurations) {{$REF_PERFORMANCE->configurations->configuration_name}} @endif
                                </address>
                            </div>
                            <div class="col-4">
                                <address>
                                    <strong>Feedstock:</strong><br> @if($REF_PERFORMANCE->feedstock) {{$REF_PERFORMANCE->feedstock->feedstock_name}} @endif
                                </address>
                            </div>
                            <div class="col-4 text-right">
                                <address>
                                    <strong>Product</strong><br> @if($REF_PERFORMANCE->product) {{$REF_PERFORMANCE->product->product_name}} @endif
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="panel panel-default">
                            <div class="p-2">
                                <h3 class="panel-title font-20"><strong>Nigerian Refinery Plants </strong></h3>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">                                        
                                        <thead>
                                        <tr>
                                            <td class="text-left" colspan=""><strong>Design Capacity</strong></td>
                                            <td class="text-center" colspan=""><strong>Crude Oil Process</strong></td>
                                            <td class="text-right" colspan=""><strong>Capacity Utilization %</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left" colspan="">{{$REF_PERFORMANCE->design_capacity}}</td>
                                            <td class="text-center" colspan="">{{$REF_PERFORMANCE->crude_oil_process}}</td>
                                            <td class="text-right" colspan="">{{$REF_PERFORMANCE->capacity_utilization}}</td>
                                        </tr>
                                        </tbody>

                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="text-muted text-left" colspan="2">
                                                	Uploaded @ {{\Carbon\Carbon::parse($REF_PERFORMANCE->created_at)->diffForHumans()}}
                                                </td>
                                                <td class="text-muted text-right" colspan="">
                                                	Updated @ {{\Carbon\Carbon::parse($REF_PERFORMANCE->updated_at)->diffForHumans()}}
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






