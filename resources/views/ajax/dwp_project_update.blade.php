
<div class="table-responsive"> 
       
    <h5 style="margin-left: 5px; color: #aaa"> Projects Progress
         <!--    <a data-toggle="tooltip" onclick="showmodal('upl')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload  Here">  <i class="fa fa-upload"></i> </a> -->

        <a href="#" onclick="addDWPProgress()" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" data-toggle="tooltip" class="btn btn-sm btn-success pull-right" title="Add DWP Progress">  <i class="fa fa-plus"> New</i> </a>

        <a href="{{url('project/download_dwp/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DPR Work Plan Project Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
       
     
    </h5>
      

        <input type="hidden" name="pp" id="ppp" value=""> <input type="hidden" name="idd" id="id_" value="">  {{ csrf_field() }}
        <table class="table table-striped table-sm mb-0" id="project_table">
            <thead class="thead-dark">
            <tr>
                <th>Report Month</th>
                <th>Year</th>
                <th>Program Priority</th>
                <th>Division</th>
                <th>Critical Milestaone</th>
                <th>Status</th>                
                <th> Added / Updated By </th> 
            </tr>

            </thead>
            <tbody>
                @if($project_upd)
                    @foreach($project_upd as $_projects)
                        <tr>
                            <th>{{date('M',strtotime($_projects->submitted_date))}}</th>
                            <th>{{date('Y',strtotime($_projects->submitted_date))}}</th>
                            <th>@if($_projects->dwp->program_priority) {{$_projects->dwp->program_priority->program_priority_name}} @endif</th>
                            <th>@if($_projects->dwp->division) {{$_projects->dwp->division->division_name}} @endif</th>
                            <th>@if($_projects->dwp->critical_milestone) {{substr($_projects->dwp->critical_milestone->critical_milestone_name ,0, 40)}} ... @endif</th>
                            <th>                           
                            @if($_projects->achievement_status) 
                                @if($_projects->achievement_status->status == 0)
                                    <span class="badge badge-danger" style="width:100%">{{$_projects->achievement_status->achievement_status_name}} </span>
                                @elseif($_projects->achievement_status->status == 0.25)
                                    <span class="badge badge-warning" style="width:100%">{{$_projects->achievement_status->achievement_status_name}} </span>
                                @elseif($_projects->achievement_status->status == 0.5)
                                    <span class="badge badge-warning" style="width:100%">{{$_projects->achievement_status->achievement_status_name}} </span> 
                                @elseif($_projects->achievement_status->status == 0.75)
                                    <span class="badge badge-primary" style="width:100%">{{$_projects->achievement_status->achievement_status_name}} </span> 
                                @elseif($_projects->achievement_status->status == 1)
                                    <span class="badge badge-success" style="width:100%">{{$_projects->achievement_status->achievement_status_name}} </span> 
                                @endif
                            @endif                          
                        </th>
                            
                            <td>
                                 
                                   {{$_projects->added_by}}
                                
                            </td>
                            
                        </tr>
                    @endforeach
                @endif              

            </tbody>
        </table>
        {{$project_upd->appends(Request::capture()->except('page'))->render() }} 
 
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

    function addDWPProgress(){

        $('#addproj').modal('show');
    }
</script>




<script type="text/javascript">
    
    $(document).ready(function()
    {
        $('#start_dates').datepicker();
    });


    function showmodal(modalid)
    {
        $('#'+modalid).modal('show');
    }



    $(document).ready(function()
    {
        $(".upd_btn").attr("disabled", true);
        $(".upd_btn").css('background-color','#ccc');

        $(".select_status").change(function()
        {            
            var st = $("#update_status"+this.id).val(); 
            var r = confirm("Are You Sure You Want To Update This Project?\n Yes or No.");
            if (r == true) 
            {
                var p = this.value;   var str = this.id;     
                $('#ppp').val(p); 
             
                var _id = str.replace("update_status", "");
                $('#id_').val(_id);  
                $('#id'+_id).attr("disabled", false);  
                $('#id'+_id).css('background-color','#396');   

            } 
            else {     $(this).attr('selected', false);    }

        });
    });

</script>

