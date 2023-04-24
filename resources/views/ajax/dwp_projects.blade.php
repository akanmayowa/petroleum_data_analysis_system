<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> DWP Project 
        <a data-toggle="tooltip" onclick="showmodal('addproj',sessionStorage.getItem('url'))" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New DWP Project Here">  <i class="fa fa-plus"> New</i> </a>
            
        <a data-toggle="tooltip" onclick="showmodal('uplproj',sessionStorage.getItem('url'))" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload DWP Project Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('project/download_dwp/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DPR Work Plan Project Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
    <table class="table table-striped table-sm mb-0" id="project_table">
        <thead class="thead-dark">
        <tr>
            <th>Start Month</th>
            <th>Program Priority</th>
            <th>Division</th>
            <th>Critical Milestone</th>
            <th>Status</th>
            <th>Report Freqency</th>
            {{-- <th style=""><input type="checkbox" name="vehicle1" id="selectall" value=""> </th> --}}
            <th style=""></th>
        </tr>

        </thead>
        <tbody>
            @if($projects)
                @foreach($projects as $_projects)
                    <tr>
                        <th>{{$_projects->year.'-'.$_projects->month}}</th>
                        <th>@if($_projects->program_priority) {{$_projects->program_priority->program_priority_name}} @endif</th>
                        <th>@if($_projects->division) {{$_projects->division->division_name}} @endif</th>
                        <th>@if($_projects->critical_milestone) {{substr($_projects->critical_milestone->critical_milestone_name ,0, 40)}} ... @endif</th>
                        <th>                            
                            @if($_projects->achievement_status) 
                                @if($_projects->achievement_status->status == 0)
                                    <span class="badge badge-danger" style="width:100%">{{$_projects->achievement_status->achievement_status_name}}  </span>
                                @elseif($_projects->achievement_status->status == 0.25)
                                    <span class="badge badge-warning" style="width:100%">{{$_projects->achievement_status->achievement_status_name}}  </span>
                                @elseif($_projects->achievement_status->status == 0.5)
                                    <span class="badge badge-warning" style="width:100%">{{$_projects->achievement_status->achievement_status_name}}  </span> 
                                @elseif($_projects->achievement_status->status == 0.75)
                                    <span class="badge badge-primary" style="width:100%">{{$_projects->achievement_status->achievement_status_name}}  </span> 
                                @elseif($_projects->achievement_status->status == 1)
                                    <span class="badge badge-success" style="width:100%">{{$_projects->achievement_status->achievement_status_name}}  </span> 
                                @endif
                            @endif                          
                        </th>
                        <th>@if($_projects->timeline) {{$_projects->timeline->timeline_name}} @endif</th>
                        {{-- <th> <input class="checkbox1" type="checkbox" name="check_list[]" value="{{$_projects->id}}"> </th> --}}
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_dwp_projects({{$_projects->id}})" class="btn-sm pull-right" title="View Project"> <i class="fa fa-eye"></i>    </a>

                             <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_dwp_projects({{$_projects->id}})" class="btn-sm pull-right" title="Edit Project"> 
                             <i class="fa fa-pencil"></i>  
                            </a>
                        </th>   
                    </tr>
                @endforeach
            @endif

           {{-- <tr>
                <th>  </th>
                <th>
                    <select class="form-control pull-right assign_role" name="assign_role" id="assign_role" style="font-size:12px; width: 50%"> 
                        <option value="">Assign Role To </option>  
                        @if($Roles)
                            @foreach($Roles as $Roles)
                                <option value="{{$Roles->id}}"> {{$Roles->role_name}} </option>
                            @endforeach
                        @endif 
                    </select>
                </th>   
                <th>
                    <button type="submit" style="cursor: pointer; color:#fff; font-size:12px" tooltip="true" class="btn btn-primary btn-sm pull-left" title="Send Report" id="sendtobtns" class="sendtobtns">  Assign
                    </button>
                </th>
                <th colspan="8">  </th>
            </tr> --}}

        </tbody>
    </table>
    {{$projects->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->



<script type="text/javascript">
    $(function()
    {
        // alert(window.location.href);
    
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