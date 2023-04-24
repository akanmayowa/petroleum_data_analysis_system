<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Revenue Actual Summary <i style="margin-left: 50px">Total : {{$actuals->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appRACTmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="RACT_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Oil Royalty</th>
                <th>Gas Sales Royalty</th>
                <th>Gas Flare Payment</th>
                <th>Concession Rentals</th>
                <th>MOR</th>
                <th>Signature Bonus</th>
                <th>Total</th>
            </tr>

            </thead>
            <tbody>
                @if($actuals)
                    @foreach($actuals as $actual)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$actual->id}}, '\App\\eco_revenue_actual')" class="check_tabs" id="tab_{{$actual->id}}" name="tab_{{$actual->id}}" value="0">
                            </th>
                            <th>{{$actual->year}}</th>
                            <th>{{number_format($actual->oil_actual, 2)}}</th> 
                            <th>{{number_format($actual->gas_actual, 2)}}</th>
                            <th>{{number_format($actual->gas_flare_actual, 2)}}</th>
                            <th>{{number_format($actual->concession_actual, 2)}}</th>
                            <th>{{number_format($actual->misc_actual, 2)}}</th>
                            <th>{{number_format($actual->signature_bonus, 2)}}</th>
                            <th>{{number_format($actual->total_actual, 2)}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appRACTmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#RACT_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\eco_revenue_actual',
                    name:'Revenue Actual',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#RACT_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Revenue Actual',
                model_name:'\App\\eco_revenue_actual',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayRevenueActual();  });      $('#successModal').modal('show');           
        });

        $('#RACT_no_btn').click(function(e)
        {
            $('#appRACTmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appRACTmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="RACT_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="RACT_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>