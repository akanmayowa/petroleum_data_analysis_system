<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Field Development Plan 
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_fdp')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Field Development Plan Here"> <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_fdp', sessionStorage.getItem('url'), 'downloadFieldDevelopmentPlanTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Field Development Plan Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_field_development_plan/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Field Development Plan Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_well_activities') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_field_development_plan()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="fdp_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Company</th>
                <th>Field</th>
                <th>Anticipated Production Rate (Bopd/d)</th>
                <th>Expected Reserves (MMSTB)</th>
                <th>Commencement Date</th>
                <th>No of Well</th>
                <th>Remarks/Status</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($field_development_plan)
                    @foreach($field_development_plan as $_field_development_plan)
                        @php $unResolved = request()->user()->unResolved($_field_development_plan->id, 'up_field_development_plan'); @endphp
                        <tr>           
                            <th>{{$_field_development_plan->year}}</th> 
                            @if($_field_development_plan->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th>{{$_field_development_plan->company?$_field_development_plan->company->company_name:''}} </th>
                            @endif
                            @if($_field_development_plan->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else  
                            <th>{{$_field_development_plan->field?$_field_development_plan->field->field_name:''}} </th>
                            @endif
                            <th>{{$_field_development_plan->production_rate}}</th> 
                            <th>{{$_field_development_plan->expected_reserves}}</th> 
                            <th>{{$_field_development_plan->commencement_date}}</th> 
                            <th>{{$_field_development_plan->no_of_well}}</th> 
                            <th>{{$_field_development_plan->remark}}</th>
                            <th style="text-align: right;">
                                @if($_field_development_plan->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>    
                            <th> 
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_field_development_plan', {{$_field_development_plan->id}})" class="btn-sm pull-right" title="Delete Field Development Plan"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_field_development_plan({{$_field_development_plan->id}})" class="btn-sm pull-right" title="Edit Field Development Plan"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$field_development_plan->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/field_development_plan?p='+$pending);
        $('#field_development_plan').load('{{url('ajax')}}/field_development_plan?p='+$pending);
        sessionStorage.setItem('name','field_development_plan'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/field_development_plan?a='+$approve);
        $('#field_development_plan').load('{{url('ajax')}}/field_development_plan?a='+$approve);
        sessionStorage.setItem('name','field_development_plan'); 
    }    
</script>