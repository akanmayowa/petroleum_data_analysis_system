<div class="table-responsive">      <form method="POST">@csrf  
    <h5 style="margin-left: 5px; color: #aaa"> Gas Export by Volume Vessel Count    <span style="margin: 1px 50px"> Unit is in MT. </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_gas_exp')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Gas Export by Volume Vessel Count Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_gas_exp', sessionStorage.getItem('url'),'downloadGasExportVolumeVesselTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Gas Export by Volume Vessel Count Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('gas/download_gas_export_volume_vessel/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="serachBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Gas Export by Volume Vessel Count Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_lpg/cng') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_export()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="gas_exp_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Equity Holder</th>
                <th>Terminal</th>
                <th>Product</th>
                <th>No of Vessel<i class="units"></i></th>
                <th>Volume<i class="units"> MT</i></th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>
            </thead>
            <tbody>
                @if($gas_export)
                    @foreach($gas_export as $gas_exported)
                        <tr>
                            @php $unResolved = request()->user()->unResolved($gas_exported->id, 'gas_export_volume_vessel'); @endphp 
                            <th>{{$gas_exported->year}}</th>
                            <th>{{$gas_exported->month}}</th>
                            <th>{{$gas_exported->equity_holder_id}}</th>
                            {{-- @if($gas_exported->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>@if($gas_exported->equity) {{$gas_exported->equity->company_name}} @endif</th>
                            @endif --}}
                            @if($gas_exported->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th>@if($gas_exported->stream) {{$gas_exported->stream->stream_name}} @endif</th>
                            @endif
                            @if($gas_exported->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                            <th>@if($gas_exported->product) {{$gas_exported->product->product_name}} @endif</th>
                            @endif
                            <th data-toggle="tooltip" title="">{{number_format($gas_exported->no_of_vessel, 2)}}</th>
                            <th data-toggle="tooltip" title="Unit in MT">{{number_format($gas_exported->volume, 2)}}</th>
                            <th style="text-align: right;">
                                @if($gas_exported->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>  
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_export_volume_vessel', {{$gas_exported->id}})" class="btn-sm pull-right" title="Delete Gas Export Volume Vessel"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_export({{$gas_exported->id}})" class="btn-sm pull-right" title="View Gas Export by Volume Vessel Count"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_gas_export({{$gas_exported->id}})" class="btn-sm pull-right" title="Edit Gas Export by Volume Vessel Count"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$gas_export->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/gas_export?p='+$pending);
        $('#gas_export').load('{{url('ajax')}}/gas_export?p='+$pending);
        sessionStorage.setItem('name','gas_export'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_export?a='+$approve);
        $('#gas_export').load('{{url('ajax')}}/gas_export?a='+$approve);
        sessionStorage.setItem('name','gas_export'); 
    }
</script>