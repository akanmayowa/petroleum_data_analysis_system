<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Company / Operator 
        <a data-toggle="tooltip" onclick="showmodal('addcomp')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Company / Operator Here"> <i class="fa fa-plus"> New</i> </a>
              
        <a data-toggle="tooltip" onclick="showmodal('upl_comp', sessionStorage.getItem('url'), 'downloadCompanyTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Company Here">  <i class="fa fa-upload"> Upload</i> </a>
                          
        <a href="{{url('admin/download_company/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Company Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_companies') || (\Auth::user()->delegate_role == 'Master Data' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_company()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5> 
    <table class="table table-striped table-sm mb-0" id="company_table">
        <thead class="thead-dark">
        <tr>
            <th>Company ID</th>
            <th>Company</th>
            <th>Parent Company</th>
            <th>Contact Person</th>
            <th>Email</th>
            <th>Phone</th>
            <th>RC - Number</th>
            <th>License Expires</th>
            <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
            <th style=""> </th>
        </tr>

        </thead>
        <tbody>
            @if($companys)
                @foreach($companys as $_companys)
                    <tr>   
                        <th>{{strtoupper($_companys->company_code)}}</th> 
                        <th>{{$_companys->company_name}}</th>    
                        <th>@if($_companys->parent_company) {{$_companys->parent_company->company_name}}@endif</th>
                        <th>{{$_companys->contact_name}}</th>  
                        <th>{{$_companys->email}}</th>  
                        <th>{{$_companys->phone}}</th>  
                        <th>{{$_companys->rc_number}}</th>  
                        <th>{{$_companys->license_expire_date}}</th>  
                        <th style="text-align: right;">
                            @if($_companys->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif
                        </th> 
                        <th>
                            <a href="{{route('admin.viewcompanyfields', $_companys->id)}}" class="pull-right" title="View All Field(s) Owned By {{$_companys->concession_name}}" style="font-size:12px" target="_blank"> 
                                <i class="fa fa-briefcase text-inverse m-r-10" data-toggle="tooltip" data-original-title="Click To View All Fields Owned By {{$_companys->concession_name}}" style="color: #666"></i> 
                            </a>
                            <a data-toggle="modal" style="cursor: pointer;" tooltip="true" onclick="load_company({{$_companys->id}})" class="pull-right" title="Edit Company / Operator"> <i class="fa fa-pencil text-inverse m-r-10"></i>  </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$companys->appends(Request::capture()->except('page'))->render() }} 
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
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Company?a='+$approve);
        $('#Company').load('{{url('ajax')}}/Company?a='+$approve);
        sessionStorage.setItem('name','Company'); 
    }
</script>