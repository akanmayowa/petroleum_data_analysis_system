
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="pull-right font-16"><strong> S/N # {{$SHE_IW->id}} </strong></h4>
                            <h3 class="m-t-0">
                                <img src="{{asset('assets/images/dpr_logo.png')}}" alt="logo" height="32"/>
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Incident Date:</strong><br>{{$SHE_IW->incident_date}}
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>Total Incidents:</strong><br>{{$SHE_IW->incidents}} 
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="panel panel-default">
                            <div class="p-2">
                                <h3 class="panel-title font-20"><strong>Accident Report – Industry-Wide</strong></h3>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td class="text-left" width="50%" colspan="1"><strong>Work Related</strong></td>
                                            <td class="text-right" width="50%" colspan="1"><strong>Non Work Related</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left" colspan="">{{$SHE_IW->non_work_related}}</td>
                                            <td class="text-right" colspan="">{{$SHE_IW->non_work_related}}</td>
                                        </tr>
                                        </tbody>  

                                        <thead>
                                        <tr>
                                            <td class="text-left" width="50%" colspan="1"><strong>Fatal Incident</strong></td>
                                            <td class="text-right" width="50%" colspan="1"><strong>Non Fatal Incident</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left" colspan="1">{{$SHE_IW->fatal_incident}} </td>
                                            <td class="text-right" colspan="1">{{$SHE_IW->non_fatal_incident}} </td>
                                        </tr>
                                        </tbody> 

                                        <thead>
                                        <tr>
                                            <td class="text-left" width="50%" colspan="1"><strong>Work Related Fatal Incident</strong></td>
                                            <td class="text-right" width="50%" colspan="1"><strong>Non Work Related Fatal Incident</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left" colspan="1">{{$SHE_IW->work_related_fatal_incident}} </td>
                                            <td class="text-right" colspan="1">{{$SHE_IW->non_work_related_fatal_incident}} </td>
                                        </tr>
                                        </tbody>     

                                        <thead>
                                        <tr>
                                            <td class="text-left" width="50%" colspan="1"><strong></strong></td>
                                            <td class="text-right" width="50%" colspan="1"><strong>Fatality</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left" colspan="1"></td>
                                            <td class="text-right" colspan="1">{{$SHE_IW->fatality}}</td>
                                        </tr>
                                        </tbody>                                   

                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="text-muted text-left" colspan="1">
                                                	Uploaded @ {{\Carbon\Carbon::parse($SHE_IW->created_at)->diffForHumans()}}
                                                </td>
                                                <td class="text-muted text-right" colspan="1">
                                                	Updated @ {{\Carbon\Carbon::parse($SHE_IW->updated_at)->diffForHumans()}}
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






