<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> DWP (KRA) Acievement Status
        <a data-toggle="tooltip" onclick="showmodal('')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-primary btn-sm pull-right" data-original-title="View Report Here">  <i class="mdi mdi-chart-areaspline"> New</i> </a>
    </h5>
    <table class="table table-striped table-sm mb-0" id="kra_table">
        <thead class="thead-dark">
        <tr>
            <th>Program Priority - PP</th>
            <th>Not Started - 0.00</th>
            <th>Preliminary - 0.25</th>
            <th>Halfway - 0.50</th>
            <th>Greater Than Half - 0.75</th>
            <th>Achieved - 1.00</th>
            {{-- <th style=""><input type="checkbox" name="vehicle1" id="selectall" value=""> </th> --}}
            <th style=""></th>
        </tr>

        </thead>
        <tbody>
            @if($key_result_area)
                @foreach($key_result_area as $key_result_areas)
                    <tr>
                        <th>@if($key_result_areas->program_priority) {{$key_result_areas->program_priority->program_priority_name}} @endif</th>
                        <th>{{$key_result_areas->not_started}}</th>
                        <th>{{$key_result_areas->preliminary}}</th>
                        <th>{{$key_result_areas->half_way}}</th>
                        <th>{{$key_result_areas->greater_than_half}}</th>
                        <th>{{$key_result_areas->achieved}}</th>
                        <th>
                        </th>   
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
     {{$key_result_area->appends(Request::capture()->except('page'))->render() }} 
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