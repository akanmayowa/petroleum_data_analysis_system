<div class="col-lg-12">   
    <div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> All DWP Task Critical Milestone
        <a data-toggle="tooltip" onclick="showmodal('add_tt_crit_milestone')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" title="Add New Task Critical Milestone Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_tt_crit_milestone')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" title="Upload Task Critical Milestone Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('project/download_task_critical_milestone/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DPR Task Critical Milestone Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="mile_table">
            <thead class="thead-dark">
            <tr>
                <th>Task Critical Milestone Name</th>
                <th>Created Date</th>
                <th style="width:1%"></th>
            </tr>

            </thead>
            <tbody>
                @if($tt_crit_milestone)
                    @foreach($tt_crit_milestone as $_tt_crit_milestone)
                        <tr>
                            <th>{{$_tt_crit_milestone->critical_milestone_name}}</th>
                            <th>{{\Carbon\Carbon::parse($_tt_crit_milestone->created_at)->diffForHumans()}}</th>
                            <th>
                                <a data-toggle="tooltip" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_tt_crit_milestone({{$_tt_crit_milestone->id}})" class="btn-sm pull-right" title="Edit Task Critical Milestone"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$tt_crit_milestone->appends(Request::capture()->except('page'))->render() }} 
    </div>
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
    });

    //SORT SCRIPT
    sortAscDesc();
</script>