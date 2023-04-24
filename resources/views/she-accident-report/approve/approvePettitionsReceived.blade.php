<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Petitions Received<i style="margin-left: 50px">Total : {{$pettitions->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appPETTmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="PETT_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Petitioner</th>
                <th>Petitionee</th>
                <th>Category</th>
                <th>Action Taken</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
                @if($pettitions)
                    @foreach($pettitions as $pettition)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$pettition->id}}, '\App\\she_pettitions_received')" class="check_tabs" id="tab_{{$pettition->id}}" name="tab_{{$pettition->id}}" value="0">
                            </th> 
                            <th>{{$pettition->year}}</th>
                            <th>{{$pettition->month}}</th> 
                            <th>{{$pettition->petitioner}}</th>
                            <th>{{$pettition->petitionee}}</th> 
                            <th>{{$pettition->category?$pettition->category->category_name:''}}</th>
                            <th>{{$pettition->action?$pettition->action->action_name:''}}</th> 
                            <th>{{$pettition->status?$pettition->status->status_name:''}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appPETTmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
        <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#PETT_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_pettitions_received',
                    name:'pettition Received',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#PETT_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'pettition Received',
                model_name:'\App\\she_pettitions_received',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayPettitionReceived();  });      $('#successModal').modal('show');           
        });

        $('#PETT_no_btn').click(function(e)
        {
            $('#appPETTmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appPETTmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="PETT_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="PETT_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>