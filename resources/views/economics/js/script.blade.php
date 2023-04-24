<script>  

    function showmodal(modalid, url=0, hrefid=0)
    {
      if(url!=0){ 
      $('#'+hrefid).attr('href',url);
      }

        $('#'+modalid).modal('show');
    }

      
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

</script>


<script>   // JAVASCRIPT AJAX FUNCTION

function appendTable(data, tableId)
{

    if(tableId == 'rate_table')
    {
        var _date = document.getElementById('date_rate').value;
        $('#'+tableId).prepend('<tr> <th> '+data.date+' </th> <th> '+data.currency+' </th>  <th> '+data.rate+' </th>   <th> '+_date+' </th>  <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" id="'+data.id+'" class="btn-sm pull-right x_rate" title="Edit Revenue Exchange Rate"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'ava_price_table')
    {
        var _date = document.getElementById('date_ave').value;
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th> <th> '+data.stream+' </th>  <th> '+data.value+' </th>   <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_ave_price('+data.id+')" class="btn-sm pull-right" title="View Average Price of Nigeria Crude Streams"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_ave_price('+data.id+')" class="btn-sm pull-right" title="Edit Average Price of Nigeria Crude Streams" > <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'projected_table')
    {
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th> <th> '+data.oil_projected+' </th>  <th> '+data.gas_projected+' </th> <th> '+data.gas_flare_projected+' </th>  <th> '+data.concession_projected+' </th>  <th> '+data.misc_projected+' </th>  <th> '+data.signature_bonus+' </th>  <th> '+data.total_projected+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_revenue_projected('+data.id+')" class="btn-sm pull-right" title="View Revenue Projected Summary"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_revenue_projected('+data.id+')" class="btn-sm pull-right" title="Edit Revenue Projected" > <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }

    else if(tableId == 'actual_table')
    {
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th> <th> '+data.month+' </th> <th> '+data.oil_actual+' </th>  <th> '+data.gas_actual+' </th> <th> '+data.gas_flare_actual+' </th>  <th> '+data.concession_actual+' </th>  <th> '+data.misc_actual+' </th>  <th> '+data.signature_bonus+' </th>  <th> '+data.total_actual+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_revenue_actual('+data.id+')" class="btn-sm pull-right" title="View Revenue Actual"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_revenue_actual('+data.id+')" class="btn-sm pull-right" title="Edit Revenue Actual" > <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
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



//function to process form data
function XrateForm(formid, route, tableId)
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
                var row_id = $('#idd').val();
                // $('#row_'+row_id).remove();             location.reload();

                appendTable(data.message,tableId);
                $('#date_exc').val('');    $('#currency').val('');    $('#rate').val('');   $('#idd').val('');
                toastr.success(data.info, {timeOut:60000});
                return;
            }

            return toastr.error(data.info, {timeOut:60000}); 
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
           
           url:'{{url('/economics/delete-record')}}',
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
    case '\App\\eco_revenue_projected': displayRevenueProjected();  break;
    case '\App\\eco_revenue_actual': displayRevenueActual();  break;

    default:
      // code block
    }
}





$(function()
{ 
    $("#rateForm").on('submit',function(e)
    { 
        e.preventDefault();
        XrateForm('rateForm', "{{url('/economics')}}", 'rate_table');
    });

     //AVE PRICE
    $("#avePriForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('avePriForm', "{{url('/economics/add_ave_price_crude')}}", 'ava_price_table', 'progressAvePrice', 'addave_price');
    }); 
    $("#appAvePrimodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appAvePrimodal', "{{url('/economics/approve/approve_ave_price')}}", 'appavepri', 'appaveprimodal');
    });

    //REVENUE SUMMARY
    $("#proForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('proForm', "{{url('/economics')}}", 'projected_table', 'progressRevSum', 'add_revenue_pro');
    }); 
    $("#appProjmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appProjmodal', "{{url('/economics')}}", 'appproj', 'appprojmodal');
    });   

    //REVENUE SUMMARY
    $("#actForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('actForm', "{{url('/economics')}}", 'actual_table', 'progressRevSum', 'add_revenue_act');
    }); 
    $("#appActmodal").on('submit',function(e)
    { 
        e.preventDefault();
        approveForm('appActmodal', "{{url('/economics')}}", 'appact', 'appactmodal');
    });   

});

</script>



