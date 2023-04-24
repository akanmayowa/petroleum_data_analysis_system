<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Refinery Production Volume <i style="margin-left: 50px">Total : {{$ref_prod_vol->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appRPVmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="RPV_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Refinery</th>
                <th>Product</th>
                <th>Year</th>
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
                @if($ref_prod_vol)
                    @foreach($ref_prod_vol as $_ref_volume)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_ref_volume->id}}, '\App\\down_refinery_production_volumes')" class="check_tabs" id="tab_{{$_ref_volume->id}}" name="tab_{{$_ref_volume->id}}" value="0">
                            </th>
                             <th>{{$_ref_volume->id}}</th>
                             <th>@if($_ref_volume->refinery) {{$_ref_volume->refinery->plant_location_name}} @endif</th> 
                             <th>@if($_ref_volume->product) {{$_ref_volume->product->product_name}} @endif</th> 
                             <th>{{$_ref_volume->year}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->january}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->febuary}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->march}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->april}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->may}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->june}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->july}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->august}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->september}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->october}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->november}}</th>
                             <th data-toggle="tooltip" title="Volume In MMbbls">{{$_ref_volume->december}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appRPVmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#RPV_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_refinery_production_volumes',
                    name:'Refinery Production Vol',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#RPV_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Refinery Production Vol',
                model_name:'\App\\down_refinery_production_volumes',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayRefineryVolume();     $('#successModal').modal('show');           
        });

        $('#RPV_no_btn').click(function(e)
        {
            $('#appRPVmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>
<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appRPVmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="RPV_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="RPV_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>