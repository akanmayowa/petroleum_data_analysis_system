<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Petrochemical Plant Data <i style="margin-left: 50px">Total : {{$pet_plant->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appPETPLAmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="PETPLA_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Plant </th>
                <th>State</th>
                <th>Location</th>
                <th>Ownership</th>
                <th>Plant Type</th>
                <th>Capacity <i class="units">MTPA</i></th>
                <th>Feedstock</th>
                <th>Products</th> 
            </tr>

            </thead>
            <tbody>
                @if($pet_plant)
                    @foreach($pet_plant as $_p_plant)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_p_plant->id}}, '\App\\down_petrochemical_plant')" class="check_tabs" id="tab_{{$_p_plant->id}}" name="tab_{{$_p_plant->id}}" value="0">
                            </th>
                            <th>{{$_p_plant->id}}</th>
                            <th>@if($_p_plant->locations) {{$_p_plant->locations->plant_location_name}} @endif </th>
                            <th>@if($_p_plant->state) {{$_p_plant->state->state_name}} @endif</th>
                            <th>{{$_p_plant->location}} </th>
                            <th>@if($_p_plant->ownerships) {{$_p_plant->ownerships->ownership_name}} @endif </th>
                            <th>@if($_p_plant->plant_types) {{$_p_plant->plant_types->plant_type_name}} @endif </th>
                            <th data-toggle="tooltip" title="Capacity In MTPA">{{$_p_plant->plant_capacity}}</th>
                            <th>@if($_p_plant->feedstocks) {{$_p_plant->feedstocks->feedstock_name}} @endif </th>
                            <th>@if($_p_plant->product) {{$_p_plant->product->product_name}} @endif </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appPETPLAmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#PETPLA_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_petrochemical_plant',
                    name:'Petrochemical Plant',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#PETPLA_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Petrochemical Plant',
                model_name:'\App\\down_petrochemical_plant',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayPlant();     $('#successModal').modal('show');           
        });

        $('#PETPLA_no_btn').click(function(e)
        {
            $('#appPETPLAmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appPETPLAmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="PETPLA_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="PETPLA_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>