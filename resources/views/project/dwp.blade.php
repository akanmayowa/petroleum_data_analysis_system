@extends('layouts.app')

@section('search')
  <div class="search-wrap" id="search-wrap">
      <div class="search-bar">
        
          <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" />
          <a href="#" class="close-search toggle-search" data-target="#search-wrap">
              <i class="mdi mdi-close-circle" style="font-size:20px"></i>
          </a>
        
      </div>
  </div>
@endsection

@section('content')








<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> DWP Project Data Upload</h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    @if(Auth::user()->role_obj->permission->contains('constant', 'approve_dpr_work_plan') )
                      <li class="nav-item nav-pad">
                          <a class="nav-link update_project" id="up_proj" data-toggle="tab" href="#updateproject" role="tab" onclick="displayUpdateProject()">Update Project</a>
                      </li>
                     <!--  <li class="nav-item">
                          <a class="nav-link manage_project" id="ma_proj" data-toggle="tab" href="#manageproject" role="tab" onclick="displayManageProject()">Manage Project</a>
                      </li> -->
                      <li class="nav-item nav-pad">
                          <a class="nav-link mtss_dpr_pp" id="dprpp" data-toggle="tab" href="#dpr_pp" role="tab" onclick="displayMTSS_DPR_PP()">MTSS DPR PP </a>
                      </li>
                     <!--  <li class="nav-item">
                          <a class="nav-link task_target_count" id="" data-toggle="tab" href="#task" role="tab" onclick="displayTaskTargets()">Task & Targets</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link key_result_area" id="" data-toggle="tab" href="#kra" role="tab" onclick="displayKeyResultArea()">KRA</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link achieved" id="" data-toggle="tab" href="#ach" role="tab" onclick="displayAchieved()">Achieved</a>
                      </li> -->
                    @endif





                      <li class="pull-right" style="width: 100%" id="filter_yrs">
                          <h5 style="margin-left: 5px; color: #aaa"> Projects  
                              <a data-toggle="tooltip" onclick="showmodal('uplmpm')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin: 5px 10px 0px 5px;" class="btn btn-info btn-sm pull-right" data-original-title="Upload Here">  <i class="fa fa-upload"></i> </a>
                          
                                    <select class="form-control pull-right year" name="year" id="year_dwp" style="font-size:12px; width:9%"> 
                                        <option value=""> Filter By Year </option>                                        
                                        @if($years)
                                            @foreach($years as $years)  
                                               <option value="{{$years->year}}"> {{$years->year}} </option>
                                            @endforeach
                                        @endif
                                    </select>  

                                    <input type="hidden" name="pp" id="pp" value=""> <input type="hidden" name="idd" id="idd" value="">  {{ csrf_field() }} 
                          </h5>
                      </li>
                    @endif
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active p-3" id="updateproject" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="update_project">
                            
                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="manageproject" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="manage_project">
                            
                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="dpr_pp" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="mtss_dpr_pp">
                            
                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="task" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="task_target_count">
                            
                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="kra" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="key_result_area">
                            
                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="ach" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="achieved">
                            
                            </div> <!-- end row -->
                        </p>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>

</div>


@include('modals.addDWPProjectProgress')



<!-- Add project modal -->
    

<?php  $dwp = DB::table('dwp')->get(); ?>
<!-- Edit project modal -->
@if(count($dwp) > 0)
@foreach($dwp as $dwp)

<!-- Edit status modal -->
    <div id="upd_sta{{$dwp->id}}" class="modal fade" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Are You Sure You Want To Update</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="" action="{{url('/project/editstatus')}}" method="POST">
            {{ csrf_field() }}
            <input type="text" name="id" id="id" value="{{$dwp->id}}">
            <input type="text" name="progress" id="progress{{$dwp->id}}" value="">
            <input type="text" name="_date" id="_date" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="submit" name="update_status_btn" id="update_status_btn" class="btn btn-success"> Yes</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
  </div>

@endforeach
@endif








<!-- PROJECT UPDATE -->
<!-- View project modal -->
<div id="view_proj" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">View DWP Project</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewproj">  </div>
          </div>
    </div>
    </div>  
</div>




