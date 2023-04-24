@extends('layouts.app-vue')

    @section('search')
    <div class="search-wrap" id="search-wrap">
        <div class="search-bar">          
            <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" />
            <a href="#" class="close-search toggle-search" data-target="#search-wrap">  <i class="mdi mdi-close-circle" style="font-size:20px"></i> </a>
        </div>
    </div>
    @endsection

@section('content')





<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Weekly Activities For Upstream  </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link acquisition" data-toggle="tab" href="#acq" role="tab" onclick="displayAcquisition()">Upstrean Acquisition </a>
                        </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active p-3" id="acq" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="acquisition">   

                            </div> <!-- end row -->
                        </p>
                    </div>                   
                    
                </div>

            </div>
        </div>
    </div>

</div>












<!-- Add Terminal Streams Production  modal -->
<div id="addAcq" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title"> Upstream Acquisition </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="streaProdForm" action="{{url('/WAR-Upstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_acquisition">
          


          <div class="form-group row">
            <label for="month_acq" class="col-sm-1 col-form-label"> Month </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year Of Export" name="month" id="month_acq" required="">
            </div>

            <label for="week" class="col-sm-1 col-form-label"> Week </label>
            <div class="col-sm-5">
                <select class="form-control" name="week" id="week" required>
                    <option value=""> Select Acquisition Week </option>
                        @forelse($weeks as $week)
                            <option value="{{$week->id}}">{{$week->week}}</option>
                        @empty
                            <option value=""> No Record Found For Week </option>
                        @endforelse
                </select>
            </div>
          </div> 
          

          <div class="form-group row">
            <label for="seismic_data_acquired" class="col-sm-3 col-form-label"> Siesmic data acquired </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Siesmic data quantum acquired" name="seismic_data_acquired" id="seismic_data_acquired">
            </div>
          </div> 

          <div class="form-group row">
            <label for="seismic_data_acquired" class="col-sm-3 col-form-label"> Siesmic data acquired </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Siesmic data quantum acquired" name="seismic_data_acquired" id="seismic_data_acquired">
            </div>
          </div> 

          <div class="form-group row">
            <label for="seismic_data_acquired" class="col-sm-3 col-form-label"> Siesmic data acquired </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Siesmic data quantum acquired" name="seismic_data_acquired" id="seismic_data_acquired">
            </div>
          </div> 

          <div class="form-group row">
            <label for="seismic_data_acquired" class="col-sm-3 col-form-label"> Siesmic data acquired </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Siesmic data quantum acquired" name="seismic_data_acquired" id="seismic_data_acquired">
            </div>
          </div> 

                          


          <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Acquisition </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Terminal Streams Production modal -->
<div id="editterm_stre_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Reconciled Crude Production</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
              <div id="edit_streamprod">

             </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Terminal Streams Production modal -->
<div id="uplterm_stre_prod" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Streams Production Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_terminal_stream_prod">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a id="downloadReconciledCrudeTemplate" download="Gas Reserve Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Stream Production Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>
















@endsection

@section('script')
<script>


    function showmodal(modalid,url=0,hrefid=0)
    {
      if(url!=0){
      $('#'+hrefid).attr('href',url);
      }

        $('#'+modalid).modal('show');
    }


      $(function()
        {
            $('#start_dates').datepicker();
        }); 



</script>


<script>   // JAVASCRIPT AJAX FUNCTION

function appendTable(data, tableId)
{

    if(tableId == 'acquisition_table')
    {   
        $('#'+tableId).prepend('<tr>   <td> '+data.year+' </td>  <td> '+data.month+' </td>  <td> '+data.week+' </td>  <td> '+data.seismic_data_acquired+' </td>  <td> '+data.cumulative_seismic_acquired+' </td>  <td> '+data.annual_seismic_acquisition+' </td>  <td> '+data.seismic_data_processed+' </td>  <a data-toggle="modal" style="cursor: pointer; color:#fff; background-color:#202020; font-size:10px" tooltip="true" onclick="load_acquisition('+data.id+')" class="btn btn-info btn-sm pull-right" title="Edit Upstream Seismic Acquisition"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'crude_export_table')
    {
        $('#'+tableId).prepend('<tr>  <td> '+data.id+' </td>  <td> '+data.stream+' </td>  <td> '+data.year+' </td>  <td> '+data.january+' </td>  <td> '+data.febuary+' </td>  <td> '+data.march+' </td>  <td> '+data.april+' </td>  <td> '+data.may+' </td>  <td> '+data.june+' </td>  <td> '+data.july+' </td>  <td> '+data.august+' </td>  <td> '+data.september+' </td>  <td> '+data.october+' </td>  <td> '+data.november+' </td>  <td> '+data.december+' </td>   <td> <a data-toggle="modal" style="cursor: pointer; color:#fff; font-size:10px" tooltip="true" onclick="view_summary_export('+data.id+')" class="btn btn-warning btn-sm pull-right" title="View Monthly Summary of Crude / Condensate Export"> <i class="fa fa-list"></i>    </a> <a data-toggle="modal" style="cursor: pointer; color:#fff; background-color:#202020; font-size:10px" tooltip="true"  onclick="load_summary_export('+data.id+')" class="btn btn-info btn-sm pull-right" title="Edit Monthly Summary of Crude Export"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>');
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







    $(function()
    {           
        //CRUDE PROD
        $("#streaProdForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('streaProdForm', "{{url('/downstream')}}", 'term_strm_table', 'progressStreamProd', 'addterm_stre_prod');
        });

    });
</script>







<script> //FUNCTIONS TO LOAD EDIT MODALS
    function load_acquisition(id)
    {   
        $('#edit_acq').load("{{url('WAR-Upstream')}}/modals_editAcquisition?id="+id);
        $('#editacq').modal('show');
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
    function displayAcquisition($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/acquisition?q='+$search);

        $('#acquisition').load('{{url('ajax')}}/acquisition?q='+$search);
        sessionStorage.setItem('name','acquisition'); 
    }

    
   
      


    function resolveLoad()
    {

        switch (sessionStorage.getItem('name')) 
        {
            case 'acquisition':
                $('.'+sessionStorage.getItem('name')).trigger('click');
            break;



            default:
                $('.acquisition').trigger('click');
            break; 
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
<script type="text/javascript">
    $(function()
    {
         $('#dynamicsearch').on('keyup', function()
         {           
              name = sessionStorage.getItem('name');

              q = $('#dynamicsearch').val().replace(' ','%20');
              
              if(name=='acquisition')
               {
                  displayAcquisition(q);
               }
               else if(name =='export')
               {
                 displayExport(q);
               }

           })
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



                    
                    
                    
                    
                    
                    
                    
                    
                    
                    