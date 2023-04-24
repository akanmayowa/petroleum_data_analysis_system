<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Summary of Gas Production <i style="margin-left: 50px">Total : {{$gas_productions->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appSGPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="SGP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Field</th>
                <th>Company</th>
                <th>AG <i class="units"></i></th>
                <th>NAG <i class="units"></i></th>
            </tr>

            </thead>
            <tbody>
                @if($gas_productions)
                    @foreach($gas_productions as $gas_production)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$gas_production->id}}, '\App\\gas_summary_of_gas_production')" class="check_tabs" id="tab_{{$gas_production->id}}" name="tab_{{$gas_production->id}}" value="0">
                            </th> 
                            <th>{{$gas_production->year}}</th>
                            <th>{{$gas_production->month}}</th>
                            <th>@if($gas_production->field) {{$gas_production->field->field_name}} @endif</th> 
                            <th>@if($gas_production->company) {{$gas_production->company->company_name}} @endif</th> 
                            <th data-toggle="tooltip" title="">{{$gas_production->ag}}</th>
                            <th data-toggle="tooltip" title="">{{$gas_production->nag}}</th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appSGPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#SGP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\gas_summary_of_gas_production',
                    name:'Gas Production',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#SGP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Gas Production',
                model_name:'\App\\gas_summary_of_gas_production',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayProduction();  });      $('#successModal').modal('show');           
        });

        $('#SGP_no_btn').click(function(e)
        {
            $('#appSGPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appSGPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="SGP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="SGP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>