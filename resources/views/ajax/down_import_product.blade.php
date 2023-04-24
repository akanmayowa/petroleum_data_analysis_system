<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> All Import Products 
        <a data-toggle="tooltip" onclick="showmodal('add_imp_prod')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Import Products Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_imp_prod', sessionStorage.getItem('url'), 'downloadImpProductTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Import Products Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_import_product/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Import Products Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_product_listing') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_product()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif 
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="imp_prod_table">
            <thead class="thead-dark">
            <tr>
                <th>Product Name</th>
                <th>Uploaded On</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($imp_products)
                    @foreach($imp_products as $_imp_products)
                        <tr> 
                             <th>{{$_imp_products->product_name}} </th>
                            <th>{{\Carbon\Carbon::parse($_imp_products->created_at)->diffForHumans()}}</th> 
                            <th style="text-align: right;">
                                @if($_imp_products->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_import_product({{$_imp_products->id}})" class="btn-sm pull-right" title="View Import Products"> <i class="fa fa-eye"></i>   </a>

                                {{-- <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_import_product({{$_imp_products->id}})" class="btn-sm pull-right" title="Edit Import Products"> <i class="fa fa-pencil"></i>    </a> --}}
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$imp_products->appends(Request::capture()->except('page'))->render() }}
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

    function sortByUnresolved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/prod_vol_permit?p='+$pending);
        $('#prod_vol_permit').load('{{url('ajax')}}/prod_vol_permit?p='+$pending);
        sessionStorage.setItem('name','prod_vol_permit'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/prod_vol_permit?a='+$approve);
        $('#prod_vol_permit').load('{{url('ajax')}}/prod_vol_permit?a='+$approve);
        sessionStorage.setItem('name','prod_vol_permit'); 
    } 
</script>