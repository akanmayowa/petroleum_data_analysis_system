<script>
    
    $(function()
    {
        $('#start_dates').datepicker();

    });


    function showmodal(modalid,url=0,hrefid=0)
    {
      if(url!=0){
      $('#'+hrefid).attr('href',url);
      }

        $('#'+modalid).modal('show');
    }

      //hide and show coverage and status_remark container
      // $('#cove').hide();   $('#st_re').hide();
      
      // $(document).on('change',"#seismic_type", function() 
      // { 
      //      //alert( $(this).val())
      //      var seis_type = $(this).val();
      //      if(seis_type == 1)
      //      {
      //       $('#cove').slideDown();  $('#st_re').slideUp();
      //      }
      //      else if(seis_type == 2)
      //      {
      //       $('#st_re').slideDown();   $('#cove').slideUp();
      //      }
      // });

      $(function()
        {
            $('#start_dates').datepicker();
            $('#dynamicsearch').focus();


            //Hide and show div for Condensate
            $('#contc').click(function()
            {
               $('#contc_id').show();      $('#terrc_id').hide();    $('#fielc_id').hide();              
            });
            $('#terrc').click(function()
            {
               $('#terrc_id').show();      $('#contc_id').hide();    $('#fielc_id').hide();              
            });
            $('#fielc').click(function()
            {
               $('#fielc_id').show();      $('#terrc_id').hide();    $('#contc_id').hide();              
            });


            //Hide and show div for Oil
            $('#cont').click(function()
            {
               $('#cont_id').show();      $('#terr_id').hide();    $('#fiel_id').hide();              
            });
            $('#terr').click(function()
            {
               $('#terr_id').show();      $('#cont_id').hide();    $('#fiel_id').hide();              
            });
            $('#fiel').click(function()
            {
               $('#fiel_id').show();      $('#terr_id').hide();    $('#cont_id').hide();              
            });


            //Hide and show div for Geo type
            $('#geo_phy').hide();      $('#geo_tec').hide(); 

            $('#geophy').click(function()
            {
               $('#geo_phy').show();      $('#geo_tec').hide();                
            });
            $('#geotec').click(function()
            {
               $('#geo_tec').show();      $('#geo_phy').hide();              
            });



            //Hide and show div for AG and NAG
            $('#type_id_gfdp').change(function()
            {
              var id = $(this).val();
              if(id == 1){ $('#ag').show();    $('#nag').hide(); } 
              else{ $('#nag').show();    $('#ag').hide(); }
              
            });


            //Hide and show div for Appriasal/Development and Initial Completion
            $('#type_dgas').change(function()
            {
              var id = $(this).val();
              if(id == 1){ $('#app_dev').show();    $('#ini_com').hide(); } 
              else{ $('#ini_com').show();    $('#app_dev').hide(); }
              
            });
        }); 


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
            $('.res').keyup(function()
            {
                var total = 0;
                $('.res').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_reserves").val(total);
            });

            $('.gas').keyup(function()
            {
                var total = 0;
                $('.gas').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_gas").val(total);
            });



            $('.seis').keyup(function()
            {
                var total_seismic = 0;
                $('.seis').each(function()            
                {
                    total_seismic += parseFloat($(this).val());
                });
                $("#total_sd").val(total_seismic.toFixed(2));
            });

            // $('.rig_mt').keyup(function()
            // {
            //     var total_rig_mt = 0;
            //     $('.rig_mt').each(function()            
            //     {
            //         total_rig_mt += parseFloat($(this).val());
            //     });
            //     $("#total_rig").val(total_rig_mt.toFixed(2));
            // });

            $('.type').keyup(function()
            {
                var total = 0;
                $('.type').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_w").val(total);
            });

            $('.well_t').keyup(function()
            {
                var total_gas_util = 0;
                $('.well_t').each(function()            
                {
                    total_gas_util += parseFloat($(this).val());
                });
                $("#total_wt").val(total_gas_util);
            });

            $('.w_class').keyup(function()
            {  
                var total = 0;
                $('.w_class').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_wc").val(total);
            });

            $('.w_cont').keyup(function()
            {  
                var total = 0;
                $('.w_cont').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_wct").val(total);
            });

            $('.type').keyup(function()
            {  
                var total = 0;
                $('.type').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_ty").val(total);
            });

            $('.pcp').keyup(function()
            {  
                var total_pcp = 0;
                $('.pcp').each(function()            
                {
                    total_pcp += parseFloat($(this).val());
                });
                $("#company_total").val(total_pcp.toFixed(2));

                //function to check if a year is leap year.
                var yrs = $('#year_pcp').val();   var yr = '0000'; var ave_prod = 0;
                if ((yrs % 4 == 0) && (yrs % 100 != 0)) { yr = 366; } else { yr = 366; }
                ave_prod = (total_pcp / yr);

                $("#average_production").val(Math.round(ave_prod));
            });
        });

</script>


<script>   // JAVASCRIPT AJAX FUNCTION

