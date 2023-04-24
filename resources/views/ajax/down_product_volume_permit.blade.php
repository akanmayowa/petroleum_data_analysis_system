<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Import Permit Volume (Import Permit Issued)    <span class="unit-header"> Volume in Litres </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_prod_vol_permit')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Product Volumes (Import Permit) Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_prod_vol_permit', sessionStorage.getItem('url'), 'downloadImportPermitTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Product Volumes (Import Permit) Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_product_volume_permit/xlsx')}}" data-toggle="tooltip" id="searchBtn" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Product Volumes (Import Permit) Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_pet_product_reporting') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_permit()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="prod_imp_perm_table">
            <thead class="thead-dark">
            <tr>
                <th>Market</th>
                <th>Product</th>
                <th>Year</th>
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
                @if($prod_vol_permit)
                    @foreach($prod_vol_permit as $_prod_vol_permit)
                        @php $unResolved = request()->user()->unResolved($_prod_vol_permit->id, 'down_product_vol_import_permit'); @endphp
                        <tr>
                            @if($_prod_vol_permit->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                             <th>{{$_prod_vol_permit->market_segment?$_prod_vol_permit->market_segment->market_segment_name:''}}</th>
                            @endif
                            @if($_prod_vol_permit->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                             <th>{{$_prod_vol_permit->product?$_prod_vol_permit->product->product_name:''}}</th>
                            @endif 
                             <th>{{$_prod_vol_permit->year}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->january, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->febuary, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->march, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->april, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->may, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->june, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->july, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->august, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->september, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->october, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->november, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_prod_vol_permit->december, 2)}}</th>
                            <th style="text-align: right;">
                                @if($_prod_vol_permit->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_product_vol_import_permit', {{$_prod_vol_permit->id}})" class="btn-sm pull-right" title="Delete Import Permit"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_product_import_permit({{$_prod_vol_permit->id}})" class="btn btn-sm pull-right" title="View Product Volumes (Import Permit"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_product_import_permit({{$_prod_vol_permit->id}})" class="btn btn-sm pull-right" title="Edit Product Volumes (Import Permit)"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$prod_vol_permit->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/prod_vol_permit?p='+$pending);
        $('#prod_vol_permit').load('{{url('ajax')}}/prod_vol_permit?p='+$pending);
        sessionStorage.setItem('name','prod_vol_permit'); 
    } 
    function sortByApprove($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/prod_vol_permit?a='+$approve);
        $('#prod_vol_permit').load('{{url('ajax')}}/prod_vol_permit?a='+$approve);
        sessionStorage.setItem('name','prod_vol_permit'); 
    }
</script>