@extends('layouts.app_statistics')

@section('content')


        
   

    <div class="row">
        <div class="col-lg-12">
            <input type="text" class="form-control no-print" name="year" id="nogiar_year" placeholder="Pick Publication Year" readonly style="width: 15%; margin-top: -50px; margin-left: 85%">
            <div class="card m-b-20">
                <div class="card-body" id="mee">  
                <button type="button" id="printBtn" class="btn btn-success pull-right no-print" onclick="window.print();return false;" style="display: none;"><i class="fa fa-print"></i> Print</button>
  
                    {{-- @php
                        $image = new Imagick();
                        $image->pingImage("asset('assets/images/PRIS.pdf')");
                        echo $image->getNumberImages();
                    @endphp  --}}    

                </div>
            </div>
        </div> <!-- end col -->    
    </div> <!-- end row -->







    




<!-- Edit Section  modal -->
<div id="edit_section" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title"> Edit Sections </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          
            <div id="editsection"> </div>

          </div>
        </div>
    </div>  
</div>







@if($nogiar)
    @foreach($nogiar as $sections)
         <!-- Approve Section modal -->
         <form class="form-horizontal" role="form" method="POST" action="{{route('approve')}}">

            <div class="modal fade" id="approve_{{$sections->id}}" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h6 class="modal-title pull-left" id="">Are You Sure You Want To Approve Publication? </h6>
                        <button type="button" class="close" data-dismiss="modal" style="color: red">&times;</button>
                      </div>
                      <div class="modal-body">

                        {{ csrf_field() }}
                        <input id="ID" type="hidden" class="form-control" name="id" value="{{$sections->id}}" required>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-sm"> Yes </button> 
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No</button>  
                        </div>

                      </div>
                    </div>
                </div>
            </div>

        </form>
    @endforeach
@endif
   



@endsection

@section('script')

<!-- AJAX TO POPULATE CONTENT-->
<script>

    var param = {{$_GET['year']}}
    if(param != null)
    { 
        var year = param;   
        $('#mee').load("{{url('publication')}}/year/loadNOGIARAdminPublication?year="+year);
    }

    $(document).on('change',"#nogiar_year", function() 
    { 
        var year = this.value;   
        $('#mee').load("{{url('publication')}}/year/loadNOGIARAdminPublication?year="+year);
        // $('#printBtn').show();
    });

    function showmodal(modalid)
    {
        $('#'+modalid).modal('show');
    }

    function getId(id)
    {
        $('#ID').val(id);   
    }

    function load_sections(id)
    {   
        $('#editsection').load("{{url('publication')}}/nogiar/modals/editSection?id="+id);
        $('#edit_section').modal('show');
    }

    $(function()
    {        

      $('#nogiar_year').datepicker(
      {
        autoclose: true,
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
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