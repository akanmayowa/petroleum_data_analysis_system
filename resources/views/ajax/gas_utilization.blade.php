<div class="table-responsive">     <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Summary of Gas Utilization  
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> All Volumes in Mcf 
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>

        <a data-toggle="tooltip" onclick="showmodal('addgas_util')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Summary of Gas Utilization Here"> <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('uplgas_util', sessionStorage.getItem('url'),'downloadGasUtilizatedTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Summary of Gas Utilization Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('gas/download_gas_utilization_summary/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Summary of Gas Utilization Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_Util') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_util()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif

    </h5> </form>
    <table class="table table-striped table-sm mb-0" id="gas_util_table">
        <thead class="thead-dark">
            <tr>                        
                <th>Year</th>                                
                <th>Month</th>                           
                <th>Field</th>                            
                <th>Company</th>
                <th>Fuel Gas</th>
                <th>Gas Lift</th>
                <th>Re-Injection</th>
                <th>LNG / LPG</th>
                <th>Gas-NIPP</th>                           
                <th>Local (Others)</th>                           
                <th>NLNG Export</th>                           
                <th>Shrinkage</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>
        </thead>
        <tbody>
            @if($gas_utilization)
                @foreach($gas_utilization as $gas_utilizations)
                @php $unResolved = request()->user()->unResolved($gas_utilizations->id, 'gas_summary_of_gas_utilization'); @endphp
                <tr>
                    <th>{{$gas_utilizations->year}}</th>
                    <th>{{$gas_utilizations->month}}</th>
                    @if($gas_utilizations->pending_id > 0 && $unResolved->column_1 != '')
                        <th class="null">{{$unResolved->column_1}}</th>
                    @else 
                    <th>{{$gas_utilizations->field?$gas_utilizations->field->field_name:''}}</th>
                    @endif
                    @if($gas_utilizations->pending_id > 0 && $unResolved->column_2 != '')
                        <th class="null">{{$unResolved->column_2}}</th>
                    @else 
                    <th>{{$gas_utilizations->company?$gas_utilizations->company->company_name:''}}</th>
                    @endif
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_utilizations->fuel_gas, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_utilizations->gas_lift, 2)}}</th>  
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_utilizations->re_injection, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_utilizations->ngl_lpg, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_utilizations->gas_to_nipp, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_utilizations->local_others, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_utilizations->nlng_export, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_utilizations->shrinkage, 2)}}</th>
                    <th style="text-align: right;">
                        @if($gas_utilizations->stage_id == 0) 
                              <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                        @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                        @endif 
                    </th>
                    <th>
                        <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_summary_of_gas_utilization', {{$gas_utilizations->id}})" class="btn-sm pull-right" title="Delete Gas Utilization"> <i class="fa fa-remove"></i>   </a>

                        <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_utilization({{$gas_utilizations->id}})" class="btn-sm pull-right" title="View Summary of Gas Utilization"> <i class="fa fa-eye"></i>   </a>

                        <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" data-target=""  onclick="load_gas_utilization({{$gas_utilizations->id}})" class="btn-sm pull-right" title="Edit Summary of Gas Utilization"> <i class="fa fa-pencil"></i>    </a>
                    </th>  
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$gas_utilization->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->



<script>
    $(function()
    {
        $('[data-toggle="tooltip"]').tooltip();
        $('.page-link').click(function(e)
        {
            e.preventDefault();
            var aID=$(this).attr('href');
            type=sessionStorage.getItem('name');
            $('#'+type).load(aID);
        });

 
        $("#searchBtn").on('mouseover', function(e)
        { 
            var search_text = $('#dynamicsearch').val(); 
            formData = 
            {
                search_text:search_text,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('download-search-data')}}', formData, function(data, status, xhr) { });       
        });        

    });

    //SORT SCRIPT
    sortAscDesc();

    function sortByUnresolved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/utilization?p='+$pending);
        $('#utilization').load('{{url('ajax')}}/utilization?p='+$pending);
        sessionStorage.setItem('name','utilization'); 
    }  
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/utilization?a='+$approve);
        $('#utilization').load('{{url('ajax')}}/utilization?a='+$approve);
        sessionStorage.setItem('name','utilization'); 
    } 
</script>