<script>
$(function()
{ 

    //
    $("#add_rate_btn").on('mouseover', function(e)
    { 
        var id = $('#idd').val();
        if($('#idd').val() != '') { $('#row_'+id).remove(); }
    }); 

    // $('#date_exc').datepicker(
    // {
    //   format: "yyyy",
    //   autoclose:true,
    //   viewMode: "years", 
    //   minViewMode: "years",
    //   orientation: "bottom"
    // });


    $('.year').datepicker(
    {
      format: "yyyy",
      autoclose:true,
      viewMode: "years", 
      minViewMode: "years"
    });

    $('.month').datepicker(
    {
      format: "MM",
      autoclose:true,
      viewMode: "months", 
      minViewMode: "months"
    });





    //compute TOTAL Projected      
    $(document).on("input", ".proj", function()
    {
        var total_proj = 0;
        $('.proj').each(function()            
        {
            total_proj += parseFloat($(this).val());
        });

        $("#total_projected").val(total_proj);
        console.log(total_proj);                         
   
    });


    //compute TOTAL Actual      
    $(document).on("input", ".act", function()
    {
        var total_act = 0;
        $('.act').each(function()            
        {
            total_act += parseFloat($(this).val());
        });

        $("#total_actual").val(total_act);
        console.log(total_act);                         
   
    });
});
</script>




<script> //FUNCTIONS TO LOAD EDIT MODALS
    
    function load_ave_price(id)
    {   
        $('#edit_aveprice').load("{{url('economics')}}/model_editAveCrudePrice?id="+id);
        $('#editave_price').modal('show');
    }
    function view_ave_price(id)
    {   
        $('#viewaveprice').load("{{url('economics')}}/view_viewAveCrudePrice?id="+id);
        $('#viewave_price').modal('show');
    }
    function approve_aveprice(id)
    {   
        $('#app_ave_pri').load("{{url('economics')}}/approve_approveAvePrice?id="+id);
        $('#appavepri').modal('show');
    }

    function load_revenue_projected(id)
    {   
        $('#editrevenuepro').load("{{url('economics')}}/modals_editRevenueProjected?id="+id);
        $('#edit_revenue_pro').modal('show');
    }
    function view_revenue_projected(id)
    {   
        $('#viewrevenuepro').load("{{url('economics')}}/view_viewRevenueProjected?id="+id);
        $('#view_revenue_pro').modal('show');
    }
    function approve_proj(id)
    {   
        $('#app_proj').load("{{url('economics')}}/approve_approveProjected?id="+id);
        $('#appproj').modal('show');
    }

    function load_revenue_actual(id)
    {   
        $('#editrevenueact').load("{{url('economics')}}/modals_editRevenueActual?id="+id);
        $('#edit_revenue_act').modal('show');
    }
    function view_revenue_actual(id)
    {   
        $('#viewrevenueact').load("{{url('economics')}}/view_viewRevenueActual?id="+id);
        $('#view_revenue_act').modal('show');
    }
    function approve_act(id)
    {   
        $('#app_act').load("{{url('economics')}}/approve_approveActual?id="+id);
        $('#appact').modal('show');
    }
    
</script>










<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script>
    
    function displayAveragePrice($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/ave_price?q='+$search+'&excel=excel');
        $('#ave_price').load('{{url('ajax')}}/ave_price?q='+$search);
        sessionStorage.setItem('name','ave_price');
    }
    
    function displayRevenueProjected($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/revenue_projected?q='+$search+'&excel=excel');

        $('#revenue_projected').load('{{url('ajax')}}/revenue_projected?q='+$search);
        sessionStorage.setItem('name','revenue_projected');
    }
    
    function displayRevenueActual($search=0)
    {
      sessionStorage.setItem('url','{{url('ajax')}}/revenue_actual?q='+$search+'&excel=excel');

        $('#revenue_actual').load('{{url('ajax')}}/revenue_actual?q='+$search);
        sessionStorage.setItem('name','revenue_actual');
    }
   
      


    function resolveLoad()
    {

        switch (sessionStorage.getItem('name')) 
        {                 
           case 'ave_price':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'revenue_projected':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'revenue_actual':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;


            // default:
            //       $('.ave_price').trigger('click');
            //       break;
        }
       
    }
    //

    $(function()
    {     
        resolveLoad();                
    });
</script>

<script>
  $(function()
  {    
       $('[data-toggle="tooltip"]').tooltip();   
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
              
              if(name=='revenue_projected')
               {
                  displayRevenueProjected(q);
               }
               else if(name =='revenue_actual')
               {
                 displayRevenueActual(q);
               }

           })
    });



    //AJAX SCRIPT TO GET DETAILS FOR EXCHANGE RATE
    $(function()
    {
        $('.x_rate').click(function(e)
        {  
          var id = $(this).attr("id");     
          $.get('{{url('getExchangeRateDetails')}}?id=' +id, function(data)
          {                      
              $('#idd').val(data.id);
              $('#date_exc').val(data.date);
              $('#currency').val(data.currency);
              $('#rate').val(data.rate);
          });      
        });
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

    // function sortByApproved($approve=0, $name)
    // {   
    //     sessionStorage.setItem('url','{{url('ajax')}}/'+$name+'?a='+$approve);
    //     $('#'+$name).load('{{url('ajax')}}/'+$name+'?a='+$approve);
    //     sessionStorage.setItem('name',''+$name); 
    // }
</script>
