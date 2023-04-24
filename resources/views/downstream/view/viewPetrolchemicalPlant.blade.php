
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="pull-right font-16"><strong> S/N # {{$P_PLANT->id}} </strong></h4>
                            <h3 class="m-t-0">
                                <img src="{{asset('assets/images/dpr_logo.png')}}" alt="logo" height="32"/>
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Plant:</strong><br> @if($P_PLANT->locations)  {{$P_PLANT->locations->plant_location_name}} @endif
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>Plant Type:</strong><br> @if($P_PLANT->plant_types)  {{$P_PLANT->plant_types->plant_type_name}} @endif
                                </address>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>State :</strong><br> @if($P_PLANT->state)  {{$P_PLANT->state->state_name}} @endif
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>Location:</strong><br> {{$P_PLANT->location}}
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="panel panel-default">
                            <div class="p-2">
                                <h3 class="panel-title font-20"><strong>Petrochemical Plant Situation</strong></h3>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td class="text-left" width="25%"><strong>Owner</strong></td>
                                            <td class="text-center" width="25%"><strong>Capacity</strong></td>
                                            <td class="text-center" width="25%"><strong>Feedstock</strong></td>
                                            <td class="text-right" width="25%"><strong>Product</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left">@if($P_PLANT->ownerships) {{$P_PLANT->ownerships->ownership_name}} @endif</td>
                                            <td class="text-center">{{$P_PLANT->plant_capacity}} MMbbls</td>
                                            <td class="text-center">@if($P_PLANT->feedstocks) {{$P_PLANT->feedstocks->feedstock_name}} @endif</td>
                                            <td class="text-right">@if($P_PLANT->product) {{$P_PLANT->product->product_name}} @endif</td>
                                        </tr>
                                        </tbody>


                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="text-muted text-left" colspan="2">
                                                	Uploaded @ {{\Carbon\Carbon::parse($P_PLANT->created_at)->diffForHumans()}}
                                                </td>
                                                <td class="text-muted text-right" colspan="2">
                                                	Updated @ {{\Carbon\Carbon::parse($P_PLANT->updated_at)->diffForHumans()}}
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






