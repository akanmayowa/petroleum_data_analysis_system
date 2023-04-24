<script>

    function named()
    {
        var height = $('body').height();      
    }

    $(function()
    {
        //Hode show Individual or total div
        $('#ind').click(function()
        {
           $('#ind_div').show();      $('#tot_div').hide();           
        });
        $('#tot').click(function()
        {
           $('#tot_div').show();      $('#ind_div').hide();             
        });



        $('#start_dates').datepicker();

    });



    $(function()
    {

        $('.year').datepicker(
        {
          autoclose: true,
          startView: 'decade',
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        })

        $('.month').datepicker(
        {
          autoclose: true, format: "MM",
          viewMode: "months", 
          minViewMode: "months"
      })

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

    if(tableId == 'obligation_table')
    {
        var _date = document.getElementById('date_gs').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.company+' </th> <th> '+data.performance_obligation+' </th>  <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_obligation('+data.id+')" class="btn-sm pull-right" title="View Domestic Gas Obligation "> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_gas_obligation('+data.id+')" class="btn-sm pull-right" title="Edit Domestic Gas Obligation "> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'gas_supply_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.month+' </th>  <th> '+data.company+' </th> <th> '+data.total+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_perf('+data.id+')" class="btn-sm pull-right" title="View Actual Gas Supply"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_gas_perf('+data.id+')" class="btn-sm pull-right" title="Edit Actual Gas Supply"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'textile_ind_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.sector+' </th>  <th> '+data.value+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_gas_supply_textile_industry('+data.id+')" class="btn-sm pull-right" title="Edit Gas Supply Textile Industry"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'gas_summary_table')
    {
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th>  <th> '+data.month+' </th> <th> '+data.field+' </th>  <th> '+data.company+' </th>  <th> '+data.ag+' </th>  <th> '+data.nag+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_summary('+data.id+')" class="btn-sm pull-right" title="View Summary of Gas Production"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_gas_summary('+data.id+')" class="btn-sm pull-right" title="Edit Add Summary of Gas Production"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'gas_util_table')
    {
        $('#'+tableId).prepend('<tr> <th> '+data.month+' </th> <th> '+data.year+' </th>  <th> '+data.field+' </th>  <th> '+data.company+' </th>  <th> '+data.fuel_gas+' </th>  <th> '+data.gas_lift+' </th>  <th> '+data.re_injection+' </th>  <th> '+data.ngl_lpg+' </th>  <th> '+data.gas_to_nipp+' </th>  <th> '+data.local_others+' </th>  <th> '+data.nlng_export+' </th>  <th> '+data.shrinkage+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_utilization('+data.id+')" class="btn-sm pull-right" title="View Summary of Gas Utilization"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_gas_utilization('+data.id+')" class="btn-sm pull-right" title="Edit Add Summary of Gas Utilization"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'gas_facility_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.facility+' </th> <th> '+data.facility_type+' </th> <th> '+data.location+' </th>  <th> '+data.terrain+' </th>  <th> '+data.design_capacity+' </th>  <th> '+data.operating_capacity+' </th> <th> '+data.gas_status+' </th>  <th> '+data.license_status+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_facility('+data.id+')" class="btn-sm pull-right" title="View Major Gas Facilities"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_gas_facility('+data.id+')" class="btn-sm pull-right" title="Edit Gas Facility"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    else if(tableId == 'gas_prod_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th> <th> '+data.category+' </th>  <th> '+data.zone+' </th>  <th> '+data.capacity+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_retail_outlet('+data.id+')" class="btn-sm pull-right" title="View Gas Product LPG"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_retail_outlet('+data.id+')" class="btn-sm pull-right" title="Edit Gas Product LPG"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'prod_imp_perm_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.company+' </th>  <th> '+data.import_permit_no+' </th>  <th> '+data.issued_date+' </th>  <th> '+data.validity_period+' </th>  <th> '+data.product+' </th>  <th> '+data.volume+' </th>  <th> '+data.country+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_product_import_permit('+data.id+')" class="btn-sm pull-right" title="View Gas Product Volumes (Import Permit"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_product_import_permit('+data.id+')" class="btn-sm pull-right" title="Edit  GasProduct Volumes (Import Permit)"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'ref_prod_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.company+' </th>  <th> '+data.vessel_name+' </th>  <th> '+data.import_permit_no+' </th>  <th> '+data.state+' </th>  <th> '+data.zone+' </th>  <th> '+data.product+' </th>  <th> '+data.volume+' </th>  <th> '+data.date_discharged+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_refinery_production('+data.id+')" class="btn-sm pull-right" title="View Gas Actual Importation by Vessels"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_refinery_production('+data.id+')" class="btn-sm pull-right" title="Edit Gas Actual Importation by Vessels"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'gas_act_prod_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.company+' </th>  <th> '+data.vessel_name+' </th>  <th> '+data.import_permit_no+' </th>  <th> '+data.state+' </th>  <th> '+data.zone+' </th>  <th> '+data.product+' </th>  <th> '+data.volume+' </th>  <th> '+data.date_discharged+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_actual_production('+data.id+')" class="btn-sm pull-right" title="View Gas Actual Production"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_gas_actual_production('+data.id+')" class="btn-sm pull-right" title="Edit Gas Actual Production"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'gas_exp_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.equity+' </th>  <th> '+data.stream+' </th>  <th> '+data.product+' </th>  <th> '+data.no_of_vessel+' </th>  <th> '+data.volume+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_export('+data.id+')" class="btn-sm pull-right" title="View Gas Export by Volume Vessel"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_gas_export('+data.id+')" class="btn-sm pull-right" title="Edit Gas Export by Volume Vessel"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
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
                toastr.success(data.info, {timeOut:1000000});
                return;

                // alert(data.info);
            }

            return toastr.error(data.info, {timeOut:10000000});
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
           
           url:'{{url('/gas/delete-record')}}',
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
    case '\App\\gas_export_volume_vessel': displayGasExport();  break;
    case '\App\\gas_major_gas_facilities': displayFacility();  break;
    case '\App\\gas_domestic_gas_obligation': displayObligation();  break;
    case '\App\\gas_processing_plant_project': displayPlant();  break;
    case '\App\\gas_product_monitoring': displayGasProductCNG();  break;
    case '\App\\gas_product_vol_import_permit': displayProductVolPermit();  break;
    case '\App\\gas_refinery_production_volumes': displayProductVolPermitVessel();  break; 
    case '\App\\gas_actual_production': displayGasActualProd();  break;  //TEST
    case '\App\\gas_summary_of_gas_production': displayProduction();  break;
    case '\App\\gas_domestic_gas_supply': displayActualSupply();  break;
    case '\App\\gas_supply_textile_industry': displayGasSupplyTextileIndustry();  break;
    case '\App\\gas_summary_of_gas_utilization': displayProductVolPermit();  break;

    default:
      // code block
    }
}





$(function()
{  

    //GAS SUPPLY
    $("#obliForm").on('submit',function(e)
    {       
        e.preventDefault();
        processForm('obliForm', "{{url('/gas')}}", 'obligation_table', 'progressGasSupply', 'addgas_obli');
    });  
    $("#appGasOblimodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appGasOblimodal', "{{url('/gas')}}", 'appgasobli', 'appgasoblimodal');
    });

    //GAS SUPPLY
    $("#gassupplyForm").on('submit',function(e)
    {       
        e.preventDefault();
        processForm('gassupplyForm', "{{url('/gas')}}", 'gas_supply_table', 'progressGasSupply', 'addgas_supply');
    });  
    $("#appGasSuppmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appGasSuppmodal', "{{url('/gas')}}", 'appgassupp', 'appgassuppmodal');
    }); 

    //GAS SUPPLY TEXTILE INDUSTRY
    $("#textIndForms").on('submit',function(e)
    {       
        e.preventDefault();
        processForm('textIndForms', "{{url('/gas')}}", 'textile_ind_table', 'progressGasTextInd', 'add_textile_ind');
    });  
    $("#appTextIndmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appTextIndmodal', "{{url('/gas')}}", 'app_textile_ind', 'appTextIndmodal');
    });   


    //GAS SUMMARY
    $("#gassummaryForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('gassummaryForm', "{{url('/gas')}}", 'gas_summary_table', 'progressGasSummary', 'addgas_summary');
    });   
    $("#appGasSummodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appGasSummodal', "{{url('/gas')}}", 'appgassum', 'appgassummodal');
    }); 


    //GAS SUMMARY
    $("#gasutilForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('gasutilForm', "{{url('/gas')}}", 'gas_util_table', 'progressGasSummary', 'addgas_util');
    });   
    $("#appGasUtilmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appGasUtilmodal', "{{url('/gas')}}", 'appgasutil', 'appgasutilmodal');
    });


    //GAS FACILITY
    $("#gasfacilityForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('gasfacilityForm', "{{url('/gas')}}", 'gas_facility_table', 'progressGasFacility', 'addgas_facility');
    });   
    $("#appGasFacmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appGasFacmodal', "{{url('/gas')}}", 'appgasfac', 'appgasfacmodal');
    });

     //LPG/CNG Outlets
    $("#retOutForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('retOutForm', "{{url('/gas')}}", 'gas_prod_table', 'progressROUT', 'add_ret_outlet');
    });   
    $("#appRetOutmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appRetOutmodal', "{{url('/gas')}}", 'appretout', 'appretoutmodal');
    });

     //Refinery Product Vol Permit
    $("#prodVolPerForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('prodVolPerForm', "{{url('/gas')}}", 'prod_imp_perm_table', 'progressPVP', 'add_prod_vol_permit');
    });  
    $("#appPermitmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appPermitmodal', "{{url('/gas')}}", 'apppermit', 'apppermitmodal');
    });

     //Refinery Refinery Production
    $("#refProdForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('refProdForm', "{{url('/gas')}}", 'ref_prod_table', 'progressRPRO', 'add_ref_production');
    });  
    $("#appRefProdmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appRefProdmodal', "{{url('/gas')}}", 'apprefprod', 'apprefprodmodal');
    });

     //Gas Actual Production
    $("#gasActProdForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('gasActProdForm', "{{url('/gas')}}", 'gas_act_prod_table', 'progressAPRO', 'add_gas_act_prod');
    });  
    $("#appGasActProdmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appGasActProdmodal', "{{url('/gas')}}", 'appgasactprod', 'appGasActProdmodal');
    });


     //Refinery Gas Export
    $("#gasExpForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('gasExpForm', "{{url('/gas')}}", 'gas_exp_table', 'progressRPRO', 'add_gas_exp');
    });  
    $("#appGasExpmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appGasExpmodal', "{{url('/gas')}}", 'appgasexp', 'appgasexpmodal');
    });

});

