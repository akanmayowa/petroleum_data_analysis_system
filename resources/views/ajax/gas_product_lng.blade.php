<div class="table-responsive">       <form method="POST">@csrf  
    <h5 style="margin-left: 5px; color: #aaa"> Gas Product LNG Count    <span style="margin: 1px 50px"> Volumes in Metric Tonnes </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_ret_outlet')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Gas Product LNG Count Here" id="lng_add">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_ret_outlet', sessionStorage.getItem('url'),'downloadGasProductLPGTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Gas Product LNG Count Here">  <i class="fa fa-upload" id="lng_upl"> Upload</i> </a>

        <a href="{{url('gas/download_gas_lng/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="SearchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Gas Product LNG Count Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_lpg/cng') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_ret_out()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="gas_prod_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                {{-- <th>Company</th> --}}
                <th>Category</th>
                {{-- <th>State</th> --}}
                {{-- <th>Local Govt Area <i class="units"></i></th> --}}
                <th>Zones <i class="units"></i></th>
                {{-- <th>No of Plant <i class="units"></i></th> --}}
                <th>Capacity <i class="units">MT</i></th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>
            </thead>
            <tbody>
                @if($gas_product_lng)
                    @foreach($gas_product_lng as $_gas_product_lng)
                        <tr> 
                            @php $unResolved = request()->user()->unResolved($_gas_product_lng->id, 'gas_product_monitoring'); @endphp
                            <th>{{$_gas_product_lng->year}}</th>
                            <th>{{$_gas_product_lng->month}}</th>
                            {{-- @if($_gas_product_lng->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                             <th>{{$_gas_product_lng->company?$_gas_product_lng->company->company_name:''}}</th> 
                            @endif --}}
                            @if($_gas_product_lng->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                             <th>{{$_gas_product_lng->category?$_gas_product_lng->category->category_name:''}}</th> 
                            @endif
                            {{-- @if($_gas_product_lng->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                            <th>{{$_gas_product_lng->state?$_gas_product_lng->state->state_name:''}}</th>
                            @endif
                            <th>{{$_gas_product_lng->lga}}</th> --}}
                            <th>{{$_gas_product_lng->zone}}</th>
                            {{-- <th>{{$_gas_product_lng->no_of_plant}}</th> --}}
                            <th>{{number_format($_gas_product_lng->capacity, 2)}}</th>
                            <th style="text-align: right;">
                                @if($_gas_product_lng->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_product_monitoring', {{$_gas_product_lng->id}})" class="btn-sm pull-right" title="Delete Gas Product Monitoring LNG"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_retail_outlet({{$_gas_product_lng->id}})" class="btn-sm pull-right" title="View Gas Product LNG Count"><i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_retail_outlet({{$_gas_product_lng->id}})" class="btn-sm pull-right" title="Edit Gas Product LNG Count"><i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$gas_product_lng->appends(Request::capture()->except('page'))->render() }} 
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

        //WHEN A CATEGORY IS SELECTED
        $("#lng_add").on('click', function(e)
        {
            $('#product_type').val('LNG');         
            $('#lng_div').show();          
            $('#cng_div').hide();    $('#lpg_div').hide();    $('#prop_div').hide(); 

            //WHEN A CATEGORY IS SELECTED
            $("#category_id_lng").on('change', function(e)
            { 
                $('#categories_id').val('');
                var cate = $('#category_id_lng').val();    $('#categories_id').val(cate);
            }); 
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
        sessionStorage.setItem('url','{{url('ajax')}}/gas_product_lng?p='+$pending);
        $('#gas_product_lng').load('{{url('ajax')}}/gas_product_lng?p='+$pending);
        sessionStorage.setItem('name','gas_product_lng'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_product_lng?a='+$approve);
        $('#gas_product_lng').load('{{url('ajax')}}/gas_product_lng?a='+$approve);
        sessionStorage.setItem('name','gas_product_lng'); 
    } 
</script>