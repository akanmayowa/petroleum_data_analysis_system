<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Retail Outlet Count  <span class="unit-header"> Count of Filling Stations By State and Market Segments </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_ret_outlet')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Retail Outlet Count Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_ret_outlet', sessionStorage.getItem('url'), 'downloadRetailOutletTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Retail Outlet Count Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_retail_outlet/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Retail Outlet Count Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_product_retail') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_outlet()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="ret_out_table">
            <thead class="table-dark">
            <tr>
                <th>Year</th>
                <th>State</th>
                <th>Market</th>
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
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($retail_outlet)
                    @foreach($retail_outlet as $_ret_outlet)
                        @php $unResolved = request()->user()->unResolved($_ret_outlet->id, 'down_retail_outlet_summary'); @endphp
                        <tr> 
                             <th>{{$_ret_outlet->year}}</th>
                            @if($_ret_outlet->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                             <th>{{$_ret_outlet->state?$_ret_outlet->state->state_name:''}}</th> 
                            @endif
                            @if($_ret_outlet->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                             <th>{{$_ret_outlet->market_segment?$_ret_outlet->market_segment->market_segment_name:''}}</th>
                            @endif
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->january, 2)}}</th>
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->febuary, 2)}}</th>
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->march, 2)}}</th>
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->april, 2)}}</th>
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->may, 2)}}</th>
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->june, 2)}}</th>
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->july, 2)}}</th>
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->august, 2)}}</th>
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->september, 2)}}</th>
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->october, 2)}}</th>
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->november, 2)}}</th>
                             <th data-toggle="tooltip" title="Total count of filling stations">{{number_format($_ret_outlet->december, 2)}}</th>
                            <th style="text-align: right;">
                                @if($_ret_outlet->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_retail_outlet_summary', {{$_ret_outlet->id}})" class="btn-sm pull-right" title="Delete Retail Outlet Count"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_retail_outlet({{$_ret_outlet->id}})" class="btn-sm pull-right" title="View Retail Outlet Count"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_retail_outlet({{$_ret_outlet->id}})" class="btn-sm pull-right" title="Edit Retail Outlet Count"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$retail_outlet->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->   




<script>
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
        sessionStorage.setItem('url','{{url('ajax')}}/retail_outlet?p='+$pending);
        $('#retail_outlet').load('{{url('ajax')}}/retail_outlet?p='+$pending);
        sessionStorage.setItem('name','retail_outlet'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/retail_outlet?a='+$approve);
        $('#retail_outlet').load('{{url('ajax')}}/retail_outlet?a='+$approve);
        sessionStorage.setItem('name','retail_outlet'); 
    }
</script>