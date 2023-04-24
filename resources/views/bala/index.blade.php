@extends('layouts.app')

@section('content')






<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Concession Data Upload (BALA)  </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link bala_opls" data-toggle="tab" href="#opl" role="tab" onclick="displayOPL()"> OPL </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bala_omls" data-toggle="tab" href="#oml" role="tab" onclick="displayOML()"> OML </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bala_block" data-toggle="tab" href="#aop" role="tab" onclick="displayBlock()"> Open Blocks </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bala_field" data-toggle="tab" href="#lmf" role="tab" onclick="displayField()"> Marginal Fields </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bala_status" data-toggle="tab" href="#dps" role="tab" onclick="displayStatus()"> Projects Status </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bala_area" data-toggle="tab" href="#aos" role="tab" onclick="displayAOS()"> Area Of Survey </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bala_type" data-toggle="tab" href="#tos" role="tab" onclick="displayTOS()"> Type Of Survey </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active p-3" id="opl" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="bala_opls">     

                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="oml" role="tabpanel">
                        <p class="font-14 mb-0">

                            <div class="row" id="bala_omls">
                                
                            </div> <!-- end row -->

                        </p>
                    </div>

                    <div class="tab-pane p-3" id="aop" role="tabpanel">
                        <p class="font-14 mb-0">

                            <div class="row" id="bala_block">                                 

                            </div> <!-- end row -->

                        </p>
                    </div>

                    <div class="tab-pane p-3" id="lmf" role="tabpanel">
                        <p class="font-14 mb-0">

                            <div class="row" id="bala_field">                                

                            </div> <!-- end row -->

                        </p>
                    </div>

                    <div class="tab-pane p-3" id="dps" role="tabpanel">
                        <p class="font-14 mb-0">

                            <div class="row" id="bala_status">                                

                            </div> <!-- end row -->

                        </p>
                    </div>

                    <div class="tab-pane p-3" id="aos" role="tabpanel">
                        <p class="font-14 mb-0">

                            <div class="row" id="bala_area">                                

                            </div> <!-- end row -->

                        </p>
                    </div>

                    <div class="tab-pane p-3" id="tos" role="tabpanel">
                        <p class="font-14 mb-0">

                            <div class="row" id="bala_type">                                

                            </div> <!-- end row -->

                        </p>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>

</div>













  <!-- Add Area Of Survey  modal -->
<div id="addaos" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <div class="modal-title">  Add Area Of Survey </div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>            
          </div>
      

          <div class="modal-body">
          <form id="aosForm" action="{{url('/bala/add_area_of_survey')}}" method="POST"> @csrf
            {{-- <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> --}}
            <input type="hidden" name="date_aos" id="date_aos" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">

          <div class="form-group row">
            <label for="area_of_survey_name" class="col-sm-2 col-form-label"> Area Of Survey </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Area Of Survey Name" name="area_of_survey_name" id="area_of_survey_name" required>
            </div>
          </div>

      
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_aos_btn" id="add_aos_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Area Of Survey </button>
          </div>
          </form>
        </div>
    
    </div>  
</div>
</div>



<!-- Edit Area Of Survey modal -->
<div id="editarea_of_survey" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header  header_bg"> Edit Area Of Survey</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_areaofsurvey">  </div>
          </div>
    </div>
    </div>  
</div>






  <!-- Add Type Of Survey  modal -->
<div id="addtos" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Type Of Survey </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="tosForm" action="{{url('/bala/add_type_of_survey')}}" method="POST"> @csrf
            {{-- <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> --}}
            <input type="hidden" name="date_tos" id="date_tos" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">

          <div class="form-group row">
            <label for="type_of_survey_name" class="col-sm-2 col-form-label"> Type Of Survey </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Type Of Survey Name" name="type_of_survey_name" id="type_of_survey_name" required>
            </div>
          </div>

      
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_tos_btn" id="add_tos_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Type Of Survey </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Type Of Survey modal -->
<div id="edit_tos" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg"> <h4> Edit Type Of Survey</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edittos"></div>
          </div>
    </div>
    </div>  
