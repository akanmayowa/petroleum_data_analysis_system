<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> All DWP Achieveved
        @if(Auth::user()->role_obj->permission->contains('constant', 'upload_dwp'))
            <a data-toggle="tooltip" onclick="showmodal('')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="View Report Here">  <i class="mdi mdi-chart-areaspline"> View</i> </a>
        @endif
    </h5>
    <table class="table table-striped table-sm mb-0" id="ach_table">
        <thead class="thead-dark">
        <tr>
            <th>Program Priority - PP</th>
            <th>Task & Targets</th>
                @if($dwp_achieved)
                    @foreach($dwp_achieved as $dwp_achieveds)
                        <th>@if($dwp_achieveds->division) {{$dwp_achieveds->division->division_name}} @endif</th>
                    @endforeach
                @endif
            <th>Total</th>
            <th style=""> </th>
        </tr>

        </thead>
        <tbody>
            @if($achieved)
                @foreach($achieved as $achieveds)
                    <tr>
                        <th>@if($achieveds->program_priority) {{$achieveds->program_priority->program_priority_name}} @endif</th>
                        <th>@if($achieveds->task_target) {{$achieveds->task_target->task_target_name}} @endif</th>
                            @if($dwp_achieved)
                                @foreach($dwp_achieved as $dwp_ach)
                                    <th>{{$achieveds->task_achieved}}</th>
                                @endforeach
                            @endif
                        <th></th>
                        <th>
                        </th>   
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
     {{$achieved->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->



<script type="text/javascript">
    $(function()
    {
        $('.page-link').click(function(e)
        {

            e.preventDefault();
            var aID=$(this).attr('href');
            type=sessionStorage.getItem('name');
            $('#'+type).load(aID);      
           
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>