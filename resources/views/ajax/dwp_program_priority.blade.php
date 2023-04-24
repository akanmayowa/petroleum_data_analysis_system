<div class="col-lg-12">   
    <div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> All DWP Program Priority
        <a data-toggle="tooltip" onclick="showmodal('add_programpriority')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Program Priority Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_programpriority')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Program Priority Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('project/download_program_priority/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DWP Program Priority Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="pp_table">
            <thead class="thead-dark">
            <tr>
                <th>Program Priority Name</th>
                <th>Created Date</th>
                <th style="width:1%"></th>
            </tr>

            </thead>
            <tbody>
                @if($program_priority)
                    @foreach($program_priority as $_program_priority)
                        <tr>
                            <th>{{$_program_priority->program_priority_name}}</th>
                            <th>{{\Carbon\Carbon::parse($_program_priority->created_at)->diffForHumans()}}</th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_program_priority({{$_program_priority->id}})" class="btn-sm pull-right" title="Edit Work Plan"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$program_priority->appends(Request::capture()->except('page'))->render() }} 
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