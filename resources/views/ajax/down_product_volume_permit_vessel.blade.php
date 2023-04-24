<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Product Import: Number of Product Vessel   <span class="unit-header"> Volume in Litres </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_import_vessel')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Vessel Product Number Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_imp_vessel', sessionStorage.getItem('url'), 'downloadImportVesselTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Vessel Product Number Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_product_volume_permit_vessel/xlsx')}}" data-toggle="tooltip" id="searchBtn" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Vessel Product Number Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_pet_product_reporting') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_permit_vessel('app_imp_vessel')" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="prod_imp_perm_vessel_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Depot Name</th>
                <th>Field Office</th>
                <th>Product Import Vessels</th>
                <th>Volume in  Ltrs <i class="units">Litres</i></th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($prod_vol_permit_vessel)
                    @foreach($prod_vol_permit_vessel as $_prod_vol_permit_vessel)
                        @php $unResolved = request()->user()->unResolved($_prod_vol_permit_vessel->id, 'down_product_vol_import_permit_vessel'); @endphp
                        <tr> 
                            <th>{{$_prod_vol_permit_vessel->year}}</th>
                            <th>{{$_prod_vol_permit_vessel->depot_name}}</th>
                            @if($_prod_vol_permit_vessel->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$_prod_vol_permit_vessel->field_office?$_prod_vol_permit_vessel->field_office->field_office_name:''}}</th>
                            @endif
                            @if($_prod_vol_permit_vessel->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                            <th>{{$_prod_vol_permit_vessel->product?$_prod_vol_permit_vessel->product->product_name:''}}</th>
                            @endif 
                            <th data-toggle="tooltip" title="Volume In Metric Tonnes">{{$_prod_vol_permit_vessel->value}}</th>
                            <th style="text-align: right;">
                                @if($_prod_vol_permit_vessel->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_product_vol_import_permit_vessel', {{$_prod_vol_permit_vessel->id}})" class="btn-sm pull-right" title="Delete Product Import by Vessels"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_product_import_permit_vessel({{$_prod_vol_permit_vessel->id}})" class="btn btn-sm pull-right" title="View Product Vessels"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_product_import_permit_vessel({{$_prod_vol_permit_vessel->id}})" class="btn btn-sm pull-right" title="Edit Product Vessels"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$prod_vol_permit_vessel->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/prod_vol_permit_vessel?p='+$pending);
        $('#prod_vol_permit_vessel').load('{{url('ajax')}}/prod_vol_permit_vessel?p='+$pending);
        sessionStorage.setItem('name','prod_vol_permit_vessel'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/prod_vol_permit_vessel?a='+$approve);
        $('#prod_vol_permit_vessel').load('{{url('ajax')}}/prod_vol_permit_vessel?a='+$approve);
        sessionStorage.setItem('name','prod_vol_permit_vessel'); 
    } 
</script>