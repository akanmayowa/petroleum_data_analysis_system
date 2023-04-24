<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Critical Milestone Matrix 
        <a data-toggle="tooltip" onclick="showmodal('add_crit_mile')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add Critical Milestone Matrix Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upload_crit_mile')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Critical Milestone Matrix Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('project/download_critical_milestone_matrix/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download Critical Milestone Matrix Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>  
        <table class="table table-striped table-sm mb-0" id="matrix_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Responsible Units</th>
                <th>DPR PP Milestones</th>
                <th>Priority Milestones</th>
                <th>Milestone Count</th>
                <th>Uploaded</th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($milestone_matrix)
                    @foreach($milestone_matrix as $_milestone_matrix)
                        <tr> 
                            <th>{{$_milestone_matrix->year}}</th> 
                            <th>@if($_milestone_matrix->division) {{$_milestone_matrix->division->division_name}} @endif </th>
                            <th>{{$_milestone_matrix->dpr_pp_milestones}}</th> 
                            <th>{{$_milestone_matrix->priority_milestone}}</th>
                            <th>{{$_milestone_matrix->critical_milestones_count}}</th>
                            <th>{{\Carbon\Carbon::parse($_milestone_matrix->created_at)->diffForHumans()}}</th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_critical_mile({{$_milestone_matrix->id}})" class="btn-sm pull-right" title="View Critical Milestone Matrix"> <i class="fa fa-list"></i>    </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="edit_critical_mile({{$_milestone_matrix->id}})" class="btn-sm pull-right" title="Edit Critical Milestone Matrix"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$milestone_matrix->appends(Request::capture()->except('page'))->render() }} 
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