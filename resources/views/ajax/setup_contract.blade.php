<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> All Contracts  
                <a data-toggle="tooltip" onclick="showmodal('addcont')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Contract Here"> <i class="fa fa-plus"> New</i> </a>
           
        <a data-toggle="tooltip" onclick="showmodal('upl_contract', sessionStorage.getItem('url'), 'downloadContractTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Contracts Here">  <i class="fa fa-upload"> Upload</i> </a>
                
        <a href="{{url('admin/download_contract/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Contracts Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5> 
    <table class="table table-striped table-sm mb-0" id="contract_table">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Contract Name</th>
            <th>Created On</th>
            <th style="">  </th>
        </tr>

        </thead>
        <tbody>
            @if($contracts)
                @foreach($contracts as $_contracts)
                    <tr>  
                        <th>{{$_contracts->id}}</th>
                        <th>{{$_contracts->contract_name}}</th>    
                        <th>{{\Carbon\Carbon::parse($_contracts->created_at)->diffForHumans()}}</th>    
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_contract({{$_contracts->id}})" class="btn-sm pull-right" title="Edit Contract"> <i class="fa fa-pencil"></i>  </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$contracts->appends(Request::capture()->except('page'))->render() }} 
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