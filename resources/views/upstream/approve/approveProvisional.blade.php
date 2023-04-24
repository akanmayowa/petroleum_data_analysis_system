<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Provisional Crude Production <i style="margin-left: 50px">Total : {{$provisional->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appPCPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>    
    <form action="{{route('set-stage_id')}}" method="POST">@csrf 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="pcp_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Fields</th>
                <th>Jan</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Apr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Aug</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dec</th>
            </tr>

            </thead>
            <tbody>
                @if($provisional)
                    @foreach($provisional as $_crude_prods)
                        <tr>           
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_crude_prods->id}}, '\App\\up_provisional_crude_production')" class="check_tabs" id="tab_{{$_crude_prods->id}}" name="tab_{{$_crude_prods->id}}" value="0">
                            </th>  
                            <th style="width: 10%">{{$_crude_prods->year}}</th>
                            <th>@if($_crude_prods->field) {{$_crude_prods->field->field_name}} @endif</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->january, 2)}}</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->febuary, 2)}}</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->march, 2)}}</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->april, 2)}}</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->may, 2)}}</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->june, 2)}}</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->july, 2)}}</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->august, 2)}}</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->september, 2)}}</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->october, 2)}}</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->november, 2)}}</th> 
                            <th style="width: 7%" data-toggle="tooltip" title="Barrels">{{number_format($_crude_prods->december, 2)}}</th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>  
    </form> <br>
    <a data-toggle="tooltip" onclick="showmodal('appPCPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
</div>



<script>
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

       
        $('#pcp_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_provisional_crude_production',
                    name:'Provisional Crude Production',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#pcp_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Provisional Crude Production',
                model_name:'\App\\up_provisional_crude_production',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayCrudeProd();           $('#successModal').modal('show');          
        });

        $('#pcp_no_btn').click(function(e)
        {
            $('#appPCPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appPCPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="pcp_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="pcp_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>