<!-- PROJECT MODAL -->
<!-- Add MTSS DPR Program Priority modal -->
<div id="adddpr_pp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add DPR Program Priority</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>

          <div class="modal-body">
          <form id="dprPpForm" action="{{url('/project/add_mtss_dpr_pp')}}" method="POST">
            {{ csrf_field() }}


          <div class="form-group row">
            <label for="policy_objective" class="col-sm-2 col-form-label"> Policy Objectives </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="2016-2020 MTSS Policy Objectives" name="policy_objective" id="policy_objective" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="zbb_pillar" class="col-sm-2 col-form-label"> MTSS DPR PP </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Zero Based Budget Set By FGN" name="zbb_pillar" id="zbb_pillar" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="zbb_pp" class="col-sm-2 col-form-label"> ZBB PP </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Zero Based Budget Program Priority" name="zbb_pp" id="zbb_pp" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="zbb_spp" class="col-sm-2 col-form-label"> ZBB SPP </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Zero Bassed Budget Sub-Programme Priority" name="zbb_spp" id="zbb_spp" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="dwp_pp" class="col-sm-2 col-form-label"> DWP PP </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="DPR Work Plan- Program Priority" name="dwp_pp" id="dwp_pp" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="kpi" class="col-sm-2 col-form-label"> KPIs </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="2016-2020 MTSS Policy Objectives" name="kpi" id="kpi" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="kpi_performance" class="col-sm-2 col-form-label"> Performance </label>
            <div class="col-sm-10">
                <select class="form-control" name="kpi_performance" id="kpi_performance" required>
                    <option value="">Select KPI Performance</option>
                    <option value="0%"> 0% </option>
                    <option value="25%"> 25% </option>
                    <option value="50%"> 50% </option>
                    <option value="75%"> 75% </option>
                    <option value="100%"> 100% </option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="responsible_division" class="col-sm-2 col-form-label"> Division </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Responsible Division" name="responsible_division" id="responsible_division" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="critical_linkage" class="col-sm-2 col-form-label"> Linkage </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Critical Linkage" name="critical_linkage" id="critical_linkage" required>
            </div>
          </div>
          


          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_dpr_btn" id="add_dpr_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add DPR Program Priority </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit MTSS DPR Program Priorit modal -->
