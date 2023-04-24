<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Accredited Waste Managers
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_acc_manager')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Accredited Waste Managers Here">  <i class="fa fa-plus"> New</i> </a>
                    
        <a data-toggle="tooltip" onclick="showmodal('upl_acc_manager', sessionStorage.getItem('url'),'downloadWasteManagerTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" 
            data-original-title="Upload Accredited Waste Managers Here"> <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_accredited_waste_manager/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Accredited Waste Managers Excel Here">  <i class="fa fa-download"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_accredited_waste_mgr') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_acc_mgt()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="waste_man_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Company</th>
                    <th>Type of Facility</th>
                    <th>Facility Description</th>
                    <th>Location Area</th>
                    <th>Operational Status</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style=""> </th>
                </tr>
            </thead>
            <tbody>
                @if($waste_manager)
                    @foreach($waste_manager as $waste_managers)
                        <tr> 
                            @php $unResolved = request()->user()->unResolved($waste_managers->id, 'she_accredited_waste_manager'); @endphp
                            <th>{{$waste_managers->year}}</th>
                            @if($waste_managers->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                                <th class="@if($waste_managers->pending_id > 0)null @endif">
                                    {{$waste_managers->company?$waste_managers->company->company_name:''}}</th> 
                            @endif

                            @if($waste_managers->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else                           
                            <th>{{$waste_managers->type_of_facility?$waste_managers->type_of_facility->facility_type_name:''}}</th>
                            @endif

                            <th>{{$waste_managers->facility_description}}</th>
                            <th>{{$waste_managers->state_id}}</th>
                            <th>{{$waste_managers->operational_status_id}}</th> 
                            <th style="text-align: right;">
                                @if($waste_managers->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th> 
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_accredited_waste_manager', {{$waste_managers->id}})" class="btn-sm pull-right" title="Delete Waste Managers"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_waste_manager({{$waste_managers->id}})" class="btn-sm pull-right" title="View Accredited Waste Managers"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_waste_manager({{$waste_managers->id}})" class="btn-sm pull-right" title="Edit Accredited Waste Managers"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$waste_manager->appends(Request::capture()->except('page'))->render() }} 
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