function appendTable(data, tableId)
{
    {{--if(tableId == 'opl_table')--}}
    {{--{--}}
    {{--    $('#'+tableId).prepend('<tr>  <th> '+data.company+' </th> <th> '+data.concession+' </th> <th> '+data.contract+' </th>  <th> '+data.year_of_award+' </th>  <th> '+data.license_expire_date+' </th>   <th> '+data.area+' </th> <th> '+data.terrain+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>   <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_bala_opl('+data.id+')" class="btn-sm pull-right" title="View Oil Prospecting Licenses"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_opl('+data.id+')" class="btn-sm pull-right" title="Edit (OPL) Oil Prospective License"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');--}}
    {{--        //$('#general_status_id').append('<option value="'+data.id+'"> '+sta+' </option>');--}}
    {{--}--}}
    
    {{--else if(tableId == 'oml_table')--}}
    {{--{--}}
    {{--    $('#'+tableId).prepend('<tr> <th> '+data.company+'</th><th>'+data.concession+' </th>  <th> '+data.contract+' </th>  <th> '+data.date_of_grant+'</th>  <th> '+data.license_expire_date+' </th>  <th>'+data.area+' </th> <th> '+data.terrain+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_bala_oml('+data.id+')" class="btn-sm pull-right" title="View Oil Mining Lease"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_oml('+data.id+')" class="btn-sm pull-right" title="Edit (OML) Oil Mining Lease"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');--}}
    {{--}--}}

    if(tableId == 'm_field_table')
    {
        var _date = document.getElementById('date_mf').value;
        $('#'+tableId).prepend('<tr>   <th> '+data.company+' </th> <th> '+data.field+' </th> <th> '+data.blocks+' </th>  <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_m_field('+data.id+')" class="btn-sm pull-right" title="Edit eye Of Marginal Fields"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'data_ps_table')
    {
        $('#'+tableId).prepend('<tr>   <th> '+data.year+' </th>  <th> '+data.company+' </th>  <th> '+data.survey_name+' </th>  <th> '+data.agreement_date+' </th> <th> '+data.area_of_survey+' </th>  <th> '+data.type_of_survey+' </th>  <th> '+data.quantum_of_survey+' </th>  <th> '+data.year_of_survey+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_bala_project_status('+data.id+')" class="btn-sm pull-right" title="View Multi-Client Projects Status"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_project_status('+data.id+')" class="btn-sm pull-right" title="Edit Multi-Client Projects Status"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'open_acr_table')
    {
        $('#'+tableId).prepend('<tr>   <th> '+data.year+' </th>  <th> '+data.basin+' </th>  <th> '+data.opl_blocks_allocated+' </th>  <th> '+data.oml_blocks_allocated+' </th> <th> '+data.blocks_open+' </th>  <th> '+data.total_block+' </th>  <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_open_acreage('+data.id+')" class="btn-sm pull-right" title="Edit Open Acreage Situation"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'reserve_table')
    {
        var _date = document.getElementById('date_res').value; 
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.company+' </th> <th> '+data.condensate_reserves+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#; font-size:10px" tooltip="true"  onclick="load_reserves('+data.id+')" class="btn-sm pull-right" title="Edit  Condensates Reserves"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'reserve_oil_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th> <th> '+data.company+' </th> <th>  </th> <th> '+data.oil_reserves+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_reserves_oil('+data.id+')" class="btn-sm pull-right" title="Edit Oil Reserves"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'depletion_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th> <th> '+data.company+' </th>  <th> '+data.contract+' </th> <th> '+data.prev_oil_condensate+' </th>  <th> '+data.curr_oil_condensate+' </th> <th> '+data.production+' </th>  <th> '+data.net_addition+' </th> <th> '+data.percent_net_addition+' </th> <th> '+data.depletion_rate+' </th> <th> '+data.life_index+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_depletion_rate('+data.id+')" class="btn-sm pull-right" title="Edit Reserve Addition Depletion Rate"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'replacement_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th> <th> '+data.contract+' </th> <th> '+data.oil_condensate_reserve+' </th> <th> '+data.oil_condensate_production+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_replacement_rate('+data.id+')" class="btn-sm pull-right" title="Edit Reserve Replacement Rate"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'resgas_table')
    {
        var _date = document.getElementById('date_res').value; 
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.company+' </th> <th> '+data.associated_gas+' </th>  <th> '+data.non_associated_gas+' </th>  <th> '+data.total_gas+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_reserves_gas('+data.id+')" class="btn-sm pull-right" title="Edit Gas Reserves"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'depletion_gas_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th> <th> '+data.company+' </th>  <th> '+data.contract+' </th> <th> '+data.prev_gas_reserve+' </th>  <th> '+data.curr_gas_reserve+' </th> <th> '+data.production+' </th>  <th> '+data.net_addition+' </th> <th> '+data.percent_net_addition+' </th> <th> '+data.depletion_rate+' </th> <th> '+data.life_index+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_gas_depletion_rate('+data.id+')" class="btn-sm pull-right" title="Edit Reserve Addition Depletion Rate Ratio"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'crude_prod_table')
    { 
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th>  <th> '+data.field+' </th> <th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th>  <th> '+data.april+' </th>  <th> '+data.may+' </th>  <th> '+data.june+' </th>  <th> '+data.july+' </th>  <th> '+data.august+' </th>  <th> '+data.september+' </th>  <th> '+data.october+' </th>  <th> '+data.november+' </th>  <th> '+data.december+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_crude_production('+data.id+')" class="btn-sm pull-right" title="Edit Provisional Crude Production"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'prod_def_table')
    { 
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th>  <th> '+data.month+' </th> <th> '+data.company+' </th>  <th> '+data.contract+' </th>  <th> '+data.value+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_production_deferment('+data.id+')" class="btn-sm pull-right" title="Edit Provisional Crude Production Deferment"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'seismic_data_table')
    {
        $('#'+tableId).prepend('<tr>   <th> '+data.year+' </th>   <th> '+data.month+' </th> <th> '+data.field+' </th>  <th> '+data.terrain+' </th> <th>  </th>  <th>  </th>  <th> '+data.seismic_type+' </th>   <th> '+data.approved_coverage+' </th>  <th> '+data.actual_coverage+' </th>  <th> '+data.status+' </th> <th> '+data.remark+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_seismic_data('+data.id+')" class="btn-sm pull-right" title="Edit Geophysical/Geotechnical Data"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    else if(tableId == 'rig_table')
    {
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th> <th> '+data.rig_type+' </th><th> '+data.terrain+' </th><th> '+data.january+' </th>  <th> '+data.febuary+' </th>  <th> '+data.march+' </th> <th> '+data.april+' </th> <th> '+data.may+' </th> <th> '+data.june+' </th> <th> '+data.july+' </th> <th> '+data.august+' </th> <th> '+data.september+' </th> <th> '+data.october+' </th> <th> '+data.november+' </th> <th> '+data.december+' </th>  <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_rig_disposition('+data.id+')" class="btn-sm pull-right" title="Edit Rig Disposition"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'well_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.terrain+' </th>  <th> '+data.class+' </th>  <th> '+data.type+' </th>  <th> '+data.contract+' </th>  <th> '+data.no_of_well+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_well_activities('+data.id+')" class="btn-sm pull-right" title="View Well Activities"> <i class="fa fa-eye"></i>    </a>     <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_well_activities('+data.id+')" class="btn-sm pull-right" title="Edit Well Activities"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'dgas_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.field+' </th>  <th> '+data.company+' </th>  <th> '+data.concession+' </th>  <th> '+data.well+' </th>  <th> '+data.terrain+' </th>  <th> '+data.reserves+' </th>  <th> '+data.off_take+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_drilling_gas('+data.id+')" class="btn-sm pull-right" title="View Drilling Gas Wells"> <i class="fa fa-eye"></i>    </a>     <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_drilling_gas('+data.id+')" class="btn-sm pull-right" title="Edit Drilling Gas Wells"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'GIC_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.field+' </th>  <th> '+data.company+' </th>  <th> '+data.concession+' </th>  <th> '+data.well+' </th>  <th> '+data.facility+' </th>  <th> '+data.reserves+' </th>  <th> '+data.off_take+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_initial_completion('+data.id+')" class="btn-sm pull-right" title="View Gas Initial Completion Well"> <i class="fa fa-eye"></i>    </a>     <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_gas_initial_completion('+data.id+')" class="btn-sm pull-right" title="Edit Gas Initial Completion Wells"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

   
    else if(tableId == 'type_well_table')
    {
        var _date = document.getElementById('date_wct').value;
        $('#'+tableId).prepend('<tr>   <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.company+' </th>  <th> '+data.oil_producer+' </th>  <th> '+data.gas_producer+' </th>  <th> '+data.gas_injector+' </th>  <th> '+data.water_injector+' </th>  <th> '+data.others+' </th>  <th> '+data.total+' </th>   <th> '+_date+' </th>  <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_well_type('+data.id+')" class="btn-sm pull-right" title="View Well Activities By Type"> <i class="fa fa-eye"></i>    </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_well_type('+data.id+')" class="btn-sm pull-right" title="Edit Well Activities By Type"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'completion_well_table')
    {
        $('#'+tableId).prepend('<tr>   <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.field+' </th>  <th> N/A </th>  <th> N/A </th>  <th> '+data.number_of_well+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_well_completion('+data.id+')" class="btn-sm pull-right" title="Edit Well Completion Activities "> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'workover_well_table')
    {
        $('#'+tableId).prepend('<tr>   <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.field+' </th>  <th> N/A </th>  <th> '+data.company+' </th>  <th> '+data.concession+' </th>  <th> '+data.well+' </th>  <th> '+data.facility+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_well_workover('+data.id+')" class="btn-sm pull-right" title="Edit Well Workover Activities "> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'plugback_well_table')
    {
        $('#'+tableId).prepend('<tr>   <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.field+' </th>  <th> N/A </th>  <th> '+data.number_of_well+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_well_plugback_abandonment('+data.id+')" class="btn-sm pull-right" title="Edit Well Plugback Abandonment Activities "> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'oil_facility_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.company+' </th> <th> '+data.facility+' </th> <th> '+data.facility_type+' </th> <th> '+data.location+' </th>  <th> '+data.terrain+' </th>  <th> '+data.design_capacity+' </th>  <th> '+data.operating_capacity+' </th> <th> '+data.gas_status+' </th>  <th> '+data.license_status+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_oil_facility('+data.id+')" class="btn-sm pull-right" title="View Major Oil Facilities"> <i class="fa fa-eye"></i>   </a> <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_oil_facility('+data.id+')" class="btn-sm pull-right" title="Edit Oil Facility"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'fdp_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.company+' </th> <th> '+data.field+' </th> <th> '+data.production_rate+' </th> <th> '+data.expected_reserves+' </th>  <th> '+data.commencement_date+' </th>  <th> '+data.no_of_well+' </th>  <th> '+data.remark+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_field_development_plan('+data.id+')" class="btn-sm pull-right" title="Edit Field Development Plan"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'gfdp_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.field+' </th> <th> '+data.concession+' </th> <th> '+data.company+' </th> <th> '+data.gas_reserve+' </th> <th> '+data.condensate +' </th>  <th> '+data.ag_reserve+' </th>  <th> '+data.off_take_rate+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_approved_gas_development_plan('+data.id+')" class="btn-sm pull-right" title="Edit Approved Gas Development Plan"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'fsum_table')
    {
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.month+' </th>  <th> '+data.company+' </th> <th> '+data.contract+' </th> <th> '+data.producing_field +' </th>  <th> '+data.well+' </th>  <th> '+data.string+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a  style="cursor: pointer; color:#202020; font-size:10px" tooltip="true"  onclick="load_field_summary('+data.id+')" class="btn-sm pull-right" title="Edit Field Summary"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
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
           
           url:'{{url('/upstream/delete-record')}}',
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
    case '\App\\Bala_opl': displayOPL();  break;
    case '\App\\Bala_oml': displayOML();  break;
    case '\App\\bala_multiclient_project_status': displayStatus();  break;
    case '\App\\concession_unlisted_open': displayOpenAcreage();  break;
    case '\App\\up_reserves_report': displayReserveCondensate();  break;
    case '\App\\up_reserves_oil': displayReserveOil();  break;
    case '\App\\up_reserves_gas': displayAGNAG();  break;
    case '\App\\up_reserve_replacement_rate': displayReserveReplacementRate();  break;
    case '\App\\up_reserve_addition_depletion_rate': displayReserveDepletionRate();  break;
    case '\App\\up_reserve_addition_depletion_rate': displayGasReserveDepletionRate();  break;
    case '\App\\up_provisional_crude_production': displayCrudeProd();  break;
    case '\App\\up_crude_production_deferment': displayCrudeProdDeferment();  break;
    case '\App\\up_seismic_data': displaySeismicData();  break;
    case '\App\\up_rig_disposition': displayRigDisposition();  break;
    case '\App\\up_well_activities': displayWellActivities();  break;
    case '\App\\up_drilling_gas': displayDrillingGas();  break;
    case '\App\\up_gas_initial_completion': displayGasInitialCompletion();  break;
    case '\App\\up_well_completion': displayCompletion();  break;
    case '\App\\up_well_completion': displayCompletionGas();  break;
    case '\App\\up_well_workover': displayWorkover();  break;
    case '\App\\up_well_workover': displayWorkoverGas();  break;
    case '\App\\up_well_plugback_abandonment': displayPlugbackAbandonment();  break;
    case '\App\\up_well_plugback_abandonment': displayPlugbackAbandonmentGas();  break;
    case '\App\\up_field_development_plan': displayFieldDevelopmentPlan();  break;
    case '\App\\up_field_development_plan': displayFieldDevelopmentPlanGas();  break;
    case '\App\\up_approved_gas_development_plan': displayApprovedGasDevelopmentPlan();  break;
    case '\App\\up_field_summary': displayFieldSummary();  break;
    case '\App\\up_field_summary': displayFieldSummaryGas();  break;
    case '\App\\up_major_oil_facilities': displayFacility();  break;

    default:
      // code block
    }
}









    $(function()
    {  
         //OPL
        $("#opl_Form").on('submit',function(e)
        {  
            e.preventDefault();
            processForm('opl_Form', "{{url('/upstream')}}", 'opl_table', 'progressOPL', 'addbala_opl');
        });  


        //OML
        $("#omlForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('omlForm', "{{url('/upstream')}}", 'oml_table', 'progressOML', 'addbala_oml');
        });  


        //M FIELD
        $("#fieldForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('fieldForm', "{{url('/upstream')}}", 'm_field_table', 'progressMField', 'addbala_m_field');
        });


        //PROJ STAT
        $("#pStatusForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('pStatusForm', "{{url('/upstream')}}", 'data_ps_table', 'progressStatus', 'addbala_data_ps');
        }); 
        $("#appMClientForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appMClientForm', "{{url('/upstream')}}", 'app_mclient', 'appMClientModal');
        });


        //PROJ STAT
        $("#openAcrForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('openAcrForm', "{{url('/upstream')}}", 'open_acr_table', 'progressOPen', 'add_open_acr');
        }); 
        $("#appOpenAcrForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appOpenAcrForm', "{{url('/upstream')}}", 'app_open_acr', 'appOpenAcrModal');
        });




        //RESERVES CONDENSATE
        $("#reserveForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('reserveForm', "{{url('/upstream')}}", 'reserve_table', 'progressReserve', 'addres');
        });
        $("#appcondForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appcondForm', "{{url('/upstream')}}", 'appcond', 'appCondmodal');
        });

        //RESERVES OIL
        $("#resoilForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('resoilForm', "{{url('/upstream')}}", 'reserve_oil_table', 'progressReserve', 'addresoil');
        });
        $("#appoilForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appoilForm', "{{url('/upstream')}}", 'appoil', 'appOilmodal');
        });

        //REPLACEMENT
        $("#rateForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('rateForm', "{{url('/upstream')}}", 'replacement_table', 'progressRate', 'add_rate');
        });
        $("#appRateForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appRateForm', "{{url('/upstream')}}", 'app_rate', 'appRatemodal');
        });

        //DEPLETION OIL
        $("#deplForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('deplForm', "{{url('/upstream')}}", 'depletion_table', 'progressdepl', 'add_depl');
        });
        $("#apDeplForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('apDeplForm', "{{url('/upstream')}}", 'app_depl', 'appDeplmodal');
        });

        //RESERVES GAS
        $("#resgasForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('resgasForm', "{{url('/upstream')}}", 'resgas_table', 'progressReserve', 'addresgas');
        });
        $("#appgasForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appgasForm', "{{url('/upstream')}}", 'appgas', 'appGasmodal');
        });


        //CRUDE PROD
        $("#crudeProdForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('crudeProdForm', "{{url('/upstream')}}", 'crude_prod_table', 'progressCrudeProd', 'addcrude_prod');
        });
        $("#appprovForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appprovForm', "{{url('/upstream')}}", 'appprov', 'appProvmodal');
        });


        //CRUDE PROD DEFERMENT
        $("#prodDefForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('prodDefForm', "{{url('/upstream')}}", 'prod_def_table', 'progressProd', 'add_prod_def');
        });
        $("#appProdDefForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appProdDefForm', "{{url('/upstream')}}", 'appproddef', 'appProdDefmodal');
        });

         //SEISMIC DATA
        $("#geoDataForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('geoDataForm', "{{url('/upstream')}}", 'seismic_data_table', 'progressSiesmicData', 'addseis_data');
        }); 
        $("#appseisForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appseisForm', "{{url('/upstream')}}", 'appseis', 'appSeismodal');
        });

         //RIG DISPOSITION
        $("#rigDispForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('rigDispForm', "{{url('/upstream')}}", 'rig_table', 'progressExpDest', 'addrig_disp');
        }); 
        $("#apprigForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('apprigForm', "{{url('/upstream')}}", 'apprig', 'appRigmodal');
        });

         //WELL
        $("#WellForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('WellForm', "{{url('/upstream')}}", 'well_table', 'progressTerrWell', 'add_well');
        }); 
        $("#appwellForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appwellForm', "{{url('/upstream')}}", 'appwell', 'appWellmodal');
        }); 

         //DRILLING GAS
        $("#dGasForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('dGasForm', "{{url('/upstream')}}", 'dgas_table', 'progressdgas', 'add_dri_gas');
        }); 
        $("#appdGasForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appdGasForm', "{{url('/upstream')}}", 'appdrigas', 'appdGasmodal');
        }); 

         //DRILLING GAS COMPLETION
        $("#GICForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('GICForm', "{{url('/upstream')}}", 'GIC_table', 'progressGIC', 'add_GIC');
        }); 
        $("#appGICForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appGICForm', "{{url('/upstream')}}", 'appGIC', 'appGICmodal');
        }); 

  

         //COMPLETION WELL
        $("#compForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('compForm', "{{url('/upstream')}}", 'completion_well_table', 'progressContractWell', 'add_completion');
        });    
        $("#appcompForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appcompForm', "{{url('/upstream')}}", 'appcomp', 'appCompmodal');
        });    

         //WORKOVER WELL
        $("#workForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('workForm', "{{url('/upstream')}}", 'workover_well_table', 'progressContractWell', 'add_workover');
        });     
        $("#appworkForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appworkForm', "{{url('/upstream')}}", 'appwork', 'appWorkmodal');
        });   

         //Plugback Abandonment WELL
        $("#plugForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('plugForm', "{{url('/upstream')}}", 'plugback_well_table', 'progressContractWell', 'add_plugback');
        }); 
        $("#appplugForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appplugForm', "{{url('/upstream')}}", 'appplug', 'appPlugmodal');
        }); 

         //FDP
        $("#fdpForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('fdpForm', "{{url('/upstream')}}", 'fdp_table', 'progressFDP', 'add_fdp');
        }); 
        $("#appfdpForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appfdpForm', "{{url('/upstream')}}", 'appfdp', 'appfdpmodal');
        }); 



       //OIL FACILITY
       $("#oilfacForm").on('submit',function(e)
       { 
          e.preventDefault();
          processForm('oilfacForm', "{{url('/upstream')}}", 'oil_facility_table', 'progressGasFacility', 'add_oil_fac');
       }); 
        $("#appoilfacForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appoilfacForm', "{{url('/upstream')}}", 'appoilfac', 'appOilfacmodal');
        }); 

       //FDP
       $("#gasfdpForm").on('submit',function(e)
       { 
          e.preventDefault();
          processForm('gasfdpForm', "{{url('/upstream')}}", 'gfdp_table', 'progressgfdp', 'add_gas_fdp');
       }); 
        $("#appgasfdpForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appgasfdpForm', "{{url('/upstream')}}", 'appgasfdp', 'appgasfdpmodal');
        }); 

       //FEILD SUMMARY
       $("#fSumForm").on('submit',function(e)
       { 
          e.preventDefault();
          processForm('fSumForm', "{{url('/upstream')}}", 'fsum_table', 'progressfsum', 'add_fsum');
       }); 
        $("#appfSumForm").on('submit',function(e)
        { 
            e.preventDefault();
            approveForm('appfSumForm', "{{url('/upstream')}}", 'appfsum', 'appfSummodal');
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



    $('.year').datepicker(
    {
      format: "yyyy", 
      autoclose: true,
      viewMode: "years", 
      minViewMode: "years"
    });

    $('.month').datepicker(
    {
      format: "MM", autoclose: true,
      viewMode: "months", 
      minViewMode: "months"
    });


        $('#start_date_oil').datepicker
        ({
          autoclose: true ,format: "yyyy-mm-dd"      
        })

        $('#end_date_oil').datepicker
        ({
          autoclose: true ,format: "yyyy-mm-dd"      
        })



        $('#year_of_award_opl').datepicker
        ({
          autoclose: true ,format: "yyyy-mm-dd"      
        })

        $('#license_expire_date_opl').datepicker
        ({
          autoclose: true ,format: "yyyy-mm-dd"      
        })
});
</script>




