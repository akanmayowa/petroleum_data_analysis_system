<script>

    function showmodal(modalid, url=0, hrefid=0)
    {
      if(url!=0)
      {
        $('#'+hrefid).attr('href',url);
      }

        $('#'+modalid).modal('show');
    }

    $(function()
    {        
        //show others
        $('.other').hide();
        $("#company_id_chem").on('change',function(e)
        { 
            var comp = $('#company_id_chem').val();
            if(comp == 0){ $('.other').show(); }else if(comp != 0){ $('.other').hide(); }
        });



        $('.others').hide();
        $("#company_id_awm").on('change',function(e)
        { 
            var comp = $('#company_id_awm').val();
            if(comp == 0){ $('.others').show(); }else if(comp != 0){ $('.others').hide(); }
        });
    });

</script>


<script>   // JAVASCRIPT AJAX FUNCTION
function appendTable(data, tableId)
{

    if(tableId == 'upstream_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.incidents+' </th> <th> '+data.work_related+' </th> <th> '+data.non_work_related+' </th>  <th> '+data.fatal_incident+' </th>  <th> '+data.non_fatal_incident+' </th>  <th> '+data.work_related_fatal_incident+' </th>  <th> '+data.non_work_related_fatal_incident+' </th>  <th> '+data.fatality+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_upstream('+data.id+')" class="btn-sm pull-right" title="Edit Accident Report – Upstream"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'downstream_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.incidents+' </th> <th> '+data.work_related+' </th> <th> '+data.non_work_related+' </th>  <th> '+data.fatal_incident+' </th>  <th> '+data.non_fatal_incident+' </th>  <th> '+data.work_related_fatal_incident+' </th>  <th> '+data.non_work_related_fatal_incident+' </th>  <th> '+data.fatality+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_downstream('+data.id+')" class="btn-sm pull-right" title="Edit Accident Report – Downstream"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    else if(tableId == 'spill_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.natural_accident+' </th> <th> '+data.corrosion+' </th> <th> '+data.equipment_failure+' </th>  <th> '+data.sabotage+' </th>  <th> '+data.human_error+' </th>  <th> '+data.ytbd+' </th>  <th> '+data.mystery+' </th>  <th> '+data.total_no_of_spills+' </th> <th> '+data.volume_spilled+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_spill('+data.id+')" class="btn-sm pull-right" title="View Spill Incidence Report"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_spill('+data.id+')" class="btn-sm pull-right" title="Edit Accident Report – Downstream"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'water_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.company+' </th> <th> '+data.facility+' </th> <th> '+data.terrain+' </th><th> '+data.concession_id+' </th> <th> '+data.volume+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_water_volume('+data.id+')" class="btn-sm pull-right" title="Edit Water Volume Produced"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'waste_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.sum_of_wbmc+' </th> <th> '+data.sum_of_obmc+' </th>  <th> '+data.sum_of_spent_wbm+' </th>  <th> '+data.sum_of_spent_obm+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_waste_volume('+data.id+')" class="btn-sm pull-right" title="Edit Drilled Waste Volume"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'effluent_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.company+' </th> <th> '+data.well_name+' </th>  <th> '+data.spent_wbm+' </th>  <th> '+data.spent_obm+' </th>  <th> '+data.wbm_generated+' </th> <th> '+data.obm_generated+' </th> <th> '+data.waste_manager+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_eflluent_waste_discharged('+data.id+')" class="btn-sm pull-right" title="Edit Effluent Waste Discharged"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'waste_man_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.company+' </th> <th> '+data.type_of_facility+' </th>  <th> '+data.facility_description+' </th> <th> '+data.location_area+' </th>  <th> '+data.operational_status+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_waste_manager('+data.id+')" class="btn-sm pull-right" title="Edit Accredited Waste Managers"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'waste_mgt_fac_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th> <th> '+data.type_of_facility+' </th>   <th> '+data.operational_permit+' </th>  <th> '+data.status+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_waste_mgt_facilitiy('+data.id+')" class="btn-sm pull-right" title="Edit Waste Management Facilities"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'safety_table')
    {
        var _date = document.getElementById('date_safe').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.personnel_registered+' </th> <th> '+data.personnel_captured+' </th> <th> '+data.permits_issued+' </th>  <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_safety_permit('+data.id+')" class="btn-sm pull-right" title="Edit Offshore Safety Permit (OSP) Summary"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'pett_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.petitioner+' </th>  <th> '+data.petitionee+' </th>  <th> '+data.category+' </th>  <th> '+data.action_taken+' </th> <th> '+data.status+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_pettitions_received('+data.id+')" class="btn-sm pull-right" title="Edit Pettitions Received"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'chem_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.company+' </th> <th> '+data.chemical_name+' </th>  <th> '+data.category+' </th> <th> '+data.chemical_type+' </th> <th> '+data.certification_date+' </th>  <th> '+data.status+' </th> <th> '+data.remark+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_chemical_certification('+data.id+')" class="btn-sm pull-right" title="Edit Request For Chemical Certifications"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'acc_lab_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.laboratory_name+' </th>  <th> '+data.laboratory_services+' </th> <th> '+data.zones+' </th>    <th> '+data.request_type+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_accredited_laboratories('+data.id+')" class="btn-sm pull-right" title="Edit Request For Accredited Laboratories"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'dri_chem_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.fluid_type+' </th> <th> '+data.number+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_drilling_chemical('+data.id+')" class="btn-sm pull-right" title="Edit Request For Accredited Laboratories"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'env_res_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.service+' </th> <th> '+data.status+' </th> <th> '+data.new+' </th> </th> <th> '+data.renew+' </th> </th> <th> '+data.total+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_environmental_restoration('+data.id+')" class="btn-sm pull-right" title="Edit Request For Environmental Restoration"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'env_stu_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.company+' </th> <th> '+data.study_title+' </th> <th> '+data.types+' </th> <th> '+data.status+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_environmental_studies('+data.id+')" class="btn-sm pull-right" title="Edit Request For Environmental Studies"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'env_comp_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.type+' </th> <th> '+data.year+' </th> <th> '+data.month+' </th>  <th> '+data.company+' </th>  <th> '+data.compliance+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_environmental_compliance('+data.id+')" class="btn-sm pull-right" title="Edit Request For Environmental Compliance Monitoring"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'med_cen_table')
    {
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th> <th> '+data.companies+' </th>  <th> '+data.facility_address+' </th>  <th> '+data.approved_courses+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_medical_training_center('+data.id+')" class="btn-sm pull-right" title="Edit Request For Medical Training Center"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'os_conti_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.zone+' </th> <th> '+data.fac_types+' </th> <th> '+data.terrain+' </th>  <th> '+data.no_of_company+' </th>  <th> '+data.actual_no_of_company+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_contingency('+data.id+')" class="btn-sm pull-right" title="Edit Oil Spill Contingency"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    else if(tableId == 'radiation_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th>  <th> '+data.company+' </th>  <th> '+data.well_type+' </th>  <th> '+data.well_name+' </th>  <th> '+data.concession+' </th>  <th> '+data.count+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_radiation_permit('+data.id+')" class="btn-sm pull-right" title="Edit Radiation Safety Permit By Well"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
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
    });


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
           
           url:'{{url('/she-accident-report/delete-record')}}',
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
    case '\App\\she_accredited_laboratory': displayAccreditedLaboratories();  break;
    case '\App\\she_chemical_certification': displayChemicalCertification();  break;
    case '\App\\she_accident_report_downstream': displayDownstream();  break;
    case '\App\\she_effluent_waste_discharged': displayEffluentWasteDischarged();  break;
    case '\App\\she_drilling_chemical': displayDrillingChemical();  break;
    case '\App\\she_environmental_compliance_monitoring': displayEnvironmentalComplianceMonitoring();  break;
    case '\App\\she_environmental_restoration': displayEnvironmentalRestoration();  break;   //TEST
    case '\App\\she_environmental_studies': displayEnvironmentalStudies();  break;
    case '\App\\she_medical_training_center': displayMedicalTrainingCenter();  break;
    case '\App\\SheOilSpillContingency': displayOilSpillContingency();  break;
    case '\App\\she_pettitions_received': displayPettitionReceived();  break;
    case '\App\\she_radiation_safety_permit': displayRadiationSafetyPermit();  break;
    case '\App\\she_offshore_safety_permit': displaySafetyPermit();  break;
    case '\App\\she_spill_incidence_report': displaySpill();  break;
    case '\App\\she_accident_report_upstream': displayUpstream();  break;
    case '\App\\she_accredited_waste_management_facility': displayWasteFacility();  break;
    case '\App\\she_accredited_waste_manager': displayWasteManagers();  break;
    case '\App\\she_drilling_waste_volumes': displayWasteVol();  break;
    case '\App\\she_water_volumes_generated': displayWaterVol();  break;

    default:
      // code block
    }
}


