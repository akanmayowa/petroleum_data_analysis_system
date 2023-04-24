<div class="table-responsive">       <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Gas Reserves
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('addresgas')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Gas Reserves Here">  <i class="fa fa-plus"> New</i> </a>
                 
        <a data-toggle="tooltip" onclick="showmodal('uplresgas', sessionStorage.getItem('url'), 'downloadReserveGasTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Gas Reserves Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_reserve_gas/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Gas Reserves Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="resgas_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Company  <i class="ml-5"> In blue are revoked companies </i> </th>
                {{-- <th>Description</th> --}}
                <th>Associated Gas (AG) Bcf</th>
                <th>Non Associated Gas (NAG) Bcf</th>
                <th>Total Reserves Bcf</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($reserve_gas)
                    @foreach($reserve_gas as $_reserves_gas)
                        @php $unResolved = request()->user()->unResolved($_reserves_gas->id, 'up_reserves_gas'); @endphp
                        <tr>             
                            <th class="tb-row-height">{{$_reserves_gas->year}}</th> 
                            <th class="tb-row-height">{{$_reserves_gas->month}}</th>
                            @if($_reserves_gas->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th class="tb-row-height">{{$_reserves_gas->company?$_reserves_gas->company->company_name:''}}
                                @if($_reserves_gas->description != null)  <span style="color: blue; margin-left: 30px; font-style: italic;"> <i class="fa fa-info"> </i>- {{$_reserves_gas->description}}</span>  @endif</th> 
                            @endif
                            {{-- <th class="tb-row-height">{{$_reserves_gas->description}}</th> --}}
                            <th class="tb-row-height">{{number_format($_reserves_gas->associated_gas, 2)}}</th>
                            <th class="tb-row-height">{{number_format($_reserves_gas->non_associated_gas, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($_reserves_gas->total_gas, 2)}}</th> 
                            <th style="text-align: right;">
                                @if($_reserves_gas->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>    
                            <th class="tb-row-height">
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_reserves_gas', {{$_reserves_gas->id}})" class="btn-sm pull-right" title="Delete Gas Reserves"> <i class="fa fa-remove"></i>   </a>

                                <a style="cursor: pointer; color:#202020; font-size:10px" onclick="load_reserves_gas({{$_reserves_gas->id}})" class="btn-sm pull-right" data-toggle="tooltip"  title="Edit Gas Reserves"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$reserve_gas->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/reserve_gas?p='+$pending);
        $('#reserve_gas').load('{{url('ajax')}}/reserve_gas?p='+$pending);
        sessionStorage.setItem('name','reserve_gas'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/reserve_gas?a='+$approve);
        $('#reserve_gas').load('{{url('ajax')}}/reserve_gas?a='+$approve);
        sessionStorage.setItem('name','reserve_gas'); 
    }   
</script>

