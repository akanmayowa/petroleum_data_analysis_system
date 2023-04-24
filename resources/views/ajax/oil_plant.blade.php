<div class="table-responsive">        <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Major Upstream (oil) projects 
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_oil_plant')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Major Oil Plant Projects Here"> <i class="fa fa-plus"> New</i> </a>
                    
        <a data-toggle="tooltip" onclick="showmodal('upl_oil_plant', sessionStorage.getItem('url'),'downloadUpstreamProjectTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Major Oil Plant Projects Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('transport/download_processing_plant_project/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Major Oil Plant Projects Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_upstream_project') || (\Auth::user()->delegate_role == 'Project and Transportation (E&S)' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_upstream()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="oil_plant_table">
            <thead class="thead-dark">
                <tr>                                           
                    <th>Year</th>
                    <th>Project</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Terrain</th>
                    <th>Expected Oil <i class="units">(Barrels)</i></th>
                    <th>Expected Gas <i class="units">(MMScf)</i></th>
                    <th>Expected Water <i class="units">(Bbls)</i></th>
                    <th>Enhanced Facility</th>
                    <th>Facility Type</th>
                    <th>Dev Type</th>
                    <th>Start Date</th>
                    <th>Completion Date</th>
                    <th>Status</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style=""> </th>
                </tr>

            </thead>
            <tbody>
                @if($oil_plant)
                    @foreach($oil_plant as $_oil_plant)
                        @php $unResolved = request()->user()->unResolved($_oil_plant->id, 'up_processing_plant_project'); @endphp
                        <tr>
                            <th>{{$_oil_plant->year}}</th>
                            <th>{{$_oil_plant->project}}</th>
                            @if($_oil_plant->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else                               
                                <th>{{substr($_oil_plant->company?$_oil_plant->company->company_name:'', 0, 30)}}</th> 
                            @endif 
                            <th>{{$_oil_plant->location}}</th> 
                            <th>{{$_oil_plant->terrain_id}}</th> 
                            <th data-toggle="tooltip" title="Capacity In (Mbopd)">{{$_oil_plant->expected_oil}}</th>
                            <th data-toggle="tooltip" title="Capacity In (MMScf)">{{$_oil_plant->expected_gas}}</th>
                            <th>{{$_oil_plant->expected_water}}</th>
                            <th>{{$_oil_plant->expected_efi}}</th>
                            <th>{{$_oil_plant->facility_type}}</th>
                            <th>{{$_oil_plant->development_type}}</th>
                            <th>{{$_oil_plant->start_date}}</th>
                            <th>{{$_oil_plant->completion_date}}</th>
                            <th>{{$_oil_plant->status_id}}</th>
                            <th style="text-align: right;">
                                @if($_oil_plant->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>  
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_processing_plant_project', {{$_oil_plant->id}})" class="btn-sm pull-right" title="Delete Major Oil Development Plant Record"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_oil_plant({{$_oil_plant->id}})" class="btn-sm pull-right" title="View Major Oil Development Projects"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" data-target=""  onclick="load_oil_plant({{$_oil_plant->id}})" class="btn-sm pull-right" title="Edit Major Oil Development Projects"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$oil_plant->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/oil_plant?p='+$pending);
        $('#oil_plant').load('{{url('ajax')}}/oil_plant?p='+$pending);
        sessionStorage.setItem('name','oil_plant'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/oil_plant?a='+$approve);
        $('#oil_plant').load('{{url('ajax')}}/oil_plant?a='+$approve);
        sessionStorage.setItem('name','oil_plant'); 
    }
</script>