<div id="editdpr_pp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit MTSS DPR Program Priority</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_dpr_pp">  </div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload MTSS DPR Program Priority modal -->
<div id="upldpr_pp" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload DPR Program Priority Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{route('project.upload_mtss_dpr_pp')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />
                    <input type="button" value="Download Excel Template" class="btn btn-dark pull-right" />
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- View MTSS DPR Program Priorit modal -->
<div id="view_dpr_pp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">View MTSS DPR Program Priority</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewdpr_pp">  </div>
          </div>
    </div>
    </div>  
</div>














@endsection

@section('script')


<script>   // JAVASCRIPT FUNCTION TO ADD NEW STATUS CATEGORY
    $(function()
    {
        //DWP PROJECT
        $("#add_dwp_btn").click(function()
        { 
              var alignment_id = $("#alignment_id").val();
              var division_id = $("#division_id").val();
              var program_priority_id = $("#program_priority_id").val();
              var general_status_id = $("#general_status_id").val();
              var start_date = $("#start_date_add").val();
              var end_date = $("#end_date_add").val();
              var critical_path_activity = $("#critical_path_activity").val();
              var cost_benefit_factor = $("#cost_benefit_factor").val();
              var restricting_factor = $("#restricting_factor").val();
              var token = $("#token_dwp").val();

              $.ajax(
                  {                  
                      type: "post",
                      data: "alignment_id=" + alignment_id + "&division_id=" + division_id + "&program_priority_id=" + program_priority_id + "&general_status_id=" + general_status_id + "&start_date=" + start_date + "&end_date=" + end_date + "&critical_path_activity=" + critical_path_activity + "&cost_benefit_factor=" + cost_benefit_factor + "&restricting_factor=" + restricting_factor + "&_token=" + token,
                      url: "<?php echo url('/project/addproject') ?>",
                      success:function(data)
                      {  
                          alert('New DWP Project Saved');

                          var tot_DWP = document.getElementById('tot_DWP').value;
                          var alignment_id = document.getElementById('alignment_id').value;
                          var division_id = document.getElementById('division_id').value;
                          var program_priority_id = document.getElementById('program_priority_id').value;
                          var general_status_id = document.getElementById('general_status_id').value;
                          var start_date = document.getElementById('start_date_add').value;
                          var end_date = document.getElementById('end_date_add').value;
                          var critical_path_activity = document.getElementById('critical_path_activity').value;
                          var cost_benefit_factor = document.getElementById('cost_benefit_factor').value;
                          var restricting_factor = document.getElementById('restricting_factor').value;
                          var date_dwp = document.getElementById('date_dwp').value;    

                          $('#project_table').prepend('<tr>  <td>'+tot_DWP+' </td>  <td>'+alignment_id+' </td>  <td>'+division_id+' </td>  <td>'+program_priority_id+' </td>  <td>'+general_status_id+' </td>  <td>'+start_date+' </td>  <td>'+end_date+' </td>  <td>'+critical_path_activity+' </td>  <td>'+cost_benefit_factor+' </td>  <td>'+restricting_factor+' </td> <td>'+date_dwp+' </td>  </tr>');

                          //window.location.reload(true); 
                      }    
                  }
              )
              $('#addproj').modal('hide');
            return false;
          
        });
        
    });    
</script>












<script>
  function checkEmpty(val){
    if($('#'+val).val()==''){

      return true;
    }
    return false;

  }
    $(function()
    {

$('#add_dwp_progress').click(function(){


      if(checkEmpty('division_id') || checkEmpty('alignment_id') || checkEmpty('progress_month')|| checkEmpty('achievement_status_id') ){
          return toastr.error('Please fill all fields');
      }

          comfirm = confirm('Please confirm if you want to add progress');
 
    if(confirm){
        
         processForm('submitDWPProgress','{{url('dwp')}}',0,'progress','addproj');
         return
      }
      
         return toastr.info('Operation Cancelled');
 
}); 




    $('#division_id').change(function(){

        $divisionId = $('#division_id').val();
        formData = {

            divisionid:$divisionId,
            _token:'{{csrf_token()}}',
            type:'getAlignmentByDivision',

        }

        $.post('{{url('dwp')}}',formData,function(data){
            $.each(data,function(index,element){

              $('#alignment_id').append('<option value="'+element.id+'"> '+element.alignment.alignment_name+' </option>');

            })
        })
    })

      $('#progress_month').datepicker(
          {
             @if(Auth::user()->role_obj->id==8)  format: "yyyy-MM", @else format: "MM", @endif
              viewMode: "months", 
              minViewMode: "months"
          });
 
        //disable all checkbox1 buttons
        //$("input.checkbox1").attr("disabled", "disabled");


        $('#selectall').on('change', function()
        {
             if(this.checked) // if changed state is "CHECKED"
            {
                $('.checkbox1').each(function() 
                {
                    this.checked = true;
                });
            }
             else// if changed state is "UN CHECKED"
            {
                $('.checkbox1').each(function() 
                {
                    this.checked = false;
                });
            }
        });



        //function to hide filter by year div
        $('#up_proj').click(function()
        {
            $('#filter_yrs').hide()
        })

        $('#ma_proj').click(function()
        {
            $('#filter_yrs').show()
        })

        $('#dprpp').click(function()
        {
            $('#filter_yrs').hide()
        })


    })
</script>





<script>   // JAVASCRIPT AJAX FUNCTION

function appendTable(data, tableId)
{

    if(tableId == 'dpr_pp_table')
    {    
        $('#'+tableId).prepend('<tr>  <th>'+data.id+' </th>  <th>'+data.policy_objective+' </th>  <th>'+data.zbb_pillar+' </th>  <th>'+data.zbb_pp+' </th>  <th>'+data.zbb_spp+' </th>  <th>'+data.dwp_pp+' </th>  <th> '+data.kpi+' </th>  <th>'+data.kpi_performance+' </th>  <th>'+data.responsible_division+' </th>  <th>'+data.critical_linkage+' </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#fff; font-size:10px" tooltip="true" onclick="view_dpr_pp('+data.id+')" class="btn-sm pull-right" title="View MTSS DPR Program Priority"> <i class="fa fa-eye"></i>    </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_dpr_pp('+data.id+')" class="btn-sm pull-right" title="Edit MTSS DPR Program Priority"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>'); 
    }

}



//function to process form data
function processForm(formid, route, tableId, progress, modalid)
{

   formdata= new FormData($('#'+formid)[0]);
   formdata.append('_token', '{{csrf_token()}}');
  
    $.ajax(
    {
        // Your server script to process the upload
        url: route,
        type: 'POST',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data, status, xhr)
        {
            if(data.status=='ok')
            {
              if(tableId!=0){
                appendTable(data.message,tableId);

                }
                else{
                  window.location.reload();
                }
                $('#'+modalid).modal('hide');
                toastr.info(data.info, {timeOut:10000});
                return;
            }
           
            return toastr.error(data.info, {timeOut:10000});

        },
        // Custom XMLHttpRequest
        xhr: function() 
        {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) 
            {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function(e) 
                {
                    if (e.lengthComputable) 
                    {
                        percent=Math.round((e.loaded/e.total)*100,2);
                        $('#'+progress).css('width',percent+'%');
                        $('#'+progress+'_text').text(percent+'%');
                    }
                }, false);
            }
            return myXhr;
        }
    })

}