</script>


<script> //FUNCTIONS TO LOAD EDIT MODALS
    function load_gas_obligation(id)
    {   
        $('#editgasobli').load("{{url('gas')}}/modals_editGasObligation?id="+id);
        $('#editgas_obli').modal('show');
    }
    function view_gas_obligation(id)
    {   
        $('#viewgasobli').load("{{url('gas')}}/view_viewGasObligation?id="+id);
        $('#view_gas_obli').modal('show');
    }
    function approve_gas_obli(id)
    {   
        $('#app_gas_obli').load("{{url('gas')}}/approve_approveGasObligation?id="+id);
        $('#appgasobli').modal('show');
    }

    function load_gas_perf(id)
    {   
        $('#editgassupply').load("{{url('gas')}}/modals_editGas?id="+id);
        $('#editgas_supply').modal('show');
    }
    function view_gas_perf(id)
    {   
        $('#viewgassupply').load("{{url('gas')}}/view_viewGas?id="+id);
        $('#view_gas_supply').modal('show');
    }
    function approve_gas_supply(id)
    {   
        $('#app_gas_supp').load("{{url('gas')}}/approve_approveActualGas?id="+id);
        $('#appgassupp').modal('show');
    }

    function load_gas_supply_textile_industry(id)
    {   
        $('#edittextile_ind').load("{{url('gas')}}/modals_editGasSupplyTextileIndustry?id="+id);
        $('#edit_textile_ind').modal('show');
    }
    function approve_gas_supply_textile_industry(id)
    {   
        $('#apptextile_ind').load("{{url('gas')}}/approve_approveGasSupplyTextileIndustry?id="+id);
        $('#app_textile_ind').modal('show');
    }

    function load_gas_summary(id)
    {   
        $('#edit_gas_summary').load("{{url('gas')}}/modals_edit_gas_summary?id="+id);
        $('#editgas_summary').modal('show');
    }
    function view_gas_summary(id)
    {   
        $('#viewgas_sum').load("{{url('gas')}}/view_viewGasSummary?id="+id);
        $('#view_gas_sum').modal('show');
    }
    function approve_gas_sum(id)
    {   
        $('#app_gas_sum').load("{{url('gas')}}/approve_approveGasSummary?id="+id);
        $('#appgassum').modal('show');
    }

    function load_gas_utilization(id)
    {   
        $('#edit_gas_util').load("{{url('gas')}}/modals_edit_gas_utilization?id="+id);
        $('#editgas_util').modal('show');
    }
    function view_gas_utilization(id)
    {   
        $('#viewgas_util').load("{{url('gas')}}/view_viewGasUtilization?id="+id);
        $('#view_gas_util').modal('show');
    }
    function approve_gas_util(id)
    {   
        $('#app_gas_util').load("{{url('gas')}}/approve_approveGasUtilization?id="+id);
        $('#appgasutil').modal('show');
    }

    function load_gas_facility(id)
    {   
        $('#edit_gas_facility').load("{{url('gas')}}/modals_editGasFacility?id="+id);
        $('#editgas_facility').modal('show');
    }
    function view_gas_facility(id)
    {   
        $('#viewgasfacility').load("{{url('gas')}}/view_viewGasFacility?id="+id);
        $('#view_gasfacility').modal('show');
    }
    function approve_gas_fac(id)
    {   
        $('#app_gas_fac').load("{{url('gas')}}/approve_approveGasFacility?id="+id);
        $('#appgasfac').modal('show');
    }

    function load_retail_outlet(id)
    {   
        $('#editretoutlet').load("{{url('gas')}}/modals_editGasProducts?id="+id);
        $('#edit_ret_outlet').modal('show');
    }
    function view_retail_outlet(id)
    {   
        $('#viewretoutlet').load("{{url('gas')}}/view_viewGasProducts?id="+id);
        $('#view_ret_outlet').modal('show');
    }
    function approve_ret_out(id)
    {   
        $('#app_ret_out').load("{{url('gas')}}/approve_approveGasProducts?id="+id);
        $('#appretout').modal('show');
    }

    function load_product_import_permit(id)
    {   
        $('#editprodvolpermit').load("{{url('gas')}}/modals_editProductVolumePermit?id="+id);
        $('#edit_prod_vol_permit').modal('show');
    }
    function view_product_import_permit(id)
    {   
        $('#viewprodvolpermit').load("{{url('gas')}}/view_viewProductVolumePermit?id="+id);
        $('#view_prod_vol_permit').modal('show');
    }
    function approve_vol_permit(id)
    {   
        $('#app_permit').load("{{url('gas')}}/approve_approveVolumePermit?id="+id);
        $('#apppermit').modal('show');
    }

    function load_refinery_production(id)
    {   
        $('#editrefproduction').load("{{url('gas')}}/modals_editRefineryProduction?id="+id);
        $('#edit_ref_production').modal('show');
    }
    function view_refinery_production(id)
    {   
        $('#viewrefproduction').load("{{url('gas')}}/view_viewRefineryProduction?id="+id);
        $('#view_ref_production').modal('show');
    }
    function approve_ref_prod(id)
    {   
        $('#app_ref_prod').load("{{url('gas')}}/approve_approveRefineryProduction?id="+id);
        $('#apprefprod').modal('show');
    }

    function load_gas_actual_production(id)
    {   
        $('#editgasactprod').load("{{url('gas')}}/modals_editGasActualProduction?id="+id);
        $('#edit_gas_act_prod').modal('show');
    }
    function view_gas_actual_production(id)
    {   
        $('#viewgasactprod').load("{{url('gas')}}/view_viewGasActualProduction?id="+id);
        $('#view_gas_act_prod').modal('show');
    }
    function approve_gas_act_prod(id)
    {   
        $('#app_gas_act_prod').load("{{url('gas')}}/approve_approveGasActualProduction?id="+id);
        $('#appgasactprod').modal('show');
    }

    function load_gas_export(id)
    {   
        $('#editgasexp').load("{{url('gas')}}/modals_editGasExportVolumeVessel?id="+id);
        $('#edit_gas_exp').modal('show');
    }
    function view_gas_export(id)
    {   
        $('#viewgasexp').load("{{url('gas')}}/view_viewGasExportVolumeVessel?id="+id);
        $('#view_gas_exp').modal('show');
    }
    function approve_gas_export(id)
    {   
        $('#appgasexp').load("{{url('gas')}}/approve_approveGasExportVolumeVessel?id="+id);
        $('#app_gas_exp').modal('show');
    }
