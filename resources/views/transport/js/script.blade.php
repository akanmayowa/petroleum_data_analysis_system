<script>
    
    $(function()
    {

        $('.year').datepicker(
        {
          autoclose: true,
          startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        })


        //show others
        $('.other').hide();
        $("#company_id_ppp").on('change',function(e)
        { 
            var comp = $('#company_id_ppp').val();
            if(comp == 0){ $('.other').show(); }else if(comp != 0){ $('.other').hide(); }
        });

        $('.other_up').hide();
        $("#company_id_up").on('change',function(e)
        { 
            var comp = $('#company_id_up').val();
            if(comp == 0){ $('.other_up').show(); }else if(comp != 0){ $('.other_up').hide(); }
        });


        $('.o_detail').hide();
        $("#owner_id").on('change',function(e)
        { 
            var comp = $('#owner_id').val();
            if(comp == 0){ $('.o_detail').show(); }else if(comp != 0){ $('.o_detail').hide(); }
        });

        $('.other_me').hide();
        $("#company_id_me").on('change',function(e)
        { 
            var comp = $('#company_id_me').val();
            if(comp == 0){ $('.other_me').show(); }else if(comp != 0){ $('.other_me').hide(); }
        });

        $('.other_tech').hide();
        $("#company_id_tech").on('change',function(e)
        { 
            var comp = $('#company_id_tech').val();
            if(comp == 0){ $('.other_tech').show(); }else if(comp != 0){ $('.other_tech').hide(); }
        });

        $('.other_field').hide();
        $("#location_id_tech").on('change',function(e)
        { 
            var loc = $('#location_id_tech').val();
            if(loc == 0){ $('.other_field').show(); }else if(loc != 0){ $('.other_field').hide(); }
        });


        $('#start_dates').datepicker();


        

    });


    function showmodal(modalid,url=0,hrefid=0)
    {
      if(url!=0){
      $('#'+hrefid).attr('href',url);
      }

        $('#'+modalid).modal('show');
    }

</script>


<script>   // JAVASCRIPT AJAX FUNCTION

