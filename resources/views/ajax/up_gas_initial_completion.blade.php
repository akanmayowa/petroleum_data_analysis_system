<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> New Drill Gas Initial Completion Wells
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_GIC')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Gas Initial Completion Here"> <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_GIC', sessionStorage.getItem('url'), 'downloadGasInitialCompletionTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Gas Initial Completion Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_gas_initial_completions/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Gas Initial Completion Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_well_activities') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_initial_completion()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form> 
        <table class="table table-striped table-sm mb-0" id="GIC_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Field</th>
                <th>Company</th>
                <th>Concession</th>
                <th>Well</th>
                {{-- <th>Terrain</th> --}}
                <th>Facility</th>
                <th>Reserves (Bscf)</th>
                <th>Off-Take (MMSCFD)</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($gas_initial_completion)
                    @foreach($gas_initial_completion as $completion)
                        @php $unResolved = request()->user()->unResolved($completion->id, 'up_gas_initial_completion'); @endphp
                        <tr>            
                            <th>{{$completion->year}}</th> 
                            <th>{{$completion->month}}</th>
                            @if($completion->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th>{{$completion->field?$completion->field->field_name:''}} </th> 
                            @endif
                            <th>{{$completion->company?$completion->company->company_name:''}} </th>
                            <th>{{$completion->concession?$completion->concession->concession_name:''}} </th>                          
                            <th>{{$completion->well}}</th> 
                            {{-- @if($completion->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else  
                            <th>{{$completion->terrain?$completion->terrain->terrain_name:''}} </th>
                            @endif --}}
                            @if($completion->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th>{{$completion->facility?$completion->facility->facility_name:''}} </th>
                            @endif
                            <th>{{$completion->reserves}}</th> 
                            <th>{{$completion->off_take}}</th>   
                            <th style="text-align: right;">
                                @if($completion->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>  
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_gas_initial_completion', {{$completion->id}})" class="btn-sm pull-right" title="Delete Initial Gas Completion"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_initial_completion({{$completion->id}})" class="btn-sm pull-right" title="View Gas Initial Completion"> <i class="fa fa-eye"></i>    </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_gas_initial_completion({{$completion->id}})" class="btn-sm pull-right" title="Edit Gas Initial Completion"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$gas_initial_completion->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->



<script>
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
        sessionStorage.setItem('url','{{url('ajax')}}/gas_initial_completion?p='+$pending);
        $('#gas_initial_completion').load('{{url('ajax')}}/gas_initial_completion?p='+$pending);
        sessionStorage.setItem('name','gas_initial_completion'); 
    }

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_initial_completion?a='+$approve);
        $('#gas_initial_completion').load('{{url('ajax')}}/gas_initial_completion?a='+$approve);
        sessionStorage.setItem('name','gas_initial_completion'); 
    }    
</script>