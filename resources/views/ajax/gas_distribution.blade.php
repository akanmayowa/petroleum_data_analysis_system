<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Gas Distribution
        <a data-toggle="tooltip" onclick="showmodal('uplgas_dist')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Gas Distribution Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('gas/download_gas_distribution/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download Gas Distribution Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5> 
    <table class="table table-striped table-sm mb-0" id="gas_dist_table">
        <thead class="thead-dark">
            <tr>   
            </tr>

        </thead>
        <tbody>
           
        </tbody>
    </table>
    {{$gas_distribution->appends(Request::capture()->except('page'))->render() }} 
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'approve_technologies') || (\Auth::user()->delegate_role == 'Project and Transportation (E&S)' && \Auth::user()->end_date >= date('Y-m-d') )) --}}
            <a onclick="approve_ref_prod()" data-toggle="tooltip" class="btn btn-sm pull-right approve-button" title="Approve Pending Data" style="color: #fff">  <i class="fa fa-check"> Approve</i> </a>
        {{-- @endif --}}
</div> <!-- end col -->



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