</script>



<script>
    $(function()
    {
        //script to calculate average Gas Supply
        $('.sup').keyup(function()
        {
            var ave = 0; var perc = 0; var obli = 0;
            $('.sup').each(function()
            {
                ave += parseFloat($(this).val());
            });
            $("#average_supply").val(ave.toFixed(2));
            obli = $("#comp_obligation").val();

            perc = ((ave * 100)/ obli);
            if(perc == 'Infinity'){ perc = 0; } else { }
            $("#performance_percent").val(perc.toFixed(1));
        });

        //script to calculate total associated gas
        $('.tot_a').keyup(function()
        {
            var ag_total=0;
            $('.tot_a').each(function()
            {
                ag_total += parseFloat($(this).val());
            });
            $("#total_ap").val(ag_total);
        });


        //script to calculate total gas utilized
        $('.gas_util').keyup(function()
        {
            var total_gas_util = 0;
            $('.gas_util').each(function()            
            {
                total_gas_util += parseFloat($(this).val());
            });
            $("#total_gas_utilized").val(total_gas_util);

            //compute percentage Utilized
            var ag_nag = $('.gas_util').val();
            var perc_util = ((total_gas_util * 100) / ag_nag);
            $('.percent_utilized').val(perc_util.toFixed(1));
        }); 



        //script to calculate total gas_supply utilized
        $('.add_g').keyup(function()
        {
            var total_gas_supply = 0;
            $('.add_g').each(function()            
            {
                total_gas_supply += parseFloat($(this).val());
            });
            $("#total").val(total_gas_supply);
        });




        $('.out').keyup(function()
        {
            var total = 0;
            $('.out').each(function()            
            {
                total += parseFloat($(this).val());
            });
            $("#total_out").val(total.toFixed(2));
        }); 

        $('.cap').keyup(function()
        {
            var total = 0;
            $('.cap').each(function()            
            {
                total += parseFloat($(this).val());
            });
            $("#total_cap").val(total.toFixed(2));
        }); 

    });

    //setting all values to default 0
    function checkValue(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
        }
    }



    //compute percentage Utilized and Flared
    function setPercentUtilized()
    {
        var total_gas_util = $("#total_gas_utilized").val();
        var total_gas_flar = $("#total_gas_flared").val();
            
        var ag_nag = $('#total_ag_nag').val();
        var perc_util = ((total_gas_util * 100) / ag_nag);
        $('#percent_utilized').val(perc_util.toFixed(1));

        var perc_flar = ((total_gas_flar * 100) / ag_nag);
        $('#percent_flared').val(perc_flar.toFixed(1));
        console.log(perc_flar);
    }


    //Calculate Statistical Difference
    function setStatisticalDifference()
    {
        var ag_nag = $('#total_ag_nag').val();
        var total_gas_util = $("#total_gas_utilized").val();
        var shrinkage = $("#shrinkage").val();            
        var total_gas_flar = $("#total_gas_flared").val();

        var statistical_diff = (ag_nag - total_gas_util - shrinkage - total_gas_flar);
        $('#statistical_diff').val(statistical_diff.toFixed(2));
    }

