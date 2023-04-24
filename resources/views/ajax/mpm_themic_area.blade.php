<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Themic Area  
        <a data-toggle="tooltip" onclick="showmodal('addthemic')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Themic Area Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('uplthemic')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload MPM Themic Area Here"> <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('ministerial-performance/download_themic_area/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download MPM Themic Area Excel Here"> <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
    <table class="table table-striped table-sm mb-0" id="themic_table">
        <thead class="thead-dark">
        <tr>
            <th>Year</th>
            <th>Themic Area</th>
            <th>Created Date</th>
            <th style="width:1%"></th>
        </tr>

        </thead>
        <tbody>
            @if($themic_areas)
                @foreach($themic_areas as $_themic_areas)
                    <tr>
                        <th>{{$_themic_areas->year}}</th>
                        <th>{{$_themic_areas->themic_area_name}}</th>
                        <th>{{\Carbon\Carbon::parse($_themic_areas->created_at)->diffForHumans()}}</th>
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_themic({{$_themic_areas->id}})" class="btn-sm pull-right" title="Edit Themic Area"> 
                             <i class="fa fa-pencil"></i>  
                            </a>
                        </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$themic_areas->appends(Request::capture()->except('page'))->render() }} 
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