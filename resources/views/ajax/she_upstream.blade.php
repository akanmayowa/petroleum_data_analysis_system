<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Accident Report – Upstream
        <a data-toggle="tooltip" onclick="showmodal('addupstream')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Accident Report – Upstream Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('uplupstream', sessionStorage.getItem('url'),'downloadUpstreamIncidentTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Accident Report – Upstream Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_accident_report_up/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Accident Report – Industry-Upstream Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_upstream_incidence') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_upstream()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
    <table class="table table-striped table-sm mb-0" id="upstream_table">
        <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Incidents</th>
                <th>Work Related</th>
                <th>Non Work Related</th>
                <th>Fatal Incident</th>
                <th>Non Fatal Incident</th>
                <th>Work Related Fatal Incident</th>
                <th>Non Work Related Fatal Incident</th>
                <th>Fatality</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

        </thead>
        <tbody>
            @if(count($she_upstream)>0)
                @foreach($she_upstream as $_she_upstream)
                    <tr>
                        <th>{{$_she_upstream->year}}</th>
                        <th>{{$_she_upstream->month}}</th>
                        <th>{{$_she_upstream->incidents}}</th> 
                        <th>{{$_she_upstream->work_related}}</th>
                        <th>{{$_she_upstream->non_work_related}}</th>
                        <th>{{$_she_upstream->fatal_incident}}</th>
                        <th>{{$_she_upstream->non_fatal_incident}}</th>
                        <th>{{$_she_upstream->work_related_fatal_incident}}</th> 
                        <th>{{$_she_upstream->non_work_related_fatal_incident}}</th>
                        <th>{{$_she_upstream->fatality}}</th> 
                        <th style="text-align: right;">
                            @if($_she_upstream->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th> 
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_accident_report_upstream', {{$_she_upstream->id}})" class="btn-sm pull-right" title="Delete Accident Report Upstream"> <i class="fa fa-remove"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_upstream({{$_she_upstream->id}})" class="btn-sm pull-right" title="View Accident Report – Upstream"> <i class="fa fa-eye"></i>   </a>
                           
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_upstream({{$_she_upstream->id}})" class="btn-sm pull-right" title="Edit Accident Report – Upstream"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    @if(!isset($_GET['excel']))
    {{$she_upstream->appends(Request::capture()->except('page'))->render() }} 
    @endif

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
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/she_upstream?a='+$approve);
        $('#she_upstream').load('{{url('ajax')}}/she_upstream?a='+$approve);
        sessionStorage.setItem('name','she_upstream'); 
    } 
</script>