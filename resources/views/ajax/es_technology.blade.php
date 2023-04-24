<div class="table-responsive">        <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Technology Adoptation
        {{-- @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif --}}
        <a data-toggle="tooltip" onclick="showmodal('addtech')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Technology Adoptation Here"> <i class="fa fa-plus"> New</i> </a>
                    
        <a data-toggle="tooltip" onclick="showmodal('upltech', sessionStorage.getItem('url'),'downloadTechnologyTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Technology Adoptation Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('transport/download_technology/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Technology Adoptation Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_technologies') || (\Auth::user()->delegate_role == 'Project and Transportation (E&S)' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_tech()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approv5Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="tech_table">
            <thead class="thead-dark">
                <tr>                                                  
                    <th>Year</th>
                    <th>Technology</th>
                    <th>Application</th>
                    <th>Approved Date</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Status</th>   
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>      
                    <th style=""> </th>
                </tr>
            </thead>
            <tbody>
                @if($technology)
                    @foreach($technology as $_technology)
                        @php $unResolved = request()->user()->unResolved($_technology->id, 'es_technology'); @endphp
                        <tr>
                            <th>{{$_technology->year}}</th>
                            <th>{{$_technology->technology}}</th>
                            <th>{{$_technology->application}}</th>
                            <th>{{$_technology->adoptation_date}}</th>
                            <th>{{$_technology->company_id}}</th> 
                            <th>{{$_technology->location_id}}</th> 
                            <th>{{$_technology->status}}</th> 
                            {{-- @if($_technology->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else 
                            <th>{{$_technology->statuses?$_technology->statuses->status_name:''}} </th>
                            @endif --}}
                            <th style="text-align: right;">
                                @if($_technology->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\es_technology', {{$_technology->id}})" class="btn-sm pull-right" title="Delete Technology Record"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_technology({{$_technology->id}})" class="btn-sm pull-right" title="View Technology Technology"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_technology({{$_technology->id}})" class="btn-sm pull-right" title="Edit Technology Technology"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$technology->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/technology?p='+$pending);
        $('#technology').load('{{url('ajax')}}/technology?p='+$pending);
        sessionStorage.setItem('name','technology'); 
    }
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/technology?a='+$approve);
        $('#technology').load('{{url('ajax')}}/technology?a='+$approve);
        sessionStorage.setItem('name','technology'); 
    }
</script>