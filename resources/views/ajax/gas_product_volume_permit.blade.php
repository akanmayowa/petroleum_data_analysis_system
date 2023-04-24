<div class="table-responsive">       <form method="POST">@csrf  
    <h5 style="margin-left: 5px; color: #aaa"> GAS Product Volume (Import Permit Issued)    <span class="unit-header"> Volume in Metric Tonnes </span>
        {{-- @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif --}}
        <a data-toggle="tooltip" onclick="showmodal('add_prod_vol_permit')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add GAS Product Volumes (Import Permit) Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_prod_vol_permit', sessionStorage.getItem('url'), 'downloadImportPermitTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Product Volumes (Import Permit) Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('gas/download_product_volume_permit/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Product Volumes (Import Permit) Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_product_reporting') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_vol_permit()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="prod_imp_perm_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Import Permit No</th>
                <th>Date Issued <i class="units"></i></th>
                <th>Validity Period <i class="units"></i></th>
                <th>Product <i class="units"></i></th>
                <th>Volume <i class="units"> MT</i></th>
                <th>Country <i class="units"></i></th> 
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>               
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($gas_prod_vol_permit)
                    @foreach($gas_prod_vol_permit as $_prod_vol_permit)
                        <tr> 
                            @php $unResolved = request()->user()->unResolved($_prod_vol_permit->id, 'gas_product_vol_import_permit'); @endphp
                             <th>{{$_prod_vol_permit->year}}</th>
                             <th>{{$_prod_vol_permit->month}}</th>

                            @if($_prod_vol_permit->pending_id > 0)
                                <th class="null">{{$unResolved->column_1 ?? null}}</th>
                            @else
                             <th>{{$_prod_vol_permit->company?$_prod_vol_permit->company->company_name:''}}</th>
                            @endif

                             <th>{{$_prod_vol_permit->import_permit_no}}</th>
                             <th>{{$_prod_vol_permit->issued_date}}</th>
                             <th>{{$_prod_vol_permit->validity_period}}</th>
                            @if($_prod_vol_permit->pending_id > 0)
                                <th class="null">{{$unResolved->column_2 ?? null}}</th>
                            @else
                             <th>{{$_prod_vol_permit->product?$_prod_vol_permit->product->product_name:''}}</th> 
                            @endif
                             <th data-toggle="tooltip" title="Volume In Metric Tonnes">{{number_format($_prod_vol_permit->volume, 2)}}</th>
                            @if($_prod_vol_permit->pending_id > 0)
                                <th class="null">{{$unResolved->column_3 ?? null}}</th>
                            @else
                             <th>{{$_prod_vol_permit->country?$_prod_vol_permit->country->country_name:''}}</th>
                            @endif
                            <th style="text-align: right;">
                                @if($_prod_vol_permit->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_product_vol_import_permit', {{$_prod_vol_permit->id}})" class="btn-sm pull-right" title="Delete Gas Volume Permit"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_product_import_permit({{$_prod_vol_permit->id}})" class="btn-sm pull-right" title="View Gas Volumes (Import Permit"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_product_import_permit({{$_prod_vol_permit->id}})" class="btn-sm pull-right" title="Edit Gas Volumes (Import Permit)"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$gas_prod_vol_permit->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/gas_prod_vol_permit?p='+$pending);
        $('#gas_prod_vol_permit').load('{{url('ajax')}}/gas_prod_vol_permit?p='+$pending);
        sessionStorage.setItem('name','gas_prod_vol_permit'); 
    }
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_prod_vol_permit?a='+$approve);
        $('#gas_prod_vol_permit').load('{{url('ajax')}}/gas_prod_vol_permit?a='+$approve);
        sessionStorage.setItem('name','gas_prod_vol_permit'); 
    }  
</script>