$(function()
{  

    //SHE Upstream
    $("#upstreamForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('upstreamForm', "{{url('/she-accident-report')}}", 'upstream_table', 'progressUpstream', 'addupstream'); 
    }); 
    $("#appUpmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appUpmodal', "{{url('/she-accident-report')}}", 'appup', 'appupmodal');
    });


    //SHE Downstream
    $("#downstreamForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('downstreamForm', "{{url('/she-accident-report')}}", 'downstream_table', 'progressDownStream', 'adddownstream');   
    }); 
    $("#appDownmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appDownmodal', "{{url('/she-accident-report')}}", 'appdown', 'appdownmodal');
    });


    //SHE Spill
    $("#spillForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('spillForm', "{{url('/she-accident-report')}}", 'spill_table', 'progressSpill', 'addspill');
    });
    $("#appSpillmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appSpillmodal', "{{url('/she-accident-report')}}", 'appspill', 'appspillmodal');
    });


    //SHE Water Volume
    $("#watVolForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('watVolForm', "{{url('/she-accident-report')}}", 'water_table', 'progressWater', 'add_water_vol');   
    }); 
    $("#appWaterVolmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appWaterVolmodal', "{{url('/she-accident-report')}}", 'appwatervol', 'appwatervolmodal');
    });


    //SHE Waste Vol
    $("#wasVolForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('wasVolForm', "{{url('/she-accident-report')}}", 'waste_table', 'progressWaster', 'add_waste_vol'); 
    });
    $("#appWasteVolmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appWasteVolmodal', "{{url('/she-accident-report')}}", 'appwastevol', 'appwastevolmodal');
    });


    //SHE Effluent Waste 
    $("#efflForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('efflForm', "{{url('/she-accident-report')}}", 'effluent_table', 'progressWaster', 'add_effluent'); 
    });
    $("#appEfflmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appEfflmodal', "{{url('/she-accident-report')}}", 'app_effl', 'appEfflmodal');
    });



    //SHE Waste Managers
    $("#accmanForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('accmanForm', "{{url('/she-accident-report')}}", 'waste_man_table', 'progressSafety', 'add_acc_manager'); 
    }); 
    $("#appAccMgtmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appAccMgtmodal', "{{url('/she-accident-report')}}", 'appaccmgt', 'appaccmgtmodal');
    });


    //SHE Waste Managers
    $("#mgtFacForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('mgtFacForm', "{{url('/she-accident-report')}}", 'waste_mgt_fac_table', 'progressSafety', 'add_mgt_fac'); 
    }); 
    $("#appMgtFacmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appMgtFacmodal', "{{url('/she-accident-report')}}", 'appmgtfac', 'appMgtFacmodal');
    });



    //SHE PETTITION RECEIVED
    $("#petReceivedForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('petReceivedForm', "{{url('/she-accident-report')}}", 'pett_table', 'progresspett', 'add_pet_received'); 
    });
    $("#appPettReciForm").on('submit', function(e)
    { 
        e.preventDefault();
        approveForm('appPettReciForm', "{{url('/she-accident-report')}}", 'app_pett_reci', 'appPettRecimodal'); 
    });

    //SHE APPLICATION CHEMICAL
    $("#appChemicalForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('appChemicalForm', "{{url('/she-accident-report')}}", 'chem_table', 'progresschem', 'add_app_chemical'); 
    });
    $("#appChemCertForm").on('submit', function(e)
    { 
        e.preventDefault();
        approveForm('appChemCertForm', "{{url('/she-accident-report')}}", 'app_chem_cert', 'appChemCertmodal'); 
    });

    //SHE ACCREDITED LABORATORIES
    $("#accLabForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('accLabForm', "{{url('/she-accident-report')}}", 'acc_lab_table', 'progresslab', 'add_acc_laboratories'); 
    });
    $("#appAccLabForm").on('submit', function(e)
    { 
        e.preventDefault();
        approveForm('appAccLabForm', "{{url('/she-accident-report')}}", 'app_acc_lab', 'appAccLabmodal'); 
    });

    //SHE APPLICATION CHEMICAL
    $("#driChemForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('driChemForm', "{{url('/she-accident-report')}}", 'dri_chem_table', 'progressdri', 'add_dri_chemical'); 
    });


    //SHE ENVIROMENTAL RESTORATION
    $("#envResForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('envResForm', "{{url('/she-accident-report')}}", 'env_res_table', 'progressenv', 'add_env_restoration'); 
    });
    $("#appEnvRestForm").on('submit', function(e)
    { 
        e.preventDefault();
        approveForm('appEnvRestForm', "{{url('/she-accident-report')}}", 'app_env_rest', 'appEnvRestmodal'); 
    });

    //SHE ENVIROMENTAL STUDIES
    $("#envStuForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('envStuForm', "{{url('/she-accident-report')}}", 'env_stu_table', 'progressstu', 'add_env_studies'); 
    });
    $("#appEnvStudForm").on('submit', function(e)
    { 
        e.preventDefault();
        approveForm('appEnvStudForm', "{{url('/she-accident-report')}}", 'app_env_stud', 'appEnvStudmodal'); 
    });

    //SHE ENVIROMENTAL STUDIES
    $("#envCompForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('envCompForm', "{{url('/she-accident-report')}}", 'env_comp_table', 'progressstu', 'add_env_compliance'); 
    });
    $("#appEnvCompForm").on('submit', function(e)
    { 
        e.preventDefault();
        approveForm('appEnvCompForm', "{{url('/she-accident-report')}}", 'app_env_comp', 'appEnvCompmodal'); 
    });

    //SHE MEDICAL TRAINING CENTER
    $("#medCenForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('medCenForm', "{{url('/she-accident-report')}}", 'med_cen_table', 'progressmed', 'add_med_center'); 
    });
    $("#appMTCmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appMTCmodal', "{{url('/she-accident-report')}}", 'app_med_center', 'appMTCmodal');
    });





    //SHE SAFETY PERMIT
    $("#safeForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('safeForm', "{{url('/she-accident-report')}}", 'safety_table', 'progressSafety', 'add_safe_perm'); 
    });
    $("#appOspmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appOspmodal', "{{url('/she-accident-report')}}", 'apposp', 'appospmodal');
    });


    //SHE Contingency
    $("#contingencyForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('contingencyForm', "{{url('/she-accident-report')}}", 'os_conti_table', 'progressConti', 'add_spill_conti'); 
    });
    $("#appContmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appContmodal', "{{url('/she-accident-report')}}", 'appspillcont', 'appContmodal');
    });


    //SHE Radiation
    $("#radSafeForm").on('submit', function(e)
    { 
        e.preventDefault();
        processForm('radSafeForm', "{{url('/she-accident-report')}}", 'radiation_table', 'progressRad', 'add_rad_safe_perm'); 
    });
    $("#appRadmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appRadmodal', "{{url('/she-accident-report')}}", 'apprad', 'appRadmodal');
    });


});

