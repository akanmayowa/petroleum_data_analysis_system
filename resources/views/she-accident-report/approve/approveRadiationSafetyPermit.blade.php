<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Radiation Safety Permit Issued by Well Type <i style="margin-left: 50px">Total : {{$radiations->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appRSPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="RSP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Month </th>
                <th>Company </th>
                <th>Well Type</th>
                <th>Well Name </th>
                <th>Concession </th>
                <th>Radiation Permit Count</th>
            </tr>
            </thead>
            <tbody>
                @if($radiations)
                    @foreach($radiations as $radiation)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$radiation->id}}, '\App\\she_radiation_safety_permit')" class="check_tabs" id="tab_{{$radiation->id}}" name="tab_{{$radiation->id}}" value="0">
                            </th> 
                            <th>{{$radiation->id}}</th>
                            <th>{{$radiation->year}}</th>
                            <th>{{$radiation->month}}</th>
                            <th>{{$radiation->company?$radiation->company->company_name:''}}</th>
                            <th>{{$radiation->well_type}}</th>
                            <th>{{$radiation->well_name}}</th>
                            <th>{{$radiation->concession}}</th>
                            <th>{{$radiation->count}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appRSPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#RSP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_radiation_safety_permit',
                    name:'Radiation Safety Permit',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#RSP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Radiation Safety Permit',
                model_name:'\App\\she_radiation_safety_permit',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayRadiationSafetyPermit();  });      $('#successModal').modal('show');           
        });

        $('#RSP_no_btn').click(function(e)
        {
            $('#appRSPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appRSPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="RSP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="RSP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>