$(function()
{            
    //DWP Project
    $("#dprPpForm").on('submit', function(e)
    { 
        e.preventDefault(e);
        processForm('dprPpForm', "{{url('/project/add_mtss_dpr_pp')}}", 'dpr_pp_table', 'progressDPR_PP', 'adddpr_pp');
    });

});
</script>


<script type="text/javascript"> //FUNCTIONS TO LOAD EDIT MODALS
    function load_dpr_pp(id)
    {   
        $('#edit_dpr_pp').load("{{url('project')}}/modals/editMTSS_DPR_PP?id="+id);
        $('#editdpr_pp').modal('show');
    }
    function view_dwp_projects(id)
    {   
        $('#viewproj').load("{{url('project')}}/view/viewDWPProject?id="+id);
        $('#view_proj').modal('show');
    }


    function view_dpr_pp(id)
    {   
        $('#viewdpr_pp').load("{{url('project')}}/view/viewMTSS_DPR_PP?id="+id);
        $('#view_dpr_pp').modal('show');
    }
</script>


<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script type="text/javascript">
  $(function(){

    $('#dynamicsearch').on('keyup',function(){

    
      name=sessionStorage.getItem('name');

      q=$('#dynamicsearch').val().replace(' ','%20');
      
      if(name=='update_project'){
        displayUpdateProject(q);
      }
      else if(name=='mtss_dpr_pp'){
        displayMTSS_DPR_PP(q);
      }
       
      
    
    })

  })
    function displayUpdateProject($searchquery=0)
    {
        $('#update_project').load('{{url('ajax')}}/update_project?q='+$searchquery);
        sessionStorage.setItem('name','update_project'); 
    }

    function displayManageProject($searchquery=0)
    {
        $('#manage_project').load('{{url('ajax')}}/manage_project?q='+$searchquery);
        sessionStorage.setItem('name','manage_project'); 
    }

    function displayMTSS_DPR_PP($searchquery=0)
    {
        $('#mtss_dpr_pp').load('{{url('ajax')}}/mtss_dpr_pp?q='+$searchquery);
        sessionStorage.setItem('name','mtss_dpr_pp'); 
    }

    function displayTaskTargets($searchquery=0)
    {
        $('#task_target_count').load('{{url('ajax')}}/task_target_count?q='+$searchquery);
        sessionStorage.setItem('name','task_target_count'); 
    }

    function displayKeyResultArea($searchquery=0)
    {
        $('#key_result_area').load('{{url('ajax')}}/key_result_area?q='+$searchquery);
        sessionStorage.setItem('name','key_result_area'); 
    }

    function displayAchieved($searchquery=0)
    {
        $('#achieved').load('{{url('ajax')}}/achieved?q='+$searchquery);
        sessionStorage.setItem('name','achieved'); 
    }
   
   
   
    
   
      


    function resolveLoad()
    {

        switch (sessionStorage.getItem('name')) 
        {
           case 'update_project':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break; 

           case 'manage_project':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;  

           case 'mtss_dpr_pp':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;   

           case 'task_target_count':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break; 

           case 'key_result_area':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break; 

           case 'achieved':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break; 

            

            default:
                  $('.update_project').trigger('click');
                  break; 
        }
       
    }
    //

    $(function()
    {     
        resolveLoad();                
    }); 

</script>




    @if(Session::has('info'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif





@endsection

