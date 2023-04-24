<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Accredited Laboratories <i style="margin-left: 50px">Total : {{$acc_labs->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appALABmodal')" class="btn btn-primary approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="ALAB_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Laboratory Name</th>
                <th>Laboratory Services</th>
                <th>Zones</th>
                {{-- <th>Number of Accredited Lab</th> --}}
                <th>Request</th>
            </tr>

            </thead>
            <tbody>
                @if($acc_labs)
                    @foreach($acc_labs as $acc_lab)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$acc_lab->id}}, '\App\\she_accredited_laboratory')" class="check_tabs" id="tab_{{$acc_lab->id}}" name="tab_{{$acc_lab->id}}" value="0">
                            </th>
                            <th>{{$acc_lab->year}}</th>
                            <th>{{$acc_lab->month}}</th>
                            <th>{{$acc_lab->laboratory_name}}</th>
                            <th>{{$acc_lab->laboratory_services}}</th>
                            <th>{{$acc_lab->field_office?$acc_lab->field_office->field_office_name:''}}</th>
                            {{-- <th>{{$acc_lab->no_of_accredited_lab}}</th> --}}
                            <th>{{$acc_lab->request_type}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appALABmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#ALAB_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_accredited_laboratory',
                    name:'Accredited Laboratories',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#ALAB_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Accredited Laboratories',
                model_name:'\App\\she_accredited_laboratory',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayAccreditedLaboratories();  });      $('#primaryModal').modal('show');           
        });

        $('#ALAB_no_btn').click(function(e)
        {
            $('#appALABmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appALABmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="ALAB_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="ALAB_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>