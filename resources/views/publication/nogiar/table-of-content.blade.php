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

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> NOGIAR - Tables of Content </h4>

                <div class="table-responsive">   
                    <h5 style="margin-left: 5px; color: #aaa"> Table of Content </h5> 
                        <table class="table table-striped table-sm mb-0" id="content_table">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Year</th>
                                <th>Section</th> 
                                <th>Title</th>  
                                <th>Page Number</th>                                               
                                <th style=""> </th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($table_of_contents)
                                    @foreach($table_of_contents as $table_of_content)
                                        <tr>
                                            <th>{{$table_of_content->id}}</th>
                                            <th>{{$table_of_content->year}}</th>  
                                            <th>{{$table_of_content->section_id}}</th>  
                                            <th>{{$table_of_content->title}}</th>  
                                            <th>{{$table_of_content->page_no}}</th>    
                                            <th>                                                
                                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="loadtable({{$table_of_content->id}})" class="btn btn-info btn-sm pull-right" title="Edit Table Of Content"> <i class="fa fa-pencil"></i>    </a>
                                            </th>  
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{$table_of_contents->appends(Request::capture()->except('page'))->render() }} 
                </div>

            </div>
        </div>
    </div>

</div>








@endsection

@section('script')
<script>

    $(function()
    {
        $('#start_dates').datepicker();

    });



   

    function showmodal(modalid,url=0,hrefid=0)
    {
      if(url!=0){
      $('#'+hrefid).attr('href',url);
      }

        $('#'+modalid).modal('show');
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












