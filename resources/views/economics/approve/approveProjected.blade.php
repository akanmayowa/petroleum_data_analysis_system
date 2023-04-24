<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Revenue Projected Summary <i style="margin-left: 50px">Total : {{$projecteds->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appRPROJmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="RPROJ_check_all" style="margin-top: 5px;"> </label>
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
                @if($projecteds)
                    @foreach($projecteds as $projected)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$projected->id}}, '\App\\eco_revenue_projected')" class="check_tabs" id="tab_{{$projected->id}}" name="tab_{{$projected->id}}" value="0">
                            </th> 
                            <th>{{$projected->year}}</th>
                            <th>{{number_format($projected->oil_projected, 2)}}</th> 
                            <th>{{number_format($projected->gas_projected, 2)}}</th>
                            <th>{{number_format($projected->gas_flare_projected, 2)}}</th>
                            <th>{{number_format($projected->concession_projected, 2)}}</th>
                            <th>{{number_format($projected->misc_projected, 2)}}</th>
                            <th>{{number_format($projected->signature_bonus, 2)}}</th>
                            <th>{{number_format($projected->total_projected, 2)}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appRPROJmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#RPROJ_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\eco_revenue_projected',
                    name:'Revenue Projected',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#RPROJ_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Revenue Projected',
                model_name:'\App\\eco_revenue_projected',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayRevenueProjected();  });      $('#successModal').modal('show');           
        });

        $('#RPROJ_no_btn').click(function(e)
        {
            $('#appRPROJmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appRPROJmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="RPROJ_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="RPROJ_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>