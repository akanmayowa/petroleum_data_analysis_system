<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Pending Jetty Data <i style="margin-left: 50px">Total : {{$jetty->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appJETmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>  
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="JET_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year </th>
                <th>Jetty</th>
                <th>State</th>
                <th>Location</th>
                <th>Ownership</th>
                <th>Products</th>
                <th>Handling Capacity <i class="units">MT</i></th>'p'
            </tr>

            </thead>
            <tbody>
                @if($jetty)
                    @foreach($jetty as $plant_jetties)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$plant_jetties->id}}, '\App\\down_jetty')" class="check_tabs" id="tab_{{$plant_jetties->id}}" name="tab_{{$plant_jetties->id}}" value="0">
                            </th> 
                            <th>{{$plant_jetties->id}}</th>
                            <th>{{$plant_jetties->year}} </th>
                            <th>{{$plant_jetties->jetty_name}} </th>
                             <th>@if($plant_jetties->state) {{$plant_jetties->state->state_name}} @endif</th>
                             <th>{{$plant_jetties->location}} </th>
                            <th>@if($plant_jetties->ownership) {{$plant_jetties->ownership->ownership_name}} @endif </th>
                            <th>@if($plant_jetties->product) {{$plant_jetties->product->product_name}} @endif </th>
                            <th data-toggle="tooltip" title="Capacity In MT">{{$plant_jetties->design_capacity}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <a data-toggle="tooltip" onclick="showmodal('appJETmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a> 
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

       
        $('#JET_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_jetty',
                    name:'Jetty',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#JET_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Jetty',
                model_name:'\App\\down_jetty',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayPlantJetty();     $('#successModal').modal('show');           
        });

        $('#JET_no_btn').click(function(e)
        {
            $('#appJETmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appJETmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="JET_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="JET_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>