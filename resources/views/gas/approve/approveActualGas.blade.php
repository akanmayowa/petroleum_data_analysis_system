<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Gas Actual Supply <i style="margin-left: 50px">Total : {{$supplies->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appSUPPForm')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0" id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="SUPP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                {{-- <th>Supplied to Power <i class="units"></i></th>
                <th>Supplied to Commercials <i class="units"></i></th>
                <th>Supplied to GBI <i class="units"></i></th> --}}
                <th>Total Gas Supplied <i class="units"></i></th>
            </tr>

            </thead>
            <tbody>
                @if($supplies)
                    @foreach($supplies as $supply)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$supply->id}}, '\App\\gas_domestic_gas_supply')" class="check_tabs" id="tab_{{$supply->id}}" name="tab_{{$supply->id}}" value="0">
                            </th>
                            <th>{{$supply->year}}</th>
                            <th>{{$supply->month}}</th>
                            <th>{{$supply->company?$supply->company->company_name:''}}</th> 
                            {{-- <th data-toggle="tooltip" title="Volume In MMscf">{{$supply->power}}</th>
                            <th data-toggle="tooltip" title="Volume In MMscf">{{$supply->commercial}}</th>
                            <th data-toggle="tooltip" title="Volume In MMscf">{{$supply->industry}}</th> --}}
                            <th data-toggle="tooltip" title="Volume In MMscf">{{$supply->total}}</th>   
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appSUPPForm')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#SUPP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\gas_domestic_gas_supply',
                    name:'Actual Gas Supply',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#SUPP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Actual Gas Supply',
                model_name:'\App\\gas_domestic_gas_supply',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayActualSupply();  });      $('#successModal').modal('show');           
        });

        $('#SUPP_no_btn').click(function(e)
        {
            $('#appSUPPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appSUPPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="SUPP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="SUPP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>