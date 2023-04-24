@extends('layouts.app_statistics')

@section('content')



    
        
   

    <div class="row">
        <div class="col-lg-12">
            <select class="form-control " name="year" id="nogiar_year" style="width: 15%; margin-top: -50px; margin-left: 85%">
                <option value=""> Select Year </option>
                @if(count($year)>0)
                    @foreach($year as $nogiar_year)
                        <option value="{{$nogiar_year->year}}">{{$nogiar_year->year}}</option>
                    @endforeach
                @endif
            </select>
            <div class="card m-b-20">
                <div class="card-body" id="mee">  

                    

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
   



@endsection

@section('script')

<!-- AJAX TO POPULATE CONTENT-->
<script type="text/javascript">

    $(document).on('change',"#nogiar_year", function() 
      { 
            var year = this.value;   
            $('#mee').load("{{url('publication')}}/year/loadNOGIARPublication?year="+year);
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
        $('#editsection').load("{{url('publication')}}/modals/editSection?id="+id);
        $('#edit_section').modal('show');
    }
        
</script>

@endsection