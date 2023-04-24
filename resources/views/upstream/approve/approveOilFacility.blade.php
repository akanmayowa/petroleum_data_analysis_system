<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Oil Facilities <i style="margin-left: 50px">Total : {{$oil_fac->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appOFmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
    <form action="{{route('set-stage_id')}}" method="POST">@csrf 
        <table class="table table-striped mb-0" id="">
            <thead>
                <tr class="th_head" style="background: #ccc"> 
                    <th style="width: 5%">
                        <label style="text-align: left"> <input type="checkbox" class="" id="OF_check_all" style="margin-top: 5px;"> </label>
                    </th>                                 
                    <th>#</th>                                     
                    <th>year</th>                                     
                    <th>Month</th>                                          
                    <th>Company</th>
                    <th>Facility</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Terrain</th>
                    <th>Design Cap</th>
                    <th>Operating Cap</th>
                    <th>Status</th>
                    <th>License Status</th>
                </tr>

            </thead>
            <tbody>
                @if($oil_fac)
                    @foreach($oil_fac as $_oil_facility)
                        <tr>           
                            <th>
                                <input type="checkbox" onclick="setValue({{$_oil_facility->id}}, '\App\\up_major_oil_facilities')" class="check_tabs" id="tab_{{$_oil_facility->id}}" name="tab_{{$_oil_facility->id}}" value="0">
                            </th>
                            <th class="th_hd">{{$_oil_facility->id}}</th>
                            <th class="th_hd">{{$_oil_facility->year}}</th>
                            <th class="th_hd">{{$_oil_facility->month}}</th>
                            <th class="th_hd">@if($_oil_facility->company) {{$_oil_facility->company->company_name}} @endif</th> 
                            <th class="th_hd">@if($_oil_facility->facility) {{$_oil_facility->facility->facility_name}} @endif</th>
                            <th class="th_hd">@if($_oil_facility->facility_type) {{$_oil_facility->facility_type->facility_type_name}} @endif</th>
                            <th class="th_hd">@if($_oil_facility->location) {{$_oil_facility->location->location_name}} @endif</th>
                            <th class="th_hd">@if($_oil_facility->terrain) {{$_oil_facility->terrain->terrain_name}} @endif</th>
                            <th class="th_hd">{{$_oil_facility->design_capacity}}</th>
                            <th class="th_hd">{{$_oil_facility->operating_capacity}}</th> 
                            <th class="th_hd">@if($_oil_facility->gas_status) {{$_oil_facility->gas_status->status_name}} @endif</th>
                            <th class="th_hd">@if($_oil_facility->up_license_status) {{$_oil_facility->up_license_status->license_status_name}} @endif</th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>
    <a data-toggle="tooltip" onclick="showmodal('appOFmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#OF_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_major_oil_facilities',
                    name:'Oil Facilities',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#OF_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Oil Facilities',
                model_name:'\App\\up_major_oil_facilities',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayFacilities();         $('#successModal').modal('show');        
        });

        $('#OF_no_btn').click(function(e)
        {
            $('#appOFmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appOFmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="OF_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="OF_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>