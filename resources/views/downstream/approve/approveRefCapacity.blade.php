<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Refinery Performance Data <i style="margin-left: 50px">Total : {{$ref_capacity->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appREFCAPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="REFCAP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Refinery</th>
                {{-- <th>State</th>
                <th>Location</th> --}}
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
                @if($ref_capacity)
                    @foreach($ref_capacity as $_ref_capacities)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_ref_capacities->id}}, '\App\\down_refinary_design_capacity')" class="check_tabs" id="tab_{{$_ref_capacities->id}}" name="tab_{{$_ref_capacities->id}}" value="0">
                            </th>
                            <th>{{$_ref_capacities->id}}</th>
                             <th>{{$_ref_capacities->year}}</th>
                             <th>@if($_ref_capacities->refinery) {{$_ref_capacities->refinery->plant_location_name}} @endif</th>
                             {{-- <th>@if($_ref_capacities->state) {{$_ref_capacities->state->state_name}} @endif</th>
                             <th>{{$_ref_capacities->location}}</th> --}}
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->january}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->febuary}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->march}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->april}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->may}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->june}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->july}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->august}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->september}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->october}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->november}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_capacities->december}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appREFCAPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#REFCAP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_refinary_design_capacity',
                    name:'Refinery Performance',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#REFCAP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Refinery Performance',
                model_name:'\App\\down_refinary_design_capacity',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayRefinaryCapacity();     $('#successModal').modal('show');           
        });

        $('#REFCAP_no_btn').click(function(e)
        {
            $('#appREFCAPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appREFCAPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="REFCAP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="REFCAP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>