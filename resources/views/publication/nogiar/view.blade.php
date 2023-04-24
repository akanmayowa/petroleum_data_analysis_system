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

    .gen
    {
        background-color: #eee; 
        color: #202020;
        font-weight: lighter!important;
        font-size: 12px;
        margin-left: 6px;

    }



    a
    {
        color: #202020;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link
    {
        background-color: #008B8B; color: #fff;
    }
    .nav-pad a
    {
        padding:4px 0px;
        /*border: #e1e1e1 thin solid;*/
    }
    .nav-pad a:hover
    {
        padding:4px 0px;
        /*border: #e1e1e1 thin solid;*/
        /*background-color: #008B8B; */         /*36454F*/
        color: #318CE7;
    }
    .nav-active 
    {
        background-color: #0f9cf3;
    }

    .btn-font
    {
        font-size: 12px;
    }

    #tab-content
    {
        font-size: 11px;
    }

    /*.tab-nav-link
    {
        background-color: #008B8B; 
        color: #ffffff;
    }*/
</style>

<div class="row" style="">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body"> 

                <!-- Notification Panel --> 
                <div class="row" style="padding: 0px 15px">
                    <div class="form-group col-md-9 col-sm-12"  style="padding: 0px;">
                        <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> NOGIAR Publications </h4>
                    </div>

                    <div class="form-group col-md-3 col-sm-12 pull-left"  style="padding: 0px;">
                        <form class="m-b-0 m-t-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pick Year" name="year" id="p_year" required readonly> 
                            

                            <div class="input-group-append">
                                <a href="" class="btn btn-dark btn-sm getBtn" id=""> Get </a>
                                
                            </div>
                        </div>
                    </form>


                        {{-- <span> <input type="text" class="form-control" placeholder="Pick Year" name="year" id="p_year" required readonly>    <a href="" class="btn btn-dark btn-sm getBtn" id=""> Get </a> </span> --}}
                    </div>
                    {{-- <div class="form-group col-md-1 col-sm-12 pull-right"  style="padding: 0px;">
                        
                    </div> --}}

                    
                </div>
                

               
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pull left" id="pdf_file" style="border-right: thin solid #ddd">
                        {{-- @php $y = $_REQUEST['year']; @endphp --}}
                        @forelse($publications as $publication)
                            <div id="dflip-con" class="_df_book" 
                        source="@if($publication){{ asset('assets/images/publications/FINAL COPY/NOGIAR '.$publication->year.'.pdf/NOGIAR '.$publication->year.'.pdf')}}@endif" style="width: 100%!important; height: 100%">      </div>
                        @empty
                            <center> <h3 style="color: #ccc"> No Publication For The Selected Year </h3> </center>
                        @endforelse
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
        //script to set the selected year
        var pdf_year = sessionStorage.getItem('year');
        $('#p_year').val(pdf_year);

        


        $('#p_year').datepicker(
        {
          format: "yyyy", autoclose: true,
          viewMode: "years", 
          minViewMode: "years"
        }); 

        $('.getBtn').mouseover(function()
        {
            var year = $('#p_year').val();              
            var pdf = "{{ url('/publication/nogiar/view/?year=') }}"+year;
            
            $('.getBtn').attr("href", pdf);
        });
    });
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