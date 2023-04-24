<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa">MPM Source   
        <a data-toggle="tooltip" onclick="showmodal('addsource')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Source Report Here">  <i class="fa fa-plus"> New</i> </a>
            
        <a data-toggle="tooltip" onclick="showmodal('uplsource')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload MPM Source Here"> <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('ministerial-performance/download_source/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download Source Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
    <table class="table table-striped table-sm mb-0" id="source_table">
        <thead class="thead-dark">
        <tr>
            <th>Report Source</th>
            <th>Created Date</th>
            <th style="width:1%"> </th>
        </tr>

        </thead>
        <tbody>
            @if($sources)
                @foreach($sources as $_sources)
                    <tr>
                        <th>{{$_sources->source_name}}</th>
                        <th>{{\Carbon\Carbon::parse($_sources->created_at)->diffForHumans()}}</th>
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_source({{$_sources->id}})" class="btn-sm pull-right" title="Edit Source Report"> 
                             <i class="fa fa-pencil"></i>  
                            </a>
                        </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$sources->appends(Request::capture()->except('page'))->render() }} 
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