<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Equity holders  
        <a data-toggle="tooltip" onclick="showmodal('addparentcomp')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Parent Company Here">  <i class="fa fa-plus"> New</i> </a>
           
            <a data-toggle="tooltip" onclick="showmodal('upl_parent_comp', sessionStorage.getItem('url'), 'downloadParentCompTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Parent Company Here">  <i class="fa fa-upload"> Upload</i> </a>
                          
        <a href="{{url('admin/download_parent_company/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Company Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5> 
    <table class="table table-striped table-sm mb-0" id="parent_company_table">
        <thead class="thead-dark">
        <tr>
            <th>Company Code</th>
            <th>Company</th>
            <th>Address</th>
            <th>Created On</th>
            <th style="">  </th>
        </tr>

        </thead>
        <tbody>
            @if($parent_company)
                @foreach($parent_company as $parent_companies)
                    <tr>  
                        <th>{{strtoupper($parent_companies->company_code)}}</th> 
                        <th>{{$parent_companies->company_name}}</th>  
                        <th>{{$parent_companies->address}}</th>   
                        <th>{{\Carbon\Carbon::parse($parent_companies->created_at)->diffForHumans()}}</th>    
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_parent_company({{$parent_companies->id}})" class="btn-sm pull-right" title="Edit Parent Company"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$parent_company->appends(Request::capture()->except('page'))->render() }} 
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