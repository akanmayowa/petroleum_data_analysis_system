<div class="table-responsive">       <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Well Workover Activities 
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_workover')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Well Workover Activities Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_workover', sessionStorage.getItem('url'), 'downloadWellWorkoverTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Well Workover ActivitiesHere">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_well_workover/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Well Workover Activities Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_workover()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="workover_well_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Field</th>
                <th>Type</th>
                <th>Company</th>
                <th>Block</th>
                <th>Wells</th>
                <th>Processing Facility</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($workover)
                    @foreach($workover as $workovers)
                        @php $unResolved = request()->user()->unResolved($workovers->id, 'up_well_workover'); @endphp
                        <tr> 
                            <th>{{$workovers->year}}</th>  
                            <th>{{$workovers->month}}</th>
                            @if($workovers->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th>{{$workovers->field?$workovers->field->field_name:''}} </th>
                            @endif
                            @if($workovers->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else                               
                            <th>
                                @if($workovers->type_id == 1) Repairs 
                                @elseif($workovers->type_id == 2) Zone Change/Zone Isolation 
                                @elseif($workovers->type_id == 3) Re-Completion
                                @elseif($workovers->type_id == 4) Logging/PLT
                                @elseif($workovers->type_id == 5) Cement Squeeze
                                @else N/A @endif 
                            </th> 
                            @endif
                            @if($workovers->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else 
                            <th>{{$workovers->company?$workovers->company->company_name:''}} </th> 
                            @endif
                            @if($workovers->pending_id > 0 && $unResolved->column_4 != '')
                                <th class="null">{{$unResolved->column_4}}</th>
                            @else 
                            <th>{{$workovers->concession?$workovers->concession->concession_name:''}} </th> 
                            @endif
                            <th>{{$workovers->well}}</th>
                            @if($workovers->pending_id > 0 && $unResolved->column_5 != '')
                                <th class="null">{{$unResolved->column_5}}</th>
                            @else   
                            <th>{{$workovers->facility?$workovers->facility->facility_name:''}} </th>
                            @endif 
                            <th style="text-align: right;">
                                @if($workovers->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>  
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_well_workover', {{$workovers->id}})" class="btn-sm pull-right" title="Delete Well Activities Workover"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_well_workover({{$workovers->id}})" class="btn-sm pull-right" title="Edit Well Workover Activities"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$workover->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/workover?p='+$pending);
        $('#workover').load('{{url('ajax')}}/workover?p='+$pending);
        sessionStorage.setItem('name','workover'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/workover?a='+$approve);
        $('#workover').load('{{url('ajax')}}/workover?a='+$approve);
        sessionStorage.setItem('name','workover'); 
    }   
</script>