function appendTable(data, tableId)
{
   
    if(tableId == 'oil_plant_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.project+' </th>  <th> '+data.location+' </th> <th> '+data.company+' </th>  <th> '+data.terrain+' </th>  <th> '+data.expected_oil+' </th>  <th> '+data.expected_gas+' </th>  <th> '+data.expected_water+' </th>  <th> '+data.expected_efi+' </th> <th> '+data.facility_type+' </th>   <th> '+data.development_type+' </th>  <th> '+data.completion_date+' </th>  <th> '+data.status+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_oil_plant('+data.id+')" class="btn-sm pull-right" title="View Upstream Projects"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_oil_plant('+data.id+')" class="btn-sm pull-right" title="Edit Upstream Projects"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'refproj_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.project_name+' </th> <th> '+data.field+' </th>  <th> '+data.capacity+' </th> <th> '+data.refinery_type+' </th>  <th> '+data.license_granted+' </th>  <th> '+data.estimated_completion+' </th>  <th> '+data.license_validity+' </th>  <th> '+data.license_expiration_date+' </th>  <th> '+data.status_remark+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_refinery_project('+data.id+')" class="btn-sm pull-right" title="View Status of License Refinery Projects"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_refinery_project('+data.id+')" class="btn-sm pull-right" title="Edit Status of License Refinery Projects"> <i class="fa fa-pencil"></i>   </a>  </th>   </tr>');
    }

    else if(tableId == 'down_plant_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.company+' </th>  <th> '+data.location+' </th> <th> '+data.plant_name+' </th>  <th> '+data.plant_type+' </th>  <th> '+data.capacity_by_unit+' </th>  <th> '+data.output_yield+' </th>  <th> '+data.status+' </th>  <th> '+data.start_year+' </th>  <th> '+data.estimated_completion+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_down_plant('+data.id+')" class="btn-sm pull-right" title="View Major Petrochemical Plant Projects"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_down_plant('+data.id+')" class="btn-sm pull-right" title="Edit Major Petrochemical Plant Projects"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'gas_plant_table')
    {
         // <th> '+data.lng+' </th>  <th> '+data.ng+' </th>  <th> '+data.cng+' </th>  <th> '+data.lpg+' </th>  <th> '+data.ngr+' </th>  <th> '+data.condensate+' </th>  <th> '+data.fertilizer+' </th>  <th> '+data.petrochemical+' </th> 
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.project_title+' </th>  <th> '+data.company+' </th>  <th> '+data.location+' </th>  <th> '+data.start_date+' </th>  <th> '+data.end_date+' </th>  <th> '+data.status+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_plant('+data.id+')" class="btn-sm pull-right" title="View Gas Projects"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_gas_plant('+data.id+')" class="btn-sm pull-right" title="Edit Gas Projects"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'pipe_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.pipeline_name+' </th>  <th> '+data.owner+' </th>   <th> '+data.origin+' </th> <th> '+data.destination+' </th>  <th> '+data.nominal_size+' </th>  <th> '+data.length+' </th>  <th> '+data.process_fluid+' </th>  <th> '+data.start_date+' </th>  <th> '+data.commissioning_date+' </th>  <th> '+data.status+' </th>  <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_pipeline_project('+data.id+')" class="btn-sm pull-right" title="View Pipeline Projects"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_pipeline_project('+data.id+')" class="btn-sm pull-right" title="Edit Pipeline Projects"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'meter_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.facility+' </th>  <th> '+data.company+' </th>  <th> '+data.objective+' </th> <th> '+data.service+' </th>  <th> '+data.phase+' </th>  <th> '+data.start_date+' </th>  <th> '+data.commissioning_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_metering_project('+data.id+')" class="btn-sm pull-right" title="View Metering Projects"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_metering_project('+data.id+')" class="btn-sm pull-right" title="Edit Metering Projects"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'tech_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.technology+' </th>  <th> '+data.application+' </th>  <th> '+data.adoptation_date+' </th> <th> '+data.company+' </th>  <th> '+data.location+' </th>  <th> '+data.status+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_technology('+data.id+')" class="btn-sm pull-right" title="View Technology Adoptation"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_technology('+data.id+')" class="btn-sm pull-right" title="Edit Technology Adoptation"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
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
                toastr.success(data.info, {timeOut:10000});
                return;

                //alert(data.info);
            }

            return toastr.error(data.info, {timeOut:10000});
            // if(data.status == 'error')
            // {
            //      alert(data.info);
            // }
           

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



//function to process form data
function editForm(formid, route, modalid)
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
            $('#'+modalid).modal('hide');
            toastr.success('Success, Record Has Been Updaded', {timeOut:10000});
           
            //return toastr.error(data.info, {timeOut:10000});
        },
    })

}



//function to process form data
function approveForm(formid, route, modalid, modal)
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
                $('#'+modalid).modal('hide');    $('#'+modal).modal('hide');
                toastr.success(data.info, {timeOut:60000});
                return;

                //alert(data.info);
            }

            return toastr.error(data.info, {timeOut:60000});
            // if(data.status == 'error')
            // {
            //      alert(data.info);
            // }
           

        },
    })

}





//function to delete a single record
function deleteRecord(model, id)
{
    if(confirm('Are you sure you want to DELETE this record?'))
    {
        id = id;
        model = model;
        formData = 
        {
            id:id,
            model:model,
            _token:'{{csrf_token()}}'
        }

          
       $.ajax({
           
           url:'{{url('/transport/delete-record')}}',
           type:'POST',
           data:formData,
           success:function(data)
           {
              if(data.status=='ok')
              {
                  toastr.success(data.info);
                  displayFunction(model);
              }
              else{ toastr.error(data.message); }
           },
           error:function(data)
           {
               toastr.error('Error occurred : ' + data.responseJSON.message);
           } 

       });   

    }
}

