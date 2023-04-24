<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Facility Location   
        <a data-toggle="tooltip" onclick="showmodal('add_location')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Location Here"> <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_location', sessionStorage.getItem('url'), 'downloadLocationTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Locations Here">  <i class="fa fa-upload"> Upload</i> </a>
           
        <a href="{{url('admin/download_location/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Location Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5> 
        <table class="table table-striped table-sm mb-0" id="location_table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Location Name</th>
                <th>Created Date</th>
                <th style="width:1%"></th>
            </tr>

            </thead>
            <tbody>
                @if($locations)
                    @foreach($locations as $_locations)
                        <tr>
                            <th>{{$_locations->id}}</th>
                            <th>{{$_locations->location_name}}</th>
                            <th>{{\Carbon\Carbon::parse($_locations->created_at)->diffForHumans()}}</th>
                            <th>
                                 <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_location({{$_locations->id}})" class="btn-sm pull-right" title="Edit Location"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>

        </table>
        {{$locations->appends(Request::capture()->except('page'))->render() }} 
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