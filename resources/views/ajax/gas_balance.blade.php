<div class="table-responsive">      <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Gas Balance Performance   <span style="margin: 1px 50px"> All Volumes in Mcf </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif        
        <a href="{{url('gas/download_gas_performance/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Summary of Gas Utilization Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_Util') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_util()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
    <table class="table table-striped table-sm mb-0" id="">
        <thead class="thead-dark">
            <tr>                        
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Field</th>
                <th>Total Gas Utilized</th>
                <th>Percent Utilized</th>
                <th>AG Gas Flared</th>
                <th>NAG Gas Flared</th>
                <th>Total Gas Flared</th>
                <th>Percent Flared</th>
                <th>Shrinkage</th>
                <th>Statistical Diff</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
            </tr>
        </thead>
        <tbody>
            @if($gas_balance)
                @foreach($gas_balance as $gas_balances)
                <tr>
                    @php $unResolved = request()->user()->unResolved($gas_balances->id, 'gas_summary_of_gas_utilization'); @endphp
                    <th>{{$gas_balances->year}}</th>
                    <th>{{$gas_balances->month}}</th>
                    @if($gas_balances->pending_id > 0 && $unResolved->column_1 != '')
                        <th class="null">{{$unResolved->column_1}}</th>
                    @else
                    <th>{{$gas_balances->company?$gas_balances->company->company_name:''}}</th>
                    @endif
                    @if($gas_balances->pending_id > 0 && $unResolved->column_2 != '')
                        <th class="null">{{$unResolved->column_2}}</th>
                    @else
                    <th>{{$gas_balances->field?$gas_balances->field->field_name:''}}</th>
                    @endif
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_balances->total_gas_utilized, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_balances->percent_utilized, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_balances->ag_gas_flared, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_balances->nag_gas_flared, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_balances->total_gas_flared, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_balances->percent_flared, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_balances->shrinkage, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mcf">{{number_format($gas_balances->statistical_difference, 2)}}</th> 
                    <th style="text-align: right;">
                        @if($gas_balances->stage_id == 0) 
                              <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                        @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                        @endif 
                    </th>  
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$gas_balance->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/gas_balance?p='+$pending);
        $('#gas_balance').load('{{url('ajax')}}/gas_balance?p='+$pending);
        sessionStorage.setItem('name','gas_balance'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_balance?a='+$approve);
        $('#gas_balance').load('{{url('ajax')}}/gas_balance?a='+$approve);
        sessionStorage.setItem('name','gas_balance'); 
    } 
</script>