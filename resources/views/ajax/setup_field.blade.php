<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Fields  
        <a data-toggle="tooltip" onclick="showmodal('addfield')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Fields / Marginal Fields Here">  <i class="fa fa-plus"> New</i> </a>
           
        <a data-toggle="tooltip" onclick="showmodal('upl_field', sessionStorage.getItem('url'), 'downloadFieldTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Field Here">  <i class="fa fa-upload"> Upload</i> </a>
           
        <a href="{{url('admin/download_field/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Field Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_fields') || (\Auth::user()->delegate_role == 'Master Data' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_field()" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5> 
    <table class="table table-striped table-sm mb-0" id="field_table">
        <thead class="thead-dark">
        <tr>
            <th>Field Code</th>
            <th>Field Name</th>
            <th>Concession / Block</th>
            <th>Company</th>
            <th>Contract</th>
            <th>Terrain</th>
            <th>Created On</th>
            <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
            <th style="">  </th>
        </tr>

        </thead>
        <tbody>
            @if($fields)
                @foreach($fields as $_fields)
                    <tr> 
                        <th>{{strtoupper($_fields->field_code)}}</th> 
                        <th>{{$_fields->field_name}}</th>   
                        <th>{{$_fields->concession?$_fields->concession->concession_name:''}}</th>    
                        <th>{{$_fields->company?$_fields->company->company_name:''}}</th>   
                        <th>{{$_fields->contract?$_fields->contract->contract_name:''}}</th>   
                        <th>{{$_fields->terrain?$_fields->terrain->terrain_name:''}}</th>   
                        <th>{{\Carbon\Carbon::parse($_fields->created_at)->diffForHumans()}}</th> 
                        <th style="text-align: right;">
                            @if($_fields->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif
                        </th>   
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_field({{$_fields->id}})" class="btn-sm pull-right" title="Edit Fields / Marginal Fields"> <i class="fa fa-pencil"></i>  </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$fields->appends(Request::capture()->except('page'))->render() }} 
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
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Field?a='+$approve);
        $('#Field').load('{{url('ajax')}}/Field?a='+$approve);
        sessionStorage.setItem('name','Field'); 
    }
</script>