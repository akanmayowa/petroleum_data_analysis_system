<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Pending Refinery Performance Data <i style="margin-left: 50px">Total : {{$ref_performance->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appREFPERFmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>  
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="REFPERF_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Processing Unit</th>
                <th>Refinery</th>
                <th>Location</th>
                <th>Value</th>
            </tr>

            </thead>
            <tbody>
                @if($ref_performance)
                    @foreach($ref_performance as $_ref_performances)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_ref_performances->id}}, '\App\\down_refinery_performance')" class="check_tabs" id="tab_{{$_ref_performances->id}}" name="tab_{{$_ref_performances->id}}" value="0">
                            </th>
                             <th>{{$_ref_performances->id}}</th>
                             <th>{{$_ref_performances->year}} </th>
                             <th>{{$_ref_performances->processing_unit}} </th>
                             <th>@if($_ref_performances->refinery) {{$_ref_performances->refinery->plant_location_name}} @endif</th>
                             <th>{{$_ref_performances->location}} </th>
                             <th>{{$_ref_performances->value}} </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <a data-toggle="tooltip" onclick="showmodal('appREFPERFmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a> 
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

       
        $('#REFPERF_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_refinery_performance',
                    name:'Refinery Details',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#REFPERF_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Refinery Details',
                model_name:'\App\\down_refinery_performance',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayRefinaryPerformance();     $('#successModal').modal('show');           
        });

        $('#REFPERF_no_btn').click(function(e)
        {
            $('#appREFPERFmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appREFPERFmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="REFPERF_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="REFPERF_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>