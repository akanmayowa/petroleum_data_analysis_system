<div class="table-responsive">  
    <h5 style="margin-left: 5px; color: #aaa"> Concession Held - Block
        <a data-toggle="tooltip" onclick="showmodal('appMFIEmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
    <table class="table table-hover mb-0" id="">
        <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="MFIE_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Company</th>
                <th>Fields</th>
                <th>OML Number</th>
            </tr>

            </thead>
            <tbody>
                @if($mfield)
                    @foreach($mfield as $bala_marg_field)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$bala_marg_field->id}}, '\App\\Bala_marginal_field')" class="check_tabs" id="tab_{{$bala_marg_field->id}}" name="tab_{{$bala_marg_field->id}}" value="0">
                            </th>
                            <th>{{$bala_marg_field->id}}</th>
                            <th>{{$bala_marg_field->year}}</th>
                            <th>@if($bala_marg_field->company) {{$bala_marg_field->company->company_name}} @endif</th>
                            <th>@if($bala_marg_field->field) {{$bala_marg_field->field->field_name}} @endif</th>
                            <th>{{$bala_marg_field->blocks}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
    </table>
    <a data-toggle="tooltip" onclick="showmodal('appMFIEmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
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

       
        $('#MFIE_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\Bala_marginal_field',
                    name:'Marginal Fields',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#MFIE_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Marginal Fields',
                model_name:'\App\\Bala_marginal_field',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayMarginalField();  });      $('#successModal').modal('show');           
        });

        $('#MFIE_no_btn').click(function(e)
        {
            $('#appMFIEmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appMFIEmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="MFIE_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="MFIE_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>