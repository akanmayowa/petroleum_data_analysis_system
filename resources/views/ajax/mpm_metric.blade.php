<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> MPM Metric    
        <a data-toggle="tooltip" onclick="showmodal('addmetric')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Metric Here">  <i class="fa fa-plus"> New</i> </a>
           
        <a data-toggle="tooltip" onclick="showmodal('uplmetric')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload MPM Metric Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('ministerial-performance/download_metric/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download Metric Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
    <table class="table table-striped table-sm mb-0" id="metric_table">
        <thead class="thead-dark">
        <tr>
            <th>Metric  Name</th>
            <th>Created Date</th>
            <th style="width:1%"> </th>
        </tr>

        </thead>
        <tbody>
            @if($metrics)
                @foreach($metrics as $_metrics)
                    <tr>
                        <th>{{$_metrics->metric_name}}</th>
                        <th>{{\Carbon\Carbon::parse($_metrics->created_at)->diffForHumans()}}</th>
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_metric({{$_metrics->id}})" class="btn-sm pull-right" title="Edit Metric"> <i class="fa fa-pencil"></i>   </a>
                        </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$metrics->appends(Request::capture()->except('page'))->render() }} 
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