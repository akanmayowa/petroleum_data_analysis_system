@extends('layouts.app')

    @section('search')
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">          
                <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">  <i class="mdi mdi-close-circle" style="font-size:20px"></i> </a>
            </div>
        </div>
    @endsection

@section('content')




<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                @if($concession) 
                <div class="table-responsive">  
                    <h5 style="margin-left: 5px; color: #aaa"> All Field(s) In {{$concession->concession_name}}   <i style="margin-left: 100px">TOTAL : {{$conc_fields_count}}</i>
                        <a href="#" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download {{$concession->concession_name}} Fields In Excel Here">  <i class="fa fa-download"></i> Excel</a>
                    </h5> 
                    <table class="table table-hover mb-0" id="">
                        <thead>
                        <tr style="background-color: #B2BEB5">
                            <th>Block</th>
                            <th>Field Name</th>
                            <th>Company Name</th>
                        </tr>

                        </thead>
                        <tbody>
                            @if($conc_fields)
                                @foreach($conc_fields as $conc_field)
                                    <tr>  
                                        <th>@if($conc_field->concession){{$conc_field->concession->concession_name}}@endif</th>   
                                        <th>{{$conc_field->field_name}}</th>  
                                        <th>@if($conc_field->company){{$conc_field->company->company_name}}@endif</th>   
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$conc_fields->render()}}
                </div>
                @else
                    No Field(s) For This Concession
                @endif

            </div>
        </div>
    </div>
</div>





@endsection


@section('script')

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
    function sortAscDesc()
    {
        //SORT SCRIPT
        const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

        const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
            v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
            )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

        // do the work...
        document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => 
        {
            const table = th.closest('table');
            Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
                .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
                .forEach(tr => table.appendChild(tr) );
        })));
    
    }
</script>


    @if(Session::has('info'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif

@endsection
