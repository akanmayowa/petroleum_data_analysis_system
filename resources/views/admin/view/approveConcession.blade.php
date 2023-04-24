<div class="table-responsive">  
    <h5 style="margin-left: 5px; color: #aaa"> Concession Held - Block   
        <a data-toggle="tooltip" onclick="showmodal('appCONCmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
    <table class="table table-hover mb-0" id="conc_table">
        <thead>
        <tr style="background-color: #ccc">
            <th>
                <label style="text-align: left"> <input type="checkbox" class="" id="CONC_check_all" style="margin-top: 5px;"> </label>
            </th>
            <th>Concession</th>
            <th>Company</th>
            <th>Area in Sq-Km</th>
            <th>Contract Type</th>
            <th>Award Year</th>
            <th>Terrain</th>
        </tr>

        </thead>
        <tbody>
            @if($concession)
                @foreach($concession as $_concessions)
                    <tr>
                        <th style="width: 6%">
                            <input type="checkbox" onclick="setValue({{$_concessions->id}}, '\App\\concession')" class="check_tabs" id="tab_{{$_concessions->id}}" name="tab_{{$_concessions->id}}" value="0">
                        </th>  
                        <th>{{$_concessions->concession_name}}</th>  
                        <th data-toggle="tooltip" data-original-title="
                        @if($_concessions->equity_one) Equity Distribution &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                            {{$_concessions->equity_one->company_name}} - {{$_concessions->percentage_1}}%, 
                            {{$_concessions->equity_two->company_name}} - {{$_concessions->percentage_2}}%, 
                            {{$_concessions->equity_three->company_name}} - {{$_concessions->percentage_3}}%, 
                            {{$_concessions->equity_four->company_name}} - {{$_concessions->percentage_4}}%, 
                            {{$_concessions->equity_five->company_name}} - {{$_concessions->percentage_5}}%
                            {{$_concessions->equity_six->company_name}} - {{$_concessions->percentage_6}}%
                            {{$_concessions->equity_seven->company_name}} - {{$_concessions->percentage_7}}%
                            {{$_concessions->equity_eight->company_name}} - {{$_concessions->percentage_8}}%
                        @else
                             Equity Distribution &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; {{$_concessions->company->company_name}} - 100%
                        @endif
                        ">@if($_concessions->company){{$_concessions->company->company_name}}@endif</th>                           
                        <th>{{$_concessions->area}}</th>   
                        <th>@if($_concessions->contract){{$_concessions->contract->contract_name}}@endif</th>    
                        <th>{{$_concessions->award_date}}</th>     
                        <th>@if($_concessions->terrain){{$_concessions->terrain->terrain_name}}@endif</th> 
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <a data-toggle="tooltip" onclick="showmodal('appCONCmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
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

       
        $('#CONC_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\concession',
                    name:'Concession',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#CONC_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Concession',
                model_name:'\App\\concession',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayConcession();  });      $('#successModal').modal('show');           
        });

        $('#CONC_no_btn').click(function(e)
        {
            $('#appCONCmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appCONCmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="CONC_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="CONC_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>