</script>

<script> //FUNCTIONS TO LOAD EDIT MODALS
    function load_upstream(id)
    {   
        $('#edit_upstream').load("{{url('she-accident-report')}}/modals_editSheAccidentReportUP?id="+id);
        $('#editupstream').modal('show');
    }
    function view_upstream(id)
    {   
        $('#viewupstream').load("{{url('she-accident-report')}}/view_viewSheAccidentReportUP?id="+id);
        $('#view_upstream').modal('show');
    }
    function approve_upstream(id)
    {   
        $('#app_up').load("{{url('she-accident-report')}}/approve_approveUpstreamIncident?id="+id);
        $('#appup').modal('show');
    }


    function load_downstream(id)
    {   
        $('#edit_downstream').load("{{url('she-accident-report')}}/modals_editSheAccidentReportDOWN?id="+id);
        $('#editdownstream').modal('show');
    }
    function view_downstream(id)
    {   
        $('#viewdownstream').load("{{url('she-accident-report')}}/view_viewSheAccidentReportDOWN?id="+id);
        $('#view_downstream').modal('show');
    }
    function approve_downstream(id)
    {   
        $('#app_down').load("{{url('she-accident-report')}}/approve_approveDownstreamIncident?id="+id);
        $('#appdown').modal('show');
    }

    function load_spill(id)
    {   
        $('#edit_spill').load("{{url('she-accident-report')}}/modals_editSpillIncidenceReport?id="+id);
        $('#editspill').modal('show');
    }
    function view_spill(id)
    {   
        $('#viewspill').load("{{url('she-accident-report')}}/view_viewSpillIncidenceReport?id="+id);
        $('#view_spills').modal('show');
    }
    function approve_spill(id)
    {   
        $('#app_spill').load("{{url('she-accident-report')}}/approve_approveSpillIncident?id="+id);
        $('#appspill').modal('show');
    }

    function load_water_volume(id)
    {   
        $('#editwatervol').load("{{url('she-accident-report')}}/modals_editSheWaterVolume?id="+id);
        $('#edit_water_vol').modal('show');
    }
    function view_water_volume(id)
    {   
        $('#viewwater_vol').load("{{url('she-accident-report')}}/view_viewSheWaterVolume?id="+id);
        $('#view_water_vol').modal('show');
    }
    function approve_water(id)
    {   
        $('#app_water_vol').load("{{url('she-accident-report')}}/approve_approveWaterVolume?id="+id);
        $('#appwatervol').modal('show');
    }

    function load_waste_volume(id)
    {   
        $('#editwastevol').load("{{url('she-accident-report')}}/modals_editSheWasteVolume?id="+id);
        $('#edit_waste_vol').modal('show');
    }
    function view_waste_volume(id)
    {   
        $('#viewwaste_vol').load("{{url('she-accident-report')}}/view_viewSheWasteVolume?id="+id);
        $('#view_waste_vol').modal('show');
    }
    function approve_waste(id)
    {   
        $('#app_waste_vol').load("{{url('she-accident-report')}}/approve_approveWasteVolume?id="+id);
        $('#appwastevol').modal('show');
    }

    function load_eflluent_waste_discharged(id)
    {   
        $('#editeffl').load("{{url('she-accident-report')}}/modals_editSheEffluentWasteDischarged?id="+id);
        $('#edit_effl').modal('show');
    }
    function approve_eflluent_waste_discharged(id)
    {   
        $('#appeffl').load("{{url('she-accident-report')}}/approve_approveEffluentWasteDischarged?id="+id);
        $('#app_effl').modal('show');
    }

    function load_waste_manager(id)
    {   
        $('#editaccmanager').load("{{url('she-accident-report')}}/modals_editSheAccreditedWasteManager?id="+id);
        $('#edit_acc_manager').modal('show');
    }
    function view_waste_manager(id)
    {   
        $('#viewacc_').load("{{url('she-accident-report')}}/view_viewSheAccreditedWasteManager?id="+id);
        $('#view_acc_').modal('show');
    }
    function approve_acc_mgt(id)
    {   
        $('#app_acc_mgt').load("{{url('she-accident-report')}}/approve_AccreditedWasteManager?id="+id);
        $('#appaccmgt').modal('show');
    }

    function load_waste_mgt_facilitiy(id)
    {   
        $('#editmgtfac').load("{{url('she-accident-report')}}/modals_editSheWasteManagementFacilities?id="+id);
        $('#edit_mgt_fac').modal('show');
    }
    function approve_waste_mgt_facilities(id)
    {   
        $('#appmgtfac').load("{{url('she-accident-report')}}/approve_WasteManagementFacilities?id="+id);
        $('#app_mgt_fac').modal('show');
    }

    function load_pettitions_received(id)
    {   
        $('#editpet_received').load("{{url('she-accident-report')}}/modals_editPettitionsReceived?id="+id);
        $('#edit_pet_received').modal('show');
    }
    function approve_pettition_rec(id)
    {   
        $('#apppettreci').load("{{url('she-accident-report')}}/approve_approvePettitionsReceived?id="+id);
        $('#app_pett_reci').modal('show');
    }


    function load_chemical_certification(id)
    {   
        $('#editapp_chemical').load("{{url('she-accident-report')}}/modals_editChemicalCertification?id="+id);
        $('#edit_app_chemical').modal('show');
    }
    function approve_chem_cert(id)
    {   
        $('#appchemcert').load("{{url('she-accident-report')}}/approve_approveChemicalCertification?id="+id);
        $('#app_chem_cert').modal('show');
    }

    function load_accredited_laboratories(id)
    {   
        $('#editacc_lab').load("{{url('she-accident-report')}}/modals_editAccreditedLaboratories?id="+id);
        $('#edit_acc_lab').modal('show');
    }
    function approve_acc_lab(id)
    {   
        $('#appacclab').load("{{url('she-accident-report')}}/approve_approveAccreditedLaboratories?id="+id);
        $('#app_acc_lab').modal('show');
    }

    function load_drilling_chemical(id)
    {   
        $('#editdri_chem').load("{{url('she-accident-report')}}/modals_editDrillingChemical?id="+id);
        $('#edit_dri_chem').modal('show');
    }

    function load_environmental_restoration(id)
    {   
        $('#editenv_res').load("{{url('she-accident-report')}}/modals_editEnvironmentalRestoration?id="+id);
        $('#edit_env_res').modal('show');
    }
    function approve_env_restoration(id)
    {   
        $('#appenvrest').load("{{url('she-accident-report')}}/approve_approveEnvironmentalRestoration?id="+id);
        $('#app_env_rest').modal('show');
    }

    function load_environmental_studies(id)
    {   
        $('#editenv_stu').load("{{url('she-accident-report')}}/modals_editEnvironmentalStudies?id="+id);
        $('#edit_env_stu').modal('show');
    }
    function approve_env_studies(id)
    {   
        $('#appenvstud').load("{{url('she-accident-report')}}/approve_approveEnvironmentalStudies?id="+id);
        $('#app_env_stud').modal('show');
    }

    function load_environmental_compliance(id)
    {   
        $('#editenv_comp').load("{{url('she-accident-report')}}/modals_editEnvironmentalCompliance?id="+id);
        $('#edit_env_comp').modal('show');
    }
    function approve_env_compliance(id)
    {   
        $('#appenvcomp').load("{{url('she-accident-report')}}/approve_approveEnvironmentalStudies?id="+id);
        $('#app_env_comp').modal('show');
    }

    function load_medical_training_center(id)
    {   
        $('#editmed_cen').load("{{url('she-accident-report')}}/modals_editMedicalTrainingCenter?id="+id);
        $('#edit_med_cen').modal('show');
    }
    function approve_med_training_center(id)
    {   
        $('#appmedcenter').load("{{url('she-accident-report')}}/approve_approveMedicalTrainingCenter?id="+id);
        $('#app_med_center').modal('show');
    }

    function load_safety_permit(id)
    {   
        $('#editsafe_perm').load("{{url('she-accident-report')}}/modals_editSheSafetyPermit?id="+id);
        $('#edit_safe_perm').modal('show');
    }
    function view_safety_permit(id)
    {   
        $('#viewsafe_perm').load("{{url('she-accident-report')}}/view_viewSheSafetyPermit?id="+id); 
        $('#view_safe_perm').modal('show');
    }
    function approve_osp(id)
    {   
        $('#app_osp').load("{{url('she-accident-report')}}/approve_approveSafetyPermit?id="+id);
        $('#apposp').modal('show');
    }

    function load_contingency(id)
    {   
        $('#editcontingency').load("{{url('she-accident-report')}}/modals_editSheOilSpillContingency?id="+id);
        $('#edit_contingency').modal('show');
    }
    function view_contingency(id)
    {   
        $('#viewcontingency').load("{{url('she-accident-report')}}/view_viewSheOilSpillContingency?id="+id); 
        $('#view_contingency').modal('show');
    }
    function approve_contigency(id)
    {   
        $('#app_spill_cont').load("{{url('she-accident-report')}}/approve_approveOilSpillContingency?id="+id);
        $('#appspillcont').modal('show');
    }

    function load_radiation_permit(id)
    {   
        $('#editrad_perm').load("{{url('she-accident-report')}}/modals_editRadiationSafetyPermit?id="+id);
        $('#edit_rad_perm').modal('show');
    }
    function view_radiation_permit(id)
    {   
        $('#viewrad_perm').load("{{url('she-accident-report')}}/view_viewRadiationSafetyPermit?id="+id); 
        $('#view_rad_perm').modal('show');
    }
    function approve_radiation_permit(id)
    {   
        $('#app_rad').load("{{url('she-accident-report')}}/approve_approveRadiationSafetyPermit?id="+id);
        $('#apprad').modal('show');
    }
