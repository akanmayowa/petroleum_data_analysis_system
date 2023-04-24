<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Key Performance Index (KPI)    
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_mpm')) --}}
            <a data-toggle="tooltip" onclick="showmodal('add_kpi')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Key Performance Index (KPI) Here">  <i class="fa fa-plus"> New</i> </a>
        {{-- @endif --}}
   
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_mpm')) --}}
            <a data-toggle="tooltip" onclick="showmodal('upl_kpi')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Key Performance Index (KPI) Here">  <i class="fa fa-upload"> Upload</i> </a>
        {{-- @endif --}}
        
        <a href="{{url('ministerial-performance/download_mpm_kpi/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download Key Performance Index (KPI) Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
    <table class="table table-striped table-sm mb-0" id="kpi_table">
        <thead class="thead-dark">
        <tr>
            <th>Year</th>
            <th>Key Performance Index (KPI)</th>
            <th>Created Date</th>
            <th style="width:1%"> </th>
        </tr>

        </thead>
        <tbody>
            @if($mpm_kpi)
                @foreach($mpm_kpi as $mpm_kpis)
                    <tr>
                        <th>{{$mpm_kpis->year}}</th>
                        <th>{{$mpm_kpis->kpi_name}}</th>
                        <th>{{\Carbon\Carbon::parse($mpm_kpis->created_at)->diffForHumans()}}</th>
                        <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_kpi({{$mpm_kpis->id}})" class="btn-sm pull-right" title="Edit Key Performance Index (KPI)"> 
                                <i class="fa fa-pencil"></i>   </a>
                        </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$mpm_kpi->appends(Request::capture()->except('page'))->render() }} 
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