</div>



















@endsection

@section('script')
<script type="text/javascript">
    
    $(document).ready(function()
    {
        $('#start_dates').datepicker();
    });


    function showmodal(modalid)
    {
        $('#'+modalid).modal('show');
    }

</script>


<script>   // JAVASCRIPT AJAX FUNCTION

function appendTable(data, tableId)
{

    if(tableId == 'opl_table')
    {
        $('#'+tableId).prepend('<tr>  <td> '+data.id+' </td>  <td> '+data.company+' </td> <td> '+data.concession+' </td> <td> '+data.contract+' </td>  <td> '+data.year_of_award+' </td>  <td> '+data.license_expire_date+' </td>   <td> '+data.area+' </td> <td> '+data.terrain+' </td>  <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <td> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_bala_opl('+data.id+')" class="btn-sm pull-right" title="View Oil Prospecting Licenses"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_opl('+data.id+')" class="btn-sm pull-right" title="Edit (OPL) Oil Prospective License"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>');
            //$('#general_status_id').append('<option value="'+data.id+'"> '+sta+' </option>');
    }
    
    else if(tableId == 'oml_table')
    {
        $('#'+tableId).prepend('<tr> <td> '+data.id+' </td>  <td> '+data.company+'</td><td>'+data.concession+' </td>  <td> '+data.contract+' </td>  <td> '+data.date_of_grant+'</td>  <td> '+data.license_expire_date+' </td>  <td>'+data.area+' </td> <td> '+data.terrain+' </td>  <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <td> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_bala_oml('+data.id+')" class="btn-sm pull-right" title="View Oil Mining Lease"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_oml('+data.id+')" class="btn-sm pull-right" title="Edit (OML) Oil Mining Lease"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>');
    }

    else if(tableId == 'aop_table')
    {
        var _date = document.getElementById('date_aop').value;
        $('#'+tableId).prepend('<tr>  <td> '+data.id+' </td> <td> '+data.year+' </td> <td> '+data.terrain+' </td> <td> '+data.opl_blocks_allocated+' </td> <td> '+data.oml_blocks_allocated+' </td> <td> '+data.blocks_open+' </td>  <td> '+data.total_block+' </td>   <td> '+_date+' </td>  <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <td> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_bala_block('+data.id+')" class="btn-sm pull-right" title="View Allocated and Open Blocks"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_block('+data.id+')" class="btn-sm pull-right" title="Edit Allocated and Open Blocks"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>');
    }

    else if(tableId == 'm_field_table')
    {
        var _date = document.getElementById('date_mf').value;
        $('#'+tableId).prepend('<tr>   <td> '+data.id+' </td>  <td> '+data.company+' </td> <td> '+data.field+' </td> <td> '+data.blocks+' </td>  <td> '+_date+' </td> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <td> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_bala_m_field('+data.id+')" class="btn-sm pull-right" title="View list Of Marginal Fields"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_m_field('+data.id+')" class="btn-sm pull-right" title="Edit list Of Marginal Fields"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>');
    }

    else if(tableId == 'data_ps_table')
    {
        var _date = document.getElementById('date_dps').value;
        $('#'+tableId).prepend('<tr>   <td> '+data.id+' </td>  <td> '+data.company+' </td> <td> '+data.agreement_date+' </td> <td> '+data.area_of_survey+' </td>  <td> '+data.type_of_survey+' </td>  <td> '+data.quantum_of_survey+' </td>  <td> '+data.year_of_survey+' </td> <td> '+_date+' </td>  <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <td> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_bala_project_status('+data.id+')" class="btn-sm pull-right" title="View Multi-Client Data Projects Status"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_project_status('+data.id+')" class="btn-sm pull-right" title="Edit Multi-Client Data Projects Status"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>');
    }

    else if(tableId == 'aos_table')
    {
        var _date = document.getElementById('date_aos').value;
        $('#'+tableId).prepend('<tr>  <td> '+data.id+' </td>  <td> '+data.area_of_survey_name+' </td> <td> '+_date+' </td> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_area_of_survey('+data.id+')" class="btn-sm pull-right" title="Edit Area Of Survey"> <i class="fa fa-pencil"></i>    </a>  </td>    </tr>');
    }

    else if(tableId == 'tos_table')
    {
        var _date = document.getElementById('date_tos').value;
        $('#'+tableId).prepend('<tr>  <td> '+data.id+' </td>  <td> '+data.type_of_survey_name+' </td> <td> '+_date+' </td> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_type_of_survey('+data.id+')" class="btn-sm pull-right" title="Edit Type Of Survey"> <i class="fa fa-pencil"></i>    </a>  </td>    </tr>');
    }

}

