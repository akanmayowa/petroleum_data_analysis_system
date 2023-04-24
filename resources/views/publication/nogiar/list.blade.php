@extends('layouts.app_statistics')

@section('content')

<style>
    .shelve
    {
        /*border: thin dotted #eee;*/
        max-height: 250px;
        min-height: 250px;
        padding: 20px;
        overflow: hidden;
    }

    .book
    {
        border: thin dotted #ddd;
        max-height: 230px;
        min-height: 230px;
        overflow: hidden;
        border-radius: 8px;
        padding: 20px;
        -webkit-box-shadow: 5px 10px #ddd;
        -moz-box-shadow: 5px 10px #ddd;
        box-shadow: 5px 10px #ddd;
    }

    .book:hover
    {
        border: thin dotted #ddd;
        max-height: 250px;
        min-height: 250px;
        padding: 20px;
        margin: -10px;
        cursor: pointer;
        overflow: hidden;
        border-radius: 8px;
        /*background: #eee;*/
        -webkit-box-shadow: 5px 10px #ddd;
        -moz-box-shadow: 5px 10px #ddd;
        box-shadow: 5px 10px #ddd;
    }

    .tool-container:hover #tool
    {
        display: inline-block !important;
    }
</style>
   

    <div class="row">
        <div class="col-lg-12">
            <form method="get" action="{{ route('content.search') }}">
                <input type="text" class="form-control" name="search" id="year" placeholder="Search by year" readonly 
                style="width: 15%; margin-top: -50px; margin-left: 85%; margin-bottom: 5px">
            </form>
            <div class="card m-b-20">

                <div class="card-body" id="shelve" style="padding-bottom: 25px">   

                    @forelse($publications as $publication)
                        <div class="col-md-12">
                            <div class="col-md-2 pull-left shelve">
                                <div class="book tool-container"> {!!  $publication->content !!}
                                      
                                    <div>
                                        <div data-tool id="head" style="position: absolute; top: -4%; left: 35%;">
                                                <h5> {{$publication->nogiar_id}} </h5>       
                                        </div> 

                                        <div data-tool id="tool" style="position: absolute; top: 35%; left: 35%; display: none;">
                                            <a href="#" id="{{$publication->id}}" class="btn btn-sm pub_id" style="background: #008B8B; color: #fff" title="Preview {{$publication->year}} Publication" data-toggle="modal" data-target="#preview-publication">
                                                Preview
                                            </a>        
                                        </div> 

                                        <div data-tool id="tool" style="position: absolute; top: 50%; left: 30%; display: none;">
                                            <a href="{{ route('add-to-cart-view', $publication->id) }}" id="{{$publication->id}}" class="btn btn-sm pub_id" style="background: #ddd; color: #202020" title="Add {{$publication->year}} Publication To Cart">
                                                Add To Cart
                                            </a>        
                                        </div>                                         
                                    </div>

                                 </div>
                            </div>
                        </div>
                    @empty
                        No Publication In Shelve Yet !
                    @endforelse

                </div>
            </div>
        </div> <!-- end col -->  

    </div> <!-- end row -->







<!-- The Modal -->
<div class="modal" id="preview-publication">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="pub-title">Publication  </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        

        <div id="pub-content">  </div>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-default">Add To Cart</button>
      </div>

    </div>
  </div>
</div>




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



(function($)
{
    $(function()
    {
        $(document).on('change', "#year", function() 
        { 
            var year = $('#year').val(); 
            $('#shelve').empty();

            $.ajax({
                url:'{{url('publication')}}/nogiar/load-content?year=' + year,
                type:'GET',
                success:function(response)
                {
                    $('#shelve').html(response);
                    wrapEvent();            
                }
            });
        });


        function wrapEvent()
        {
            $('.pub_id').click(function(e)
            { 
              var id = this.id; 
              $('#pub-title').html('NOGIAR-000'+id); 
              $('#pub-content').load("{{url('publication')}}/nogiar/content?id="+id);     
            });    
        }

       wrapEvent();

    });
})(jQuery);    





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



    $('#year').datepicker(
    {
      autoclose: true,startView: 'decade',format: "yyyy",
      viewMode: "years", 
      minViewMode: "years"
    })
        
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