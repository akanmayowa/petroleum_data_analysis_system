<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Summary of Gas Facility <i style="margin-left: 50px">Total : {{$facilities->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appFACmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="FAC_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Facility</th>
                <th>Type</th>
                <th>Location</th>
                <th>Design Capacity <i class="units">MMscf/D</i></th>
                <th>Operating Capacity <i class="units">MMscf/D</i></th>
                <th>Status</th>
                <th>License Status</th>
            </tr>

            </thead>
            <tbody>
                @if($facilities)
                    @foreach($facilities as $facility)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$facility->id}}, '\App\\gas_major_gas_facilities')" class="check_tabs" id="tab_{{$facility->id}}" name="tab_{{$facility->id}}" value="0">
                            </th>                            
                            <th>{{$facility->year}}</th>
                            <th>@if($facility->facility) {{$facility->facility->facility_name}} @endif</th> 
                            <th class="th_hd">@if($facility->facility_type) {{$facility->facility_type->facility_type_name}} @endif</th>
                            <th class="th_hd">@if($facility->location) {{$facility->location->location_name}} @endif</th>
                            <th data-toggle="tooltip" title="Volume In MMscf/D" class="th_hd">{{$facility->design_capacity}}</th>
                            <th data-toggle="tooltip" title="Volume In MMscf/D" class="th_hd">{{$facility->operating_capacity}}</th> 
                            <th class="th_hd">
                                @if($facility->status_id == 1) Non Operational
                                @elseif($facility->status_id == 2) Non Operational
                                @elseif($facility->status_id == 3) On Standby
                                @elseif($facility->status_id == 4) Down
                                @elseif($facility->status_id == 5) Not Commissioned
                                @elseif($facility->status_id == 6) Under Construction
                                @elseif($facility->status_id == 7) Commissioned
                                @endif
                            </th>
                            <th>{{$facility->license_status}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appFACmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#FAC_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\gas_major_gas_facilities',
                    name:'Gas Facilities',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#FAC_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Gas Facilities',
                model_name:'\App\\gas_major_gas_facilities',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayFacility();  });      $('#successModal').modal('show');           
        });

        $('#FAC_no_btn').click(function(e)
        {
            $('#appFACmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appFACmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="FAC_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="FAC_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>