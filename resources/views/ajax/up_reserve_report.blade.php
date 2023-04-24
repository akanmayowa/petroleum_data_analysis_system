<div class="table-responsive">       <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Condensates Reserves 
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('addres')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Condensates, Condensates Reserves Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('uplres', sessionStorage.getItem('url'), 'downloadReserveOilTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Condensates Reserves Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_reserve/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Condensates Reserves Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_condensate()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="reserve_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                {{-- <th>Type</th>
                <th>Terrain</th> --}}
                <th>Company</th>
                <th>Contract</th>
                <th>Condensate Reserves MMbbls</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($reserves)
                    @foreach($reserves as $_reserves)
                        @php $unResolved = request()->user()->unResolved($_reserves->id, 'up_reserves_report'); @endphp
                        <tr>              
                            <th class="tb-row-height">{{$_reserves->year}}</th> 
                            {{-- <th class="tb-row-height">
                                @if($_reserves->type_id == 1)By Contract
                                @elseif($_reserves->type_id == 2)By Terrain
                                @elseif($_reserves->type_id == 3)By Field
                                @endif
                            </th> 
                            <th class="tb-row-height">@if($_reserves->terrain) {{$_reserves->terrain->terrain_name}} @endif</th>  --}}
                            @if($_reserves->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th class="tb-row-height">{{$_reserves->company?$_reserves->company->company_name:''}}</th> 
                            @endif
                            
                            @if($_reserves->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th class="tb-row-height">{{$_reserves->contract?$_reserves->contract->contract_name:''}}</th> 
                            @endif 
                            <th class="tb-row-height">{{number_format($_reserves->condensate_reserves, 2)}}</th> 
                            <th style="text-align: right;">
                                @if($_reserves->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th class="tb-row-height">
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_reserves_report', {{$_reserves->id}})" class="btn-sm pull-right" title="Delete Condensates Reserves"> <i class="fa fa-remove"></i>   </a>

                                <a style="cursor: pointer; color:#202020; font-size:10px" onclick="load_reserves({{$_reserves->id}})" class="btn-sm pull-right" data-toggle="tooltip"  title="Edit Condensates, Condensates Reserves"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$reserves->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/reserve_condensate?p='+$pending);
        $('#reserve_condensate').load('{{url('ajax')}}/reserve_condensate?p='+$pending);
        sessionStorage.setItem('name','reserve_condensate'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/reserve_condensate?a='+$approve);
        $('#reserve_condensate').load('{{url('ajax')}}/reserve_condensate?a='+$approve);
        sessionStorage.setItem('name','reserve_condensate'); 
    }  
</script>