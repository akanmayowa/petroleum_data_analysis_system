<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Metering Projects <i style="margin-left: 50px">Total : {{$meterings->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appMETmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="MET_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>year</th>
                <th>Facility</th>
                <th>Company</th>
                <th>Objective</th>
                <th>Service</th> 
                <th>Phase</th>                           
                <th>Start Date</th>                            
                <th>Commissioning Date</th> 
            </tr>

            </thead>
            <tbody>
                    @forelse($meterings as $metering)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$metering->id}}, '\App\\es_metering')" class="check_tabs" id="tab_{{$metering->id}}" name="tab_{{$metering->id}}" value="0">
                            </th>
                            <th>{{$metering->year}}</th>
                            <th>{{$metering->facility_id}}</th>
                            @if($metering->company_id == 0) 
                            <th>{{$metering->owner_details}}</th> 
                            @else                             
                            <th>@if($metering->company) {{substr($metering->company->company_name, 0, 25)}}... @endif</th> 
                            @endif                             
                            <th>{{$metering->objective}}</th>
                            <th>@if($metering->service) {{$metering->service->service_name}} @endif</th> 
                            <th>{{$metering->phase_id}}</th>
                            <th>{{$metering->start_date}}</th>
                            <th>{{$metering->commissioning_date}}</th>
                        </tr>
                    @empty
                    @endforelse
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appMETmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
        <i class="fa fa-check"> </i> Approve Data </a>    
</div>



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

       
        $('#MET_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\es_metering',
                    name:'Metering',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#MET_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Metering',
                model_name:'\App\\es_metering',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayMetering();  });      $('#successModal').modal('show');           
        });

        $('#MET_no_btn').click(function(e)
        {
            $('#appMETmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appMETmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">                    
                    <div class="swal2-icon swal2-warning pulse-warning" style="display: block;">!</div>
                </div>

                <div class="modal-body">
                    <center> <h2 class="swal2-title" style="margin-top:-40px">Confirm Record(s) Approval?</h2> </center>
                    <br>

                    <div class="" style="text-align: center!important">
                        <button type="button" name="" id="MET_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="MET_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>