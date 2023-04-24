<div class="col-lg-12">   
    <div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> All DWP Task and Target
        <a data-toggle="tooltip" onclick="showmodal('add_tasktarget')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Task and Target Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_tasktarget')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Task and Target Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('project/download_task_target/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DWP Task and Targets Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="task_table">
            <thead class="thead-dark">
            <tr>
                <th>Task and Target Name</th>
                <th>Created Date</th>
                <th style="width:1%"> </th>
            </tr>

            </thead>
            <tbody>
                @if($task_target)
                    @foreach($task_target as $_task_target)
                        <tr>
                            <th>{{$_task_target->task_target_name}}</th>
                            <th>{{\Carbon\Carbon::parse($_task_target->created_at)->diffForHumans()}}</th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_task_target({{$_task_target->id}})" class="btn-sm pull-right" title="Edit Task and Target"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$task_target->appends(Request::capture()->except('page'))->render() }} 
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