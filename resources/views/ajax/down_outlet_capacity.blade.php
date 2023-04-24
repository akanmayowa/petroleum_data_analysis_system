<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Retail Outlets Capacity   <span class="unit-header"> Volume in Litres </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_out_capacity')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Retail Outlets Capacity Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_out_capacity', sessionStorage.getItem('url'), 'downloadOutCapacityTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Retail Outlets Capacity Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_retail_outlet_capacity/xlsx')}}" data-toggle="tooltip" id="searchBtn" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Retail Outlets Capacity Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_product_retail') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_capacity()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="out_cap_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>State</th>
                <th>Market</th>
                <th>Product</th>
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
                @if($out_capacities)
                    @foreach($out_capacities as $_out_capacities)
                        @php $unResolved = request()->user()->unResolved($_out_capacities->id, 'down_outlet_storage_capacity'); @endphp
                        <tr> 
                             <th>{{$_out_capacities->year}}</th>
                            @if($_out_capacities->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                             <th>{{$_out_capacities->state?$_out_capacities->state->state_name:''}}</th> 
                             @endif
                            @if($_out_capacities->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                             <th>
                                {{$_out_capacities->market_segment?$_out_capacities->market_segment->market_segment_name:''}}
                            </th>
                            @endif
                            @if($_out_capacities->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else 
                             <th>{{$_out_capacities->product?$_out_capacities->product->product_name:''}}</th>
                            @endif
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->january, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->febuary, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->march, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->april, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->may, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->june, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->july, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->august, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->september, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->october, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->november, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_out_capacities->december, 2)}}</th>
                            <th style="text-align: right;">
                                @if($_out_capacities->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_outlet_storage_capacity', {{$_out_capacities->id}})" class="btn-sm pull-right" title="Delete Retail Outlet Capacity"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_outlet_capacity({{$_out_capacities->id}})" class="btn-sm pull-right" title="View Retail Outlets Capacity"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_outlet_capacity({{$_out_capacities->id}})" class="btn-sm pull-right" title="Edit Retail Outlets Capacity"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$out_capacities->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/outlet_capacity?p='+$pending);
        $('#outlet_capacity').load('{{url('ajax')}}/outlet_capacity?p='+$pending);
        sessionStorage.setItem('name','outlet_capacity'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/outlet_capacity?p='+$approve);
        $('#outlet_capacity').load('{{url('ajax')}}/outlet_capacity?p='+$approve);
        sessionStorage.setItem('name','outlet_capacity'); 
    } 
</script>