<script> //FUNCTIONS TO LOAD EDIT MODALS
    function load_bala_opl(id)
    {   
        $('#edit_balaopl').load("{{url('upstream')}}/modals_editBalaOPL?id="+id);
        $('#editbala_opl').modal('show');
    }
    function view_bala_opl(id)
    {   
        $('#viewbalaopl').load("{{url('upstream')}}/view_viewBalaOPL?id="+id);
        $('#viewbala_opl').modal('show');
    }

    function load_bala_oml(id)
    {   
        $('#edit_balaoml').load("{{url('upstream')}}/modals_editBalaOML?id="+id);
        $('#editbala_oml').modal('show');
    }
    function view_bala_oml(id)
    {   
        $('#viewbalaoml').load("{{url('upstream')}}/view_viewBalaOML?id="+id);
        $('#viewbala_oml').modal('show');
    }

    function load_bala_m_field(id)
    {   
        $('#edit_balamfield').load("{{url('upstream')}}/modals_editBalaMarginalField?id="+id);
        $('#editbala_m_field').modal('show');
    }
    function view_bala_m_field(id)
    {   
        $('#vieweditbalamfield').load("{{url('upstream')}}/view_viewBalaMarginalField?id="+id);
        $('#view_balamfield').modal('show');
    }

    function load_bala_project_status(id)
    {   
        $('#edit_baladataps').load("{{url('upstream')}}/modals_editBalaProjectStatus?id="+id);
        $('#editbala_data_ps').modal('show');
    }
    function view_bala_project_status(id)
    {   
        $('#viewbaladataps').load("{{url('upstream')}}/view_viewBalaProjectStatus?id="+id);
        $('#viewbala_data_ps').modal('show');
    }
    function approve_multiclient(id)
    {   
        $('#appmclient').load("{{url('upstream')}}/approve_approveBalaProjectStatus?id="+id);
        $('#app_mclient').modal('show');
    }

    function load_open_acreage(id)
    {   
        $('#editopenacr').load("{{url('upstream')}}/modals_editOpenAcreage?id="+id);
        $('#edit_open_acr').modal('show');
    }
    function approve_open_acreage(id)
    {   
        $('#appopenacr').load("{{url('upstream')}}/approve_approveOpenAcreage?id="+id);
        $('#app_open_acr').modal('show');
    }




    function load_reserves(id)
    {   
        $('#edit_res').load("{{url('upstream')}}/modals_editReserve?id="+id);
        $('#editres').modal('show');
    }
    function view_reserves(id)
    {   
        $('#viewres').load("{{url('upstream')}}/view_viewReserve?id="+id);
        $('#view_res').modal('show');
    }
    function approve_condensate(id)
    {   
        $('#app_cond').load("{{url('upstream')}}/approve_approveReserve?id="+id);
        $('#appcond').modal('show');
    }

    function load_reserves_oil(id)
    {   
        $('#edit_res_oil').load("{{url('upstream')}}/modals_editReserveOil?id="+id);
        $('#editresoil').modal('show');
    }
    function approve_oil(id)
    {   
        $('#app_oil').load("{{url('upstream')}}/approve_approveReserveOil?id="+id);
        $('#appoil').modal('show');
    }

    function load_replacement_rate(id)
    {   
        $('#editrate').load("{{url('upstream')}}/modals_editReplacementRate?id="+id);
        $('#edit_rate').modal('show');
    }
    function approve_replacement_rate(id)
    {   
        $('#apprate').load("{{url('upstream')}}/approve_approveReplacementRate?id="+id);
        $('#app_rate').modal('show');
    }

    function load_depletion_rate(id)
    {   
        $('#editdepl').load("{{url('upstream')}}/modals_editDepletionRate?id="+id);
        $('#edit_depl').modal('show');
    }
    function approve_depletion_rate(id)
    {   
        $('#appdepl').load("{{url('upstream')}}/approve_approveDepletionRate?id="+id);
        $('#app_depl').modal('show');
    }


    function load_reserves_gas(id)
    {   
        $('#edit_res_gas').load("{{url('upstream')}}/modals_editReserveGas?id="+id);
        $('#editresgas').modal('show');
    }
    function view_reserves_gas(id)
    {   
        $('#viewresgas').load("{{url('upstream')}}/view_viewReserveGas?id="+id);
        $('#view_res_gas').modal('show');
    }
    function approve_gas(id)
    {   
        $('#app_gas').load("{{url('upstream')}}/approve_approveReserveGas?id="+id);
        $('#appgas').modal('show');
    }

    function load_gas_depletion_rate(id)
    {   
        $('#editgasdepl').load("{{url('upstream')}}/modals_editGasDepletionRate?id="+id);
        $('#edit_gas_depl').modal('show');
    }
    function approve_gas_depletion_rate(id)
    {   
        $('#appgasdepl').load("{{url('upstream')}}/approve_approveGasDepletionRate?id="+id);
        $('#app_gas_depl').modal('show');
    }


    function load_crude_production(id)
    {   
        $('#edit_crudeprod').load("{{url('upstream')}}/modals_editCrudeProduction?id="+id);
        $('#editcrude_prod').modal('show');
    }
    function view_crude_production(id)
    {   
        $('#viewcrude_prod').load("{{url('upstream')}}/view_viewCrudeProduction?id="+id);
        $('#view_crude_prod').modal('show');
    }
    function approve_provisional(id)
    {   
        $('#app_prov').load("{{url('upstream')}}/approve_approveProvisional?id="+id);
        $('#appprov').modal('show');
    }


    function load_production_deferment(id)
    {   
        $('#editproddef').load("{{url('upstream')}}/modals_editProductionDeferment?id="+id);
        $('#edit_pro_def').modal('show');
    }
    function approve_production_deferment(id)
    {   
        $('#appproddef').load("{{url('upstream')}}/approve_approveProductionDeferment?id="+id);
        $('#app_prod_def').modal('show');
    }


    function load_seismic_data(id)
    {   
        $('#edit_seisdata').load("{{url('upstream')}}/modals_editSeismicData?id="+id);
        $('#editseis_data').modal('show');
    }
    function view_seismic_data(id)
    {   
        $('#view_seisdata').load("{{url('upstream')}}/view_viewSeismicData?id="+id);
        $('#view_seis_data').modal('show');
    }
    function approve_seismic(id)
    {   
        $('#app_seis').load("{{url('upstream')}}/approve_approveSeismic?id="+id);
        $('#appseis').modal('show');
    }



    function load_rig_disposition(id)
    {   
        $('#edit_rigdisp').load("{{url('upstream')}}/modals_editRigDisposition?id="+id);
        $('#editrig_disp').modal('show');
    }
    function view_rig_disposition(id)
    {   
        $('#viewrig_disp').load("{{url('upstream')}}/view_viewRigDisposition?id="+id);
        $('#view_rig_disp').modal('show');
    }
    function approve_rig(id)
    {   
        $('#app_rig').load("{{url('upstream')}}/approve_approveRig?id="+id);
        $('#apprig').modal('show');
    }


    function load_well_activities(id)
    {   
        $('#editwell').load("{{url('upstream')}}/modals_editWellActivities?id="+id);
        $('#edit_well').modal('show');
    }
    function view_well_activities(id)
    {   
        $('#viewwell').load("{{url('upstream')}}/view_viewWellActivities?id="+id);
        $('#view_well').modal('show');
    }
    function approve_well(id)
    {   
        $('#app_well').load("{{url('upstream')}}/approve_approveWell?id="+id);
        $('#appwell').modal('show');
    }


    function load_drilling_gas(id)
    {   
        $('#editdrigas').load("{{url('upstream')}}/modals_editDrillingGas?id="+id);
        $('#edit_dri_gas').modal('show');
    }
    function view_drilling_gas(id)
    {   
        $('#viewdrigas').load("{{url('upstream')}}/view_viewDrillingGas?id="+id);
        $('#view_dri_gas').modal('show');
    }
    function approve_drilling_gas(id)
    {   
        $('#appdrigas').load("{{url('upstream')}}/approve_approveDrillingGas?id="+id);
        $('#app_dri_gas').modal('show');
    }


    function load_gas_initial_completion(id)
    {   
        $('#editGIC').load("{{url('upstream')}}/modals_editGasInitialCompletion?id="+id);
        $('#edit_GIC').modal('show');
    }
    function view_gas_initial_completion(id)
    {   
        $('#viewGIC').load("{{url('upstream')}}/view_viewGasInitialCompletion?id="+id);
        $('#view_GIC').modal('show');
    }
    function approve_gas_initial_completion(id)
    {   
        $('#appGIC').load("{{url('upstream')}}/approve_approveGasInitialCompletion?id="+id);
        $('#app_GIC').modal('show');
    }


    function load_well_completion(id)
    {   
        $('#editcompletion').load("{{url('upstream')}}/modals_editWellCompletion?id="+id);
        $('#edit_completion').modal('show');
    }
    function approve_completion(id)
    {   
        $('#app_comp').load("{{url('upstream')}}/approve_approveCompletion?id="+id);
        $('#appcomp').modal('show');
    }


    function load_well_workover(id)
    {   
        $('#editworkover').load("{{url('upstream')}}/modals_editWellWorkover?id="+id);
        $('#edit_workover').modal('show');
    }
    function approve_workover(id)
    {   
        $('#app_work').load("{{url('upstream')}}/approve_approveWorkover?id="+id);
        $('#appwork').modal('show');
    }


    function load_well_plugback_abandonment(id)
    {   
        $('#editplugback').load("{{url('upstream')}}/modals_editWellPlugbackAbandonment?id="+id);
        $('#edit_plugback').modal('show');
    }
    function approve_plugback(id)
    {   
        $('#app_plug').load("{{url('upstream')}}/approve_approvePlugback?id="+id);
        $('#appplug').modal('show');
    }




    function load_oil_facility(id)
    {   
        $('#editoilfac').load("{{url('upstream')}}/modals_editOilFacility?id="+id);
        $('#edit_oil_fac').modal('show');
    }
    function view_oil_facility(id)
    {   
        $('#viewoilfac').load("{{url('upstream')}}/view_viewOilFacility?id="+id);
        $('#view_oil_fac').modal('show');
    }
    function approve_oil_facility(id)
    {   
        $('#app_oil_fac').load("{{url('upstream')}}/approve_approveOilFacility?id="+id);
        $('#appoilfac').modal('show');
    }


    function load_field_development_plan(id)
    {   
        $('#editfdp').load("{{url('upstream')}}/modals_editFieldDevelopmentPlan?id="+id);
        $('#edit_fdp').modal('show');
    }
    // function view_oil_facility(id)
    // {   
    //     $('#viewoilfac').load("{{url('upstream')}}/view_viewFieldDevelopmentPlan?id="+id);
    //     $('#view_oil_fac').modal('show');
    // }
    function approve_field_development_plan(id)
    {   
        $('#appfdp').load("{{url('upstream')}}/approve_approveFieldDevelopmentPlan?id="+id);
        $('#app_fdp').modal('show');
    }


    function load_approved_gas_development_plan(id)
    {   
        $('#editgfdp').load("{{url('upstream')}}/modals_editApprovedGasDevelopmentPlan?id="+id);
        $('#edit_gfdp').modal('show');
    }
    // function view_oil_facility(id)
    // {   
    //     $('#viewoilfac').load("{{url('upstream')}}/view_viewApprovedGasDevelopmentPlan?id="+id);
    //     $('#view_oil_fac').modal('show');
    // }
    function approve_gas_dp()
    {   
        $('#appgfdp').load("{{url('upstream')}}/approve_approveApprovedGasDevelopmentPlan");
        $('#app_gfdp').modal('show');
    }


    function load_field_summary(id)
    {   
        $('#editfsum').load("{{url('upstream')}}/modals_editFieldSummary?id="+id);
        $('#edit_fsum').modal('show');
    }
    // function view_oil_facility(id)
    // {   
    //     $('#viewoilfac').load("{{url('upstream')}}/view_viewApprovedGasDevelopmentPlan?id="+id);
    //     $('#view_oil_fac').modal('show');
    // }
    function approve_field_summary()
    {   
        $('#appfsum').load("{{url('upstream')}}/approve_approveFieldSummary");
        $('#app_fsum').modal('show');
    }

    
