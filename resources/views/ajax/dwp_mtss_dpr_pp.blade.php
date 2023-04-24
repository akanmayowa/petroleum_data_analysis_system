<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> MTSS DPR Program Priority
        <a data-toggle="tooltip" onclick="showmodal('adddpr_pp')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add MTSS DPR Program Priority Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upldpr_pp')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload MTSS DPR Program Priority Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('project/download_mtss_dpr_pp/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download MTSS DPR Program Priority Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5> 
        <table class="table table-striped table-sm mb-0" id="dpr_pp_table">
            <thead class="thead-dark">
            <tr>
                <th>Policy Objectives</th>
                <th>KPIs</th>
                <th>KPI Performance</th>
                <th>Responsible Division</th>
                <th>Critical Linkage</th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($mtss_dpr_pp)
                    @foreach($mtss_dpr_pp as $_mtss_dpr_pp)
                        <tr> 
                            <th>{{$_mtss_dpr_pp->policy_objective}}</th>
                            <th>{{$_mtss_dpr_pp->kpi}}</th>
                            <th>{{$_mtss_dpr_pp->kpi_performance}}</th>
                            <th>{{$_mtss_dpr_pp->responsible_division}}</th>
                            <th>{{$_mtss_dpr_pp->critical_linkage}}</th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_dpr_pp({{$_mtss_dpr_pp->id}})" class="btn btn-warning btn-sm pull-right" title="View MTSS DPR Program Priority"> <i class="fa fa-list"></i>    </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_dpr_pp({{$_mtss_dpr_pp->id}})" class="btn btn-info btn-sm pull-right" title="Edit MTSS DPR Program Priority"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$mtss_dpr_pp->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->




<script type="text/javascript">
    function showmodal(id){
            $('#'+id).modal('show');
    }
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