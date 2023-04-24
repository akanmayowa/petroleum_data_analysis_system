<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Products Retail Average Price Range
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif 
        <a data-toggle="tooltip" onclick="showmodal('addave_price_range')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Products Average Consumer Price Range Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('uplave_price_range', sessionStorage.getItem('url'), 'downloadAvePriceTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Products Average Consumer Price Range Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_prod_ave_price_range/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Products Average Consumer Price Range Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_product_retail') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_price_range()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="ave_price_range_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Market Segment</th>
                <th>PMS Price in <i class="units">&#8358;</i></th>
                <th>AGO Price in <i class="units">&#8358;</i></th>
                <th>DPK Price in <i class="units">&#8358;</i></th>
                <th>Uploaded On</th>  
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>                                             
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($ave_price_range)
                    @foreach($ave_price_range as $_ave_price_range)
                        @php $unResolved = request()->user()->unResolved($_ave_price_range->id, 'down_ave_consumer_price_range'); @endphp
                        <tr>
                            <th>{{$_ave_price_range->year}}</th>
                            <th>{{$_ave_price_range->month}}</th>
                            @if($_ave_price_range->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$_ave_price_range->production_types?$_ave_price_range->production_types->market_segment_name:''}}</th>
                            @endif
                            <th data-toggle="tooltip" title="Price In Naira"> &#8358;{{$_ave_price_range->pms}}  -  {{$_ave_price_range->pms_to}}</th>
                            <th data-toggle="tooltip" title="Price In Naira"> &#8358;{{$_ave_price_range->ago}}  -  {{$_ave_price_range->ago_to}}</th>
                            <th data-toggle="tooltip" title="Price In Naira"> &#8358;{{$_ave_price_range->dpk}}  -  {{$_ave_price_range->dpk_to}}</th>
                            <th>{{\Carbon\Carbon::parse($_ave_price_range->created_at)->diffForHumans()}}</th>
                            <th style="text-align: right;">
                                @if($_ave_price_range->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>    
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_ave_consumer_price_range', {{$_ave_price_range->id}})" class="btn-sm pull-right" title="Delete Average Price Range"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_ave_price_range({{$_ave_price_range->id}})" class="btn-sm pull-right" title="View Products Average Consumer Price Range"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_ave_price_range({{$_ave_price_range->id}})" class="btn-sm pull-right" title="Edit Products Average Consumer Price Range"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$ave_price_range->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/retail_price?p='+$pending);
        $('#retail_price').load('{{url('ajax')}}/retail_price?p='+$pending);
        sessionStorage.setItem('name','retail_price'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/retail_price?a='+$approve);
        $('#retail_price').load('{{url('ajax')}}/retail_price?a='+$approve);
        sessionStorage.setItem('name','retail_price'); 
    } 
</script>