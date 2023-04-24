<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Approved Safety And Medical Emergency Training Centres
        <a data-toggle="tooltip" onclick="showmodal('add_med_center')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Medical Training Center Here">  <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('upl_med_center', sessionStorage.getItem('url'),'downloadMedicalTrainingCenterTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" 
            data-original-title="Upload Medical Training Center Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_medical_training_center/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Medical Training Center Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_spill_incidence') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_med_training_center()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>
        <table class="table table-striped table-sm mb-0" id="med_cen_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Companies</th>
                    <th>Facility Location Address</th>
                    <th>Approved Courses</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>
            </thead>
            <tbody>
                @if($medical_training_center)
                    @foreach($medical_training_center as $_medical_training_center)
                        <tr >
                            <th>{{$_medical_training_center->year}}</th>
                            <th>{{$_medical_training_center->companies}}</th>
                            <th>{{$_medical_training_center->facility_address}}</th>
                            <th>{{$_medical_training_center->approved_courses}}</th> 
                            <th style="text-align: right;">
                                @if($_medical_training_center->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>   
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_medical_training_center', {{$_medical_training_center->id}})" class="btn-sm pull-right" title="Delete Medical Training Center"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_medical_training_center({{$_medical_training_center->id}})" class="btn-sm pull-right" title="Edit Medical Training Center"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$medical_training_center->appends(Request::capture()->except('page'))->render() }} 
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

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/medical_training_center?a='+$approve);
        $('#medical_training_center').load('{{url('ajax')}}/medical_training_center?a='+$approve);
        sessionStorage.setItem('name','medical_training_center'); 
    } 
</script>