<div class="table-responsive">   
<h5 style="margin-left: 5px; color: #aaa"> Expenditure  
        <a data-toggle="tooltip" onclick="showmodal('add_expenditure')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Key Performance Index (KPI) Here">  <i class="fa fa-plus"> New</i> </a>
           
        <a data-toggle="tooltip" onclick="showmodal('upl_expenditure')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Expenditure Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('ministerial-performance/download_mpm_expenditure/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download Expenditure Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
    <table class="table table-striped table-sm mb-0" id="kpi_table">
        <thead class="thead-dark">
        <tr>
            <th>Month-Year</th>
            <th>Expenditure</th>
            <th>Created Date</th>
            <th style="width:1%"> </th>
        </tr>

        </thead>
        <tbody>
            @if($mpm_expenditures)
                @foreach($mpm_expenditures as $mpm_expenditure)
                    <tr>
                        <th>{{$mpm_expenditure->year.'-'.$mpm_expenditure->month}}</th>
                        <th>{{number_format($mpm_expenditure->expenditure,2)}}</th>
                        <th>{{$mpm_expenditure->created_at->diffForHumans()}}</th>
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="edi_mpm({{$mpm_expenditure->year}},'{{$mpm_expenditure->month}}','{{$mpm_expenditure->expenditure}}')" class="btn-sm pull-right" title="Edit Expenditure"> 
                                <i class="fa fa-pencil"></i>   </a>
                        </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$mpm_expenditures->appends(Request::capture()->except('page'))->render() }} 
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