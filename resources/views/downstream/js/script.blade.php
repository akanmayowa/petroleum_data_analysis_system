<script>
    
    $(function()
    {
        $('#start_dates').datepicker();

        $('.year').datepicker(
        {
            autoclose: true,
            startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })

        $('.month').datepicker(
        {
            autoclose: true, 
            format: "MM",
            viewMode: "months", 
            minViewMode: "months"
        })
    });


    function showmodal(modalid, url=0, hrefid=0)
    {
      if(url!=0){
      $('#'+hrefid).attr('href',url);
      }

        $('#'+modalid).modal('show');
    }

      //hide and show coverage and status_remark container
      $('#cove').hide();   $('#st_re').hide();
      
      $(document).on('change',"#seismic_type", function() 
      { 
           //alert( $(this).val())
           var seis_type = $(this).val();
           if(seis_type == 1)
           {
            $('#cove').slideDown();  $('#st_re').slideUp();
           }
           else if(seis_type == 2)
           {
            $('#st_re').slideDown();   $('#cove').slideUp();
           }
      });

      $(function()
        {
            $('#start_dates').datepicker();
        }); 



</script>


<script>   // JAVASCRIPT AJAX FUNCTION

function appendTable(data, tableId)
{

    if(tableId == 'term_strm_table')
    {   
        $('#'+tableId).prepend('<tr>  <th> '+data.stream+' </th>  <th> '+data.company+' </th>  <th> '+data.year+' </th>  <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>   <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_stream_prod('+data.id+')" class="btn-sm pull-right" title="View Terminal Streams Production"> <i class="fa fa-eye"></i>    </a>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_stream_prod('+data.id+')" class="btn-sm pull-right" title="Edit Terminal Streams Production"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>'); 
    }

    else if(tableId == 'crude_export_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.stream+' </th>  <th> '+data.year+' </th>  <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_summary_export('+data.id+')" class="btn-sm pull-right" title="View Monthly Summary of Crude / Condensate Export"> <i class="fa fa-eye"></i>    </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_summary_export('+data.id+')" class="btn-sm pull-right" title="Edit Monthly Summary of Crude Export"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'export_dest_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>   <th> '+data.stream+' </th>  <th> '+data.destination+' </th>  <th> '+data.country+' </th>  <th> '+data.company+' </th>  <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_export_by_destination('+data.id+')" class="btn-sm pull-right" title="View Crude Export By Destination"> <i class="fa fa-eye"></i>    </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_export_by_destination('+data.id+')" class="btn-sm pull-right" title="Edit Crude Export By Destination"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'export_comp_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>   <th> '+data.destination+' </th>   <th> '+data.country+' </th>  <th> '+data.company+' </th>  <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_export_by_company('+data.id+')" class="btn-sm pull-right" title="View Crude Export By Destination Company"> <i class="fa fa-eye"></i>    </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_export_by_company('+data.id+')" class="btn-sm pull-right" title="Edit Crude Export By Destination Company"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'p_plant_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.locations+' </th>  <th> '+data.state+' </th> <th> '+data.location+' </th> <th> '+data.ownership+' </th>  <th> '+data.plant_type+' </th>  <th> '+data.plant_capacity+' </th>  <th> '+data.feedstock+' </th>  <th> '+data.products+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_petrol_plant('+data.id+')" class="btn-sm pull-right" title="Edit Petrochemical Plant Situation"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'ref_cap_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.refinery+' </th>  <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_refinary_capacity('+data.id+')" class="btn-sm pull-right" title="View Refinery Performance"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_refinary_capacity('+data.id+')" class="btn-sm pull-right" title="Edit Refinery Performance"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'ref_perf_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.processing_unit+' </th> <th> '+data.refinery+' </th>  <th> '+data.location+' </th> <th> '+data.value+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_refinary_performance('+data.id+')" class="btn-sm pull-right" title="Edit Refinery Plants in Nigeria"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'dep_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.depot_name+' </th>  <th> '+data.state+' </th> <th> '+data.location+' </th> <th> '+data.ownership+' </th>  <th> '+data.product+' </th>  <th> '+data.design_capacity+' </th>  <th> '+data.truckout+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_depot('+data.id+')" class="btn-sm pull-right" title="Edit Depot Facility"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'jet_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.jetty_name+' </th>  <th> '+data.state+' </th> <th> '+data.location+' </th> <th> '+data.ownership+' </th>  <th> '+data.design_capacity+' </th>  <th> '+data.product+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_jetty('+data.id+')" class="btn-sm pull-right" title="Edit Jetty Facility"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'term_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.terminal_name+' </th>  <th> '+data.facility_type+' </th>  <th> '+data.state+' </th> <th> '+data.location+' </th> <th> '+data.ownership+' </th>  <th> '+data.design_capacity+' </th>  <th> '+data.product+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_terminal('+data.id+')" class="btn-sm pull-right" title="Edit Terminal Facility"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'imp_prod_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.product+' </th>  <th>  </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="import_product('+data.id+')" class="btn-sm pull-right" title="View Import Products"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_import_product('+data.id+')" class="btn-sm pull-right" title="Edit Import Products"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'prod_imp_perm_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.market_segment+' </th>  <th> '+data.product+' </th>  <th> '+data.year+' </th>  <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_product_import_permit('+data.id+')" class="btn-sm pull-right" title="View Product Volumes (Import Permit"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_product_import_permit('+data.id+')" class="btn-sm pull-right" title="Edit Product Volumes (Import Permit)"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'prod_imp_perm_vessel_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.depot_name+' </th>  <th> '+data.field_office+' </th>  <th> '+data.product+' </th>   <th> '+data.value+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_product_import_permit_vessel('+data.id+')" class="btn-sm pull-right" title="View Product Volumes (Import Permit) Vessel"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_product_import_permit_vessel('+data.id+')" class="btn-sm pull-right" title="Edit Product Volumes (Import Permit) Vessel"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'ref_prod_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.market_segment+' </th>  <th> '+data.product+' </th>  <th> '+data.year+' </th>  <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_refinery_production('+data.id+')" class="btn-sm pull-right" title="View Petroleum Products Importation by Market Segment"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_refinery_production('+data.id+')" class="btn-sm pull-right" title="Edit Petroleum Products Importation by Market Segment"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'ref_vol_table')
    {
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th>  <th> '+data.refinery+' </th>  <th> '+data.product+' </th>  <th> '+data.stream+' </th>  <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_refinery_volume('+data.id+')" class="btn-sm pull-right" title="View Refinery Production Volume"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_refinery_production('+data.id+')" class="btn-sm pull-right" title="Edit Refinery Production"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'ave_price_range_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.production_type+' </th>  <th> &#8358;'+data.pms+ '-' +data.pms_to+' </th>   <th> &#8358;'+data.ago+ '-' +data.ago_to+' </th>  <th> &#8358;'+data.dpk+ '-' +data.dpk_to+' </th>   <th>  </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_ave_price_range('+data.id+')" class="btn-sm pull-right" title="View Products Average Consumer Price Range"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_ave_price_range('+data.id+')" class="btn-sm pull-right" title="Edit Products Average Consumer Price Range"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'ret_out_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.state+' </th>  <th> '+data.market_segment+' </th>  <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_retail_outlet('+data.id+')" class="btn-sm pull-right" title="View Retail Outlet Count"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_retail_outlet('+data.id+')" class="btn-sm pull-right" title="Edit Retail Outlet Count"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'out_cap_table')
    {
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th>  <th> '+data.state+' </th>  <th> '+data.market_segment+' </th>  <th> '+data.product+' </th>  <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_outlet_capacity('+data.id+')" class="btn-sm pull-right" title="View Retail Outlet Storage Capacity"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_outlet_capacity('+data.id+')" class="btn-sm pull-right" title="Edit Retail Outlet Storage Capacity"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'lic_mak_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.market_category+' </th>  <th> '+data.company+' </th>  <th> '+data.location+' </th>  <th> '+data.storage_capacity+' </th>  <th>  </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_license_marketer('+data.id+')" class="btn-sm pull-right" title="View Licensed Based Oil Capacity"> <i class="fa fa-eye"></i>   </a <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_license_marketer('+data.id+')" class="btn-sm pull-right" title="Edit Licensed Based Oil Capacity"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'ava_price_table')
    {
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th> <th> '+data.stream+' </th>  <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th>  <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_ave_price('+data.id+')" class="btn-sm pull-right" title="View Average Price of Nigeria Crude Streams"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_ave_price('+data.id+')" class="btn-sm pull-right" title="Edit Average Price of Nigeria Crude Streams" > <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
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
           
           url:'{{url('/downstream/delete-record')}}',
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
    case '\App\\up_ave_price_crude_stream': displayAveragePrice();  break;
    case '\App\\down_depot': displayPlantDepot();  break;
    case '\App\\down_crude_export_by_company': displayDestCompany();  break;
    case '\App\\down_crude_export_by_destination': displayDestination();  break;
    case '\App\\down_monthly_summary_crude_export': displayCrudeExport();  break;
    case '\App\\down_jetty': displayPlantJetty();  break;
    case '\App\\down_licensed_oil_makerters': displayLicenseMarketer();  break;
    case '\App\\down_petrochemical_plant_project': displayPlant();  break;   //TEST
    case '\App\\down_outlet_storage_capacity': displayOutletCapacity();  break;
    case '\App\\down_petrochemical_plant': displayPlant();  break;
    case '\App\\down_ave_consumer_price_range': displayProductRetailPrice();  break;
    case '\App\\down_product_vol_import_permit': displayProductVolPermit();  break;
    case '\App\\down_product_vol_import_permit_vessel': displayProductVolPermitVessel();  break;
    case '\App\\down_refinary_capacity_utilization': displayRefinaryCapacity();  break;
    case '\App\\down_refinery_performance': displayRefinaryPerformance();  break;
    case '\App\\down_refinary_production': displayRefineryProd();  break;
    case '\App\\down_refinery_production_volumes': displayRefineryVolume();  break;
    case '\App\\down_retail_outlet_summary': displayReTailOutlet();  break;
    case '\App\\down_terminal_stream_prod': displayTerminal();  break;
    case '\App\\down_terminal': displayTerminal();  break;

    default:
      // code block
    }
}





    $(function()
    {   
        //CRUDE PROD
        $("#streaProdForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('streaProdForm', "{{url('/downstream')}}", 'term_strm_table', 'progressStreamProd', 'addterm_stre_prod');
        });
        $("#appRecoForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appRecoForm', "{{url('/downstream')}}", 'appreco', 'appRecomodal');
        });

         //CRUDE EXPORT
        $("#crudeExportForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('crudeExportForm', "{{url('/downstream')}}", 'crude_export_table', 'progressCrudeExp', 'addcrude_export');
        }); 
        $("#appExpoForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appExpoForm', "{{url('/downstream')}}", 'appexpo', 'appExpomodal');
        });

         //CRUDE EXPORT BY DESTINATION
        $("#exportDestForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('exportDestForm', "{{url('/downstream')}}", 'export_dest_table', 'progressExpDest', 'addexport_destination');
        });
        $("#appDestForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appDestForm', "{{url('/downstream')}}", 'appdest', 'appDestmodal');
        });

         //CRUDE EXPORT BY COMPANY
        $("#exportCompForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('exportCompForm', "{{url('/downstream')}}", 'export_comp_table', 'progressExpDest', 'addexport_company');
        });
        $("#appCompForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appCompForm', "{{url('/downstream')}}", 'appcomp', 'appCompmodal');
        });

         //Refinery PERFORMANCE
        $("#petPlantForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('petPlantForm', "{{url('/downstream')}}", 'p_plant_table', 'progressPPlant', 'add_pet_plant');
        });
        $("#appPetPlantForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appPetPlantForm', "{{url('/downstream')}}", 'apppetplant', 'appPetPlantmodal');
        });

         //Refinery Capacity Utilization
        $("#refCapForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('refCapForm', "{{url('/downstream')}}", 'ref_cap_table', 'progressRefCap', 'add_ref_capacity');
        });
        $("#appRefCapForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appRefCapForm', "{{url('/downstream')}}", 'apprefcap', 'appRefCapmodal');
        });

         //Refinery Performance Report
        $("#refPerfForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('refPerfForm', "{{url('/downstream')}}", 'ref_perf_table', 'progressRefPerf', 'add_ref_performance');
        });
        $("#appRefPerfForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appRefPerfForm', "{{url('/downstream')}}", 'apprefperf', 'appRefPerfmodal');
        });

         //DEPOT
        $("#depForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('depForm', "{{url('/downstream')}}", 'dep_table', 'progressRefPerf', 'add_dep');
        });
        $("#appDepoForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appDepoForm', "{{url('/downstream')}}", 'appdepo', 'appDepomodal');
        });


         //Jetty
        $("#jetForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('jetForm', "{{url('/downstream')}}", 'jet_table', 'progressRefPerf', 'add_jet');
        });
        $("#appJettForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appJettForm', "{{url('/downstream')}}", 'appjett', 'appJettmodal');
        });


         //Terminal
        $("#termForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('termForm', "{{url('/downstream')}}", 'term_table', 'progressRefPerf', 'add_term');
        });
        $("#appTermForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appTermForm', "{{url('/downstream')}}", 'appterm', 'appTermmodal');
        });


         //Refinery Import Product
        $("#impProdForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('impProdForm', "{{url('/downstream')}}", 'imp_prod_table', 'progresImpProd', 'add_imp_prod');
        });
        $("#appprodForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appprodForm', "{{url('/downstream')}}", 'appprod', 'appProdmodal');
        });

         //Refinery Product Vol Permit
        $("#prodVolPerForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('prodVolPerForm', "{{url('/downstream')}}", 'prod_imp_perm_table', 'progressPVP', 'add_prod_vol_permit');
        });
        $("#appPermForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appPermForm', "{{url('/downstream')}}", 'appperm', 'appPermmodal');
        });

         //Product Vol Permit Vessel
        $("#impVesselForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('impVesselForm', "{{url('/downstream')}}", 'prod_imp_perm_vessel_table', 'progressPVPV', 'add_import_vessel');
        });
        $("#appVesselForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appVesselForm', "{{url('/downstream')}}", 'appperm', 'appImpVesselmodal');
        });

         //Refinery Refinery Production
        $("#refProdForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('refProdForm', "{{url('/downstream')}}", 'ref_prod_table', 'progressRPRO', 'add_ref_production');
        });
        $("#appRefProdForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appRefProdForm', "{{url('/downstream')}}", 'apprefprod', 'appRefProdmodal');
        });

         //Refinery Refinery Production Volume
        $("#refVolForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('refVolForm', "{{url('/downstream')}}", 'ref_vol_table', 'progressRVOL', 'add_ref_volume');
        });
        $("#appRefVolForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appRefVolForm', "{{url('/downstream')}}", 'apprefvol', 'appRefVolmodal');
        });

         //Refinery Refinery Production Volume
         $("#avePriceForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('avePriceForm', "{{url('/downstream')}}", 'ave_price_range_table', 'progressAVE', 'addave_price_range');
        });
        $("#appAvePriceForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appAvePriceForm', "{{url('/downstream')}}", 'appaveprice', 'appAvePricemodal');
        }); 

         //Refinery Outlets
        $("#retOutForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('retOutForm', "{{url('/downstream')}}", 'ret_out_table', 'progressROUT', 'add_ret_outlet');
        }); 
        $("#appOutForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appOutForm', "{{url('/downstream')}}", 'appout', 'appOutmodal');
        });

         //Refinery Outlet Capacity
        $("#outCapForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('outCapForm', "{{url('/downstream')}}", 'out_cap_table', 'progressOCAP', 'add_out_capacity');
        }); 
        $("#appCapForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appCapForm', "{{url('/downstream')}}", 'appcap', 'appCapmodal');
        });  

         //Refinery Licensed Marketers
        $("#licMakForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('licMakForm', "{{url('/downstream')}}", 'lic_mak_table', 'progressLMAK', 'add_license_marketer');
        });
        $("#appMarForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appMarForm', "{{url('/downstream')}}", 'appmar', 'appMarmodal');
        });

         //AVE PRICE
        $("#avePriForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('avePriForm', "{{url('/downstream')}}", 'ava_price_table', 'progressAvePrice', 'addave_price');
        });
        $("#appAvePriceForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appAvePriceForm', "{{url('/downstream')}}", 'appaveprice', 'appAvePricemodal');
        });



    });