//Function to map which page to reload
function displayFunction(model)
{
   switch(model) 
   {
    case '\App\\es_metering': displayMetering();  break;
    case '\App\\es_pipeline_project': displayPipeline();  break;
    case '\App\\es_licensed_refinery_project': displayLicenseRefineryProject();  break;
    case '\App\\es_technology': displayTechnology();  break;
    case '\App\\up_processing_plant_project': displayUpstreamProject();  break;

    default:
      // code block
    }
}





    $(function()
    {   
      //GAS PLANT
      $("#oilplantForm").on('submit',function(e)
      { 
          e.preventDefault();
          processForm('oilplantForm', "{{url('/transport')}}", 'oil_plant_table', 'progressGasPlant', 'add_oil_plant');
      }); 
    $("#appUpmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appUpmodal', "{{url('/transport')}}", 'appup', 'appupmodal');
    });

      //REFINERY PROJECT
      $("#refProjForm").on('submit',function(e)
      { 
          e.preventDefault();
          processForm('refProjForm', "{{url('/transport')}}", 'refproj_table', 'progress', 'add_ref_proj');
      }); 
    $("#appRefProjmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appRefProjmodal', "{{url('/transport')}}", 'apprefproj', 'apprefprojmodal');
    });

      //Down PLANT
      $("#downppForm").on('submit',function(e)
      { 
          e.preventDefault();
          processForm('downppForm', "{{url('/transport')}}", 'down_plant_table', 'progressGasPlant', 'add_down_plant');
      }); 
    $("#appPetProjmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appPetProjmodal', "{{url('/transport')}}", 'apppetproj', 'apppetprojmodal');
    });

    //GAS PLANT
    $("#gasplantForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('gasplantForm', "{{url('/transport')}}", 'gas_plant_table', 'progressGasPlant', 'addgas_plant');
    }); 
    $("#appGasProjmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appGasProjmodal', "{{url('/transport')}}", 'appgasproj', 'appgasprojmodal');
    });

    //Pipeline Project
    $("#pipeForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('pipeForm', "{{url('/transport')}}", 'pipe_table', 'progresspipelinePlant', 'addpipe');
    });
    $("#appPipemodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appPipemodal', "{{url('/transport')}}", 'apppipe', 'apppipemodal');
    });

    //Metering Project
    $("#meterForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('meterForm', "{{url('/transport')}}", 'meter_table', 'progressmeteringPlant', 'addmeter');
    }); 
    $("#appMetermodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appMetermodal', "{{url('/transport')}}", 'appmeter', 'appmetermodal');
    });

    //Technology
    $("#techForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('techForm', "{{url('/transport')}}", 'tech_table', 'progresstechnology', 'addtech');
    });  
    $("#appTechmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appTechmodal', "{{url('/transport')}}", 'apptech', 'apptechmodal');
    });


    });

</script>



<script>
$(function()
{   
    $(".monthPicker").datepicker(
    {
        dateFormat: 'MM yy',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,

        onClose: function(dateText, inst) 
        {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
        }
    });

    $(".monthPicker").focus(function () 
    {
        $(".ui-datepicker-calendar").hide();
        $("#ui-datepicker-div").position(
        {
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
    });

        $('#year_fac').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        })

        $('#start_year').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        })

        $('#estimated_completion').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        })

        $('#month_fac').datepicker(
        {
          autoclose: true, format: "yyyy",
          viewMode: "months", 
          minViewMode: "months"
        })


        $('#completion_date').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        })

        // $('#license_expiration_date').datepicker(
        // {
        //   autoclose: true, startView: 'decade',format: "yyyy",
        //   viewMode: "years", 
        //   minViewMode: "years"
        // })


        $('#start_date_gas').datepicker(
        {
          autoclose: true, format: "yyyy-mm-dd"
        })


        $('#end_date_gas').datepicker(
        {
          autoclose: true, format: "yyyy-mm-dd"
        })

        $('#start_date_up').datepicker(
        {
          autoclose: true, format: "yyyy-mm-dd"
        })


        $('#start_date_pp').datepicker(
        {
          autoclose: true, format: "yyyy-mm-dd"
        })

        $('#commissioning_date_pp').datepicker(
        {
          autoclose: true, format: "yyyy-mm-dd"
        })


        $('#start_date_me').datepicker(
        {
          autoclose: true, format: "yyyy-mm-dd"
        })

        $('#commissioning_date_me').datepicker(
        {
          autoclose: true, format: "yyyy-mm-dd"
        })


        $('#adoptation_date_te').datepicker(
        {
          autoclose: true, format: "yyyy-mm-dd"
        })

        $('#estimated_completion_').datepicker(
        {
          autoclose: true, format: "yyyy"
        })
});
</script>




