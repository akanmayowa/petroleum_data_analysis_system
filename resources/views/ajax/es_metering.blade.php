<div class="table-responsive">        <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Metering Projects 
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('addmeter')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Metering Projects Here"> <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('uplmeter', sessionStorage.getItem('url'),'downloadMeteringeProjectTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Metering Projects Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('transport/download_metering/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Metering Projects Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_metering') || (\Auth::user()->delegate_role == 'Project and Transportation (E&S)' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_meter()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>    </form>
        <table class="table table-striped table-sm mb-0" id="meter_table">
            <thead class="thead-dark">
                <tr>                                                      
                    <th>Year</th>
                    <th>Facility</th>
                    <th>Company</th>
                    <th>Objective</th>
                    <th>Service</th> 
                    <th>Phase</th>                           
                    <th>Start Date</th>                            
                    <th>Commissioning Date</th> 
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>       
                    <th style="">  </th>
                </tr>
            </thead>
            <tbody>
                @if($metering)
                    @foreach($metering as $_metering)
                        @php $unResolved = request()->user()->unResolved($_metering->id, 'es_metering'); @endphp
                        <tr>
                            <th>{{$_metering->year}}</th>                            
                            <th>{{$_metering->facility_id}}</th>                            
                            @if($_metering->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$_metering->company?$_metering->company->company_name:''}}</th>
                            @endif 
                            <th>{{$_metering->objective}}</th>
                            @if($_metering->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                            <th>{{$_metering->service?$_metering->service->service_name:''}}</th> 
                            @endif
                            <th>{{$_metering->phase_id}}</th>
                            <th>{{$_metering->start_date}}</th>
                            <th>{{$_metering->commissioning_date}}</th>
                            <th style="text-align: right;">
                                @if($_metering->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\es_metering', {{$_metering->id}})" class="btn-sm pull-right" title="Delete Metering Record"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_metering_project({{$_metering->id}})" class="btn-sm pull-right" title="View Metering Projects"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_metering_project({{$_metering->id}})" class="btn-sm pull-right" title="Edit Metering Projects"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$metering->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/metering?p='+$pending);
        $('#metering').load('{{url('ajax')}}/metering?p='+$pending);
        sessionStorage.setItem('name','metering'); 
    }
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/metering?a='+$approve);
        $('#metering').load('{{url('ajax')}}/metering?a='+$approve);
        sessionStorage.setItem('name','metering'); 
    }
</script>