<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Facilities 
    <a data-toggle="tooltip" onclick="showmodal('appFACmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>  
    </h5> 
    <table class="table table-hover mb-0" id="facility_table">
        <thead>
        <tr style="background-color: #ccc">
            <th>
                <label style="text-align: left"> <input type="checkbox" class="" id="FAC_check_all" style="margin-top: 5px;"> </label>
            </th>
            <th>Facility Code</th>
            <th>Facility Name</th>
            <th>Created Date</th>
        </tr>

        </thead>
        <tbody>
            @if($facility)
                @foreach($facility as $_facilities)
                    <tr>
                        <th style="width: 6%">
                            <input type="checkbox" onclick="setValue({{$_facilities->id}}, '\App\\facility')" class="check_tabs" id="tab_{{$_facilities->id}}" name="tab_{{$_facilities->id}}" value="0">
                        </th>
                        <th>{{strtoupper($_facilities->facility_code)}}</th> 
                        <th>{{$_facilities->facility_name}}</th>
                        <th>{{\Carbon\Carbon::parse($_facilities->created_at)->diffForHumans()}}</th> 
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
    <a data-toggle="tooltip" onclick="showmodal('appFACmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>  
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

       
        $('#FAC_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\facility',
                    name:'Facilities',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#FAC_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Facilities',
                model_name:'\App\\facility',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayFacility();  });      $('#successModal').modal('show');           
        });

        $('#FAC_no_btn').click(function(e)
        {
            $('#appFACmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appFACmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="FAC_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="FAC_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>