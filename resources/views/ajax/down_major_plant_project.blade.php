<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Major Petrochemical Plant Projects
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_down_plant')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Major Petrochemical Plant Projects Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_down_plant', sessionStorage.getItem('url'),'downloadDownstreamProjectTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Major Petrochemical Plant Projects Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('transport/download_down_project/xlsx')}}" data-toggle="tooltip" id="searchBtn" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Major Petrochemical Plant Projects Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_downstream_project') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_pet_plant()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="down_plant_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Company</th>
                <th>Location</th>
                <th>Plant Name</th>
                <th>Plant Type</th>
                <th>Capacity by Unit <i class="units"></i></th>
                <th>Output By Unit</th>
                <th>Status</th>
                <th>Start Year</th>
                <th>Estimated Completion</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($down_project)
                    @foreach($down_project as $down_projects)
                        @php $unResolved = request()->user()->unResolved($down_projects->id, 'down_petrochemical_plant_project'); @endphp
                        <tr>
                            <th>{{$down_projects->year}} </th>
                            <th>{{$down_projects->company}} </th>
                            <th>{{$down_projects->location}} </th>
                            <th>{{$down_projects->plant_name}}</th>
                            <th>{{$down_projects->plant_type}} </th>
                            <th data-toggle="tooltip" title="Capacity In ">{{$down_projects->capacity_by_unit}}</th>
                            <th>{{$down_projects->output_yield}} </th>
                            @if($down_projects->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$down_projects->statuses?$down_projects->statuses->status_name:''}}</th>
                            @endif
                            <th>{{$down_projects->start_year}} </th>
                            <th>{{$down_projects->estimated_completion}} </th>
                            <th style="text-align: right;">
                                @if($down_projects->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_petrochemical_plant_project', {{$down_projects->id}})" class="btn-sm pull-right" title="Delete Major Plant Projects"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_down_plant({{$down_projects->id}})" class="btn-sm pull-right" title="View Major Petrochemical Plant Projects"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_down_plant({{$down_projects->id}})" class="btn-sm pull-right" title="Edit Major Petrochemical Plant Projects"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$down_project->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->




<script type="text/javascript">
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
        sessionStorage.setItem('url','{{url('ajax')}}/down_project?p='+$pending);
        $('#down_project').load('{{url('ajax')}}/down_project?p='+$pending);
        sessionStorage.setItem('name','down_project'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/down_project?a='+$approve);
        $('#down_project').load('{{url('ajax')}}/down_project?a='+$approve);
        sessionStorage.setItem('name','down_project'); 
    } 
</script>