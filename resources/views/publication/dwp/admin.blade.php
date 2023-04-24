@extends('layouts.app_statistics')

@section('content')



    
        
   

    <div class="row">
        <div class="col-lg-12">
            <select class="form-control " name="year" id="dwp_year" style="width: 15%; margin-top: -50px; margin-left: 85%">
                <option value=""> Select Year </option>
                @if(count($year)>0)
                    @foreach($year as $dwp_year)
                        <option value="{{$dwp_year->year}}">{{$dwp_year->year}}</option>
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







@if($dwp)
    @foreach($dwp as $sections)
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
                        <input id="ID" type="text" class="form-control" name="id" value="{{$sections->id}}" required>

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
<script type="text/javascript">

    $(document).on('change',"#dwp_year", function() 
      { 
            var year = this.value;   
            $('#mee').load("{{url('publication')}}/year/loadDWPAdminPublication?year="+year);
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
        $('#editsection').load("{{url('publication')}}/dwp/modals/editDWPSection?id="+id);
        $('#edit_section').modal('show');
    }
        
</script>

@endsection