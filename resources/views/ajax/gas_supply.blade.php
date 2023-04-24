<div class="table-responsive">     <form method="POST">@csrf   
    <h5 style="margin-left: 5px; color: #aaa"> Actual Domestic Gas Supply
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('addgas_supply')" style="color:#fff;" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Actual Gas Supply Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('uplgas_supply', sessionStorage.getItem('url'),'downloadGasSupplyActualTemplate')" style="color:#fff;; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Actual Gas Supply Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('gas/download_gas_supply_performance/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Actual Gas Supply Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_supply') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_supply_textile_industry()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>  
    <table class="table table-striped table-sm mb-0" id="gas_supply_table">
        <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                {{-- <th>Supplied to Power <i class="units"></i></th>
                <th>Supplied to Commercials <i class="units"></i></th>
                <th>Supplied to GBI <i class="units"></i></th> --}}
                <th>Total Supplied <i class="units"></i></th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>
        </thead>
        <tbody>
            @if($gas_supply)
                @foreach($gas_supply as $_gas_supply)
                    @php $unResolved = request()->user()->unResolved($_gas_supply->id, 'gas_domestic_gas_supply'); @endphp
                    <tr>
                        <th>{{$_gas_supply->year}}</th>
                        <th>{{$_gas_supply->month}}</th>
                        @if($_gas_supply->pending_id > 0 && $unResolved->column_1 != '')
                            <th class="null">{{$unResolved->column_1}}</th>
                        @else
                        <th>{{$_gas_supply->company?$_gas_supply->company->company_name:''}}</th>
                        @endif
                        {{-- <th data-toggle="tooltip" title="Volume In MMscf">{{$_gas_supply->power}}</th>
                        <th data-toggle="tooltip" title="Volume In MMscf">{{$_gas_supply->commercial}}</th>
                        <th data-toggle="tooltip" title="Volume In MMscf">{{$_gas_supply->industry}}</th> --}}
                        <th data-toggle="tooltip" title="Volume In MMscf">{{number_format($_gas_supply->total, 2)}}</th> 
                        <th style="text-align: right;">
                            @if($_gas_supply->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th>
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_domestic_gas_supply', {{$_gas_supply->id}})" class="btn-sm pull-right" title="Delete Gas DOM Supply"> <i class="fa fa-remove"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_perf({{$_gas_supply->id}})" class="btn-sm pull-right" title="View Actual Gas Supply"> <i class="fa fa-eye"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_gas_perf({{$_gas_supply->id}})" class="btn-sm pull-right" title="Edit Actual Gas Supply"> <i class="fa fa-pencil"></i> </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$gas_supply->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/supply?p='+$pending);
        $('#supply').load('{{url('ajax')}}/supply?p='+$pending);
        sessionStorage.setItem('name','supply'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/supply?a='+$approve);
        $('#supply').load('{{url('ajax')}}/supply?a='+$approve);
        sessionStorage.setItem('name','supply'); 
    } 
</script>