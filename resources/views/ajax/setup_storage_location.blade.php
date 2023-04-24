<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Storage Location  
        <a data-toggle="tooltip" onclick="showmodal('add_storage_location')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Storage Location Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_storage_location', sessionStorage.getItem('url'), 'downloadStoreLocTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Storage Location Here">  <i class="fa fa-upload"> Upload</i> </a>
           
        <a href="{{url('admin/download_storage_location/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Storage Location Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5> 
        <table class="table table-striped table-sm mb-0" id="sto_loc_table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Location Name</th>
                <th>Created Date</th>
                <th style="width:1%"> </th>
            </tr>

            </thead>
            <tbody>
                @if($storage_loc)
                    @foreach($storage_loc as $_storage_loc)
                        <tr>
                            <th>{{$_storage_loc->id}}</th>
                            <th>{{$_storage_loc->location_name}}</th>
                            <th>{{\Carbon\Carbon::parse($_storage_loc->created_at)->diffForHumans()}}</th>
                            <th>
                                 <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_storage_location({{$_storage_loc->id}})" class="btn-sm pull-right" title="Edit Storage Location"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>

        </table>
        {{$storage_loc->appends(Request::capture()->except('page'))->render() }} 
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