<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Terrain / Basins  
        <a data-toggle="tooltip" onclick="showmodal('add_terr')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Terrain / Location Here">  <i class="fa fa-plus"> New</i> </a>
            
        <a data-toggle="tooltip" onclick="showmodal('upl_terrain', sessionStorage.getItem('url'), 'downloadTerrainTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Terrain Here">  <i class="fa fa-upload"> Upload</i> </a>
           
        <a href="{{url('admin/download_terrain/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Terrain Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5> 
    <table class="table table-striped table-sm mb-0" id="terrain_table">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Terrain/ Location</th>
            <th>Created Date</th>
            <th style="width:1%"></th>
        </tr>

        </thead>
        <tbody>
            @if($terrains)
                @foreach($terrains as $_terrains)
                    <tr>
                        <th>{{$_terrains->id}}</th>
                        <th>{{$_terrains->terrain_name}}</th>
                        <th>{{\Carbon\Carbon::parse($_terrains->created_at)->diffForHumans()}}</th>
                        <th>
                             <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_terrain({{$_terrains->id}})" class="btn-sm pull-right" title="Edit Terrain / Location"> 
                             <i class="fa fa-pencil"></i>  
                            </a>
                        </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
    {{$terrains->appends(Request::capture()->except('page'))->render() }} 
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