</script>




<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script>
    function displayObligation($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/obligation?q='+$search+'&excel=excel');
        $('#obligation').load('{{url('ajax')}}/obligation?q='+$search);
        sessionStorage.setItem('name','obligation');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayActualSupply($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/supply?q='+$search+'&excel=excel');
        $('#supply').load('{{url('ajax')}}/supply?q='+$search);
        sessionStorage.setItem('name','supply');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayGasSupplyTextileIndustry($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/gas_supply_textile_industry?q='+$search+'&excel=excel');
        $('#gas_supply_textile_industry').load('{{url('ajax')}}/gas_supply_textile_industry?q='+$search);
        sessionStorage.setItem('name','gas_supply_textile_industry');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayProduction($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/summary?q='+$search+'&excel=excel');
        $('#summary').load('{{url('ajax')}}/summary?q='+$search);
        sessionStorage.setItem('name','summary');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayUtilization($search=0, $pending=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/utilization?q='+$search+'&excel=excel&pend='+$pending);
        $('#utilization').load('{{url('ajax')}}/utilization?q='+$search);
        sessionStorage.setItem('name','utilization');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayPerformance($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/gas_balance?q='+$search+'&excel=excel');
        $('#gas_balance').load('{{url('ajax')}}/gas_balance?q='+$search);
        sessionStorage.setItem('name','gas_balance');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayFacility($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/facility?q='+$search+'&excel=excel');
        $('#facility').load('{{url('ajax')}}/facility?q='+$search);
        sessionStorage.setItem('name','facility');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayGasProductLPG($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/gas_product_lpg?q='+$search+'&excel=excel');
        $('#gas_product_lpg').load('{{url('ajax')}}/gas_product_lpg?q='+$search);
        sessionStorage.setItem('name', 'gas_product_lpg');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }
    function showLPG()
    {
      $(function()
      {
        $('#product_type').val('LPG');         
        $('#lpg_div').show();          
        $('#cng_div').hide();    $('#lng_div').hide();    $('#prop_div').hide();

        //WHEN A CATEGORY IS SELECTED
        $("#category_id_lpg").on('change', function(e)
        { 
            $('#categories_id').val('');
            var cate = $('#category_id_lpg').val();    $('#categories_id').val(cate);
        }); 
      });  
    }


    function displayGasProductCNG($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/gas_product_cng?q='+$search+'&excel=excel');
        $('#gas_product_cng').load('{{url('ajax')}}/gas_product_cng?q='+$search);
        sessionStorage.setItem('name','gas_product_cng');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }
    function showCNG()
    {
      $(function()
      {
        $('#product_type').val('CNG');  
        $('#cng_div').show();        
        $('#lpg_div').hide();    $('#lng_div').hide();    $('#prop_div').hide();

        //WHEN A CATEGORY IS SELECTED
        $("#category_id_cng").on('change', function(e)
        { 
            $('#categories_id').val('');
            var cate = $('#category_id_cng').val();    $('#categories_id').val(cate);
        }); 
      });  
    }


    function displayProductLNG($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/gas_product_lng?q='+$search+'&excel=excel');
        $('#gas_product_lng').load('{{url('ajax')}}/gas_product_lng?q='+$search);
        sessionStorage.setItem('name','gas_product_lng');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }
    function showLNG()
    {
      $(function()
      {
        $('#product_type').val('LNG');  
        $('#lng_div').show();        
        $('#lpg_div').hide();    $('#cng_div').hide();    $('#prop_div').hide();

        //WHEN A CATEGORY IS SELECTED
        $("#category_id_lng").on('change', function(e)
        { 
            $('#categories_id').val('');
            var cate = $('#category_id_lng').val();    $('#categories_id').val(cate);
        }); 
      });  
    }


    function displayGasProductPROPANE($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/gas_product_propane?q='+$search+'&excel=excel');
        $('#gas_product_propane').load('{{url('ajax')}}/gas_product_propane?q='+$search);
        sessionStorage.setItem('name','gas_product_propane');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }
    function showPROPANE()
    {
      $(function()
      {
        $('#product_type').val('PROPANE');  
        $('#prop_div').show();        
        $('#lpg_div').hide();    $('#lng_div').hide();    $('#cng_div').hide();

        //WHEN A CATEGORY IS SELECTED
        $("#category_id_pro").on('change', function(e)
        { 
            $('#categories_id').val('');
            var cate = $('#category_id_pro').val();    $('#categories_id').val(cate);
        }); 
      });  
    }




    function displayProductVolPermit($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_prod_vol_permit?q='+$search+'&excel=excel');
        $('#gas_prod_vol_permit').load('{{url('ajax')}}/gas_prod_vol_permit?q='+$search);
        sessionStorage.setItem('name','gas_prod_vol_permit');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayRefineryProd($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_ref_production?q='+$search+'&excel=excel');
        $('#gas_ref_production').load('{{url('ajax')}}/gas_ref_production?q='+$search);
        sessionStorage.setItem('name','gas_ref_production');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayGasActualProd($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_actual_production?q='+$search+'&excel=excel');
        $('#gas_actual_production').load('{{url('ajax')}}/gas_actual_production?q='+$search);
        sessionStorage.setItem('name','gas_actual_production');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayGasExport($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_export?q='+$search+'&excel=excel');
        $('#gas_export').load('{{url('ajax')}}/gas_export?q='+$search);
        sessionStorage.setItem('name','gas_export');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }
    
    
   
      


    function resolveLoad()
    {
        switch (sessionStorage.getItem('name'))
        {
           case 'obligation':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'supply':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'gas_supply_textile_industry':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'summary':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'utilization':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'gas_balance':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'facility':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'plant':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'gas_product_lpg':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'gas_product_cng':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'gas_product_lng':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'gas_product_propane':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'gas_prod_vol_permit':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'gas_ref_production':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'gas_actual_production':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'gas_export':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            default:
                  $('.obligation').trigger('click');
                  break;
        }
       
    }
    //

    $(function()
    {     
        resolveLoad();                
    });



    

</script>


<script>
    //AJAX SCRIPT TO GET DETAILS FOR 
    $(function()
      {
        $('#company_id_sup').change(function(e)
        { 
          var company_id = $(this).val();     var year = $('#year_gs').val(); 
          formData={ company_id:company_id, year:year }
          $.get('{{url('getCompanyObligation')}}', formData, function(data)
          {  //success data
            $.each(data, function(index, obliObj)
            {
              $('#comp_obligation').val(obliObj.performance_obligation);   
              console.log(obliObj);
            });
          });       
        });
      });


    $(function()
      {
        $('#month_uti').change(function(e)
        { 
          var month = $(this).val();     var year = $('#year_util').val(); //alert(month + " : " + year);
          formData={ month:month, year:year }
          $.get('{{url('getTotalAg_Nag')}}', formData, function(data)
          {  //success data
            $.each(data, function(index, AGNAGObj)
            {
              $('#total_ag_nag').val(AGNAGObj.total);   
              console.log(AGNAGObj);
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
              
              if(name =='obligation')
              {
                 displayObligation(q);
              }
               else if(name=='supply')
               {
                  displayActualSupply(q);
               }
               else if(name=='gas_supply_textile_industry')
               {
                  displayGasSupplyTextileIndustry(q);
               }
               else if(name=='summary')
               {
                  displayProduction(q);
               }
               else if(name=='utilization')
               {
                  displayUtilization(q);
               }
               else if(name=='gas_balance')
               {
                  displayPerformance(q);
               }
               else if(name=='facility')
               {
                  displayFacility(q);
               }
               else if(name=='gas_product_lpg')
               {
                  displayGasProductLPG(q);
               }
               else if(name=='gas_product_cng')
               {
                  displayGasProductCNG(q);
               }
               else if(name=='gas_product_lng')
               {
                  displayGasProductLNG(q);
               }
               else if(name=='gas_product_propane')
               {
                  displayGasProductPROPANE(q);
               }
               else if(name=='gas_prod_vol_permit')
               {
                  displayProductVolPermit(q);
               }
               else if(name=='gas_ref_production')
               {
                  displayRefineryProd(q);
               }
               else if(name=='gas_actual_production')
               {
                  displayGasActualProd(q);
               }
               else if(name=='gas_export')
               {
                  displayGasExport(q);
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
