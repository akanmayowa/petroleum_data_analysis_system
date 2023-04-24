<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Fields  
        <a data-toggle="tooltip" onclick="showmodal('appFIEmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a> 
    </h5> 
    <table class="table table-hover mb-0" id="field_table">
        <thead>
        <tr style="background-color: #9BDDFF">
            <th>
                <label style="text-align: left"> <input type="checkbox" class="" id="FIE_check_all" style="margin-top: 5px;"> </label>
            </th>
            <th>Field Name</th>
            <th>Concession / Block</th>
            <th>Company</th>
            <th>Contract</th>
            <th>Terrain</th>
            <th>Created On</th>
            <th>Approved</th>
        </tr>

        </thead>
        <tbody>
            @if($field)
                @foreach($field as $_fields)
                    <tr>
                        <th style="width: 6%">
                            <input type="checkbox" onclick="setValue({{$_fields->id}}, '\App\\field')" class="check_tabs" id="tab_{{$_fields->id}}" name="tab_{{$_fields->id}}" value="0">
                        </th> 
                        <th>{{$_fields->field_name}}</th>   
                        <th>{{$_fields->concession?$_fields->concession->concession_name:''}}</th>    
                        <th>{{$_fields->company?$_fields->company->company_name:''}}</th> 
                        <td>{{$_fields->contract?$_fields->contract->contract_name:''}}</td>
                        <td>{{$_fields->terrain?$_fields->terrain->terrain_name:''}}</td>  
                        <th>{{\Carbon\Carbon::parse($_fields->created_at)->diffForHumans()}}</th>  
                        <th>@if($_fields->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif
                        </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
        <a data-toggle="tooltip" onclick="showmodal('appFIEmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>        
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

       
        $('#FIE_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\field',
                    name:'Fields',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#FIE_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Fields',
                model_name:'\App\\field',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayField();  });      $('#successModal').modal('show');           
        });

        $('#FIE_no_btn').click(function(e)
        {
            $('#appFIEmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appFIEmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="FIE_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="FIE_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>