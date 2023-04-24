<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Field Summary 
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_fsum')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Field Summary Here"> <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_fsum', sessionStorage.getItem('url'), 'downloadFieldSummaryTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Field Summary Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_field_summary/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Field Development Plan Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_well_activities') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_field_summary()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="fsum_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Contract Type</th>
                <th>Producing Field</th>
                <th>Well</th>
                <th>String</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($field_summary)
                    @foreach($field_summary as $_field_summary)
                        @php $unResolved = request()->user()->unResolved($_field_summary->id, 'up_field_summary'); @endphp
                        <tr>           
                            <th>{{$_field_summary->year}}</th> 
                            <th>{{$_field_summary->month}}</th>
                            @if($_field_summary->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th>{{$_field_summary->company?$_field_summary->company->company_name:''}} </th>
                            @endif
                            @if($_field_summary->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th>{{$_field_summary->contract?$_field_summary->contract->contract_name:''}} </th>
                            @endif 
                            <th>{{$_field_summary->producing_field}}</th> 
                            <th>{{$_field_summary->well}}</th> 
                            <th>{{$_field_summary->string}}</th>  
                            <th style="text-align: right;">
                                @if($_field_summary->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>  
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_field_summary', {{$_field_summary->id}})" class="btn-sm pull-right" title="Delete Field Summary"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_field_summary({{$_field_summary->id}})" class="btn-sm pull-right" title="Edit Field Summary"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$field_summary->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->



<script type="text/javascript">
    $(function()
    {
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
        sessionStorage.setItem('url','{{url('ajax')}}/field_summary?p='+$pending);
        $('#field_summary').load('{{url('ajax')}}/field_summary?p='+$pending);
        sessionStorage.setItem('name','field_summary'); 
    }   

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/field_summary?a='+$approve);
        $('#field_summary').load('{{url('ajax')}}/field_summary?a='+$approve);
        sessionStorage.setItem('name','field_summary'); 
    } 
</script>