
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="pull-right font-16"><strong> S/N # {{$RESERVE->id}} </strong></h4>
                            <h3 class="m-t-0">
                                <img src="{{asset('assets/images/dpr_logo.png')}}" alt="logo" height="32"/>
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Field:</strong> @if($RESERVE->field) {{$RESERVE->field->field_name}} @endif<br>
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>Year:</strong> {{$RESERVE->year}}    {{$RESERVE->month}}   <br>
                                </address>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Associated Gas:</strong><br> {{number_format($RESERVE->associated_gas, 2)}}
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>Non Associated Gas:</strong><br> {{number_format($RESERVE->non_associated_gas, 2)}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 m-t-30 text-right">
                                <address>
                                    <strong>Total (Gas):</strong><br> {{number_format($RESERVE->total_gas, 2)}}
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="panel panel-default">
                            <div class="p-2">
                                <h3 class="panel-title font-20"><strong>AG NAG Gas Reserves</strong></h3>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td><strong>Associated Gas</strong></td>
                                            <td class="text-center"><strong>Non Associated Gas</strong></td>
                                            <td class="text-right"><strong>Total (gas)</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left">{{number_format($RESERVE->associated_gas, 2)}}</td>
                                            <td class="text-center">{{number_format($RESERVE->non_associated_gas, 2)}}</td>
                                            <td class="text-right">{{number_format($RESERVE->total_gas, 2)}}</td>
                                        </tr>
                                        </tbody>

                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="thick-line">
                                                	<strong>Uploaded @ {{\Carbon\Carbon::parse($RESERVE->created_at)->diffForHumans()}}</strong></td>
                                                <td class="thick-line text-center">  </td>
                                                <td class="thick-line text-right">
                                                	<strong>Updated @ {{\Carbon\Carbon::parse($RESERVE->updated_at)->diffForHumans()}}</strong></td>
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






