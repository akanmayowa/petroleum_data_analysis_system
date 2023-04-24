<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Pending Depot Data <i style="margin-left: 50px">Total : {{$depot->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appDEPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>  
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="DEP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year </th>
                <th>Depot </th>
                <th>State</th>
                <th>Location</th>
                <th>Ownership</th>
                <th>Storage Capacity <i class="units">MT</i></th>
                <th>Truckout Capacity <i class="units">MT</i></th>
                <th>Products</th>
            </tr>

            </thead>
            <tbody>
                @if($depot)
                    @foreach($depot as $plant_depot)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$ave_price->id}}, '\App\\down_depot')" class="check_tabs" id="tab_{{$ave_price->id}}" name="tab_{{$ave_price->id}}" value="0">
                            </th>
                            <th>{{$plant_depot->id}}</th>
                            <th>{{$plant_depot->year}} </th>
                            <th>{{$plant_depot->depot_name}} </th>
                            <th>@if($plant_depot->state) {{$plant_depot->state->state_name}} @endif</th>
                            <th>{{$plant_depot->location}} </th>
                            <th>@if($plant_depot->ownership) {{$plant_depot->ownership->ownership_name}} @endif </th>
                            <th data-toggle="tooltip" title="Capacity In MT">{{$plant_depot->design_capacity}}</th> 
                            <th data-toggle="tooltip" title="Capacity In MT">{{$plant_depot->truckout}}</th> 
                            <th>@if($plant_depot->product) {{$plant_depot->product->product_name}} @endif </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <a data-toggle="tooltip" onclick="showmodal('appDEPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a> 
</div> <!-- end col -->   




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

       
        $('#DEP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_depot',
                    name:'Plant Depot',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#DEP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Plant Depot',
                model_name:'\App\\down_depot',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayPlantDepot();     $('#successModal').modal('show');           
        });

        $('#DEP_no_btn').click(function(e)
        {
            $('#appDEPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appDEPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="DEP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="DEP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>