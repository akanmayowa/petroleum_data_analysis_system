<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Well Plugback / Abandonment Activities 
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_plugback')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Well Plugback / Abandonment Activities Here"> <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_plugback', sessionStorage.getItem('url'), 'downloadWellPlugbackTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Well Plugback / Abandonment Activities Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_well_plugback_abandonment/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Well Plugback / Abandonment Activities Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_plugback()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="plugback_well_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Field</th>
                <th>Type</th>
                <th>Number of Wells</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($plugback_abandonment)
                    @foreach($plugback_abandonment as $plugback_abandonments)
                        @php $unResolved = request()->user()->unResolved($plugback_abandonments->id, 'up_well_plugback_abandonment'); @endphp
                        <tr> 
                            <th>{{$plugback_abandonments->year}}</th>  
                            <th>{{$plugback_abandonments->month}}</th>
                            @if($plugback_abandonments->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th>{{$plugback_abandonments->field?$plugback_abandonments->field->field_name:''}} </th>
                            @endif
                            @if($plugback_abandonments->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else   
                            <th>
                                @if($plugback_abandonments->type_id == 1) Abandonment 
                                @elseif($plugback_abandonments->type_id == 2) Suspension  
                                @elseif($plugback_abandonments->type_id == 2) Plugback @else N/A @endif 
                            </th>
                            @endif
                            <th>{{$plugback_abandonments->number_of_well}}</th>  
                            <th style="text-align: right;">
                                @if($plugback_abandonments->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_well_plugback_abandonment', {{$plugback_abandonments->id}})" class="btn-sm pull-right" title="Delete Plugback and Abandonment"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_well_plugback_abandonment({{$plugback_abandonments->id}})" class="btn-sm pull-right" title="Edit Well Plugback / Abandonment Activities"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$plugback_abandonment->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/plugback_abandonment?p='+$pending);
        $('#plugback_abandonment').load('{{url('ajax')}}/plugback_abandonment?p='+$pending);
        sessionStorage.setItem('name','plugback_abandonment'); 
    }

    function sortByUnresolved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/plugback_abandonment?a='+$approve);
        $('#plugback_abandonment').load('{{url('ajax')}}/plugback_abandonment?a='+$approve);
        sessionStorage.setItem('name','plugback_abandonment'); 
    }      
</script>