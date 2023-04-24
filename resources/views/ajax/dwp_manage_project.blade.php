<div class="table-responsive"> 
    <form id="" action="{{url('/project/email_reports')}}" method="POST">     {{ csrf_field() }}                   

    <div id="project_table">                
        <table class="table table-striped table-sm mb-0">
            <thead class="thead-dark">
            <tr>
                <th>Month</th>
                <th>Year</th>
                <th>Program Priority</th>
                <th>Division</th>
                <th>Critical Milestone</th>
                <th>Status</th>
                <th>Timeline</th>
                <th style="">
                    <input type="checkbox" name="" id="selectall" style="width: 1.6em; height: 1.5em; margin-top: 3px; border: 1px;" value=""> 
                </th>
            </tr>

            </thead>
            <tbody>
                @if($projected)
                    @foreach($projected as $_projects)
                        <tr>
                            <th>{{$_projects->month}}</th>
                            <th>{{$_projects->year}}</th>
                            <th>{{$_projects->dpr_work_plan}}</th>
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
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#fff; font-size:10px" tooltip="true" onclick="view_dwp_projects({{$_projects->id}})" class="btn-sm pull-right" title="View Project"> <i class="fa fa-list"></i>    </a>
                                
                                <input class="checkbox1" type="checkbox" name="check_list[]" style="width: 1.3em; height: 1.2em; margin-top: 1px" value="{{$_projects->id}}">
                            </th>
                             
                        </tr>
                    @endforeach
                @endif
            {{-- <tr>
                <th colspan="6">  </th>
                <th>
                    <select class="form-control pull-left send_to" name="send_to" id="send_to" style="font-size:12px" required=""> 
                        <option value="">Send To ... </option>
                        <option value="1"> Send To AD-S&PE </option>
                        <option value="2"> Send To HP </option>
                        <option value="3"> Send To Director </option> 
                        <option value="4"> Send To All </option>   
                    </select>
                </th>
                <th>
                    <button type="submit" style="cursor: pointer; color:#fff; font-size:12px" tooltip="true" class="btn btn-primary btn-sm pull-left" title="Send Report" id="sendtobtns" class="sendtobtns"> 
                     <i class="fa fa-send"> Send</i>  
                    </button>
                </th>
            </tr> --}}
            </tbody>
        </table>
    </div> 
    </form>
</div> <!-- end col -->


<script type="text/javascript">
    $(function()
    {
        $('#year_dwp').change(function()
        {
            $('#project_table').load("{{url('ajax')}}/filter_project_year?year="+$('#year_dwp').val()); 
        });

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



<script>
    $(document).ready(function()
    {
        $('#selectall').on('change', function()
        {
             if(this.checked) // if changed state is "CHECKED"
            {
                $('.checkbox1').each(function() 
                {
                    this.checked = true;
                });
            }
             else// if changed state is "UN CHECKED"
            {
                $('.checkbox1').each(function() 
                {
                    this.checked = false;
                });
            }
        })

    })
</script>
