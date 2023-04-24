<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Ministerial Performance Management  
        <a data-toggle="tooltip" onclick="showmodal('addmpm')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New MPM Here"> <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('uplmpm')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Ministerial Performance Management Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('ministerial-performance/download_mpm/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download Ministerial Performance Management Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="mpm_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Themic Area</th>
                <th>Key Result Area</th>
                <th>KPI</th>
                <th>Baseline</th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @forelse($mpms as $_mpms)
                    <tr>   
                        <th>{{$_mpms->year}}</th>
                        <th>@if($_mpms->themic_area) {{$_mpms->themic_area->themic_area_name}} @endif</th>
                        <th>@if($_mpms->key_result_area) {{$_mpms->key_result_area->result_area_name}} @endif</th>
                        <th>@if($_mpms->kpis) {{$_mpms->kpis->kpi_name}} @endif</th>
                        <th>{{number_format($_mpms->baseline, 2)}}</th>
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_mpm({{$_mpms->id}})" class="btn-sm pull-right" title="View Ministerial Performance Management"> <i class="fa fa-eye"></i>   </a>

                            <a href="{{ url('ministerial-kpi/net-cash-flow'.'?year='.$_mpms->year.'&themic_area='.$_mpms->themic_area_id) }}" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" class="btn-sm pull-right" title="View MPM Net Cash Flow" target="_blank"> <i class="fa fa-usd"></i>    </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_mpm({{$_mpms->id}})" class="btn-sm pull-right" title="Edit Ministerial Performance Management"> <i class="fa fa-pencil"></i>    </a>
                        </th>   
                    </tr>
                @empty
                    No Ministerial KPI
                @endforelse
            </tbody>
        </table>
        {{$mpms->appends(Request::capture()->except('page'))->render() }} 
</div> 



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