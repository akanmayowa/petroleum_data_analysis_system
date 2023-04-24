<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Gas Supply Textile Industry <i style="margin-left: 50px">Total : {{$supplies->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appTEXTmodal')" class="btn btn-sm approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="TEXT_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Sector</th>
                <th>Value <i class="units"></i></th>
            </tr>

            </thead>
            <tbody>
                @if($supplies)
                    @foreach($supplies as $supply)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$supply->id}}, '\App\\gas_supply_textile_industry')" class="check_tabs" id="tab_{{$supply->id}}" name="tab_{{$supply->id}}" value="0">
                            </th>
                            <th>{{$supply->id}}</th>
                            <th>{{$supply->year}}</th>
                            <th>{{$supply->sector}}</th>    
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appTEXTmodal')" class="btn btn-sm approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#TEXT_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\gas_supply_textile_industry',
                    name:'Textile Industry',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#TEXT_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Textile Industry',
                model_name:'\App\\gas_supply_textile_industry',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayGasSupplyTextileIndustry();  });      $('#successModal').modal('show');           
        });

        $('#TEXT_no_btn').click(function(e)
        {
            $('#appTEXTmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appTEXTmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="TEXT_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="TEXT_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>