</script>





 
<script> //script to get all monthly terminal streams for adding and update
  $(function()
  {   

    $('#stream_id_tsp').change(function(e)
    { 
      var idd = $(this).val();  //alert(idd);

      $.get('{{url('getAlStreamData')}}?stream_id=' + idd, function(data)
      {  //success data
        $('#sulphur_content').empty();
        //$('#sulphur_content').append('<option value=""> Select Sulphur Content  </option>')
        $.each(data, function(index, streamObj)
        {
          $('#sulphur_content').prepend('<option value="'+ streamObj.sulphur_content +'"> '+streamObj.sulphur_content+' </option>'); //console.log();
          $('#january').val(streamObj.january);
          $('#febuary').val(streamObj.febuary);
          $('#march').val(streamObj.march);
          $('#april').val(streamObj.april);
          $('#may').val(streamObj.may);
          $('#june').val(streamObj.june);
          $('#july').val(streamObj.july);
          $('#august').val(streamObj.august);
          $('#september').val(streamObj.september);
          $('#october').val(streamObj.october);
          $('#november').val(streamObj.november);
          $('#december').val(streamObj.december);
          $('#api').val(streamObj.api);
          $('#stream_total').val(streamObj.stream_total);
        });

        $('#sulphur_content').append('<option value="0"> 0 percent </option>');
        $('#sulphur_content').append('<option value="10"> 10 percent </option>');
        $('#sulphur_content').append('<option value="20"> 20 percent </option>');
        $('#sulphur_content').append('<option value="30"> 30 percent </option>');
        $('#sulphur_content').append('<option value="40"> 40 percent </option>');
        $('#sulphur_content').append('<option value="50"> 50 percent </option>');
        $('#sulphur_content').append('<option value="60"> 60 percent </option>');
        $('#sulphur_content').append('<option value="70"> 70 percent </option>');
        $('#sulphur_content').append('<option value="80"> 80 percent </option>');
        $('#sulphur_content').append('<option value="90"> 90 percent </option>');
        $('#sulphur_content').append('<option value="100"> 100 percent </option>');
      
        //determine if to add new stream or updating stream
        
      });       
    });
  });

