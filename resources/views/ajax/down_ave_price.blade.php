<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Average Price of Crude By Streams  <span class="unit-header"> Prices in USD </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('addave_price')" style="color:#fff;" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Average Price of Nigeria's Crude Streams Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('uplave_price', sessionStorage.getItem('url'), 'downloadAveragePriceTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Average Price of Crude Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('downstream/download_ave_price_crude/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Average Price of Crude Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_crude_export') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_ave_prices()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="ava_price_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Stream </th>
                <th>January <i class="units"></i></th>
                <th>February <i class="units"></i></th>
                <th>March <i class="units"></i></th>
                <th>April <i class="units"></i></th>
                <th>May <i class="units"></i></th>
                <th>June <i class="units"></i></th>
                <th>July <i class="units"></i></th>
                <th>August <i class="units"></i></th>
                <th>September <i class="units"></i></th>
                <th>October <i class="units"></i></th>
                <th>November <i class="units"></i></th>
                <th>December <i class="units"></i></th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>
            </thead>
            <tbody>
                @if($ave_price)
                    @foreach($ave_price as $_ave_price)
                        @php $unResolved = request()->user()->unResolved($_ave_price->id, 'up_ave_price_crude_stream'); @endphp
                        <tr>   
                            <th>{{$_ave_price->year}}</th> 
                            @if($_ave_price->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$_ave_price->stream?$_ave_price->stream->stream_name:''}}</th> 
                            @endif
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->january, 2)}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->febuary, 2)}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->march, 2)}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->april, 2)}}</th> 
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->may, 2)}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->june, 2)}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->july, 2)}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->august, 2)}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->september, 2)}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->october, 2)}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->november, 2)}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{number_format($_ave_price->december, 2)}}</th>
                            <th style="text-align: right;">
                                @if($_ave_price->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>     
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_ave_price_crude_stream', {{$_ave_price->id}})" class="btn-sm pull-right" title="Delete Average Crude Stream Price"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_ave_price({{$_ave_price->id}})" class="btn-sm pull-right" title="View Average Price of Nigeria's Crude Streams"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_ave_price({{$_ave_price->id}})" class="btn-sm pull-right" title="Edit Average Price of Nigeria's Crude Streams"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$ave_price->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/ave_price?p='+$pending);
        $('#ave_price').load('{{url('ajax')}}/ave_price?p='+$pending);
        sessionStorage.setItem('name','ave_price'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/ave_price?a='+$approve);
        $('#ave_price').load('{{url('ajax')}}/ave_price?a='+$approve);
        sessionStorage.setItem('name','ave_price'); 
    } 
</script>