
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="pull-right font-16"><strong> S/N # {{$DPR_PP->id}} </strong></h4>
                            <h3 class="m-t-0">
                                <img src="{{asset('assets/images/dpr_logo.png')}}" alt="logo" height="32"/>
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Policy Objectives:</strong><br> {{$DPR_PP->policy_objective}}
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
                                <h3 class="panel-title font-20"><strong>DPR Work Plan Project </strong></h3>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td class="text-left" width="50%" colspan="2"><strong>ZBB PILLAR</strong></td>
                                            <td class="text-right" width="50%" colspan="2"><strong>ZBB PP</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left" colspan="2">{{$DPR_PP->zbb_pillar}} </td>
                                            <td class="text-right" colspan="2">{{$DPR_PP->zbb_pp}} </td>
                                        </tr>
                                        </tbody>


                                        <thead>
                                        <tr>
                                            <td class="text-left" width="50%" colspan="2"><strong>ZBB SPP</strong></td>
                                            <td class="text-right" width="50%" colspan="2"><strong>DWP- PP</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left" colspan="2">{{$DPR_PP->zbb_spp}}</td>
                                            <td class="text-right" colspan="2"> {{$DPR_PP->dwp_pp}} </td>
                                        </tr>
                                        </tbody>



                                        <thead>
                                        <tr>
                                            <td class="text-left" width="25%" colspan=""><strong>KPIs</strong></td>
                                            <td class="text-center" width="25%" colspan=""><strong>KPI Performance</strong></td>
                                            <td class="text-center" width="25%" colspan=""><strong>Responsible Division</strong></td>
                                            <td class="text-right" width="25%" colspan=""><strong>Critical Linkage</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left" colspan="">{{$DPR_PP->kpi}}</td>
                                            <td class="text-center" colspan="">{{$DPR_PP->kpi_performance}}</td>
                                            <td class="text-center" colspan="">{{$DPR_PP->responsible_division}}</td>
                                            <td class="text-right" colspan="">{{$DPR_PP->critical_linkage}} </td>
                                        </tr>
                                        </tbody>


                                       
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="text-muted text-left" colspan="2">
                                                	Uploaded @ {{\Carbon\Carbon::parse($DPR_PP->created_at)->diffForHumans()}}
                                                </td>
                                                <td class="text-muted text-right" colspan="2">
                                                	Updated @ {{\Carbon\Carbon::parse($DPR_PP->updated_at)->diffForHumans()}}
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






