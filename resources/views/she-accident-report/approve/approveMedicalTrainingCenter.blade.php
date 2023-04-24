<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Medical Emergency Training Centres <i style="margin-left: 50px">Total : {{$training_centers->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appMTCmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="MTC_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Companies</th>
                <th>Facility Location Address</th>
                <th>Approved Courses</th>
            </tr>

            </thead>
            <tbody>
                @if($training_centers)
                    @foreach($training_centers as $training_center)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$training_center->id}}, '\App\\she_medical_training_center')" class="check_tabs" id="tab_{{$training_center->id}}" name="tab_{{$training_center->id}}" value="0">
                            </th> 
                            <th>{{$training_center->year}}</th>
                            <th>{{$training_center->companies}}</th>
                            <th>{{$training_center->facility_address}}</th>
                            <th>{{$training_center->approved_courses}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appMTCmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#MTC_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_medical_training_center',
                    name:'Medical Training Centres',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#MTC_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Medical Training Centres',
                model_name:'\App\\she_medical_training_center',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayMedicalTrainingCenter();  });      $('#successModal').modal('show');           
        });

        $('#MTC_no_btn').click(function(e)
        {
            $('#appMTCmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appMTCmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="MTC_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="MTC_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>