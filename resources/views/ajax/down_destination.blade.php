<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Crude Export by Destination   <span class="unit-header"> Volume in MMbbls </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_downstream')) --}}
            <a data-toggle="tooltip" onclick="showmodal('addexport_destination')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Crude Export By Destination Here">  <i class="fa fa-plus"> New</i> </a>
        {{-- @endif --}}
    
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_downstream')) --}}
            <a data-toggle="tooltip" onclick="showmodal('uplexport_destination', sessionStorage.getItem('url'), 'downloadCrudeDestinationTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Crude Expor Here">  <i class="fa fa-upload"> Upload</i> </a>
        {{-- @endif --}}

        <a href="{{url('downstream/download_crude_export_destination/xlsx')}}" data-toggle="tooltip" id="searchBtn" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Crude Export By Destination Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_crude_export') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_destination()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="export_dest_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Stream</th>
                <th>Destination</th>
                <th>Country</th>
                <th>Company</th>
                <th>Jan </th>
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
                @if($export_dest)
                    @foreach($export_dest as $_export_dest)
                        @php $unResolved = request()->user()->unResolved($_export_dest->id, 'down_crude_export_by_destination'); @endphp
                        <tr>  
                            <th>{{$_export_dest->year}}</th>
                            @if($_export_dest->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$_export_dest->stream?$_export_dest->stream->stream_name:''}}</th>
                            @endif
                            <th>{{$_export_dest->region?$_export_dest->region->name:''}}</th>
                            @if($_export_dest->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                            <th>{{$_export_dest->country?$_export_dest->country->country_name:''}}</th>
                            @endif
                            @if($_export_dest->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                            <th>{{$_export_dest->company?$_export_dest->company->company_name:''}}</th>
                            @endif
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->january, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->febuary, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->march, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->april, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->may, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->june, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->july, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->august, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->september, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->october, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->november, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_export_dest->december, 2)}}</th>
                            <th style="text-align: right;">
                                @if($_export_dest->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>    
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_crude_export_by_destination', {{$_export_dest->id}})" class="btn-sm pull-right" title="Delete Export By Destination"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_export_by_destination({{$_export_dest->id}})" class="btn-sm pull-right" title="View Crude Export By Destination"> <i class="fa fa-eye"></i>    </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_export_by_destination({{$_export_dest->id}})" class="btn-sm pull-right" title="Edit Crude Export By Destination"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$export_dest->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/destination?p='+$pending);
        $('#destination').load('{{url('ajax')}}/destination?p='+$pending);
        sessionStorage.setItem('name','destination'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/destination?a='+$approve);
        $('#destination').load('{{url('ajax')}}/destination?a='+$approve);
        sessionStorage.setItem('name','destination'); 
    }
</script>