//function to process form data
function processForm(formid, route, tableId, progress, modalid)
{

   formdata= new FormData($('#'+formid)[0]);
   formdata.append('_token','{{csrf_token()}}');
  
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
                appendTable(data.message,tableId);
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

        //OPL
        $("#opl_Form").on('submit',function(e)
        {  
            e.preventDefault();
            processForm('opl_Form', "{{url('/bala/add_bala_opl')}}", 'opl_table', 'progressOPL', 'addbala_opl');
        });  


        //OML
        $("#omlForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('omlForm', "{{url('/bala/add_bala_oml')}}", 'oml_table', 'progressOML', 'addbala_oml');
        }); 


        //AOP
        $("#aopForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('aopForm', "{{url('/bala/add_bala_aop')}}", 'aop_table', 'progressAOP', 'addbala_aop');
        }); 


        //M FIELD
        $("#fieldForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('fieldForm', "{{url('/bala/add_marginal_field')}}", 'm_field_table', 'progressMField', 'addbala_m_field');
        });


        //PROJ STAT
        $("#pStatusForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('pStatusForm', "{{url('/bala/add_data_project_status')}}", 'data_ps_table', 'progressStatus', 'addbala_data_ps');
        }); 

        //AREA OF SURVEY
        $("#aosForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('aosForm', "{{url('/bala/add_area_of_survey')}}", 'aos_table', 'progressAOS', 'addaos');
        }); 

        //TYPE OF SURVEY
        $("#tosForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('tosForm', "{{url('/bala/add_type_of_survey')}}", 'tos_table', 'progressTOS', 'addtos');
        });     



    });
</script>




<script type="text/javascript"> //FUNCTIONS TO LOAD EDIT MODALS
    function load_bala_opl(id)
    {   
        $('#edit_balaopl').load("{{url('bala')}}/modals/editBalaOPL?id="+id);
        $('#editbala_opl').modal('show');
    }
    function view_bala_opl(id)
    {   
        $('#viewbalaopl').load("{{url('bala')}}/view/viewBalaOPL?id="+id);
        $('#viewbala_opl').modal('show');
    }

    function load_bala_oml(id)
    {   
        $('#edit_balaoml').load("{{url('bala')}}/modals/editBalaOML?id="+id);
        $('#editbala_oml').modal('show');
    }
    function view_bala_oml(id)
    {   
        $('#viewbalaoml').load("{{url('bala')}}/view/viewBalaOML?id="+id);
        $('#viewbala_oml').modal('show');
    }

    function load_bala_block(id)
    {   
        $('#edit_balaaop').load("{{url('bala')}}/modals/editBalaBlock?id="+id);
        $('#editbala_aop').modal('show');
    }
    function view_bala_block(id)
    {   
        $('#viewbalaaop').load("{{url('bala')}}/view/viewBalaBlock?id="+id);
        $('#view_balaaop').modal('show');
    }

    function load_bala_m_field(id)
    {   
        $('#edit_balamfield').load("{{url('bala')}}/modals/editBalaMarginalField?id="+id);
        $('#editbala_m_field').modal('show');
    }
    function view_bala_m_field(id)
    {   
        $('#vieweditbalamfield').load("{{url('bala')}}/view/viewBalaMarginalField?id="+id);
        $('#view_balamfield').modal('show');
    }

    function load_bala_project_status(id)
    {   
        $('#edit_baladataps').load("{{url('bala')}}/modals/editBalaProjectStatus?id="+id);
        $('#editbala_data_ps').modal('show');
    }
    function view_bala_project_status(id)
    {   
        $('#viewbaladataps').load("{{url('bala')}}/view/viewBalaProjectStatus?id="+id);
        $('#viewbala_data_ps').modal('show');
    }

    function load_bala_area_of_survey(id)
    {   
        $('#edit_areaofsurvey').load("{{url('bala')}}/modals/editBalaAreaOfSurvey?id="+id);
        $('#editarea_of_survey').modal('show');
    }

    function load_bala_type_of_survey(id)
    {   
        $('#edittos').load("{{url('bala')}}/modals/editBalaTypeOfSurvey?id="+id);
        $('#edit_tos').modal('show');
    }


    //Hide alert message box
    $('#succ_alert_msg').hide();     
    $('#err_alert_msg').hide();
