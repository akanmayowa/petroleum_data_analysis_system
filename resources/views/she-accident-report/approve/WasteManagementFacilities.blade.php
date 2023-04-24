<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Waste Management Facilities <i style="margin-left: 50px">Total : {{$acc_mgts->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appWMFmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="WMF_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Type of Facility</th>
                <th>No Of Approved Facilities</th>
                <th>Status</th>
            </tr>

            </thead>
            <tbody>
                @if($acc_mgts)
                    @foreach($acc_mgts as $acc_mgt)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$acc_mgt->id}}, '\App\\she_accredited_waste_management_facility')" class="check_tabs" id="tab_{{$acc_mgt->id}}" name="tab_{{$acc_mgt->id}}" value="0">
                            </th> 
                            <th>{{$acc_mgt->year}}</th>
                            <th>{{$acc_mgt->month}}</th>
                            <th>@if($acc_mgt->type_of_facility) {{$acc_mgt->type_of_facility->facility_type_name}} @endif</th>
                            <th>{{$acc_mgt->operational_permit}}</th>
                            <th>{{$acc_mgt->status}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appWMFmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#WMF_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_accredited_waste_management_facility',
                    name:'Waste MGT Facilities',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#WMF_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Waste MGT Facilities',
                model_name:'\App\\she_accredited_waste_management_facility',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayWasteFacility();  });      $('#successModal').modal('show');           
        });

        $('#WMF_no_btn').click(function(e)
        {
            $('#appWMFmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appWMFmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="WMF_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="WMF_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>