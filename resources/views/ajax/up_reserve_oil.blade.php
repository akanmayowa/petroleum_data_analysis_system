<div class="table-responsive">       <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Oil Reserves 
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('addresoil')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Oil Reserves Here">  <i class="fa fa-plus"> New</i> </a>

        <a data-toggle="tooltip" onclick="showmodal('uplresoil', sessionStorage.getItem('url'), 'downloadResOilTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Oil Reserves Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_reserve_oil/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Oil Reserves Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_oil()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>    </form>
        <table class="table table-striped table-sm mb-0" id="reserve_oil_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                {{-- <th>Type</th> --}}
                <th>Terrain</th>
                <th>Company</th>
                <th>Contract</th>
                <th>Oil Reserves MMbbls</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th>  </th>
            </tr>

            </thead>
            <tbody>
                @if($reserve_oil)
                    @foreach($reserve_oil as $reserve_oils)
                        @php $unResolved = request()->user()->unResolved($reserve_oils->id, 'up_reserves_oil'); @endphp
                        <tr>             
                            <th class="tb-row-height">{{$reserve_oils->year}}</th> 
                            {{-- <th class="tb-row-height">
                                @if($reserve_oils->type_id == 1)By Contract
                                @elseif($reserve_oils->type_id == 2)By Terrain
                                @elseif($reserve_oils->type_id == 3)By Field
                                @endif
                            </th>   --}}
                            <th class="tb-row-height">@if($reserve_oils->terrain) {{$reserve_oils->terrain->terrain_name}} @endif</th>
                            @if($reserve_oils->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th class="tb-row-height">{{$reserve_oils->company?$reserve_oils->company->company_name:''}}</th> 
                            @endif

                            @if($reserve_oils->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th class="tb-row-height">{{$reserve_oils->contract?$reserve_oils->contract->contract_name:''}}</th> 
                            @endif
                            <th class="tb-row-height">{{number_format($reserve_oils->oil_reserves, 2)}}</th> 
                            <th style="text-align: right;">
                                @if($reserve_oils->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>                            
                            <th class="tb-row-height">
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_reserves_oil', {{$reserve_oils->id}})" class="btn-sm pull-right" title="Delete Crude Oil Reserves"> <i class="fa fa-remove"></i>   </a>

                                <a style="cursor: pointer; color:#202020; font-size:10px" onclick="load_reserves_oil({{$reserve_oils->id}})" class="btn-sm pull-right" data-toggle="tooltip"  title="Edit Oil Reserves"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$reserve_oil->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/reserve_oil?p='+$pending);
        $('#reserve_oil').load('{{url('ajax')}}/reserve_oil?p='+$pending);
        sessionStorage.setItem('name','reserve_oil'); 
    }

    function sortByApproved($approve=0)
    {   
        sessionStorage.setItem('url','{{url('ajax')}}/reserve_oil?a='+$approve);
        $('#reserve_oil').load('{{url('ajax')}}/reserve_oil?a='+$approve);
        sessionStorage.setItem('name','reserve_oil'); 
    }    
</script>