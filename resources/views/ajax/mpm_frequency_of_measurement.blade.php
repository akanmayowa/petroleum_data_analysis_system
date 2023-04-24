<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Frequency of Measurement  
        <a data-toggle="tooltip" onclick="showmodal('add_frequency')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Frequency of Measurement Here">  <i class="fa fa-plus"> New</i> </a>
             
        <a data-toggle="tooltip" onclick="showmodal('upl_frequency')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Frequency of Measurement Here">  <i class="fa fa-upload"> Upload</i> </a>
            
        <a href="{{url('ministerial-performance/download_frequency_of_measurement/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download Frequency of Measurement Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
    <table class="table table-striped table-sm mb-0" id="fom_table">
        <thead class="thead-dark">
        <tr>
            <th>Frequency of Measurement</th>
            <th>Created Date</th>
            <th style="width:1%"> </th>
        </tr>

        </thead>
        <tbody>
            @if($frequency_measurement)
                @foreach($frequency_measurement as $frequency_measurements)
                    <tr>
                        <th>{{$frequency_measurements->frequency_name}}</th>
                        <th>{{\Carbon\Carbon::parse($frequency_measurements->created_at)->diffForHumans()}}</th>
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_frequency_of_measurement({{$frequency_measurements->id}})" class="btn-sm pull-right" title="Edit Frequency of Measurement"> 
                                <i class="fa fa-pencil"></i>   </a>
                        </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$frequency_measurement->appends(Request::capture()->except('page'))->render() }} 
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