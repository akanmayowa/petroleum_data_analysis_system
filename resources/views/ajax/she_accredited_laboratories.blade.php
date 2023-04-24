<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Accredited Laboratories
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_acc_laboratories')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Accredited Laboratories Here">  <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('upl_acc_laboratories', sessionStorage.getItem('url'),'downloadAccreditedLaboratoriesTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" 
            data-original-title="Upload Accredited Laboratories Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_accredited_laboratories/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Accredited Laboratories Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_spill_incidence') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_acc_lab()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="acc_lab_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Laboratory Name</th>
                    <th>Laboratory Services</th>
                    <th>Zones</th>
                    {{-- <th>Number of Accredited Lab</th> --}}
                    <th>Request</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>

            </thead>
            <tbody>
                @if($accredited_laboratories)
                    @foreach($accredited_laboratories as $_accredited_laboratories)
                    @php $unResolved = request()->user()->unResolved($_accredited_laboratories->id, 'she_accredited_laboratory'); @endphp
                        <tr >
                            <th>{{$_accredited_laboratories->year}}</th>
                            <th>{{$_accredited_laboratories->month}}</th>
                            <th>{{$_accredited_laboratories->laboratory_name}}</th>
                            <th>{{$_accredited_laboratories->laboratory_services}}</th>
                            @if($_accredited_laboratories->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th>
                                {{$_accredited_laboratories->field_office?$_accredited_laboratories->field_office->field_office_name:''}}
                            </th>
                            @endif
                            {{-- <th>{{$_accredited_laboratories->no_of_accredited_lab}}</th> --}}
                            <th>{{$_accredited_laboratories->request_type}}</th> 
                            <th style="text-align: right;">
                                @if($_accredited_laboratories->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th> 
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_accredited_laboratory', {{$_accredited_laboratories->id}})" class="btn-sm pull-right" title="Delete Accredited Laboratories"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_accredited_laboratories({{$_accredited_laboratories->id}})" class="btn-sm pull-right" title="Edit Accredited Laboratories"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$accredited_laboratories->appends(Request::capture()->except('page'))->render() }} 
    </div> <!-- end col -->



<script>
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
        sessionStorage.setItem('url','{{url('ajax')}}/accredited_laboratories?p='+$pending);
        $('#accredited_laboratories').load('{{url('ajax')}}/accredited_laboratories?p='+$pending);
        sessionStorage.setItem('name','accredited_laboratories'); 
    }
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/accredited_laboratories?a='+$approve);
        $('#accredited_laboratories').load('{{url('ajax')}}/accredited_laboratories?a='+$approve);
        sessionStorage.setItem('name','accredited_laboratories'); 
    }  
</script>