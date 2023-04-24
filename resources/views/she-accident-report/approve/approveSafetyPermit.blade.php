<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Offshore Safety Permit (OSP) <i style="margin-left: 50px">Total : {{$safety_permits->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appOSPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="OSP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Personnel Registered</th>
                <th>Personnel Captured</th>
                <th>Permit Issued</th>
            </tr>

            </thead>
            <tbody>
                @if($safety_permits)
                    @foreach($safety_permits as $safety_permit)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$safety_permit->id}}, '\App\\she_offshore_safety_permit')" class="check_tabs" id="tab_{{$safety_permit->id}}" name="tab_{{$safety_permit->id}}" value="0">
                            </th> 
                            <th>{{$safety_permit->year}}</th>
                            <th>{{$safety_permit->personnel_registered}}</th>
                            <th>{{$safety_permit->personnel_captured}}</th>
                            <th>{{$safety_permit->permits_issued}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appOSPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
        <i class="fa fa-check"> </i> </a>    
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

       
        $('#OSP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_offshore_safety_permit',
                    name:'Offshore Safety Permit',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#OSP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Offshore Safety Permit',
                model_name:'\App\\she_offshore_safety_permit',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displaySafetyPermit();  });      $('#successModal').modal('show');           
        });

        $('#OSP_no_btn').click(function(e)
        {
            $('#appOSPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appOSPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="OSP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="OSP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>