<div class="table-responsive">        <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Major Oil Facilities 
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_oil_fac')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Major Oil Facilities Here"> <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_oil_fac', sessionStorage.getItem('url'), 'downloadOilFacilityTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Major Oil Facilities Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('upstream/download_oil_facility/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Major Oil Facilities Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_oil_facilities') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_oil_facility()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
    <table class="table table-striped table-sm mb-0" id="oil_facility_table">
        <thead class="thead-dark">
            <tr>                                               
                <th>year</th>                                     
                <th>Month</th>                                          
                <th>Company</th>
                <th>Facility</th>
                <th>Type</th>
                <th>Location</th>
                <th>Terrain</th>
                <th>Design Capacity</th>
                <th>Operating Capacity</th>
                <th>Status</th>
                <th>License Status</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

        </thead>
        <tbody>
            @if($oil_facility)
                @foreach($oil_facility as $_oil_facility)
                    @php $unResolved = request()->user()->unResolved($_oil_facility->id, 'up_major_oil_facilities'); @endphp
                    <tr>
                        <th class="th_hd">{{$_oil_facility->year}}</th>
                        <th class="th_hd">{{$_oil_facility->month}}</th>
                        @if($_oil_facility->pending_id > 0 && $unResolved->column_1 != '')
                            <th class="null">{{$unResolved->column_1}}</th>
                        @else 
                        <th class="th_hd">{{$_oil_facility->company?$_oil_facility->company->company_name:''}}</th>
                        @endif
                        @if($_oil_facility->pending_id > 0 && $unResolved->column_2 != '')
                            <th class="null">{{$unResolved->column_2}}</th>
                        @else  
                        <th class="th_hd">{{$_oil_facility->facility?$_oil_facility->facility->facility_name:''}}</th>
                        @endif
                        @if($_oil_facility->pending_id > 0 && $unResolved->column_3 != '')
                            <th class="null">{{$unResolved->column_3}}</th>
                        @else 
                        <th class="th_hd">{{$_oil_facility->facility_type?$_oil_facility->facility_type->facility_type_name:''}}</th>
                        @endif
                        @if($_oil_facility->pending_id > 0 && $unResolved->column_4 != '')
                            <th class="null">{{$unResolved->column_4}}</th>
                        @else 
                        <th class="th_hd">{{$_oil_facility->location?$_oil_facility->location->location_name:''}}</th>
                        @endif
                        @if($_oil_facility->pending_id > 0 && $unResolved->column_5 != '')
                            <th class="null">{{$unResolved->column_5}}</th>
                        @else 
                        <th class="th_hd">{{$_oil_facility->terrain?$_oil_facility->terrain->terrain_name:''}}</th>
                        @endif
                        <th class="th_hd">{{$_oil_facility->design_capacity}}</th>
                        <th class="th_hd">{{$_oil_facility->operating_capacity}}</th> 
                        @if($_oil_facility->pending_id > 0 && $unResolved->column_6 != '')
                            <th class="null">{{$unResolved->column_6}}</th>
                        @else 
                        <th class="th_hd">{{$_oil_facility->gas_status?$_oil_facility->gas_status->status_name:''}}</th>
                        @endif
                        @if($_oil_facility->pending_id > 0 && $unResolved->column_7 != '')
                            <th class="null">{{$unResolved->column_7}}</th>
                        @else 
                        <th class="th_hd">{{$_oil_facility->up_license_status?$_oil_facility->up_license_status->license_status_name:''}}</th>
                        @endif
                        <th style="text-align: right;">
                            @if($_oil_facility->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th>  
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_major_oil_facilities', {{$_oil_facility->id}})" class="btn-sm pull-right" title="Delete Oil Facilities"> <i class="fa fa-remove"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_oil_facility({{$_oil_facility->id}})" class="btn-sm pull-right" title="View Major Oil Facilities"> <i class="fa fa-eye"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" data-target=""  onclick="load_oil_facility({{$_oil_facility->id}})" class="btn-sm pull-right" title="Edit Major Oil Facilities"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$oil_facility->appends(Request::capture()->except('page'))->render() }}
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
        sessionStorage.setItem('url','{{url('ajax')}}/oil_facility?p='+$pending);
        $('#oil_facility').load('{{url('ajax')}}/oil_facility?p='+$pending);
        sessionStorage.setItem('name','oil_facility'); 
    }
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/oil_facility?a='+$approve);
        $('#oil_facility').load('{{url('ajax')}}/oil_facility?a='+$approve);
        sessionStorage.setItem('name','oil_facility'); 
    } 
</script>