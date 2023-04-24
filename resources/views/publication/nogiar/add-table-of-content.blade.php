
@extends('layouts.app_statistics')

@section('content')


<style>
    .mg-l
    {
        margin-right: 15px;
    }
    .mg-r
    {
        margin-left: 5px;
    }

    .frm
    {
        font-size: 12px;
        padding: 2px 5px;
    }
    .round
    {
        border-radius: 50%;
        font-size: 11px;
    }

    .removeBtn
    {
        background-color: transparent; 
        color: red; 
        font-weight: bolder;
    }

    .toc
    {
        font-size: 16px !important;
    }

    .bold
    {
        font-weight: bolder;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">  

                <div class="row">  

                    <div class="col-md-4 offset-md-4">
                        <form method="GET" action="{{url('new-table-of-content')}}">
                            <input type="text" class="form-control no-print" name="year" id="tocYear" placeholder="Pick Publication Year" readonly style="width: 75%;">
                            <button type="submit" class="btn btn-success btn-sm pull-right" style="margin-top: -33px">Get Content</button>
                        </form>
                    </div>


                    <div class="col-lg-8 offset-md-2">
                        <div class="card m-b-20">
                            <div class="card-body" id=""> 
                                

                            <form method="POST" action="{{route('update-table-of-content')}}"> @csrf
                                <input type="hidden" class="form-control" name="publication_year" id="publication_year" value="{{$year}}" />

                                <table class="table table-sm mb-0" style="background: transparent; -webkit-print-color-adjust: exact!important;">
                                    <thead>
                                        <tr>
                                            <th style="background: #ACE1AF; text-align: center; font-size: 16px"> NO </th>
                                            <th style="background: #ACE1AF; text-align: center; font-size: 16px"> TABLE OF CONTENT </th>
                                            <th style="background: #ACE1AF; text-align: center; font-size: 16px"> PAGE NO </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($headerToc as $toc)
                                            <tr style="font-size: 20px !important;">
                                                <td style="width: 10%; padding: 2px !important"><span class="toc bold"> {{$toc->id}}</span> </td>
                                                <td style="width: 80%; padding: 2px !important"><span class="toc bold"> {{$toc->header}}</span> </td>
                                                <td style="width: 10%; padding: 2px; text-align: right">
                                                    <input type="text" class="form-control" name="head_{{$toc->id}}" id="head_{{$toc->id}}" value="{{$toc->page_no}}" /> 
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse

                                        <tr style="padding: 10px !important;">
                                            <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td>
                                        </tr>

                                        @forelse($upstreams as $k => $upstream)                                
                                            <tr @if($k == 0) class="bold" @endif>
                                                <td style="width: 10%; padding: 2px !important"><span class="toc">{{$upstream->numbering}}</span></td>
                                                <td style="width: 80%; padding: 2px !important"><span class="toc"> {{$upstream->header}}</span> </td>
                                                <td style="width: 10%; padding: 2px !important; text-align: right">
                                                    <input type="text" class="form-control" name="upstream_{{$upstream->id}}" id="upstream_{{$upstream->id}}" value="{{$upstream->page_no}}" />
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse

                                        <tr style="padding: 10px !important;">
                                            <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td>
                                        </tr>

                                        @forelse($midstreams as $k => $midstream)
                                            <tr style="padding: 0px !important;" @if($k == 0) class="bold" @endif>
                                                <td style="width: 10%; padding: 2px !important"><span class="toc"> {{$midstream->numbering}}</span> </td>
                                                <td style="width: 80%; padding: 2px !important"><span class="toc"> {{$midstream->header}}</span> </td>
                                                <td style="width: 10%; padding: 2px !important; text-align: right">
                                                    <input type="text" class="form-control" name="midstream_{{$midstream->id}}" id="midstream_{{$midstream->id}}" value="{{$midstream->page_no}}" /> 
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse

                                        <tr style="padding: 10px !important;">
                                            <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td>
                                        </tr>

                                        @forelse($downstreams as $k => $downstream)
                                            <tr style="padding: 0px !important;" @if($k == 0) class="bold" @endif>
                                                <td style="width: 10%; padding: 2px !important"><span class="toc"> {{$downstream->numbering}} </span></td>
                                                <td style="width: 80%; padding: 2px !important"><span class="toc"> {{$downstream->header}} </span></td>
                                                <td style="width: 10%; padding: 2px !important; text-align: right;">
                                                    <input type="text" class="form-control" name="downstream_{{$downstream->id}}" id="downstream_{{$downstream->id}}" value="{{$downstream->page_no}}" />
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse

                                        <tr style="padding: 10px !important;">
                                            <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td>
                                        </tr>

                                        @forelse($hses as $k => $hse)
                                            <tr style="padding: 0px !important;" @if($k == 0 || $hse->numbering == 4.5) class="bold" @endif>
                                                <td style="width: 10%; padding: 2px !important"><span class="toc"> {{$hse->numbering}} </span></td>
                                                <td style="width: 80%; padding: 2px !important"><span class="toc"> {{$hse->header}} </span></td>
                                                <td style="width: 10%; padding: 2px !important; text-align: right;">
                                                    <input type="text" class="form-control" name="hse_{{$hse->id}}" id="hse_{{$hse->id}}" value="{{$hse->page_no}}" />
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse

                                        <tr style="padding: 10px !important;">
                                            <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td>
                                        </tr>

                                        <tr style="padding: 0px !important;" class="bold">
                                            <td style="width: 10%; padding: 2px !important"><span class="toc"> 5.1 </span></td>
                                            <td style="width: 80%; padding: 2px !important"><span class="toc"> GLOSSARY OF TERMS </span></td>
                                            <td style="width: 10%; padding: 2px !important; text-align: right;"><span class="toc">  </span></td>
                                        </tr>
                                    </tbody>

                                        <tr style="padding: 10px !important;">
                                            <td style="padding: 10px !important"> </td> <td style="padding: 35px 10px !important"> </td> <td style="padding: 10px !important"> </td>
                                        </tr>

                                    {{-- PRINT PAGE BREAK --}}    
                                    <p class="page-break"></p>

                                    <thead>
                                        <tr>
                                            <th style="background: #ACE1AF; text-align: center; font-size: 22px" colspan="3"> LIST OF TABLES </th>
                                        </tr>
                                    </thead>
             

                                    <tbody>
                                        @forelse($toc_contents as $content)
                                            <tr style="padding: 0px !important;">
                                                <td style="width: 10%; padding: 2px !important"><span class="toc"> {{$content->table_no}} </span></td>
                                                <td style="width: 80%; padding: 2px !important"><span class="toc"> {{$content->table_title}} </span></td>
                                                <td style="width: 10%; padding: 2px !important; text-align: right;">
                                                    <input type="text" class="form-control" name="content_{{$content->id}}" id="content_{{$content->id}}" value="{{$content->page_no}}" />
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>

                                        <tr style="padding: 10px !important;">
                                            <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> 
                                            <td style="padding: 10px !important"> </td>
                                        </tr>
                                    {{-- PRINT PAGE BREAK --}}     
                                    <p class="page-break"></p>

                                    <thead>
                                        <tr>
                                            <th style="background: #ACE1AF; text-align: center; font-size: 22px" colspan="3"> LIST OF FIGURES </th>
                                        </tr>
                                    </thead>
             

                                    <tbody>
                                        @forelse($figures as $figure)
                                            <tr style="padding: 0px !important;">
                                                <td style="width: 10%; padding: 2px !important"><span class="toc"> {{$loop->iteration}} </span></td>
                                                <td style="width: 10%; padding: 2px !important"><span class="toc"> {{$figure->figure_title_1}} </span></td>
                                                <td style="width: 10%; padding: 2px !important; text-align: right;">
                                                    <input type="text" class="form-control" name="figure_{{$figure->id}}" id="figure_{{$figure->id}}" value="{{$figure->page_no}}" readonly />
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>

                                <button type="submit" class="btn btn-success btn-sm pull-right mt-2" style="" onclick="return confirm('Do you realy want to update table of content?')">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>

                </div>

                          
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->









@endsection



@section('script')

<script>   


    $(function()
    {     

      $('#tocYear').datepicker(
      {
        autoclose: true,
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
      });  
    });    


    // $('#tocYear').on('change', function() 
    // {
    //     var year = $('#tocYear').val(); 
    //     var url = "{{url('add-table-of-content/')}}";
    //     location.reload(url);
    // });


    function loadNogiarPub(year)
    {
        $('#content').summernote('code','');
        // loadNogiarPublication
        $.get('{{url('loadNogiarPublication')}}?year='+year, function(data)
        {
            $('#content').summernote('code', data.content);
            $('#price').val(data.price);
            if(data.status == 1)
            { 
                $('#saveNogiarPublication').val(data.year+" Publication Archived");
                $('#saveNogiarPublication').attr("disabled", true); 
            }        
        });
    }

</script> 




 @if(Session::has('info'))
    <script>
        $(function() 
        {
            toastr.success('{{session('info')}}', {timeOut:50000});
        });
    </script>
    @elseif(Session::has('error'))
    <script>
        $(function() 
        {
            toastr.error('{{session('error')}}', {timeOut:50000});
        });
    </script>
@endif

@endsection




