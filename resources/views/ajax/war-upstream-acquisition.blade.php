<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Upstream Seismic Data Acquisition   <span class="unit-header"> in 3D(Kms) </span>
        <a data-toggle="tooltip" onclick="showmodal('addAcq')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add Upstream Seismic Data Acquisition Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a href="{{url('WAR-Upstream/download_acquisition/xlsx')}}" data-toggle="tooltip" class="btn btn-success btn-sm pull-right excel-button" title="Download Upstream Seismic Data Acquisition Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5> 
        <table class="table table-striped table-sm mb-0" id="acquisition_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Week</th>
                <th>Siesmic data quantum acquired </th>
                <th>Cumulative Siesmic Acquired <i class="units"></i></th>
                <th>Annual seismic aquisation target <i class="units"></i></th>
                <th>Siesmic data Quantum Processed <i class="units"></i></th>                                          
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($acquisition)
                    @foreach($acquisition as $Acquisition)
                        <tr>  
                            <th>{{$Acquisition->year}}</th>
                            <th>{{$Acquisition->month}}</th>
                            <th>{{$Acquisition->week}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$Acquisition->seismic_data_acquired}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$Acquisition->cumulative_seismic_acquired}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$Acquisition->annual_seismic_acquisition}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$Acquisition->seismic_data_processed}}</th>  
                            <th>                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_acquisition({{$Acquisition->id}})" class="btn-sm pull-right" title="Edit Upstream Seismic Data Acquisition"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$acquisition->appends(Request::capture()->except('page'))->render() }} 
    </div> <!-- end col -->




<script type="text/javascript">
    $(function()
    {
        $('[data-toggle="tooltip"]').tooltip(); 
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