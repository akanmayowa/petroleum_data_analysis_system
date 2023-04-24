<div class="table-responsive">  
    <h5 style="margin-left: 5px; color: #aaa"> Unlisted / Open Block 
        <a data-toggle="tooltip" onclick="showmodal('add_unopen')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Unlisted / Open Concession Held Here">  <i class="fa fa-plus"> New</i> </a>
             
        <a data-toggle="tooltip" onclick="showmodal('upl_unopen', sessionStorage.getItem('url'), 'downloadOpenConcTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Unlisted / Open Concession Here">  <i class="fa fa-upload"> Upload</i> </a>
              
        <a href="{{url('admin/download_unlisted_open_block/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Unlisted / Open Concession Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_concession') || (\Auth::user()->delegate_role == 'Master Data' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_concession_unlisted()" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5> 
    <table class="table table-striped table-sm mb-0" id="unopen_table">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Concession Held</th>
            <th>Company</th>
            <th>Area in Sq-Km</th>
            <th>Geological Terrain</th>
            <th>Remark</th>
            <th>Created On</th>
            <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
            <th style=""> </th>
        </tr>

        </thead>
        <tbody>
            @if($Unlisted_open)
                @foreach($Unlisted_open as $unlisted_opens)
                    <tr>  
                        <th>{{$unlisted_opens->id}}</th> 
                        <th>{{$unlisted_opens->concession_name}}</th>  
                        <th>@if($unlisted_opens->company){{$unlisted_opens->company->company_name}}@endif</th>   
                        <th>{{$unlisted_opens->area}}</th>   
                        <th>@if($unlisted_opens->terrain){{$unlisted_opens->terrain->terrain_name}}@endif</th>    
                        <th>{{$unlisted_opens->remark}}</th>     
                        <th>{{\Carbon\Carbon::parse($unlisted_opens->created_at)->diffForHumans()}}</th>
                        <th style="text-align: right;">
                            @if($unlisted_opens->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th>      
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_unlisted_open_block({{$unlisted_opens->id}})" class="btn-sm pull-right" title="Edit Unlisted / Open Concession Held"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$Unlisted_open->appends(Request::capture()->except('page'))->render() }} 
</div>



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
    });

    //SORT SCRIPT
    sortAscDesc();
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Unlisted_open?a='+$approve);
        $('#Unlisted_open').load('{{url('ajax')}}/Unlisted_open?a='+$approve);
        sessionStorage.setItem('name','Unlisted_open'); 
    }
</script>