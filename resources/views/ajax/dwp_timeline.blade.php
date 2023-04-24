<div class="col-lg-12">   
    <div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> DWP Task Timeline - Frequency Of Report
        <a data-toggle="tooltip" onclick="showmodal('add_timeline')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Task Timeline Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_timeline')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Task Timeline Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('project/download_task_timeline/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DPR Timeline Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="time_table">
            <thead class="thead-dark">
            <tr>
                <th>Task Critical Milestone Name</th>
                <th>Created Date</th>
                <th style="width:1%"> </th>
            </tr>

            </thead>
            <tbody>
                @if($timeline)
                    @foreach($timeline as $_timeline)
                        <tr>
                            <th>{{$_timeline->timeline_name}}</th>
                            <th>{{ $_timeline->created_at->diffForHumans()}}</th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_timeline({{$_timeline->id}})" class="btn-sm pull-right" title="Edit Task Timeline"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$timeline->appends(Request::capture()->except('page'))->render() }} 
    </div>
</div> <!-- end col -->

{{-- @if(in_array(Auth::user()->role_obj->role_name, ['DWP Report Custodian','Admin'])) --}}

 


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