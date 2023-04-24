
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="pull-right font-16"><strong> S/N # {{$WAR->id}} </strong></h4>
                            <h3 class="m-t-0">
                                <img src="{{asset('assets/images/dpr_logo.png')}}" alt="logo" height="32"/>
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Deliverables:</strong><br> {{$WAR->deliverables}}
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong> </strong><br> 
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="panel panel-default">
                            <div class="p-2">
                                <h3 class="panel-title font-20"><strong>Weekly Activity Report</strong></h3>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td class="text-left" width="25%" colspan=""><strong>Department</strong></td>
                                            <td class="text-center" width="25%" colspan=""><strong>Status</strong></td>
                                            <td class="text-center" width="25%" colspan=""><strong>Start Date</strong></td>
                                            <td class="text-right" width="25%" colspan=""><strong>End Date</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left" colspan="">@if($WAR->department) {{$WAR->department->department_name}} @endif</td>
                                            <td class="text-center" colspan="">@if($WAR->status) {{$WAR->status->status}} @endif</td>
                                            <td class="text-center" colspan=""> {{$WAR->from_date}}</td>
                                            <td class="text-right" colspan=""> {{$WAR->to_date}}</td>
                                        </tr>
                                        </tbody>

                                       
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="text-muted text-left" colspan="2">
                                                	Uploaded @ {{\Carbon\Carbon::parse($WAR->created_at)->diffForHumans()}}
                                                </td>
                                                <td class="text-muted text-right" colspan="2">
                                                	Updated @ {{\Carbon\Carbon::parse($WAR->updated_at)->diffForHumans()}}
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






