<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Key Result Area   
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_mpm')) --}}
            <a data-toggle="tooltip" onclick="showmodal('addkra')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Key Result Area Here">  <i class="fa fa-plus"> New</i> </a>
        {{-- @endif --}}
    
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_mpm')) --}}
            <a data-toggle="tooltip" onclick="showmodal('uplkra')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload MPM Key Result Area Here"> <i class="fa fa-upload"> Upload</i> </a>
        {{-- @endif --}}
        
        <a href="{{url('ministerial-performance/download_key_result_area/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download MPM Key Result Area Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
    <table class="table table-striped table-sm mb-0" id="_kra_table">
        <thead class="thead-dark">
        <tr>
            <th>Year</th>
            <th>Result Area</th>
            <th>Created Date</th>
            <th style="width:1%"> </th>
        </tr>

        </thead>
        <tbody>
            @if($result_areas)
                @foreach($result_areas as $_result_areas)
                    <tr>
                        <th>{{$_result_areas->year}}</th>
                        <th>{{$_result_areas->result_area_name}}</th>
                        <th>{{\Carbon\Carbon::parse($_result_areas->created_at)->diffForHumans()}}</th>
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_result_area({{$_result_areas->id}})" class="btn-sm pull-right" title="Edit MPM Report">   <i class="fa fa-pencil"></i>    
                            </a>
                        </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$result_areas->appends(Request::capture()->except('page'))->render() }} 
</div>



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