</script>










<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script>
    function displayConcession()
    {
        $('#concession').load('{{url('ajax')}}/concession');
        sessionStorage.setItem('name','concession');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayOPL($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/bala_opls?q='+$search+'&excel=excel');
        $('#bala_opls').load('{{url('ajax')}}/bala_opls?q='+$search);
        sessionStorage.setItem('name','bala_opls'); 
    }

    function displayOML($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/bala_omls?q='+$search+'&excel=excel');
        $('#bala_omls').load('{{url('ajax')}}/bala_omls?q='+$search);
        sessionStorage.setItem('name','bala_omls');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayField($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/bala_field?q='+$search+'&excel=excel');
        $('#bala_field').load('{{url('ajax')}}/bala_field?q='+$search);
        sessionStorage.setItem('name','bala_field');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayStatus($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/bala_data_ps?q='+$search+'&excel=excel');
        $('#bala_data_ps').load('{{url('ajax')}}/bala_data_ps?q='+$search);
        sessionStorage.setItem('name','bala_data_ps');  
    }

    function displayOpenAcreage($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/bala_block?q='+$search+'&excel=excel');
        $('#bala_block').load('{{url('ajax')}}/bala_block?q='+$search);
        sessionStorage.setItem('name','bala_block');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displayReserveCondensate($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/reserve_condensate?q='+$search+'&excel=excel');
        $('#reserve_condensate').load('{{url('ajax')}}/reserve_condensate?q='+$search);
        sessionStorage.setItem('name','reserve_condensate');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayReserveOil($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/reserve_oil?q='+$search+'&excel=excel');
        $('#reserve_oil').load('{{url('ajax')}}/reserve_oil?q='+$search);
        sessionStorage.setItem('name','reserve_oil');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayReserveReplacementRate($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/reserve_replacement_rate?q='+$search+'&excel=excel');
        $('#reserve_replacement_rate').load('{{url('ajax')}}/reserve_replacement_rate?q='+$search);
        sessionStorage.setItem('name','reserve_replacement_rate');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayReserveDepletionRate($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/reserve_depletion_rate?q='+$search+'&excel=excel');
        $('#reserve_depletion_rate').load('{{url('ajax')}}/reserve_depletion_rate?q='+$search);
        sessionStorage.setItem('name','reserve_depletion_rate');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayAGNAG($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/reserve_gas?q='+$search+'&excel=excel');
        $('#reserve_gas').load('{{url('ajax')}}/reserve_gas?q='+$search);
        sessionStorage.setItem('name','reserve_gas');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayGasReserveDepletionRate($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/gas_reserve_depletion_rate?q='+$search+'&excel=excel');
        $('#gas_reserve_depletion_rate').load('{{url('ajax')}}/gas_reserve_depletion_rate?q='+$search);
        sessionStorage.setItem('name','gas_reserve_depletion_rate');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayCrudeProd($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/crude_prods?q='+$search+'&excel=excel');
        $('#crude_prods').load('{{url('ajax')}}/crude_prods?q='+$search);
        sessionStorage.setItem('name','crude_prods');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayCrudeProdDeferment($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/crude_production_deferment?q='+$search+'&excel=excel');
        $('#crude_production_deferment').load('{{url('ajax')}}/crude_production_deferment?q='+$search);
        sessionStorage.setItem('name','crude_production_deferment');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }


    function displaySeismicData($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/seismic_data?q='+$search+'&excel=excel');
        $('#seismic_data').load('{{url('ajax')}}/seismic_data?q='+$search);
        sessionStorage.setItem('name','seismic_data');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayRigDisposition($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/rig_disp?q='+$search+'&excel=excel');
        $('#rig_disp').load('{{url('ajax')}}/rig_disp?q='+$search);
        sessionStorage.setItem('name','rig_disp');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayWellActivities($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/well_activities?q='+$search+'&excel=excel');
        $('#well_activities').load('{{url('ajax')}}/well_activities?q='+$search);
        sessionStorage.setItem('name','well_activities');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayDrillingGas($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/drilling_gas?q='+$search+'&excel=excel');
        $('#drilling_gas').load('{{url('ajax')}}/drilling_gas?q='+$search);
        sessionStorage.setItem('name','drilling_gas');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayGasInitialCompletion($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/gas_initial_completion?q='+$search+'&excel=excel');
        $('#gas_initial_completion').load('{{url('ajax')}}/gas_initial_completion?q='+$search);
        sessionStorage.setItem('name','gas_initial_completion');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayCompletion($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/completion?q='+$search+'&excel=excel');
        $('#completion').load('{{url('ajax')}}/completion?q='+$search);
        sessionStorage.setItem('name','completion');
    }

    function displayCompletionGas($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/completion?q='+$search+'&excel=excel');
        $('#completion_gas').load('{{url('ajax')}}/completion?q='+$search);
        sessionStorage.setItem('name','completion_gas'); 
    }

    function displayWorkover($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/workover?q='+$search+'&excel=excel');
        $('#workover').load('{{url('ajax')}}/workover?q='+$search);
        sessionStorage.setItem('name','workover');
         // $('.'+sessionStorage.getItem('name')).addClass('active'); 
      // sessionStorage.setItem('url','{{url('ajax')}}/workover?q='+$search+'&excel=excel');
      //   $('#workover_gas').load('{{url('ajax')}}/workover?q='+$search);
      //   sessionStorage.setItem('name','workover_gas'); 
    }

    function displayWorkoverGas($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/workover?q='+$search+'&excel=excel');
        $('#workover_gas').load('{{url('ajax')}}/workover?q='+$search);
        sessionStorage.setItem('name','workover_gas'); 
    }

    function displayPlugbackAbandonment($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/plugback_abandonment?q='+$search+'&excel=excel');
        $('#plugback_abandonment').load('{{url('ajax')}}/plugback_abandonment?q='+$search);
        sessionStorage.setItem('name','plugback_abandonment');
    }

    function displayPlugbackAbandonmentGas($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/plugback_abandonment?q='+$search+'&excel=excel');
        $('#plugback_abandonment_gas').load('{{url('ajax')}}/plugback_abandonment?q='+$search);
        sessionStorage.setItem('name','plugback_abandonment_gas');  
    }
    
    function displayFieldDevelopmentPlan($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/field_development_plan?q='+$search+'&excel=excel');
        $('#field_development_plan').load('{{url('ajax')}}/field_development_plan?q='+$search);
        sessionStorage.setItem('name','field_development_plan');
    }
    
    function displayFieldDevelopmentPlanGas($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/field_development_plan_gas?q='+$search+'&excel=excel');
        $('#field_development_plan_gas').load('{{url('ajax')}}/field_development_plan_gas?q='+$search);
        sessionStorage.setItem('name','field_development_plan_gas'); 
    }

    function displayApprovedGasDevelopmentPlan($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/approved_gas_development_plan?q='+$search+'&excel=excel');
        $('#approved_gas_development_plan').load('{{url('ajax')}}/approved_gas_development_plan?q='+$search);
        sessionStorage.setItem('name','approved_gas_development_plan');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }

    function displayFieldSummary($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/field_summary?q='+$search+'&excel=excel');
        $('#field_summary').load('{{url('ajax')}}/field_summary?q='+$search);
        sessionStorage.setItem('name','field_summary');
    }

    function displayFieldSummaryGas($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/field_summary?q='+$search+'&excel=excel');
        $('#field_summary_gas').load('{{url('ajax')}}/field_summary?q='+$search);
        sessionStorage.setItem('name','field_summary_gas'); 
    }
   
      

    function displayFacility($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/oil_facility?q='+$search+'&excel=excel');
        $('#oil_facility').load('{{url('ajax')}}/oil_facility?q='+$search);
        sessionStorage.setItem('name','oil_facility');
         // $('.'+sessionStorage.getItem('name')).addClass('active');  
    }



    function resolveLoad()
    {

        switch (sessionStorage.getItem('name')) 
        {
           case 'concession':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'bala_opls':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'bala_block':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'bala_field':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'bala_data_ps':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'open_acreage':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;


           case 'reserve_condensate':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'reserve_oil':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'reserve_replacement_rate':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
           break;

           case 'reserve_depletion_rate':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
           break;

           case 'reserve_gas':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'gas_reserve_depletion_rate':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
           break;

            case 'crude_prods':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'crude_production_deferment':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'seismic_data':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'rig_disp':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'well_activities':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'drilling_gas':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'gas_initial_completion':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
                 
           case 'completion':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
                 
           case 'completion_gas':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'workover':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'workover_gas':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'plugback_abandonment':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'plugback_abandonment_gas':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'oil_facility':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'field_development_plan':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'field_development_plan_gas':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'approved_gas_development_plan':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'approved_gas_development_plan':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'field_summary':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
                 
           case 'field_summary_gas':
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




<!-- Script to tie development class to type in well activity -->
<script>
    $(function()
    {
        //hidding development type form 
        $('#dev_type').hide();   $('#type_id').hide(); 
        //getting class id
        $('#class_id').change(function(e)
        {
            var class_id = $(this).val();   
              if(class_id == 5){ $('#dev_type').slideDown();   $('#type_id').show();  } else { $('#dev_type').hide(); }
        });
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
                    concole.log(fieldObj);
                });
              }); 
        });

        //Appending Company Facility For Seismic Data
        $('#company_id_sd').change(function(e)
        {
            var company_id = $(this).val();   
              $.get('{{url('getFields')}}?company_id=' +company_id, function(data)
              {  
                $('#field_id_sd').empty();
                $('#field_id_sd').append('<option value=""> Select A Field </option>');  
                $.each(data, function(index, fieldObj)
                {
                  $('#field_id_sd').append('<option value="'+ fieldObj.id +'"> '+ fieldObj.field_name +' </option>');         
                });
              }); 
        });


    });
</script>


<!-- AJAX DEPENDENCIES -->
<script>
    $(function()
    {
        //Appending Field Concession Block Name
        $('#field_id_mf').change(function(e)
        {
            var id = $(this).val();   
              $.get('{{url('getFieldDetails')}}?id=' +id, function(data)
              {   
                $.each(data, function(index, fieldObj)
                {  console.log(fieldObj);  
                  $('#blocks').val(fieldObj.concession_id);         
                });
              }); 
        });

        //Resolving Company Details for field
        $('#add_mf_btn').mouseover(function(e)
        {
            var id = $('#blocks').val(); 
              $.get('{{url('getFieldCompanyDetails')}}?id=' +id, function(data)
              {  
                $.each(data, function(index, companyObj)
                {  console.log(companyObj);  
                  $('#company_id_mf').val(companyObj.company_id);               $('#blocks').val(companyObj.concession_name); 
                });
              }); 
        });


        //Appending Company and Contract for Field
        $('#field_id_cp').change(function(e)
        {
            var id = $(this).val();   
              $.get('{{url('getFieldDetails')}}?id=' +id, function(data)
              {   
                $.each(data, function(index, fieldObj)
                {  console.log(fieldObj);  
                  $('#contract_id_cp').val(fieldObj.concession_id);         
                });
              }); 
        });

        //Resolving Company Details for field
        $('#add_cp_btn').mouseover(function(e)
        {
            var id = $('#contract_id_cp').val(); 
              $.get('{{url('getFieldCompanyDetails')}}?id=' +id, function(data)
              {  
                $.each(data, function(index, companyObj)
                {  console.log(companyObj);  
                  $('#company_id_cp').val(companyObj.company_id);               $('#contract_id_cp').val(companyObj.contract_id); 
                });
              }); 
        });




        //OPL   Appending Concession Block Company and Contract Type
        $('#concession_held_id_opl').change(function(e)
        {
            var id = $(this).val();   
              $.get('{{url('getConcessionDetails')}}?id=' +id, function(data)
              {   
                $.each(data, function(index, concessionObj)
                {  console.log(concessionObj);  
                  $('#company_id_opl').val(concessionObj.company_id); 
                  $('#equity_distribution_opl').val(concessionObj.equity_distribution);  
                  $('#contract_type_opl').val(concessionObj.contract_id); 
                  $('#area_opl').val(concessionObj.area);     
                  $('#year_of_award_opl').val(concessionObj.award_date);         
                });
              }); 
        });


        //OML   Appending Concession Block Company and Contract Type
        $('#concession_held_id_oml').change(function(e)
        {
            var id = $(this).val();   
              $.get('{{url('getConcessionDetails')}}?id=' +id, function(data)
              {   
                $.each(data, function(index, concessionObj)
                {  console.log(concessionObj);  
                  $('#company_id_oml').val(concessionObj.company_id);   
                  $('#equity_distribution_oml').val(concessionObj.equity_distribution); 
                  $('#contract_type_oml').val(concessionObj.contract_id); 
                  $('#area_oml').val(concessionObj.area);     
                  $('#date_of_grant').val(concessionObj.award_date);         
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
              
              if(name =='bala_opls')
              {
                 displayOPL(q);
              }
               else if(name=='bala_omls')
               {
                  displayOML(q);
               }
               else if(name=='bala_field')
               {
                  displayField(q);
               }
               else if(name=='bala_data_ps')
               {
                  displayStatus(q);
               }
               else if(name=='bala_block')
               {
                  displayOpenAcreage(q);
               }
               else if(name=='reserve_condensate')
               {
                  displayReserveCondensate(q);
               }
               else if(name=='reserve_oil')
               {
                  displayReserveOil(q);
               }
               else if(name=='reserve_replacement_rate')
               {
                  displayReserveOil(q);
               }
               else if(name=='reserve_depletion_rate')
               {
                  displayReserveOil(q);
               }
               else if(name=='reserve_gas')
               {
                  displayAGNAG(q);
               }
               else if(name=='gas_reserve_depletion_rate')
               {
                  displayReserveOil(q);
               }
               else if(name=='crude_prods')
               {
                  displayCrudeProd(q);
               }
               else if(name=='crude_production_deferment')
               {
                  displayCrudeProdDeferment(q);
               }
               else if(name=='seismic_data')
               {
                  displaySeismicData(q);
               }
               else if(name=='rig_disp')
               {
                  displayRigDisposition(q);
               }
               else if(name=='well_activities')
               {
                  displayWellActivities(q);
               }
               else if(name=='drilling_gas')
               {
                  displayDrillingGas(q);
               }
               else if(name=='gas_initial_completion')
               {
                  displayGasInitialCompletion(q);
               }
               else if(name=='completion')
               {
                  displayCompletion(q);
               }
               else if(name=='workover')
               {
                  displayWorkover(q);
               }
               else if(name=='plugback_abandonment')
               {
                  displayPlugbackAbandonment(q);
               }
               else if(name=='oil_facility')
               {
                  displayFacility(q);
               }
               else if(name=='field_development_plan')
               {
                  displayFieldDevelopmentPlan(q);
               }
               else if(name=='field_development_plan_gas')
               {
                  displayFieldDevelopmentPlan(q);
               }
               else if(name=='approved_gas_development_plan')
               {
                  displayApprovedGasDevelopmentPlan(q);
               }
               else if(name=='field_summary')
               {
                  displayFieldSummary(q);
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
