<div class="table-responsive">        <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Status of Licensed Refinery Projects 
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_ref_proj')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Status of Licensed Refinery Projects Here"> <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('upl_ref_proj', sessionStorage.getItem('url'),'downloadRefineryProjectTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Status of Licensed Refinery Projects Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('transport/download_refinery_project/xlsx')}}" data-toggle="tooltip" style="margin-right:5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Status of Licensed Refinery Projects Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_license_refinery_proj') || (\Auth::user()->delegate_role == 'Project and Transportation (E&S)' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_ref_project()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>    </form>
        <table class="table table-striped table-sm mb-0" id="refproj_table">
            <thead class="thead-dark">
                <tr>                                                     
                    <th>Year</th>
                    <th>Project Name</th>
                    <th>Plant Location</th>
                    <th>Capacity <i class="units">(BPSD)</i> </th>   
                    <th>Refinery Type </th>  
                    <th>License Granted</th>                          
                    <th>Commissioning Date</th>                           
                    <th>License Validity</th>                           
                    <th>License Expiry Date</th>                    
                    <th>Status Remark</th>  
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>     
                    <th style="">  </th>      
                </tr>
            </thead>
            <tbody>
                @if($license_ref_project)
                    @foreach($license_ref_project as $_license_ref_project)
                        @php $unResolved = request()->user()->unResolved($_license_ref_project->id, 'es_licensed_refinery_project'); @endphp
                        <tr>
                            <th>{{$_license_ref_project->year}}</th> 
                            <th>{{$_license_ref_project->project_name}}</th> 
                            <th>
                                {{$_license_ref_project->field_id}}
                            </th> 
                            <th data-toggle="tooltip" title="In BPSD">{{number_format($_license_ref_project->capacity, 1)}}</th> 
                            <th>{{$_license_ref_project->refinery_type}}</th> 
                            <th>{{$_license_ref_project->license_granted}}</th> 
                            <th>{{$_license_ref_project->estimated_completion}}</th>
                            @if($_license_ref_project->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th>{{$_license_ref_project->validity?$_license_ref_project->validity->status_name:''}} </th>
                            @endif
                            <th>{{$_license_ref_project->license_expiration_date}}</th> 
                            <th>{{$_license_ref_project->status_remark}}</th> 
                            <th style="text-align: right;">
                                @if($_license_ref_project->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\es_licensed_refinery_project', {{$_license_ref_project->id}})" class="btn-sm pull-right" title="Delete Refinery Projects Record"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_refinery_project({{$_license_ref_project->id}})" class="btn-sm pull-right" title="View Status of Licensed Refinery Projects"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_refinery_project({{$_license_ref_project->id}})" class="btn-sm pull-right" title="Edit Status of Licensed Refinery Projects"> <i class="fa fa-pencil"></i> </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$license_ref_project->appends(Request::capture()->except('page'))->render() }} 
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

 
        $("#searchBtn").on('mouseover', function(e)
        { 
            var search_text = $('#dynamicsearch').val(); 
            formData = 
            {
                search_text:search_text,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('download-search-data')}}', formData, function(data, status, xhr) { });       
        }); 
    });

    //SORT SCRIPT
    sortAscDesc();

    function sortByUnresolved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/license_ref_project?p='+$pending);
        $('#license_ref_project').load('{{url('ajax')}}/license_ref_project?p='+$pending);
        sessionStorage.setItem('name','license_ref_project'); 
    }
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/license_ref_project?a='+$approve);
        $('#license_ref_project').load('{{url('ajax')}}/license_ref_project?a='+$approve);
        sessionStorage.setItem('name','license_ref_project'); 
    }
</script>