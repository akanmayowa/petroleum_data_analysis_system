<div class="table-responsive">       <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Provisional Crude Production Deferment  <i style="margin: 2px 30px"> All Volumes in Barrels </i>
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_prod_def')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Provisional Crude Production Deferment Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_prod_def', sessionStorage.getItem('url'), 'downloadProductionDefermentTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Provisional Crude Production Deferment Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_production_deferment/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Crude Production Deferment Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_prov_crude_prod') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_production_deferment()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="prod_def_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Contract</th>
                <th>Volume (Barrels)</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($crude_production_deferment)
                    @foreach($crude_production_deferment as $_crude_production_deferment)
                        @php $unResolved = request()->user()->unResolved($_crude_production_deferment->id, 'up_crude_production_deferment'); @endphp
                        <tr>             
                            <th>{{$_crude_production_deferment->year}}</th>
                            <th>{{$_crude_production_deferment->month}}</th>
                            @if($_crude_production_deferment->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th>{{$_crude_production_deferment->company?$_crude_production_deferment->company->company_name:''}}</th> 
                            @endif
                            @if($_crude_production_deferment->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else  
                            <th>{{$_crude_production_deferment->contract?$_crude_production_deferment->contract->contract_name:''}}</th>
                            @endif 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($_crude_production_deferment->value, 2)}}</th> 
                            <th style="text-align: right;">
                                @if($_crude_production_deferment->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>   
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_crude_production_deferment', {{$_crude_production_deferment->id}})" class="btn-sm pull-right" title="Delete Crude Deferment"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_production_deferment({{$_crude_production_deferment->id}})" class="btn-sm pull-right" title="Edit Provisional Crude Production Deferment"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$crude_production_deferment->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/crude_production_deferment?p='+$pending);
        $('#crude_production_deferment').load('{{url('ajax')}}/crude_production_deferment?p='+$pending);
        sessionStorage.setItem('name','crude_production_deferment'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/crude_production_deferment?a='+$approve);
        $('#crude_production_deferment').load('{{url('ajax')}}/crude_production_deferment?a='+$approve);
        sessionStorage.setItem('name','crude_production_deferment'); 
    }   
</script>