<div class="table-responsive">   <form method="POST">@csrf  
    <h5 style="margin-left: 5px; color: #aaa"> Environmental Compliance Monitoring
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span>@endif </a> 
        <a data-toggle="tooltip" onclick="showmodal('add_env_compliance')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Environmental Compliance Monitoring Here">  <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('upl_env_compliance', sessionStorage.getItem('url'),'downloadEnvironmentalComplainceTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" 
            data-original-title="Upload Environmental Compliance Monitoring Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_environmental_compliance/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Environmental Compliance Monitoring Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_spill_incidence') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_env_compliance()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="env_comp_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Company</th>
                    <th>Non-Compliance</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>

            </thead>
            <tbody>
                @if($environmental_compliance)
                    @foreach($environmental_compliance as $_environmental_compliance)
                    @php $unResolved = request()->user()->unResolved($_environmental_compliance->id, 'she_environmental_compliance_monitoring'); @endphp
                        <tr >
                            <th>{{$_environmental_compliance->year}}</th>
                            <th>{{$_environmental_compliance->month}}</th>
                            @if($_environmental_compliance->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th>{{$_environmental_compliance->company?$_environmental_compliance->company->company_name:''}}</th>
                            @endif 
                            <th>{{$_environmental_compliance->compliance}}</th>  
                            <th style="text-align: right;">
                                @if($_environmental_compliance->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_environmental_compliance_monitoring', {{$_environmental_compliance->id}})" class="btn-sm pull-right" title="Delete Environmental Compliance"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_environmental_compliance({{$_environmental_compliance->id}})" class="btn-sm pull-right" title="Edit Environmental Compliance Monitoring"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$environmental_compliance->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/environmental_compliance?p='+$pending);
        $('#environmental_compliance').load('{{url('ajax')}}/environmental_compliance?p='+$pending);
        sessionStorage.setItem('name','environmental_compliance'); 
    } 
    function sortByApproved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/environmental_compliance?a='+$pending);
        $('#environmental_compliance').load('{{url('ajax')}}/environmental_compliance?a='+$pending);
        sessionStorage.setItem('name','environmental_compliance'); 
    } 
</script>