<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Retail Outlet Capacity Count <i style="margin-left: 50px">Total : {{$capacity->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appROCmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="ROC_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>State</th>
                <th>Market</th>
                <th>Product</th>
                <th>Jan <i class="units"></i></th>
                <th>Feb <i class="units"></i></th>
                <th>Mar <i class="units"></i></th>
                <th>Apr <i class="units"></i></th>
                <th>May <i class="units"></i></th>
                <th>Jun <i class="units"></i></th>
                <th>Jul <i class="units"></i></th>
                <th>Aug <i class="units"></i></th>
                <th>Sep <i class="units"></i></th>
                <th>Oct <i class="units"></i></th>
                <th>Nov <i class="units"></i></th>
                <th>Dec <i class="units"></i></th>
            </tr>

            </thead>
            <tbody>
                @if($capacity)
                    @foreach($capacity as $_out_capacities)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_out_capacities->id}}, '\App\\down_outlet_storage_capacity')" class="check_tabs" id="tab_{{$_out_capacities->id}}" name="tab_{{$_out_capacities->id}}" value="0">
                            </th>
                             <th>{{$_out_capacities->id}}</th>
                             <th>{{$_out_capacities->year}}</th>
                             <th>@if($_out_capacities->state) {{$_out_capacities->state->state_name}} @endif</th> 
                             <th>@if($_out_capacities->market_segment) {{$_out_capacities->market_segment->market_segment_name}} @endif</th>
                             <th>@if($_out_capacities->product) {{$_out_capacities->product->product_name}} @endif</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->january}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->febuary}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->march}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->april}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->may}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->june}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->july}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->august}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->september}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->october}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->november}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_out_capacities->december}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appROCmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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
            $('#'+type).load(aID)
        });

       
        $('#ROC_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_outlet_storage_capacity',
                    name:'Retail Outlet Capacity',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#ROC_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Retail Outlet Capacity',
                model_name:'\App\\down_outlet_storage_capacity',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayOutletCapacity();     $('#successModal').modal('show');           
        });

        $('#ROC_no_btn').click(function(e)
        {
            $('#appROCmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appROCmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="ROC_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="ROC_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>