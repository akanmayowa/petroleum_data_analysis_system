
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="pull-right font-16"><strong> S/N #{{$PRO_STATUS->id}} </strong></h4>
                            <h3 class="m-t-0">
                                <img src="{{asset('assets/images/dpr_logo.png')}}" alt="logo" height="32"/>
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong> Company </strong><br> @if($PRO_STATUS->company) {{$PRO_STATUS->company->company_name}} @endif</address>
                            </div>
                            <div class="col-3 text-right">
                                <address>
                                    <strong> Aggrement Date </strong><br> {{$PRO_STATUS->agreement_date}} 
                                </address>
                            </div>
                            <div class="col-3 text-right">
                                <address>
                                    <strong> Year Of Survey </strong><br> {{$PRO_STATUS->year_of_survey}} 
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="panel panel-default">
                            <div class="p-2">
                                <h3 class="panel-title font-20"><strong>Multi-Client Data Projects Status </strong></h3>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td class="text-left" width="33%"><strong>Area Of Survey</strong></td>
                                                <td class="text-center" width="33%"><strong>Type Of Survey</strong></td>
                                                <td class="text-right" width="33%"><strong>Quantum Of Survey</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left">@if($PRO_STATUS->area_of_survey) {{$PRO_STATUS->area_of_survey->area_of_survey_name}} @endif</td>
                                            <td class="text-center">@if($PRO_STATUS->type_of_survey) {{$PRO_STATUS->type_of_survey->type_of_survey_name}} @endif</td>
                                            <td class="text-right">{{$PRO_STATUS->quantum_of_survey}}</td>
                                        </tr>
                                        </tbody>  

                                        <thead>
                                            <tr>
                                                <td class="text-left" width="" colspan="3"><strong>Remark</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-left" colspan="3">{{$PRO_STATUS->remark}}</td>
                                        </tr>
                                        </tbody>                                    

                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="text-muted text-left" colspan="2">
                                                    Uploaded @ {{\Carbon\Carbon::parse($PRO_STATUS->created_at)->diffForHumans()}}
                                                </td>
                                                <td class="text-muted text-right" colspan="2">
                                                    Updated @ {{\Carbon\Carbon::parse($PRO_STATUS->updated_at)->diffForHumans()}}
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