<script> //FUNCTIONS TO LOAD EDIT MODALS

    function load_oil_plant(id)
    {   
        $('#editoilplant').load("{{url('transport')}}/modals_editOilProcessingPlantProject?id="+id);
        $('#edit_oil_plant').modal('show');
    }
    function view_oil_plant(id)
    {   
        $('#viewoilplant').load("{{url('transport')}}/view_viewOilProcessingPlantProject?id="+id);
        $('#view_oil_plant').modal('show');
    }
    function approve_upstream(id)
    {   
        $('#app_up').load("{{url('transport')}}/approve_approveProcessingPlantProject?id="+id);
        $('#appup').modal('show');
    }

    function load_refinery_project(id)
    {   
        $('#editrefproj').load("{{url('transport')}}/modals_editRefineryProject?id="+id);
        $('#edit_ref_proj').modal('show');
    }
    function view_refinery_project(id)
    {   
        $('#viewrefproj').load("{{url('transport')}}/view_viewRefineryProject?id="+id);
        $('#view_ref_proj').modal('show');
    }

    function approve_ref_project(id)
    {   
        $('#app_ref_proj').load("{{url('transport')}}/approve_approveRefineryProject?id="+id);
        $('#apprefproj').modal('show');
    }

    function load_down_plant(id)
    {   
        $('#editdownplant').load("{{url('transport')}}/modals_editDownPlantProject?id="+id);
        $('#edit_down_plant').modal('show');
    }
    function view_down_plant(id)
    {   
        $('#viewdownplant').load("{{url('transport')}}/view_viewDownPlantProject?id="+id);
        $('#view_down_plant').modal('show');
    }
    function approve_pet_plant(id)
    {   
        $('#app_pet_proj').load("{{url('transport')}}/approve_approveDownPlantProject?id="+id);
        $('#apppetproj').modal('show');
    }

    function load_gas_plant(id)
    {   
        $('#edit_gas_plant').load("{{url('transport')}}/modals_editProcessingPlantProject?id="+id);
        $('#editgas_plant').modal('show');
    }
    function view_gas_plant(id)
    {   
        $('#viewgasplant').load("{{url('transport')}}/view_viewProcessingPlantProject?id="+id);
        $('#viewgas_plant').modal('show');
    }
    function approve_gas_plant(id)
    {   
        $('#app_pet_proj').load("{{url('transport')}}/approve_approveGasProject?id="+id);
        $('#apppetproj').modal('show');
    }

    function load_pipeline_project(id)
    {   
        $('#edit_pipes').load("{{url('transport')}}/modals_editPipelineProject?id="+id);
        $('#editpipes').modal('show');
    }
    function view_pipeline_project(id)
    {   
        $('#view_pipe').load("{{url('transport')}}/view_viewPipelineProject?id="+id);
        $('#viewpipe').modal('show');
    }
    function approve_pipe(id)
    {   
        $('#app_pipe').load("{{url('transport')}}/approve_approvePipelineProject?id="+id);
        $('#apppipe').modal('show');
    }

    function load_metering_project(id)
    {   
        $('#edit_meter').load("{{url('transport')}}/modals_editMetering?id="+id);
        $('#editmeter').modal('show');
    }
    function view_metering_project(id)
    {   
        $('#view_meter').load("{{url('transport')}}/view_viewMetering?id="+id);
        $('#viewmeter').modal('show');
    }
    function approve_meter(id)
    {   
        $('#app_meter').load("{{url('transport')}}/approve_approveMetering?id="+id);
        $('#appmeter').modal('show');
    }

    function load_technology(id)
    {   
        $('#edit_tech').load("{{url('transport')}}/modals_editTechnology?id="+id);
        $('#edittech').modal('show');
    }
    function view_technology(id)
    {   
        $('#view_tech').load("{{url('transport')}}/view_viewTechnology?id="+id);
        $('#viewtech').modal('show');
    }
    function approve_tech(id)
    {   
        $('#app_tech').load("{{url('transport')}}/approve_approveTechnology?id="+id);
        $('#apptech').modal('show');
    }
    
</script>










