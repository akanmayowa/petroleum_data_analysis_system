<div class="table-responsive">       <form method="POST">@csrf  
    <h5 style="margin-left: 5px; color: #aaa"> LPG Consumption {{-- Gas Actual Importation by Vessel  --}} 
        <span class="unit-header"> Volume in Metric Tonnes </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_ref_production')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Gas Actual Import by Vessel Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_ref_production', sessionStorage.getItem('url'), 'downloadRefProductionTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Gas Actual Import by Vessel Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('gas/download_refinery_production/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Gas Actual Import by Vessel Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_product_reporting') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_ref_prod()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>  
        <table class="table table-striped table-sm mb-0" id="ref_prod_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Vessel Name</th>
                <th>Import Permit No</th>
                <th>State <i class="units"></i></th>
                <th>Zone <i class="units"></i></th>
                <th>Product <i class="units"></i></th>
                <th>Volume <i class="units"> MT</i></th>
                <th>Date of Discharged <i class="units"></i></th> 
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($gas_ref_production)
                    @foreach($gas_ref_production as $_ref_production)
                        <tr>
                            @php $unResolved = request()->user()->unResolved($_ref_production->id, 'gas_refinery_production_volumes'); @endphp 
                             <th>{{$_ref_production->year}}</th>
                             <th>{{$_ref_production->month}}</th>
                            @if($_ref_production->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                             <th>{{$_ref_production->company?$_ref_production->company->company_name:''}}</th>
                            @endif
                             <th>{{$_ref_production->vessel_name}}</th>
                             <th>{{$_ref_production->import_permit_no}}</th>
                            @if($_ref_production->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                             <th>{{$_ref_production->state?$_ref_production->state->state_name:''}}</th>
                            @endif
                             <th>{{$_ref_production->zone}}</th>
                            @if($_ref_production->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                             <th>{{$_ref_production->product?$_ref_production->product->product_name:''}}</th> 
                            @endif
                             <th data-toggle="tooltip" title="Volume In Metric Tonnes">{{number_format($_ref_production->volume, 2)}}</th>
                             <th>{{$_ref_production->date_discharged}}</th> 
                            <th style="text-align: right;">
                                @if($_ref_production->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_refinery_production_volumes', {{$_ref_production->id}})" class="btn-sm pull-right" title="Delete Gas Actual Import Vessel"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_refinery_production({{$_ref_production->id}})" class="btn-sm pull-right" title="View Gas Actual Import by Vessel"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_refinery_production({{$_ref_production->id}})" class="btn-sm pull-right" title="Edit Gas Actual Import by Vessel"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$gas_ref_production->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/gas_ref_production?p='+$pending);
        $('#gas_ref_production').load('{{url('ajax')}}/gas_ref_production?p='+$pending);
        sessionStorage.setItem('name','gas_ref_production'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_ref_production?a='+$approve);
        $('#gas_ref_production').load('{{url('ajax')}}/gas_ref_production?a='+$approve);
        sessionStorage.setItem('name','gas_ref_production'); 
    } 
</script>