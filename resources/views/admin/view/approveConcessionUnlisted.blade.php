<div class="table-responsive">  
    <h5 style="margin-left: 5px; color: #aaa"> Concession Held - Block   
        <a data-toggle="tooltip" onclick="showmodal('appCONCUNLmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
    <table class="table table-hover mb-0" id="conc_table">
        <thead>
        <tr style="background-color: #ccc">
            <th>
                <label style="text-align: left"> <input type="checkbox" class="" id="CONCUNL_check_all" style="margin-top: 5px;"> </label>
            </th>
            <th>#</th>
            <th>Concession Held</th>
            <th>Company</th>
            <th>Area in Sq-Km</th>
            <th>Geological Terrain</th>
            <th>Remark</th>
            <th>Created On</th>
        </tr>

        </thead>
        <tbody>
            @if($concession)
                @foreach($concession as $_concessions)
                    <tr>
                        <th style="width: 6%">
                            <input type="checkbox" onclick="setValue({{$_concessions->id}}, '\App\\concession_unlisted_open')" class="check_tabs" id="tab_{{$_concessions->id}}" name="tab_{{$_concessions->id}}" value="0">
                        </th>
                        <th>{{$_concessions->id}}</th> 
                        <th>{{$_concessions->concession_name}}</th>  
                        <th>@if($_concessions->company){{$_concessions->company->company_name}}@endif</th>   
                        <th>{{$_concessions->area}}</th>   
                        <th>@if($_concessions->terrain){{$_concessions->terrain->terrain_name}}@endif</th>    
                        <th>{{$_concessions->remark}}</th>     
                        <th>{{\Carbon\Carbon::parse($_concessions->created_at)->diffForHumans()}}</th> 
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <a data-toggle="tooltip" onclick="showmodal('appCONCUNLmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
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

       
        $('#CONCUNL_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\concession_unlisted_open',
                    name:'Concession Unlisted',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#CONCUNL_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Concession Unlisted',
                model_name:'\App\\concession_unlisted_open',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayUnlistedOpen();  });      $('#successModal').modal('show');           
        });

        $('#CONCUNL_no_btn').click(function(e)
        {
            $('#appCONCUNLmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appCONCUNLmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="CONCUNL_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="CONCUNL_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>