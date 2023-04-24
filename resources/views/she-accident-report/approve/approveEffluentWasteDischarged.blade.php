<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending EFFLUENT WASTE DISCHARGE <i style="margin-left: 50px">Total : {{$effluents->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appEFFmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0" id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="EFF_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Well Name</th>
                <th>Spent WBM</th>
                <th>Spent OBM</th>
                <th>WBM Cuttings Generated</th>
                <th>OBM Cuttings Generated</th>
                <th>Waste Managers</th>
            </tr>

            </thead>
            <tbody>
                @if($effluents)
                    @foreach($effluents as $effluent)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$effluent->id}}, '\App\\she_effluent_waste_discharged')" class="check_tabs" id="tab_{{$effluent->id}}" name="tab_{{$effluent->id}}" value="0">
                            </th> 
                            <th>{{$effluent->year}}</th>
                            <th>{{$effluent->month}}</th>
                            <th>{{substr($effluent->company?$effluent->company->company_name:'', 0, 30)}}</th>
                            <th>{{$effluent->well_name}}</th>
                            <th>{{$effluent->spent_wbm}}</th> 
                            <th>{{$effluent->spent_obm}}</th>
                            <th>{{$effluent->wbm_generated}}</th> 
                            <th>{{$effluent->obm_generated}}</th> 
                            <th>{{$effluent->waste_manager}}</th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appEFFmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
        <i class="fa fa-check"> </i> Approve Data </a>    
</div>



<script>
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

       
        $('#EFF_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_effluent_waste_discharged',
                    name:'Effluent Waste Discharge',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#EFF_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Effluent Waste Discharge',
                model_name:'\App\\she_effluent_waste_discharged',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayEffluentWasteDischarged();  });      $('#successModal').modal('show');           
        });

        $('#EFF_no_btn').click(function(e)
        {
            $('#appEFFmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appEFFmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="EFF_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="EFF_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>