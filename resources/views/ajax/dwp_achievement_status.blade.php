<div class="col-lg-12">   
    <div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> All DWP Achievement Status
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_dwp')) --}}
            <a data-toggle="tooltip" onclick="showmodal('add_ach_status')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Achievement Status Here">  <i class="fa fa-plus"> New</i> </a>
        {{-- @endif --}}
   
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_dwp')) --}}
            <a data-toggle="tooltip" onclick="showmodal('upl_ach_status')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Achievement Status Here">  <i class="fa fa-upload"> Upload</i> </a>
        {{-- @endif --}}
        
        <a href="{{url('project/download_achievement_status/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DPR Achievement Status Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="ach_table">
            <thead class="thead-dark">
            <tr>
                <th>Achievement Status Name</th>
                <th>Status Value</th>
                <th>Created Date</th>
                <th style="width:1%"> </th>
            </tr>

            </thead>
            <tbody>
                @if($achieve_status)
                    @foreach($achieve_status as $_achieve_status)
                        <tr>
                            <th>{{$_achieve_status->achievement_status_name}}</th>
                            <th>{{$_achieve_status->status}}</th>
                            <th>{{\Carbon\Carbon::parse($_achieve_status->created_at)->diffForHumans()}}</th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_achievement_status({{$_achieve_status->id}})" class="btn-sm pull-right" title="Edit Achievement Status"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$achieve_status->appends(Request::capture()->except('page'))->render() }} 
    </div>
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
    });

    //SORT SCRIPT
    sortAscDesc();
</script>