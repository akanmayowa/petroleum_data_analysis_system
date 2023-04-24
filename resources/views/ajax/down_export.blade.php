<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Export by Crude Stream   <span class="unit-header"> Volume in MMbbls </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('addcrude_export')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Monthly Summary of Crude / Condensate Export Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('uplcrude_export', sessionStorage.getItem('url'), 'downloadCrudeExportTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Monthly Summary of Crude / Condensate Export Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_monthly_summary_crude_export/xlsx')}}" data-toggle="tooltip" id="searchBtn" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Monthly Summary of Crude / Condensate Export Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_crude_export') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_export()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="crude_export_table">
            <thead class="thead-dark">
            <tr>
                <th>Stream/Blend</th>
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
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($crude_export)
                    @foreach($crude_export as $_crude_export)
                        @php $unResolved = request()->user()->unResolved($_crude_export->id, 'down_monthly_summary_crude_export'); @endphp
                        <tr> 
                            @if($_crude_export->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$_crude_export->stream?$_crude_export->stream->stream_name:''}}</th>
                            @endif
                            <th>{{$_crude_export->year}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->january, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->febuary, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->march, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->april, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->may, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->june, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->july, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->august, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->september, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->october, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->november, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_crude_export->december, 2)}}</th> 
                            <th style="text-align: right;">
                                @if($_crude_export->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>   
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_monthly_summary_crude_export', {{$_crude_export->id}})" class="btn-sm pull-right" title="Delete Crude Export"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_summary_export({{$_crude_export->id}})" class="btn-sm pull-right" title="View Monthly Summary of Crude / Condensate Export"> <i class="fa fa-eye"></i>    </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_summary_export({{$_crude_export->id}})" class="btn-sm pull-right" title="Edit Monthly Summary of Crude / Condensate Export"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$crude_export->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/export?p='+$pending);
        $('#export').load('{{url('ajax')}}/export?p='+$pending);
        sessionStorage.setItem('name','export'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/export?a='+$approve);
        $('#export').load('{{url('ajax')}}/export?a='+$approve);
        sessionStorage.setItem('name','export'); 
    }
</script>