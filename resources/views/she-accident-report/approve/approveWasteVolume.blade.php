<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Produced Waste Volume <i style="margin-left: 50px">Total : {{$waste_vols->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appDWVmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="DWV_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Sum Of WBMC <i class="units">Mt</i></th>
                <th>Sum Of OBMC <i class="units">Mt</i></th>
                <th>Sum Of Spent WBM <i class="units">Mt</i> </th>
                <th>Sum Of Spent OBM <i class="units">Mt</i> </th>
            </tr>

            </thead>
            <tbody>
                @if($waste_vols)
                    @foreach($waste_vols as $waste_vol)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$waste_vol->id}}, '\App\\she_drilling_waste_volumes')" class="check_tabs" id="tab_{{$waste_vol->id}}" name="tab_{{$waste_vol->id}}" value="0">
                            </th> 
                            <th>{{$waste_vol->year}}</th>
                            <th>{{$waste_vol->month}}</th>
                            <th data-toggle="tooltip" title="Capacity In Mt">{{$waste_vol->sum_of_wbmc}}</th>
                            <th data-toggle="tooltip" title="Capacity In Mt">{{$waste_vol->sum_of_obmc}}</th>
                            <th data-toggle="tooltip" title="Capacity In Mt">{{$waste_vol->sum_of_spent_wbm}}</th>
                            <th data-toggle="tooltip" title="Capacity In Mt">{{$waste_vol->sum_of_spent_obm}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appDWVmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#DWV_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_drilling_waste_volumes',
                    name:'Drilling Waste Volume ',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#DWV_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Drilling Waste Volume ',
                model_name:'\App\\she_drilling_waste_volumes',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayWasteVol();  });      $('#successModal').modal('show');           
        });

        $('#DWV_no_btn').click(function(e)
        {
            $('#appDWVmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appDWVmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="DWV_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="DWV_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>