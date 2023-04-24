<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Approved Gas Development Plan
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_gas_fdp')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Approved Gas Development Plan Here"> <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_gfdp', sessionStorage.getItem('url'), 'downloadApprovedGasDevelopmentPlanTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Approved Gas Development Plan Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_approved_gas_development_plan/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Approved Gas Development Plan Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_well_activities') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_dp()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>    </form>
        <table class="table table-striped table-sm mb-0" id="gfdp_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Field</th>
                <th>Concession</th>
                <th>Company</th>
                <th>Gas Reserves (BSCF)</th>
                <th>Condensate (MMSTB)</th>
                <th>AG Reserves (Bscf)</th>
                <th>Off-Take Rate (MMSCFD)</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($approved_gas_development_plan)
                    @foreach($approved_gas_development_plan as $_appr_gas_dev_plan)
                        @php $unResolved = request()->user()->unResolved($_appr_gas_dev_plan->id, 'up_approved_gas_development_plan'); @endphp
                        <tr>           
                            <th>{{$_appr_gas_dev_plan->year}}</th> 
                            @if($_appr_gas_dev_plan->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$_appr_gas_dev_plan->field?$_appr_gas_dev_plan->field->field_name:''}} </th>
                            @endif 
                            @if($_appr_gas_dev_plan->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                            <th>{{$_appr_gas_dev_plan->concession?$_appr_gas_dev_plan->concession->concession_name:''}} </th>
                            @endif 
                            @if($_appr_gas_dev_plan->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                            <th>{{$_appr_gas_dev_plan->company?$_appr_gas_dev_plan->company->company_name:''}} </th>
                            @endif 
                            <th>{{$_appr_gas_dev_plan->gas_reserve}}</th> 
                            <th>{{$_appr_gas_dev_plan->condensate}}</th> 
                            <th>{{$_appr_gas_dev_plan->ag_reserve}}</th> 
                            <th>{{$_appr_gas_dev_plan->off_take_rate}}</th>
                            <th style="text-align: right;">
                                @if($_appr_gas_dev_plan->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>    
                            <th>   
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_approved_gas_development_plan', {{$_appr_gas_dev_plan->id}})" class="btn-sm pull-right" title="Delete Gas Development Plan"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_approved_gas_development_plan({{$_appr_gas_dev_plan->id}})" class="btn-sm pull-right" title="Edit Approved Gas Development Plan"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$approved_gas_development_plan->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->



<script type="text/javascript">
    $(function()
    {
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
        sessionStorage.setItem('url','{{url('ajax')}}/approved_gas_development_plan?p='+$pending);
        $('#approved_gas_development_plan').load('{{url('ajax')}}/approved_gas_development_plan?p='+$pending);
        sessionStorage.setItem('name','approved_gas_development_plan'); 
    }

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/approved_gas_development_plan?a='+$approve);
        $('#approved_gas_development_plan').load('{{url('ajax')}}/approved_gas_development_plan?a='+$approve);
        sessionStorage.setItem('name','approved_gas_development_plan'); 
    }     
</script>