</script> 



<script> //FUNCTIONS TO LOAD EDIT MODALS
    function load_stream_prod(id)
    {   
        $('#edit_streamprod').load("{{url('downstream')}}/modals_editStreamProd?id="+id);
        $('#editterm_stre_prod').modal('show');
    }
    function view_stream_prod(id)
    {   
        $('#view_streamprod').load("{{url('downstream')}}/view_viewStreamProd?id="+id);
        $('#view_term_stre_prod').modal('show');
    }
    function approve_reconciled(id)
    {   
        $('#app_reco').load("{{url('downstream')}}/approve_approveReconciled?id="+id);
        $('#appreco').modal('show');
    }

    function load_summary_export(id)
    {   
        $('#edit_summaryexport').load("{{url('downstream')}}/modals_editSummaryExport?id="+id);
        $('#editcrude_export').modal('show');
    }
    function view_summary_export(id)
    {   
        $('#view_summaryexport').load("{{url('downstream')}}/view_viewSummaryExport?id="+id);
        $('#view_crude_export').modal('show');
    }
    function approve_export(id)
    {   
        $('#app_expo').load("{{url('downstream')}}/approve_approveExport?id="+id);
        $('#appexpo').modal('show');
    }

    function load_export_by_destination(id)
    {   
        $('#edit_exportdestination').load("{{url('downstream')}}/modals_editExportByDestination?id="+id);
        $('#editexport_destination').modal('show');
    }
    function view_export_by_destination(id)
    {   
        $('#view_exportdestination').load("{{url('downstream')}}/view_viewExportByDestination?id="+id);
        $('#view_export_destination').modal('show');
    }
    function approve_destination(id)
    {   
        $('#app_dest').load("{{url('downstream')}}/approve_approveDestination?id="+id);
        $('#appdest').modal('show');
    }

    function load_export_by_company(id)
    {   
        $('#edit_exportcompany').load("{{url('downstream')}}/modals_editExportByCompany?id="+id);
        $('#editexport_company').modal('show');
    }
    function view_export_by_company(id)
    {   
        $('#view_exportcompany').load("{{url('downstream')}}/view_viewExportByCompany?id="+id);
        $('#view_export_company').modal('show');
    }
    function approve_company(id)
    {   
        $('#app_comp').load("{{url('downstream')}}/approve_approveCompany?id="+id);
        $('#appcomp').modal('show');
    }

    function load_petrol_plant(id)
    {   
        $('#editpetplant').load("{{url('downstream')}}/modals_editPetrolchemicalPlant?id="+id);
        $('#edit_pet_plant').modal('show');
    }
    function view_petrol_plant(id)
    {   
        $('#viewpetplant').load("{{url('downstream')}}/view_viewPetrolchemicalPlant?id="+id);
        $('#view_pet_plant').modal('show');
    }
    function approve_pet_plant(id)
    {   
        $('#app_pet_plant').load("{{url('downstream')}}/approve_approvePetPlant?id="+id);
        $('#apppetplant').modal('show');
    }

    function load_refinary_capacity(id)
    {   
        $('#editrefcapacity').load("{{url('downstream')}}/modals_editRefinaryCapacity?id="+id);
        $('#edit_ref_capacity').modal('show');
    }
    function view_refinary_capacity(id)
    {   
        $('#viewrefcapacity').load("{{url('downstream')}}/view_viewRefinaryCapacity?id="+id);
        $('#view_ref_capacity').modal('show');
    }
    function approve_ref_capacity(id)
    {   
        $('#app_ref_cap').load("{{url('downstream')}}/approve_approveRefCapacity?id="+id);
        $('#apprefcap').modal('show');
    }

    function load_refinary_performance(id)
    {   
        $('#editrefperformance').load("{{url('downstream')}}/modals_editRefinaryPerformance?id="+id);
        $('#edit_ref_performance').modal('show');
    }
    function view_refinary_performance(id)
    {   
        $('#viewrefperformance').load("{{url('downstream')}}/view_viewRefinaryPerformance?id="+id);
        $('#view_ref_performance').modal('show');
    }
    function approve_ref_perf(id)
    {   
        $('#app_ref_perf').load("{{url('downstream')}}/approve_approveRefPerformance?id="+id);
        $('#apprefperf').modal('show');
    }

    function load_depot(id)
    {   
        $('#editdep').load("{{url('downstream')}}/modals_editDepot?id="+id);
        $('#edit_dep').modal('show');
    }
    function view_depot(id)
    {   
        $('#viewdep').load("{{url('downstream')}}/view_viewDepot?id="+id);
        $('#view_depot').modal('show');
    }
    function approve_depot(id)
    {   
        $('#app_depo').load("{{url('downstream')}}/approve_approveDepot?id="+id);
        $('#appdepo').modal('show');
    }

    function load_jetty(id)
    {   
        $('#editjet').load("{{url('downstream')}}/modals_editJetty?id="+id);
        $('#edit_jet').modal('show');
    }
    function view_jetty(id)
    {   
        $('#viewjet').load("{{url('downstream')}}/view_viewDepot?id="+id);
        $('#view_jet').modal('show');
    }
    function approve_jetty(id)
    {   
        $('#app_jett').load("{{url('downstream')}}/approve_approveJetty?id="+id);
        $('#appjett').modal('show');
    }

    function load_terminal(id)
    {   
        $('#editterm').load("{{url('downstream')}}/modals_editTerminal?id="+id);
        $('#edit_term').modal('show');
    }
    function view_terminal(id)
    {   
        $('#viewterm').load("{{url('downstream')}}/view_viewTerminal?id="+id);
        $('#view_term').modal('show');
    }
    function approve_terminal(id)
    {   
        $('#app_term').load("{{url('downstream')}}/approve_approveTerminal?id="+id);
        $('#appterm').modal('show');
    }

    function load_import_product(id)
    {   
        $('#editimpprod').load("{{url('downstream')}}/modals_editImportProduct?id="+id);
        $('#edit_imp_prod').modal('show');
    }
    function view_import_product(id)
    {   
        $('#viewimpprod').load("{{url('downstream')}}/view_viewImportProduct?id="+id);
        $('#view_imp_prod').modal('show');
    }
    function approve_product(id)
    {   
        $('#app_prod').load("{{url('downstream')}}/approve_approveProduct?id="+id);
        $('#appprod').modal('show');
    }

    function load_product_import_permit(id)
    {   
        $('#editprodvolpermit').load("{{url('downstream')}}/modals_editProductVolumePermit?id="+id);
        $('#edit_prod_vol_permit').modal('show');
    }
    function view_product_import_permit(id)
    {   
        $('#viewprodvolpermit').load("{{url('downstream')}}/view_viewProductVolumePermit?id="+id);
        $('#view_prod_vol_permit').modal('show');
    }
    function approve_permit(id)
    {   
        $('#app_perm').load("{{url('downstream')}}/approve_approvePermit?id="+id);
        $('#appperm').modal('show');
    }

    function load_product_import_permit_vessel(id)
    {   
        $('#editimpvessel').load("{{url('downstream')}}/modals_editVessel?id="+id);
        $('#edit_imp_vessel').modal('show');
    }
    function view_product_import_permit_vessel(id)
    {   
        $('#viewimpvessel').load("{{url('downstream')}}/view_viewProductVolumePermitVessel?id="+id);
        $('#view_imp_vessel').modal('show');
    }
    function approve_permit_vessel(id)
    {   
        $('#appimpvessel').load("{{url('downstream')}}/approve_approvePermitVessel?id="+id);
        $('#app_imp_vessel').modal('show');
    }

    function load_refinery_production(id)
    {   
        $('#editrefproduction').load("{{url('downstream')}}/modals_editRefineryProduction?id="+id);
        $('#edit_ref_production').modal('show');
    }
    function view_refinery_production(id)
    {   
        $('#viewrefproduction').load("{{url('downstream')}}/view_viewRefineryProduction?id="+id);
        $('#view_ref_production').modal('show');
    }
    function approve_ref_prod(id)
    {   
        $('#app_refprod').load("{{url('downstream')}}/approve_approveRefProd?id="+id);
        $('#apprefprod').modal('show');
    }

    function load_refinery_volume(id)
    {   
        $('#editrefvolume').load("{{url('downstream')}}/modals_editRefineryVolume?id="+id);
        $('#edit_ref_volume').modal('show');
    }
    function view_refinery_volume(id)
    {   
        $('#viewrefvolume').load("{{url('downstream')}}/view_viewRefineryVolume?id="+id);
        $('#view_ref_volume').modal('show');
    }
    function approve_ref_volume(id)
    {   
        $('#app_ref_vol').load("{{url('downstream')}}/approve_approveRefVolume?id="+id);
        $('#apprefvol').modal('show');
    }


    function load_ave_price_range(id)
    {   
        $('#edit_aveprice_range').load("{{url('downstream')}}/modals_editAvePriceRange?id="+id);
        $('#editave_price_range').modal('show');
    }
    function view_ave_price_range(id)
    {   
        $('#view_aveprice_range').load("{{url('downstream')}}/view_viewAvePriceRange?id="+id);
        $('#view_ave_price_range').modal('show');
    }
    function approve_price_range(id)
    {   
        $('#app_range').load("{{url('downstream')}}/approve_approvePriceRange?id="+id);
        $('#apprange').modal('show');
    }

    function load_retail_outlet(id)
    {   
        $('#editretoutlet').load("{{url('downstream')}}/modals_editRetailOutlet?id="+id);
        $('#edit_ret_outlet').modal('show');
    }
    function view_retail_outlet(id)
    {   
        $('#viewretoutlet').load("{{url('downstream')}}/view_viewRetailOutlet?id="+id);
        $('#view_ret_outlet').modal('show');
    }
    function approve_outlet(id)
    {   
        $('#app_out').load("{{url('downstream')}}/approve_approveOutlet?id="+id);
        $('#appout').modal('show');
    }

    function load_outlet_capacity(id)
    {   
        $('#editoutcapacity').load("{{url('downstream')}}/modals_editOutletCapacity?id="+id);
        $('#edit_out_capacity').modal('show');
    }
    function view_outlet_capacity(id)
    {   
        $('#viewoutcapacity').load("{{url('downstream')}}/view_viewOutletCapacity?id="+id);
        $('#view_out_capacity').modal('show');
    }
    function approve_capacity(id)
    {   
        $('#app_cap').load("{{url('downstream')}}/approve_approveCapacity?id="+id);
        $('#appcap').modal('show');
    }

    function load_license_marketer(id)
    {   
        $('#editlicensemarketer').load("{{url('downstream')}}/modals_editLicenseMarketer?id="+id);
        $('#edit_license_marketer').modal('show');
    }
    function view_license_marketer(id)
    {   
        $('#viewlicensemarketer').load("{{url('downstream')}}/view_viewLicenseMarketer?id="+id);
        $('#view_license_marketer').modal('show');
    }
    function approve_marketer(id)
    {   
        $('#app_mar').load("{{url('downstream')}}/approve_approveMarketer?id="+id);
        $('#appmar').modal('show');
    }
    
    function load_ave_price(id)
    {   
        $('#edit_aveprice').load("{{url('downstream')}}/modals_editAveCrudePrice?id="+id);
        $('#editave_price').modal('show');
    }
    function view_ave_price(id)
    {   
        $('#viewaveprice').load("{{url('downstream')}}/view_viewAveCrudePrice?id="+id);
        $('#viewave_price').modal('show');
    }
    function approve_ave_prices(id)
    {   
        $('#app_ave_pri').load("{{url('downstream')}}/approve_approveAvePrice?id="+id);
        $('#appavepri').modal('show');
    }

