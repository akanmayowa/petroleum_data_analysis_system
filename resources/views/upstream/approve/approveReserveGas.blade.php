<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Gas Reserves  <i style="margin-left: 50px">Total : {{$gas->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appGRmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf   
        <table class="table table-striped mb-0" id="resgas_table">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="GR_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Description</th>
                <th>Associated Gas (AG) Tcf</th>
                <th>Non Associated Gas (NAG) Tcf</th>
                <th>Total Reserves Tcf</th>
            </tr>
            </thead>
            <tbody>
                @if($gas)
                    @foreach($gas as $_gas)
                        <tr>        
                            <th>
                                <input type="checkbox" onclick="setValue({{$_gas->id}}, '\App\\up_reserves_gas')" class="check_tabs" id="tab_{{$_gas->id}}" name="tab_{{$_gas->id}}" value="0">
                            </th>             
                            <th class="tb-row-height">{{$_gas->id}}</th> 
                            <th class="tb-row-height">{{$_gas->year}}</th> 
                            <th class="tb-row-height">{{$_gas->month}}</th> 
                            <th class="tb-row-height">@if($_gas->company) {{$_gas->company->company_name}} @endif</th> 
                            <th class="tb-row-height">{{$_gas->description}}</th> 
                            <th class="tb-row-height">{{number_format($_gas->associated_gas, 2)}}</th>
                            <th class="tb-row-height">{{number_format($_gas->non_associated_gas, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($_gas->total_gas, 2)}}</th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>
    <a data-toggle="tooltip" onclick="showmodal('appGRmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#GR_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_reserves_gas',
                    name:'Gas Reserves',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#GR_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Gas Reserves',
                model_name:'\App\\up_reserves_gas',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayAGNAG();         $('#successModal').modal('show');        
        });

        $('#GR_no_btn').click(function(e)
        {
            $('#appGRmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appGRmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="GR_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="GR_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>