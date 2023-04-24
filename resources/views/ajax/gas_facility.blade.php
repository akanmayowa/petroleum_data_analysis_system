<div class="table-responsive">      <form method="POST">@csrf  
    <h5 style="margin-left: 5px; color: #aaa"> Major Gas Facilities 
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('addgas_facility')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Major Gas Facilities Here"> <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('uplgas_facility', sessionStorage.getItem('url'),'downloadGasFacilityTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Major Gas Facilities Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('gas/download_gas_facility/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Major Gas Facilities Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_facilities') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_fac()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
    <table class="table table-striped table-sm mb-0" id="gas_facility_table">
        <thead class="thead-dark">
            <tr>                                               
                <th>year</th>                                     
                <th>Month</th>
                <th>Company</th>  
                <th>Facility Type</th>  
                <th>Facility</th>
                <th>Location</th>
                <th>Terrain</th>
                <th>Design Capacity <i class="units">MMscf/D</i></th>
                <th>Operating Capacity <i class="units">MMscf/D</i></th>
                <th>Status</th>
                <th>License Status</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

        </thead>
        <tbody>
            @if($gas_facility)
                @foreach($gas_facility as $_gas_facility)
                    <tr>
                        @php $unResolved = request()->user()->unResolved($_gas_facility->id, 'gas_major_gas_facilities'); @endphp
                        <th>{{$_gas_facility->year}}</th>
                        <th>{{$_gas_facility->month}}</th> 
                        @if($_gas_facility->pending_id > 0 && $unResolved->column_1 != '')
                            <th class="null">{{$unResolved->column_1}}</th>
                        @else
                        <th>{{$_gas_facility->company?$_gas_facility->company->company_name:''}}</th>
                        @endif
                        @if($_gas_facility->pending_id > 0 && $unResolved->column_2 != '')
                            <th class="null">{{$unResolved->column_2}}</th>
                        @else
                        <th>{{$_gas_facility->facility_type?$_gas_facility->facility_type->facility_type_name:''}}</th>
                        @endif
                        @if($_gas_facility->pending_id > 0 && $unResolved->column_3 != '')
                            <th class="null">{{$unResolved->column_3}}</th>
                        @else
                        <th>{{$_gas_facility->facility?$_gas_facility->facility->facility_name:''}}</th>
                        @endif
                        <th>{{$_gas_facility->location_id}}</th>
                        @if($_gas_facility->pending_id > 0 && $unResolved->column_4 != '')
                            <th class="null">{{$unResolved->column_4}}</th>
                        @else
                        <th>{{$_gas_facility->terrain?$_gas_facility->terrain->terrain_name:''}}</th>
                        @endif
                        <th data-toggle="tooltip" title="Volume In MMscf/D">{{$_gas_facility->design_capacity}}</th>
                        <th data-toggle="tooltip" title="Volume In MMscf/D">{{$_gas_facility->operating_capacity}}</th> 
                        @if($_gas_facility->pending_id > 0 && $unResolved->column_5 != '')
                            <th class="null">{{$unResolved->column_5}}</th>
                        @else
                        <th>{{$_gas_facility->gas_status?$_gas_facility->gas_status->status_name:''}}</th>
                        @endif
                        <th>{{$_gas_facility->license_status}}</th>
                        <th style="text-align: right;">
                            @if($_gas_facility->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th>  
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_major_gas_facilities', {{$_gas_facility->id}})" class="btn-sm pull-right" title="Delete Gas Facilities"> <i class="fa fa-remove"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_facility({{$_gas_facility->id}})" class="btn-sm pull-right" title="View Major Gas Facilities"> <i class="fa fa-eye"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" data-target=""  onclick="load_gas_facility({{$_gas_facility->id}})" class="btn-sm pull-right" title="Edit Major Gas Facilities"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$gas_facility->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/facility?p='+$pending);
        $('#facility').load('{{url('ajax')}}/facility?p='+$pending);
        sessionStorage.setItem('name','facility'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/facility?a='+$approve);
        $('#facility').load('{{url('ajax')}}/facility?a='+$approve);
        sessionStorage.setItem('name','facility'); 
    } 
</script>