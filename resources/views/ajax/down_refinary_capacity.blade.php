<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Refinery  Performance    <span class="unit-header"> Volume in MMbbls </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_ref_capacity')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Refinery Capacity Performance Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_ref_capacity', sessionStorage.getItem('url'), 'downloadRefCapacityTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Refinery Capacity Performance Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_refinary_capacity/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Refinery Capacity Performance Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_ref_capacity()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form> 
        <table class="table table-striped table-sm mb-0" id="ref_cap_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Refinery</th>
                {{-- <th>State</th>
                <th>Location</th> --}}
                <th>Jan <i class="units"></i></th>
                <th>Feb <i class="units"></i></th>
                <th>Mar <i class="units"></i></th>
                <th>Apr <i class="units"></i></th>
                <th>May <i class="units"></i></th>
                <th>Jun <i class="units"></i></th>
                <th>Jul <i class="units"></i></th>
                <th>Aug <i class="units"></i></th>
                <th>Sep <i class="units"></i></th>
                <th>Oct <i class="units"></i></th>
                <th>Nov <i class="units"></i></th>
                <th>Dec <i class="units"></i></th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($ref_capacities)
                    @foreach($ref_capacities as $_ref_capacities)
                        @php $unResolved = request()->user()->unResolved($_ref_capacities->id, 'down_refinary_capacity_utilization'); @endphp
                        <tr> 
                            <th>{{$_ref_capacities->year}}</th>
                            @if($_ref_capacities->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                             <th>{{$_ref_capacities->refinery?$_ref_capacities->refinery->plant_location_name:''}}</th>
                            @endif
                            {{-- @if($_ref_capacities->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                             <th>@if($_ref_capacities->state) {{$_ref_capacities->state->state_name}} @endif</th>
                            @endif
                             <th>{{$_ref_capacities->location}}</th> --}}
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->january, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->febuary, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->march, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->april, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->may, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->june, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->july, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->august, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->september, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->october, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->november, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_ref_capacities->december, 2)}}</th>
                            <th style="text-align: right;">
                                @if($_ref_capacities->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_refinary_capacity_utilization', {{$_ref_capacities->id}})" class="btn-sm pull-right" title="Delete Refinery Capacity Performance"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_refinary_capacity({{$_ref_capacities->id}})" class="btn-sm pull-right" title="View Refinery Capacity Performance"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_refinary_capacity({{$_ref_capacities->id}})" class="btn-sm pull-right" title="Edit Refinery Capacity Performance"> <i class="fa fa-pencil"></i>  </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$ref_capacities->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/ref_capacities?p='+$pending);
        $('#ref_capacities').load('{{url('ajax')}}/ref_capacities?p='+$pending);
        sessionStorage.setItem('name','ref_capacities'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/ref_capacities?a='+$approve);
        $('#ref_capacities').load('{{url('ajax')}}/ref_capacities?a='+$approve);
        sessionStorage.setItem('name','ref_capacities'); 
    } 
</script>


    