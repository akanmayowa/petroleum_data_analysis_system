<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Pending Terminal Data <i style="margin-left: 50px">Total : {{$terminal->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appTERMmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>  
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="TERM_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year </th>
                <th>Terminal</th>
                <th>State</th>
                <th>Location</th>
                <th>Ownership</th>
                <th>Products</th>
                <th>Handling Capacity <i class="units">MT</i></th>
            </tr>

            </thead>
            <tbody>
                @forelse($terminal as $plant_terminals)
                    <tr>
                        <th style="width: 6%">
                            <input type="checkbox" onclick="setValue({{$plant_terminals->id}}, '\App\\down_terminal')" class="check_tabs" id="tab_{{$plant_terminals->id}}" name="tab_{{$plant_terminals->id}}" value="0">
                        </th> 
                        <th>{{$plant_terminals->id}}</th>
                        <th>{{$plant_terminals->year}} </th>
                        <th>{{$plant_terminals->terminal_name}} </th>
                        <th>@if($plant_terminals->facility_type) {{$plant_terminals->facility_type->facility_type_name}} @endif
                            @if($plant_terminals->state) {{$plant_terminals->state->state_name}} @endif</th>
                        <th>{{$plant_terminals->location}} </th>
                        <th>@if($plant_terminals->ownership) {{$plant_terminals->ownership->company_name}} @endif </th>
                        <th>@if($plant_terminals->product) {{$plant_terminals->product->product_name}} @endif </th>
                        <th data-toggle="tooltip" title="Capacity In MT">{{$plant_terminals->design_capacity}}</th>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        <a data-toggle="tooltip" onclick="showmodal('appTERMmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a> 
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

       
        $('#TERM_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_terminal',
                    name:'Terminal',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#TERM_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Terminal',
                model_name:'\App\\down_terminal',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayPlantTerminal();     $('#successModal').modal('show');           
        });

        $('#TERM_no_btn').click(function(e)
        {
            $('#appTERMmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appTERMmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="TERM_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="TERM_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>