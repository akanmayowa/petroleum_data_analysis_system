<div class="table-responsive">       <form method="POST">@csrf  
    <h5 style="margin-left: 5px; color: #aaa"> Gas Product CNG Count    <span style="margin: 1px 50px"> Volumes in Mscf </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_ret_outlet')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Gas Product CNG Count Here" id="cng_add">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_ret_outlet', sessionStorage.getItem('url'),'downloadGasProductLPGTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Gas Product CNG Count Here">  <i class="fa fa-upload" id="cng_upl"> Upload</i> </a>

        <a href="{{url('gas/download_gas_cng/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Gas Product CNG Count Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

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
                @if($gas_product_cng)
                    @foreach($gas_product_cng as $_gas_product_cng)
                        <tr> 
                            @php $unResolved = request()->user()->unResolved($_gas_product_cng->id, 'gas_product_monitoring'); @endphp
                             <th>{{$_gas_product_cng->year}}</th>
                             <th>{{$_gas_product_cng->month}}</th>
                            {{-- @if($_gas_product_cng->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                             <th>{{$_gas_product_cng->company?$_gas_product_cng->company->company_name:''}}</th> 
                            @endif --}}
                            @if($_gas_product_cng->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                             <th>{{$_gas_product_cng->category?$_gas_product_cng->category->category_name:''}}</th> 
                            @endif
                            {{-- @if($_gas_product_cng->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                             <th>{{$_gas_product_cng->state?$_gas_product_cng->state->state_name:''}}</th>
                             @endif
                             <th>{{$_gas_product_cng->lga}}</th> --}}
                             <th>{{$_gas_product_cng->zone}}</th>
                             {{-- <th>{{$_gas_product_cng->no_of_plant}}</th> --}}
                             <th>{{number_format($_gas_product_cng->capacity, 2)}}</th>
                            <th style="text-align: right;">
                                @if($_gas_product_cng->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_product_monitoring', {{$_gas_product_cng->id}})" class="btn-sm pull-right" title="Delete Gas Product CNG"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_retail_outlet({{$_gas_product_cng->id}})" class="btn-sm pull-right" title="View Gas Product CNG Count"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_retail_outlet({{$_gas_product_cng->id}})" class="btn-sm pull-right" title="Edit Gas Product CNG Count"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$gas_product_cng->appends(Request::capture()->except('page'))->render() }} 
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
        $("#cng_add").on('click', function(e)
        {
            $('#product_type').val('CNG');         
            $('#cng_div').show();          
            $('#lpg_div').hide();    $('#lng_div').hide();    $('#prop_div').hide(); 

            //WHEN A CATEGORY IS SELECTED
            $("#category_id_cng").on('change', function(e)
            { 
                $('#categories_id').val('');
                var cate = $('#category_id_cng').val();    $('#categories_id').val(cate);
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
        sessionStorage.setItem('url','{{url('ajax')}}/gas_product_cng?p='+$pending);
        $('#gas_product_cng').load('{{url('ajax')}}/gas_product_cng?p='+$pending);
        sessionStorage.setItem('name','gas_product_cng'); 
    }
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_product_cng?a='+$approve);
        $('#gas_product_cng').load('{{url('ajax')}}/gas_product_cng?a='+$approve);
        sessionStorage.setItem('name','gas_product_cng'); 
    } 
</script>