</script>




<script type="text/javascript">

    //UPDATE WELL TOTAL
        function checktotal(field) 
        {  
            if (field.value == '') 
            {
                var fid = field.id;
                document.getElementById(fid).value = 0;
                //$('.amount').val(0);
            }         
        }

        $(function()
        {
            $('.block').keyup(function()
            {
                var total = 0;
                $('.block').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_block").val(total);
                console.log(total);
            });
        });


        $(function()
        {        

          $('#month').datepicker(
          {
            format: "M, yyyy",
            viewMode: "months", 
            minViewMode: "months"
          });     

          $('#year_aob').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });     

          $('#agreement_date').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });     

          $('#year_of_survey').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });

        })

</script>


<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script type="text/javascript">
    function displayOPL()
    {
        $('#bala_opls').load('{{url('ajax')}}/bala_opls');
        sessionStorage.setItem('name','bala_opls');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayOML()
    {
        $('#bala_omls').load('{{url('ajax')}}/bala_omls');
        sessionStorage.setItem('name','bala_omls');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayBlock()
    {
        $('#bala_block').load('{{url('ajax')}}/bala_block');
        sessionStorage.setItem('name','bala_block');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayField()
    {
        $('#bala_field').load('{{url('ajax')}}/bala_field');
        sessionStorage.setItem('name','bala_field');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayStatus()
    {
        $('#bala_status').load('{{url('ajax')}}/bala_status');
        sessionStorage.setItem('name','bala_status');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayAOS()
    {
        $('#bala_area').load('{{url('ajax')}}/bala_area');
        sessionStorage.setItem('name','bala_area');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayTOS()
    {
        $('#bala_type').load('{{url('ajax')}}/bala_type');
        sessionStorage.setItem('name','bala_type');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }
    
    
   
      


    function resolveLoad()
    {

        switch (sessionStorage.getItem('name')) 
        {
           case 'bala_opls':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'bala_omls':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'Bala_block':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'bala_field':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'bala_status':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'bala_area':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'bala_type':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;


            default:
                  $('.bala_opls').trigger('click');
                  break;
        }
       
    }
    //

    $(function()
    {     
        resolveLoad();                
    });
</script>



<!-- AJAX DEPENDENCIES -->
<script type="text/javascript">
    $(function()
    {
        //Appending Company Facility For Crude Production
        $('#company_id_mf').change(function(e)
        {
            var company_id = $(this).val();   
              $.get('{{url('getFields')}}?company_id=' +company_id, function(data)
              {  
                $('#field_id').empty();
                $('#field_id').append('<option value=""> Select A Field </option>');  
                $.each(data, function(index, fieldObj)
                {
                  $('#field_id').append('<option value="'+ fieldObj.id +'"> '+ fieldObj.field_name +' </option>');         
                });
              }); 
        });


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