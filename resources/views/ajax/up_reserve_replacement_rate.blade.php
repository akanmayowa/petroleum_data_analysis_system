<div class="table-responsive">       <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Reserves Replacement Rate (RRR) on Contract Basis 
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_rate')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Reserves Replacement Rate Here">  <i class="fa fa-plus"> New</i> </a>

        <a data-toggle="tooltip" onclick="showmodal('upl_rate', sessionStorage.getItem('url'), 'downloadReplacementRateTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Reserves Replacement Rate Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_replacement_rate/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Reserves Replacement Rate Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_replacement_rate()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>    </form>
        <table class="table table-striped table-sm mb-0" id="replacement_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Contract</th>
                <th>2P Oil Condensate Reserves</th>
                <th>Oil Condensate Production</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th>  </th>
            </tr>

            </thead>
            <tbody>
                @if($reserve_replacement_rate)
                    @foreach($reserve_replacement_rate as $reserve_replacement_rates)
                        @php $unResolved = request()->user()->unResolved($reserve_oils->id, 'up_reserve_replacement_rate'); @endphp
                        <tr>             
                            <th class="tb-row-height">{{$reserve_replacement_rates->year}}</th>
                            <th class="tb-row-height">{{$reserve_replacement_rates->month}}</th>
                            @if($reserve_oils->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th class="tb-row-height">{{$reserve_replacement_rates->contract?$reserve_replacement_rates->contract->contract_name:''}}</th>
                            @endif 
                            <th class="tb-row-height">{{number_format($reserve_replacement_rates->oil_condensate_reserve, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($reserve_replacement_rates->oil_condensate_production, 2)}}</th> 
                            <th style="text-align: right;">
                                @if($reserve_replacement_rates->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th class="tb-row-height">
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_reserve_replacement_rate', {{$reserve_replacement_rates->id}})" class="btn-sm pull-right" title="Delete Reserves Replacement Rate"> <i class="fa fa-remove"></i>   </a>

                                <a style="cursor: pointer; color:#202020; font-size:10px" onclick="load_replacement_rate({{$reserve_replacement_rates->id}})" class="btn-sm pull-right" data-toggle="tooltip"  title="Edit Reserves Replacement Rate"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$reserve_replacement_rate->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/reserve_replacement_rate?p='+$pending);
        $('#reserve_replacement_rate').load('{{url('ajax')}}/reserve_replacement_rate?p='+$pending);
        sessionStorage.setItem('name','reserve_replacement_rate'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/reserve_replacement_rate?a='+$approve);
        $('#reserve_replacement_rate').load('{{url('ajax')}}/reserve_replacement_rate?a='+$approve);
        sessionStorage.setItem('name','reserve_replacement_rate'); 
    }   
</script>