<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script>

    function displayUpstreamProject($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/oil_plant?q='+$search+'&excel=excel');

        $('#oil_plant').load('{{url('ajax')}}/oil_plant?q='+$search);
        sessionStorage.setItem('name','oil_plant');
    }


    function displayLicenseRefineryProject($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/license_ref_project?q='+$search+'&excel=excel');

        $('#license_ref_project').load('{{url('ajax')}}/license_ref_project?q='+$search);
        sessionStorage.setItem('name','license_ref_project');
    }


    function displayDownstreamProject($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/down_project?q='+$search+'&excel=excel');

        $('#down_project').load('{{url('ajax')}}/down_project?q='+$search);
        sessionStorage.setItem('name','down_project');
    }


    function displayGasProject($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/plant?q='+$search+'&excel=excel');
      
        $('#plant').load('{{url('ajax')}}/plant?q='+$search);
        sessionStorage.setItem('name','plant');  
    }


    function displayPipeline($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/pipeline?q='+$search+'&excel=excel');
      
        $('#pipeline').load('{{url('ajax')}}/pipeline?q='+$search);
        sessionStorage.setItem('name','pipeline');  
    }


    function displayMetering($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/metering?q='+$search+'&excel=excel');
      
        $('#metering').load('{{url('ajax')}}/metering?q='+$search);
        sessionStorage.setItem('name','metering');  
    }


    function displayTechnology($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/technology?q='+$search+'&excel=excel');
      
        $('#technology').load('{{url('ajax')}}/technology?q='+$search);
        sessionStorage.setItem('name','technology');  
    }
   
      


    function resolveLoad()
    {

        switch (sessionStorage.getItem('name')) 
        {                 
           case 'oil_plant':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
    
           case 'license_ref_project':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
    
           case 'down_project':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
    
           case 'plant':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
    
           case 'pipeline':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
    
           case 'metering':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
    
           case 'technology':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;



            default:
                  $('.oil_plant').trigger('click');
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
<script>
    $(function()
    {
        //Appending Company, contract and terrain Facility For Crude Production
        $('#field_id_cp').change(function(e)
        { 
            var id = $(this).val();  
             $('#company_id_cp').val('');    $('#contract_id_cp').val('');    $('#terrain_id_cp').val(''); 
              $.get('{{url('getFields')}}?id=' +id, function(data)
              {   //alert(id);               
                $.each(data, function(index, fieldObj)
                {
                    $('#company_id_cp').val(fieldObj.company_id);   
                    $('#contract_id_cp').val(fieldObj.contract_id);   
                    $('#terrain_id_cp').val(fieldObj.terrain_id);        
                    console.log(fieldObj);
                });
              }); 
        });

        //Appending Company, For Upstream Oil Projects
        $('#concession_id').change(function(e)
        { 
            var id = $(this).val(); 
             $('#company_id_oil').val(''); 
              $.get('{{url('getConcessionDetails')}}?id=' +id, function(data)
              {   //alert(id);               
                $.each(data, function(index, companyObj)
                {
                    $('#company_id_oil').val( companyObj.company_id);        
                    console.log(companyObj);
                });
              }); 
        });

        //Appending Company, For Upstream Oil Projects
        $('#field_id').change(function(e)
        { 
            var id = $(this).val(); 
             $('#company_id_lrp').val(''); 
              $.get('{{url('getConcessionDetails')}}?id=' +id, function(data)
              {   //alert(id);               
                $.each(data, function(index, companyObj)
                {
                    $('#company_id_lrp').val( companyObj.company_id);        
                    console.log(companyObj);
                });
              }); 
        });
    });
</script>



<!-- SERACH FUNCTIONALITY -->
<script>
    $(function()
    {
         $('#dynamicsearch').on('keyup', function()
         {           
              name = sessionStorage.getItem('name');

              q = $('#dynamicsearch').val().replace(' ','%20');
              
              if(name=='oil_plant')
               {
                  displayUpstreamProject(q);
               }
               else if(name =='license_ref_project')
               {
                 displayLicenseRefineryProject(q);
               }
               else if(name =='down_project')
               {
                 displayDownstreamProject(q);
               }
               else if(name =='plant')
               {
                 displayGasProject(q);
               }
               else if(name =='pipeline')
               {
                 displayPipeline(q);
               }
               else if(name =='metering')
               {
                 displayMetering(q);
               }
               else if(name =='technology')
               {
                 displayTechnology(q);
               }

           })
    });
</script>



<script>
    function setValue(id, model_name)
    {
        $(function()
        {
            var chk = $('#tab_'+id).prop('checked'); 
            if( chk == true ){ $('#tab_'+id).val(1); }
            else if( chk == false ){ $('#tab_'+id).val(0); }
            var stage_id = $('#tab_'+id).val();  //alert(stage_id);


            var tid = $('#tab_'+id).attr("id");
            formData = 
            {
                id:id,
                stage_id:stage_id,
                model_name:model_name,
                section:'REVENUE',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('set-stage_id')}}', formData, function(data, status, xhr)
            {
                if(data.status=='ok'){ }  else{  }
            });
        });
    }
</script>




    @if(Session::has('info'))
        <script>
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif