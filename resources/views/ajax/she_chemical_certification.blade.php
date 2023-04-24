<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> CERTIFICATION OF OIL FIELD CHEMICALS
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_app_chemical')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Request For Approvals – Chemicals Here">  <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('upl_app_chemical', sessionStorage.getItem('url'),'downloadApplicationChemicalTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" 
            data-original-title="Upload Request For Approvals – Chemicals Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_chemical_certification/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Request For Approvals – Chemicals Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_spill_incidence') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_chem_cert()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="chem_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Company</th>
                    <th>Chemical Name</th>
                    <th>Certification Category</th>
                    <th>Chemical Type</th>
                    <th>Certification Date</th>
                    <th>Approval Status</th>
                    <th>Remark</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>

            </thead>
            <tbody>
                @if($chemical_certification)
                    @foreach($chemical_certification as $_chemical_certification)
                    @php $unResolved = request()->user()->unResolved($_chemical_certification->id, 'she_chemical_certification'); @endphp
                        <tr >
                            <th>{{$_chemical_certification->year}}</th>
                            <th>{{$_chemical_certification->month}}</th>
                            @if($_chemical_certification->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                                @if($_chemical_certification->company_id == 0)
                                <th>{{$_chemical_certification->others}}</th> 
                                @else                             
                                <th>{{substr($_chemical_certification->company?$_chemical_certification->company->company_name:'', 0, 30)}}
                                </th> 
                                @endif
                            @endif
                            <th>{{$_chemical_certification->chemical_name}}</th> 
                            @if($_chemical_certification->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th>{{$_chemical_certification->category?$_chemical_certification->category->category_name:''}}</th>
                            @endif
                            <th>{{$_chemical_certification->chemical_type}}</th>
                            <th>{{$_chemical_certification->certification_date}}</th> 
                            <th>{{$_chemical_certification->status_id}}</th> 
                            <th>{{$_chemical_certification->remark}}</th> 
                            <th style="text-align: right;">
                                @if($_chemical_certification->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>  
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_chemical_certification', {{$_chemical_certification->id}})" class="btn-sm pull-right" title="Delete Chemical Certification"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_chemical_certification({{$_chemical_certification->id}})" class="btn-sm pull-right" title="Edit Request For Chemical Certification"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$chemical_certification->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/chemical_certification?p='+$pending);
        $('#chemical_certification').load('{{url('ajax')}}/chemical_certification?p='+$pending);
        sessionStorage.setItem('name','chemical_certification'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/chemical_certification?a='+$approve);
        $('#chemical_certification').load('{{url('ajax')}}/chemical_certification?a='+$approve);
        sessionStorage.setItem('name','chemical_certification'); 
    } 
</script>