</script>



<script>
    $(function()
    {
        $('.year').datepicker
        ({
          format: "yyyy", 
          autoclose: true,
          viewMode: "years", 
          minViewMode: "years"
        });


        $('.month').datepicker
        ({
          format: "MM", autoclose: true,
          viewMode: "months", 
          minViewMode: "months"
        });


       
       
        //compute TOTAL       
        $(document).on("input", ".spi", function()
        {
            var total = 0;
            $('.spi').each(function()            
            {
                total += parseFloat($(this).val());
            });

            $("#total_no_of_spills_").val(total);
            console.log(total);                         
       
        });


        //Hide alert message box
        $('#succ_alert_msg').hide();     
        $('#err_alert_msg').hide();
        
    });


    //setting all values to default 0
    function checkValue(field) 
    {  
        if (field.value == '' || field.value < 0) 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
            //$('.amount').val(0);
        }
    }

    
</script>







<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script>
    
    function displayUpstream($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/she_upstream?q='+$search+'&excel=excel');

        $('#she_upstream').load('{{url('ajax')}}/she_upstream?q='+$search);
        sessionStorage.setItem('name','she_upstream');  
    }
    
    function displayDownstream($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/she_downstream?q='+$search+'&excel=excel');

        $('#she_downstream').load('{{url('ajax')}}/she_downstream?q='+$search);
        sessionStorage.setItem('name','she_downstream');
    }
    
    function displaySpill($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/spill?q='+$search+'&excel=excel');

        $('#spill').load('{{url('ajax')}}/spill?q='+$search);
        sessionStorage.setItem('name','spill'); 
    }
    
    function displayWaterVol($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/water_vol?q='+$search+'&excel=excel');

        $('#water_vol').load('{{url('ajax')}}/water_vol?q='+$search);
        sessionStorage.setItem('name','water_vol');
    }
    
    function displayWasteVol($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/waste_vol?q='+$search+'&excel=excel');

        $('#waste_vol').load('{{url('ajax')}}/waste_vol?q='+$search);
        sessionStorage.setItem('name','waste_vol');  
    }
    
    function displayEffluentWasteDischarged($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/effluent_waste_discharged?q='+$search+'&excel=excel');

        $('#effluent_waste_discharged').load('{{url('ajax')}}/effluent_waste_discharged?q='+$search);
        sessionStorage.setItem('name','effluent_waste_discharged');  
    }
    
    function displayWasteManagers($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/waste_manager?q='+$search+'&excel=excel');

        $('#waste_manager').load('{{url('ajax')}}/waste_manager?q='+$search);
        sessionStorage.setItem('name','waste_manager');  
    }
    
    function displayWasteFacility($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/waste_mgt_facilities?q='+$search+'&excel=excel');

        $('#waste_mgt_facilities').load('{{url('ajax')}}/waste_mgt_facilities?q='+$search);
        sessionStorage.setItem('name','waste_mgt_facilities');  
    }
        
    function displayPettitionReceived($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/pettitions_receieved?q='+$search+'&excel=excel');

        $('#pettitions_receieved').load('{{url('ajax')}}/pettitions_receieved?q='+$search);
        sessionStorage.setItem('name','pettitions_receieved');  
    }
        
    function displayChemicalCertification($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/chemical_certification?q='+$search+'&excel=excel');

        $('#chemical_certification').load('{{url('ajax')}}/chemical_certification?q='+$search);
        sessionStorage.setItem('name','chemical_certification');  
    }
        
    function displayAccreditedLaboratories($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/accredited_laboratories?q='+$search+'&excel=excel');

        $('#accredited_laboratories').load('{{url('ajax')}}/accredited_laboratories?q='+$search);
        sessionStorage.setItem('name','accredited_laboratories');  
    }
        
    function displayDrillingChemical($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/drilling_chemical?q='+$search+'&excel=excel');

        $('#drilling_chemical').load('{{url('ajax')}}/drilling_chemical?q='+$search);
        sessionStorage.setItem('name','drilling_chemical');  
    }
        
    function displayChemicalInventory($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/chemical_inventory?q='+$search+'&excel=excel');

        $('#chemical_inventory').load('{{url('ajax')}}/chemical_inventory?q='+$search);
        sessionStorage.setItem('name','chemical_inventory');  
    }
        
    function displayEnvironmentalRestoration($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/environmental_restoration?q='+$search+'&excel=excel');

        $('#environmental_restoration').load('{{url('ajax')}}/environmental_restoration?q='+$search);
        sessionStorage.setItem('name','environmental_restoration');  
    }
        
    function displayEnvironmentalStudies($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/environmental_studies?q='+$search+'&excel=excel');

        $('#environmental_studies').load('{{url('ajax')}}/environmental_studies?q='+$search);
        sessionStorage.setItem('name','environmental_studies');  
    }
        
    function displayEnvironmentalComplianceMonitoring($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/environmental_compliance?q='+$search+'&excel=excel');

        $('#environmental_compliance').load('{{url('ajax')}}/environmental_compliance?q='+$search);
        sessionStorage.setItem('name','environmental_compliance');  
    }
        
    function displayMedicalTrainingCenter($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/medical_training_center?q='+$search+'&excel=excel');

        $('#medical_training_center').load('{{url('ajax')}}/medical_training_center?q='+$search);
        sessionStorage.setItem('name','medical_training_center');  
    }
        
    function displaySafetyPermit($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/safety_permit?q='+$search+'&excel=excel');

        $('#safety_permit').load('{{url('ajax')}}/safety_permit?q='+$search);
        sessionStorage.setItem('name','safety_permit');  
    }
    
    function displayOilSpillContingency($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/oil_spill_contingency?q='+$search+'&excel=excel');

        $('#oil_spill_contingency').load('{{url('ajax')}}/oil_spill_contingency?q='+$search);
        sessionStorage.setItem('name','oil_spill_contingency');  
    }
    
    function displayRadiationSafetyPermit($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/radiation_safety_permit?q='+$search+'&excel=excel');

        $('#radiation_safety_permit').load('{{url('ajax')}}/radiation_safety_permit?q='+$search);
        sessionStorage.setItem('name','radiation_safety_permit');  
    }

      


    function resolveLoad()
    {

        switch (sessionStorage.getItem('name')) 
        {
            case 'she_upstream':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'she_downstream':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'spill':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'water_vol':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'waste_vol':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'effluent_waste_discharged':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'waste_manager':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'waste_mgt_facilities':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'pettitions_receieved':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'chemical_certification':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'accredited_laboratories':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'drilling_chemical':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'chemical_inventory':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'environmental_restoration':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'environmental_studies':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'environmental_compliance':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'medical_training_center':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'safety_permit':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'oil_spill_contingency':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'radiation_safety_permit':
              $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;


            default:
                  $('.upstream').trigger('click');
                 break;
        }
       
    }
    //

    $(function()
    {     
        resolveLoad();                
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
              
              if(name=='she_upstream')
               {
                  displayUpstream(q);
               }
               else if(name =='she_downstream')
               {
                 displayDownstream(q);
               }
               else if(name=='spill')
               {
                  displaySpill(q);
               }
               else if(name=='water_vol')
               {
                  displayWaterVol(q);
               }
               else if(name=='waste_vol')
               {
                  displayWasteVol(q);
               }
               else if(name=='effluent_waste_discharged')
               {
                  displayEffluentWasteDischarged(q);
               }
               else if(name=='waste_manager')
               {
                  displayWasteManagers(q);
               }
               else if(name=='waste_mgt_facilities')
               {
                  displayWasteFacility(q);
               }
               else if(name=='pettitions_receieved')
               {
                  displayPettitionReceived(q);
               }
               else if(name=='chemical_certification')
               {
                  displayChemicalCertification(q);
               }
               else if(name=='accredited_laboratories')
               {
                  displayAccreditedLaboratories(q);
               }
               else if(name=='drilling_chemical')
               {
                  displayDrillingChemical(q);
               }
               else if(name=='chemical_inventory')
               {
                  displayChemicalInventory(q);
               }
               else if(name=='environmental_restoration')
               {
                  displayEnvironmentalRestoration(q);
               }
               else if(name=='environmental_studies')
               {
                  displayEnvironmentalStudies(q);
               }
               else if(name=='environmental_compliance')
               {
                  displayEnvironmentalComplianceMonitoring(q);
               }
               else if(name=='medical_training_center')
               {
                  displayMedicalTrainingCenter(q);
               }
               else if(name=='safety_permit')
               {
                  displaySafetyPermit(q);
               }
               else if(name=='oil_spill_contingency')
               {
                  displayOilSpillContingency(q);
               }
               else if(name=='radiation_safety_permit')
               {
                  displayRadiationSafetyPermit(q);
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
