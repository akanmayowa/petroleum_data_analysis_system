<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Waste Management Facilities
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_mgt_fac')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Waste Management Facilities Here">  <i class="fa fa-plus"> New</i> </a>
                    
        <a data-toggle="tooltip" onclick="showmodal('upl_mgt_fac', sessionStorage.getItem('url'),'downloadWasteManagementFacilityTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" 
            data-original-title="Upload Waste Management Facilities Here"> <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_waste_management_facilities/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Waste Management Facilities Excel Here">  <i class="fa fa-download"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_accredited_waste_mgr') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_waste_mgt_facilities()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="waste_mgt_fac_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Type of Facility</th>
                    <th>No Of Approved Facilities</th>
                    <th>Status</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style=""> </th>
                </tr>

            </thead>
            <tbody>
                @if($waste_mgt_facilities)
                    @foreach($waste_mgt_facilities as $waste_mgt_facility)
                    @php $unResolved = request()->user()->unResolved($waste_mgt_facility->id, 'she_accredited_waste_management_facility'); @endphp
                        <tr >
                            <th>{{$waste_mgt_facility->year}}</th>
                            <th>{{$waste_mgt_facility->month}}</th>
                            @if($waste_mgt_facility->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>
                                {{$waste_mgt_facility->type_of_facility?$waste_mgt_facility->type_of_facility->facility_type_name:''}}
                            </th>
                            @endif
                            <th>{{$waste_mgt_facility->operational_permit}}</th>
                            <th>{{$waste_mgt_facility->status}}</th> 
                            <th style="text-align: right;">
                                @if($waste_mgt_facility->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th> 
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_accredited_waste_management_facility', {{$waste_mgt_facility->id}})" class="btn-sm pull-right" title="Delete Waste Management Facilities"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_waste_mgt_facilitiy({{$waste_mgt_facility->id}})" class="btn-sm pull-right" title="View Waste Management Facilities"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_waste_mgt_facilitiy({{$waste_mgt_facility->id}})" class="btn-sm pull-right" title="Edit Waste Management Facilities"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$waste_mgt_facilities->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/waste_manager?p='+$pending);
        $('#waste_manager').load('{{url('ajax')}}/waste_manager?p='+$pending);
        sessionStorage.setItem('name','waste_manager'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/waste_manager?a='+$approve);
        $('#waste_manager').load('{{url('ajax')}}/waste_manager?a='+$approve);
        sessionStorage.setItem('name','waste_manager'); 
    } 
</script>


