<div class="table-responsive">        <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Pipeline Projects 
        @if($unresolvedCount) <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('addpipe')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Pipeline Projects Here"> <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('uplpipe', sessionStorage.getItem('url'),'downloadpipelineProjectTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Pipeline Projects Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('transport/download_pipeline_project/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Pipeline Projects Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_pipeline') || (\Auth::user()->delegate_role == 'Project and Transportation (E&S)' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_pipe()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>    </form>
        <table class="table table-striped table-sm mb-0" id="pipe_table">
            <thead class="thead-dark">
                <tr>                                                    
                    <th>Year</th>
                    <th>Pipeline</th>
                    <th>Company</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>nominal Size <i class="units">(In)</i> </th>   
                    <th>Length <i class="units">(Km)</i> </th>  
                    <th>Process Fliud</th>                           
                    <th>Start Date</th>                            
                    <th>Commissioning Date</th>                            
                    <th>Status</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th> 
                    <th style="">  </th>
                </tr>

            </thead>
            <tbody>
                @if($pipeline)
                    @foreach($pipeline as $_pipeline)
                        @php $unResolved = request()->user()->unResolved($_pipeline->id, 'es_pipeline_project'); @endphp
                        <tr>
                            <th>{{$_pipeline->year}}</th> 
                            <th>{{$_pipeline->pipeline_name}}</th> 
                            @if($_pipeline->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                                <th>{{substr($_pipeline->owner?$_pipeline->owner->company_name:'', 0, 30)}}</th>
                            @endif                              
                            <th>{{$_pipeline->origin}}</th>
                            <th>{{$_pipeline->destination}}</th> 
                            <th data-toggle="tooltip" title="In Inches">{{$_pipeline->nominal_size}}</th> 
                            <th data-toggle="tooltip" title="In Km">{{$_pipeline->length}}</th> 
                            <th>{{$_pipeline->process_fluid}}</th> 
                            <th>{{$_pipeline->start_date}}</th>
                            <th>{{$_pipeline->commissioning_date}}</th>
                            @if($_pipeline->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                                <th>{{$_pipeline->status?$_pipeline->status->status_name:''}}</th>
                            @endif
                            <th style="text-align: right;">
                                @if($_pipeline->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\es_pipeline_project', {{$_pipeline->id}})" class="btn-sm pull-right" title="Delete Pipeline Record"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_pipeline_project({{$_pipeline->id}})" class="btn-sm pull-right" title="View Pipeline Projects"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_pipeline_project({{$_pipeline->id}})" class="btn-sm pull-right" title="Edit Pipeline Projects"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$pipeline->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/pipeline?p='+$pending);
        $('#pipeline').load('{{url('ajax')}}/pipeline?p='+$pending);
        sessionStorage.setItem('name','pipeline'); 
    }
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/pipeline?a='+$approve);
        $('#pipeline').load('{{url('ajax')}}/pipeline?a='+$approve);
        sessionStorage.setItem('name','pipeline'); 
    }
</script>