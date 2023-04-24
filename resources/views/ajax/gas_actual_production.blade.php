<div class="table-responsive">       <form method="POST">@csrf  
    <h5 style="margin-left: 5px; color: #aaa"> Actual Gas Importation Volumes
        <span class="unit-header"> Volume in Metric Tonnes </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_gas_act_prod')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Gas Actual Import Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_gas_act_prod', sessionStorage.getItem('url'), 'downloadGasActImportationTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Gas Actual Import Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('gas/download_gas_actual_production/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Gas Actual Import Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_product_reporting') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_act_prod()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>  
        <table class="table table-striped table-sm mb-0" id="gas_act_prod_table">
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
                @if($gas_actual_production)
                    @foreach($gas_actual_production as $_act_prodcution)
                        <tr>
                            @php $unResolved = request()->user()->unResolved($_act_prodcution->id, 'gas_actual_production'); @endphp 
                             <th>{{$_act_prodcution->year}}</th>
                             <th>{{$_act_prodcution->month}}</th>
                            @if($_act_prodcution->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                             <th>{{$_act_prodcution->company?$_act_prodcution->company->company_name:''}}</th>
                            @endif
                             <th>{{$_act_prodcution->vessel_name}}</th>
                             <th>{{$_act_prodcution->import_permit_no}}</th>
                            @if($_act_prodcution->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                             <th>{{$_act_prodcution->state?$_act_prodcution->state->state_name:''}}</th>
                            @endif
                             <th>{{$_act_prodcution->zone}}</th>
                            @if($_act_prodcution->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                             <th>{{$_act_prodcution->product?$_act_prodcution->product->product_name:''}}</th> 
                            @endif
                             <th data-toggle="tooltip" title="Volume In Metric Tonnes">{{number_format($_act_prodcution->volume, 2)}}</th>
                             <th>{{$_act_prodcution->date_discharged}}</th> 
                            <th style="text-align: right;">
                                @if($_act_prodcution->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_actual_production', {{$_act_prodcution->id}})" class="btn-sm pull-right" title="Delete Gas Actual Import Volume"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_actual_production({{$_act_prodcution->id}})" class="btn-sm pull-right" title="View Gas Actual Import"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_gas_actual_production({{$_act_prodcution->id}})" class="btn-sm pull-right" title="Edit Gas Actual Import"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$gas_actual_production->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/gas_actual_production?p='+$pending);
        $('#gas_actual_production').load('{{url('ajax')}}/gas_actual_production?p='+$pending);
        sessionStorage.setItem('name','gas_actual_production'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_actual_production?a='+$approve);
        $('#gas_actual_production').load('{{url('ajax')}}/gas_actual_production?a='+$approve);
        sessionStorage.setItem('name','gas_actual_production'); 
    } 
</script>