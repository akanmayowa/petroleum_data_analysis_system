<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> DWP Task and Targets Achievement Count
        <a data-toggle="tooltip" onclick="showmodal('')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="View Report Here">  <i class="mdi mdi-chart-areaspline"> View</i> </a>

        <a href="{{url('project/download_task_target/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DWP Task and Targets Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
    <table class="table table-striped table-sm mb-0" id="task_table">
        <thead class="thead-dark">
        <tr>
            <th>DWP-PP (Objectives)</th>
            <th>DWP-Task & Targets (TT)</th>
            <th style=""> </th>
        </tr>

        </thead>
        <tbody>
            @if($task_target_count)
                @foreach($task_target_count as $task_target_counts)
                    <tr>
                        <th>@if($task_target_counts->program_priority) {{$task_target_counts->program_priority->program_priority_name}} @endif</th>
                        <th>@if($task_target_counts->task_target) {{$task_target_counts->task_target->task_target_name}} @endif</th>
                        <th> </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
     {{$task_target_count->appends(Request::capture()->except('page'))->render() }} 
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