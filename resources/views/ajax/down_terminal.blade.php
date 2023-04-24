<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Reconciled Crude & Condensate Production    <span class="unit-header"> Volume in MMbbls </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">  <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('addterm_stre_prod')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Reconciled Crude & Condensate Production  Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('uplterm_stre_prod', sessionStorage.getItem('url'), 'downloadReconciledCrudeTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Reconciled Crude & Condensate Production  Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_terminal_stream_prod/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Reconciled Crude & Condensate Production  Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_recon_crude_production') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_reconciled()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="term_strm_table">
            <thead class="thead-dark">
            <tr>
                <th>Stream/Blend</th>
                <th>Company</th>
                <th>Year</th>
                <th>Jan <i class="units"></i></th>
                <th>Feb <i class="units"></i></th>
                <th>Mar <i class="units"></i></th>
                <th>Apr <i class="units"></i></th>
                <th>May <i class="units"></i></th>
                <th>Jun <i class="units"></i></th>
                <th>Jul <i class="units"></i></th>
                <th>Aug <i class="units"></i></th>
                <th>Sep <i class="units"></i></th>
                <th>Oct <i class="units"></i></th>
                <th>Nov <i class="units"></i></th>
                <th>Dec <i class="units"></i></th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($t_stream_prod) 
                    @foreach($t_stream_prod as $_t_stream_prod)
                        @php $unResolved = request()->user()->unResolved($_t_stream_prod->id, 'down_terminal_stream_prod'); @endphp
                        <tr>
                            @if($_t_stream_prod->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th>{{$_t_stream_prod->stream?$_t_stream_prod->stream->stream_name:''}} </th>
                            @endif
                            @if($_t_stream_prod->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th>{{$_t_stream_prod->company?$_t_stream_prod->company->company_name:''}} </th>
                            @endif
                            <th>{{$_t_stream_prod->year}}</th> 
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->january)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->febuary)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->march)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->april)}}</th> 
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->may)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->june)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->july)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->august)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->september)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->october)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->november)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->december)}}</th> 
                            <th style="text-align: right;">
                                @if($_t_stream_prod->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_terminal_stream_prod', {{$_t_stream_prod->id}})" class="btn-sm pull-right" title="Delete Reconciled Crude Production"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_stream_prod({{$_t_stream_prod->id}})" class="btn-sm pull-right" title="View Reconciled Crude & Condensate Production "> <i class="fa fa-eye"></i>    </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_stream_prod({{$_t_stream_prod->id}})" class="btn-sm pull-right" title="Edit Reconciled Crude & Condensate Production "> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table> 
        {{$t_stream_prod->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/terminal?p='+$pending);
        $('#terminal').load('{{url('ajax')}}/terminal?p='+$pending);
        sessionStorage.setItem('name','terminal'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/terminal?a='+$approve);
        $('#terminal').load('{{url('ajax')}}/terminal?a='+$approve);
        sessionStorage.setItem('name','terminal'); 
    }
</script>