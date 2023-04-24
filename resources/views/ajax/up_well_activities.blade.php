<div class="table-responsive">       <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Well Activities - DRILLING  
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_well')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Well Activities Here"> <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_well', sessionStorage.getItem('url'), 'downloadWellActivityTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Well Activities Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_well_activities/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Well Activities Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_well_activities') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') )  )
            <a onclick="approve_well()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="well_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Terrain</th>
                <th>Class</th>
                <th>Type</th>
                <th>Contract</th>
                <th>No of Wells</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($well_activities)
                    @foreach($well_activities as $well_activity)
                        @php $unResolved = request()->user()->unResolved($well_activity->id, 'up_well_activities'); @endphp
                        <tr>   
                            <th>{{$well_activity->year}}</th> 
                            <th>{{$well_activity->month}}</th> 
                            @if($well_activity->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th>{{$well_activity->terrain?$well_activity->terrain->terrain_name:''}}</th>
                            @endif
                            @if($well_activity->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else  
                            <th>{{$well_activity->class?$well_activity->class->class_name:''}}</th>
                            @endif
                            @if($well_activity->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else  
                            <th>{{$well_activity->type?$well_activity->type->type_name:''}} </th>
                            @endif 
                            @if($well_activity->pending_id > 0 && $unResolved->column_4 != '')
                                <th class="null">{{$unResolved->column_4}}</th>
                            @else  
                            <th>{{$well_activity->contract?$well_activity->contract->contract_name:''}} </th>
                            @endif
                            <th>{{$well_activity->no_of_well}}</th> 
                            <th style="text-align: right;">
                                @if($well_activity->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_well_activities', {{$well_activity->id}})" class="btn-sm pull-right" title="Delete Well Activities"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_well_activities({{$well_activity->id}})" class="btn-sm pull-right" title="View Well Activities"> <i class="fa fa-eye"></i>    </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_well_activities({{$well_activity->id}})" class="btn-sm pull-right" title="Edit Well Activities"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$well_activities->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/well_activities?p='+$pending);
        $('#well_activities').load('{{url('ajax')}}/well_activities?p='+$pending);
        sessionStorage.setItem('name','well_activities'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/well_activities?a='+$approve);
        $('#well_activities').load('{{url('ajax')}}/well_activities?a='+$approve);
        sessionStorage.setItem('name','well_activities'); 
    }   
</script>