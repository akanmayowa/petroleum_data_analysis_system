<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Weekly Activity Report  
        <a data-toggle="tooltip" onclick="showmodal('addwar')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Weekly Activity Report Here"> <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('uplwar')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Weekly Activity Report Here"> <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('ministerial-performance/download_war/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download Weekly Activity Report Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="war_table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Deliverables</th>
                <th>Department</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Created On</th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($wars)
                    @foreach($wars as $_wars)
                        <tr>           
                            <th>{{$_wars->id}}</th>
                            <th>{{$_wars->deliverables}}</th>
                            <th>@if($_wars->department) {{$_wars->department->department_name}} @endif </th>   
                            <th>@if($_wars->status) {{$_wars->status->status}} @endif </th>      
                            <th>{{$_wars->from_date}}</th>     
                            <th>{{$_wars->to_date}}</th>            
                            <th>{{\Carbon\Carbon::parse($_wars->created_at)->diffForHumans()}}</th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_war_mpm_report({{$_wars->id}})" class="btn-sm pull-right" title="View Weekly Activity Report"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_war_mpm_report({{$_wars->id}})" class="btn-sm pull-right" title="Edit Weekly Activity Report"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$wars->appends(Request::capture()->except('page'))->render() }} 
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
</script>