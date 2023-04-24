
   <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
               @if(isset($dwp->content)) 
                  @if(\Auth::user()->role_obj->role_name == 'DWP Report Manager' || \Auth::user()->role_obj->role_name == 'Admin')
                    <span class="alert alert-{{$dwp->status_html[1] }}" >{{$dwp->status_html[0] }}</span>
                  @endif 
                @endif
                <div class="card-body" id="editableSummer">  
                    @if(isset($dwp->content)) 
                      {!! $dwp->content !!} 
                    @else
                      <h4>No Publiction For this Year Yet Click here to add Publication</h4>
                    @endif                 
                      
                </div>
            </div>
        </div> <!-- end col -->      
 
   </div> <!-- end row -->


  @if(isset($dwp->content) &&  $dwp->status==0) 
  @if(\Auth::user()->role_obj->role_name == 'DWP Report Manager' || \Auth::user()->role_obj->role_name == 'Admin')
  <script type="text/javascript">    
      $(function()
      {

          $('#editableSummer').summernote({
            airMode: true,

        });

          $('#editableSummer').summernote({
            callbacks: {
              onKeyup: function(e) {
                savePublication();
            }
        }
    });

  // summernote.keyup
  $('#editableSummer').on('summernote.keyup', function(we, e) 
  {
    savePublication();
  });
      })

      function savePublication()
      {
           year=$('#dwp_year').val();
              content=$('#editableSummer').summernote('code');

              created_by='';
              formData = 
              {
                  year:year,
                  _token:'{{csrf_token()}}',
                  content:content,
                  created_by:created_by,
                  type:'addDwp'
              }
            $.post('{{url('dwp')}}',formData,function(data,status,xhr){

        })
      }
  </script>

@endif
@endif



 