</script>


<script>
    $(function()
    {
        //script to calculate total crude export summary
        $('.crex').keyup(function()
        {
            var total_crude_exp = 0;
            $('.crex').each(function()            
            {
                total_crude_exp += parseFloat($(this).val());
            });
            $("#stream_total_ce").val(total_crude_exp);
        }); 

        //script to calculate total crude export summary
        $('.st_prod').keyup(function()
        {
            var total_crude_exp = 0;
            $('.st_prod').each(function()            
            {
                total_crude_exp += parseFloat($(this).val());
            });
            $("#stream_total").val(total_crude_exp);
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

        $('.r_cap').keyup(function()
        {
            var total = 0;
            $('.r_cap').each(function()            
            {
                total += parseFloat($(this).val());
            });
            $("#total_rc").val(total.toFixed(2));
        }); 

        //compute utilization percentage
        $(document).on("input",".r_cap",function()
        {
           var total_util = 0; var util_percent = 0;
            $('.dsg').each(function()            
            {
                total_util += parseFloat($(this).val());
            });
            $("#total_utilization").val(total_util);


            var util = 0; 
            var total_rc = parseFloat($('#total_rc').val());           
            var total_utilization = parseFloat($('#total_utilization_rp').val());
            util = (( total_rc / total_utilization) * 100);

            //util_percent;
            $("#capacity_utilization_rc").val(util.toFixed(2));
        });

        //compute TOTAL PRODUCT VOLs
        $(document).on("input",".pvp",function()
        {
           var total_pvp = 0;
            $('.pvp').each(function()            
            {
                total_pvp += parseFloat($(this).val());
            });
            $("#total_pvp").val(total_pvp);
        });

        //compute TOTAL PRODUCT VOLs Vessel
        $(document).on("input",".vess",function()
        {
           var total_vess = 0;
            $('.vess').each(function()            
            {
                total_vess += parseFloat($(this).val());
            });
            $("#total_vess").val(total_vess);
        });

        //compute TOTAL Refinery PRODUCT VOLs      
        $(document).on("input", "#product_id_rpro", function()
        {
            $("#product_id_rpro option:selected").each(function() 
            {
               var conv = 0;    var tot_ltr = 0;
               //converting to Litres based on the product selected
               var p_id = $(this).text();     
                    if(p_id == 'PMS'){ conv = 1341; }
               else if(p_id == 'AGO'){ conv = 1164; }
               else if(p_id == 'DPK'){ conv = 1164; }
               else if(p_id == 'ATK'){ conv = 1232; }
               else if(p_id == 'BASE OIL'){ conv = 1067; }
               else if(p_id == 'BITUMEN'){ conv = 961.9992; }
               else if(p_id == 'LPFO'){ conv = 1050; }
               else if(p_id == 'LPG'){ conv = 1754.389; }

               //compute TOTAL Refinery PRODUCT VOLs
                $(document).on("input",".rpro",function()
                { 
                    var total_rpro = 0;
                    $('.rpro').each(function()            
                    {
                        total_rpro += parseFloat($(this).val());
                    });

                    $("#total_rpro").val(total_rpro);
                    //console.log(total_rpro);

                tot_ltr = parseFloat(total_rpro * conv);
                $("#total_litres").val(tot_ltr);
                //console.log(tot_ltr);

                });
            });
        });

        //compute TOTAL Refinery Volume      
        $(document).on("input", ".rvol", function()
        {
            var total_rvol = 0;
            $('.rvol').each(function()            
            {
                total_rvol += parseFloat($(this).val());
            });

            $("#total_rvol").val(total_rvol);
            console.log(total_rvol);                         
       
        });

        //compute TOTAL Retail Outlet      
        $(document).on("input", ".out", function()
        {
            var total_out = 0;
            $('.out').each(function()            
            {
                total_out += parseFloat($(this).val());
            });

            $("#total_out").val(total_out);
            console.log(total_out);                         
       
        });


        //compute TOTAL for PMS Retail Outlet      
        $(document).on("input", ".tot_pms", function()
        {
            var total_pms = 0;
            $('.tot_pms').each(function()            
            {
                total_pms += parseInt($(this).val());
            });

            $("#total_pms").val(total_pms);                      
       
        });
        //compute TOTAL for AGO Retail Outlet      
        $(document).on("input", ".tot_ago", function()
        {
            var total_ago = 0;
            $('.tot_ago').each(function()            
            {
                total_ago += parseInt($(this).val());
            });

            $("#total_ago").val(total_ago);                      
       
        });
        //compute TOTAL for DPK Retail Outlet      
        $(document).on("input", ".tot_dpk", function()
        {
            var total_dpk = 0;
            $('.tot_dpk').each(function()            
            {
                total_dpk += parseInt($(this).val());
            });

            $("#total_dpk").val(total_dpk);                      
       
        });

    });

    //setting all values to default 0
    function checkValue(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
            //$('.amount').val(0);
        }
    }


</script> 





<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script>
    function displayTerminal($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/terminal?q='+$search+'&excel=excel');

        $('#terminal').load('{{url('ajax')}}/terminal?q='+$search);
        sessionStorage.setItem('name','terminal');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayCrudeExport()
    {
        // $('#export').load('{{url('ajax')}}/export');
        // sessionStorage.setItem('name','export');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayExport($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/export?q='+$search+'&excel=excel');

        $('#export').load('{{url('ajax')}}/export?q='+$search);
        sessionStorage.setItem('name','export');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayDestination($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/destination?q='+$search+'&excel=excel');

        $('#destination').load('{{url('ajax')}}/destination?q='+$search);
        sessionStorage.setItem('name','destination');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayDestCompany($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/dest_company?q='+$search+'&excel=excel');

        $('#dest_company').load('{{url('ajax')}}/dest_company?q='+$search);
        sessionStorage.setItem('name','dest_company');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayPlant($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/pet_plant?q='+$search+'&excel=excel');
        $('#pet_plant').load('{{url('ajax')}}/pet_plant?q='+$search);
        sessionStorage.setItem('name','pet_plant');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayPlantDepot($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/plant_depot?q='+$search+'&excel=excel');
        $('#plant_depot').load('{{url('ajax')}}/plant_depot?q='+$search);
        sessionStorage.setItem('name','plant_depot');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayPlantJetty($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/plant_jetty?q='+$search+'&excel=excel');
        $('#plant_jetty').load('{{url('ajax')}}/plant_jetty?q='+$search);
        sessionStorage.setItem('name','plant_jetty');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayPlantTerminal($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/plant_terminal?q='+$search+'&excel=excel');
        $('#plant_terminal').load('{{url('ajax')}}/plant_terminal?q='+$search);
        sessionStorage.setItem('name','plant_terminal');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayRefinaryCapacity($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/ref_capacity?q='+$search+'&excel=excel');
        $('#ref_capacity').load('{{url('ajax')}}/ref_capacity?q='+$search);
        sessionStorage.setItem('name','ref_capacity');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayRefinaryPerformance($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/ref_performance?q='+$search+'&excel=excel');
        $('#ref_performance').load('{{url('ajax')}}/ref_performance?q='+$search);
        sessionStorage.setItem('name','ref_performance');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayProduct($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/import_prod?q='+$search+'&excel=excel');
        $('#import_prod').load('{{url('ajax')}}/import_prod?q='+$search);
        sessionStorage.setItem('name','import_prod');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayProductVolPermit($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/prod_vol_permit?q='+$search+'&excel=excel');
        $('#prod_vol_permit').load('{{url('ajax')}}/prod_vol_permit?q='+$search);
        sessionStorage.setItem('name','prod_vol_permit');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayProductVolPermitVessel($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/prod_vol_permit_vessel?q='+$search+'&excel=excel');
        $('#prod_vol_permit_vessel').load('{{url('ajax')}}/prod_vol_permit_vessel?q='+$search);
        sessionStorage.setItem('name','prod_vol_permit_vessel');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }



    function displayRefineryProd($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/ref_production?q='+$search+'&excel=excel');
        $('#ref_production').load('{{url('ajax')}}/ref_production?q='+$search);
        sessionStorage.setItem('name','ref_production');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayRefineryVolume($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/ref_volume?q='+$search+'&excel=excel');
        $('#ref_volume').load('{{url('ajax')}}/ref_volume?q='+$search);
        sessionStorage.setItem('name','ref_volume');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayProductRetailPrice($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/retail_price?q='+$search+'&excel=excel');
        $('#retail_price').load('{{url('ajax')}}/retail_price?q='+$search);
        sessionStorage.setItem('name','retail_price');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayReTailOutlet($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/retail_outlet?q='+$search+'&excel=excel');
        $('#retail_outlet').load('{{url('ajax')}}/retail_outlet?q='+$search);
        sessionStorage.setItem('name','retail_outlet');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayOutletCapacity($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/outlet_capacity?q='+$search+'&excel=excel');
        $('#outlet_capacity').load('{{url('ajax')}}/outlet_capacity?q='+$search);
        sessionStorage.setItem('name','outlet_capacity');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayLicenseMarketer($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/l_marketer?q='+$search+'&excel=excel');
        $('#l_marketer').load('{{url('ajax')}}/l_marketer?q='+$search);
        sessionStorage.setItem('name','l_marketer');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }
    
    function displayAveragePrice($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/ave_price?q='+$search+'&excel=excel');
        $('#ave_price').load('{{url('ajax')}}/ave_price?q='+$search);
        sessionStorage.setItem('name','ave_price');
    }
    
   
      


    function resolveLoad()
    {

        switch (sessionStorage.getItem('name')) 
        {
           case 'terminal':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'export':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'destination':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'dest_company':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'pet_plant':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'plant_depot':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'plant_jetty':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'plant_terminal':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'ref_capacity':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'ref_performance':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'import_prod':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'prod_vol_permit':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'prod_vol_permit_vessel':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'ref_production':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'ref_volume':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'retail_price':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'retail_outlet':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'outlet_capacity':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'l_marketer':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;     

           case 'ave_price':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;


            // default:
            //       $('.terminal').trigger('click');
            //       break; 
        }
       
    }
    //

    $(function()
    {     
        resolveLoad();                
    }); 


    //AJAX SCRIPT TO GET DETAILS FOR 
    $(function()
      {
        $('#refinery_id_rp').change(function(e)
        { 
          var refinery_id = $(this).val();    
          $('#total_utilization_rp').val('');
          $.get('{{url('getRefineryCapacityDetails')}}?refinery_id=' +refinery_id, function(data)
          {  //success data
            $.each(data, function(index, refineryObj)
            {
              //$('#crude_oil_process_').val(yearObj.total);                      
              $('#total_utilization_rp').val(refineryObj.design_capacity * 12);
              //$('#design_capacity_').val(yearObj.total_utilization);
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
              
              if(name=='terminal')
               {
                  displayTerminal(q);
               }
               else if(name =='export')
               {
                 displayExport(q);
               }
               else if(name=='destination')
               {
                  displayDestCompany(q);
               }
               else if(name=='dest_company')
               {
                  displayDestination(q);
               }
               else if(name=='pet_plant')
               {
                  displayPlant(q);
               }
               else if(name=='plant_depot')
               {
                  displayPlantDepot(q);
               }
               else if(name=='plant_jetty')
               {
                  displayPlantJetty(q);
               }
               else if(name=='plant_terminal')
               {
                  displayPlantTerminal(q);
               }
               else if(name=='ref_capacity')
               {
                  displayRefinaryCapacity(q);
               }
               else if(name=='ref_performance')
               {
                  displayRefinaryPerformance(q);
               }
               else if(name=='import_prod')
               {
                  displayProduct(q);
               }
               else if(name=='prod_vol_permit')
               {
                  displayProductVolPermit(q);
               }
               else if(name=='prod_vol_permit_vessel')
               {
                  displayProductVolPermitVessel(q);
               }
               else if(name=='ref_production')
               {
                  displayRefineryProd(q);
               }
               else if(name=='ref_volume')
               {
                  displayRefineryVolume(q);
               }
               else if(name=='retail_price')
               {
                  displayProductRetailPrice(q);
               }
               else if(name=='retail_outlet')
               {
                  displayReTailOutlet(q);
               }
               else if(name=='outlet_capacity')
               {
                  displayOutletCapacity(q);
               }
               else if(name=='l_marketer')
               {
                  displayLicenseMarketer(q);
               }
               else if(name=='ave_price')
               {
                  displayAveragePrice(q);
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
