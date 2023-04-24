
<form id="remarkUpdateForm" action="{{url('/publication/nogiar/admin/add_publication_remark')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

        <input type="hidden" class="form-control" id="id" name="id" value="{{$REMARK->id}}" required>
        <input type="hidden" class="form-control" name="year" id="year" value="{{$REMARK->year}}">
        <input type="hidden" class="form-control" name="table_id" id="table_id" value="{{$REMARK->table_id}}">
        <input type="hidden" class="form-control" name="update_btn" id="update_btn" value="true">
        <input type="hidden" class="form-control" name="numbering" id="numbering" value="{{$REMARK->numbering}}">
            
              @forelse($FIGURE as $key => $figure) 
                <input type="hidden" class="form-control" name="fig_id_{{$key}}" id="fig_id_{{$key}}" value="{{$figure->id}}">

                <input type="hidden" class="form-control" name="fig_title_{{$key+1}}e" id="fig_title_{{$key+1}}e" value="{{$figure->figure_title}}">
              @empty
              @endforelse


              <div class="row">
                  <div class="col-md-12 pull-left" style="padding: 0px">
                      <div class="col-sm-3 pull-left">
                          <label for="header" class="col-form-label"> Position </label>
                      </div>
                      <div class="col-sm-4 pull-left">
                          <label class="radio-inline container" style="">
                            <input type="radio" name="position" value="1" @if($REMARK->position == 1)checked @endif> <span> Top </span>
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-sm-5 pull-left">
                          <label class="radio-inline container">
                            <input type="radio" name="position" value="0" @if($REMARK->position == 0)checked @endif> <span> Bottom </span>
                            <span class="checkmark"></span>
                          </label>
                      </div>
                  </div>
              </div> 

               
                    {{-- <div class="form-group row">          
                        <label for="header" class="col-sm-3 col-form-label"> Header </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="header" id="header" value="{{$REMARK->header}}">
                        </div>
                    </div> 

                    <div class="form-group row">          
                        <label for="sub_head" class="col-sm-3 col-form-label"> Sub-Header </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sub_head" id="sub_head" value="{{$REMARK->sub_head}}">
                        </div>
                    </div> 

                    <div class="form-group row">          
                        <label for="sub_sub_head" class="col-sm-3 col-form-label"> Sub-sub-Header </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sub_sub_head" id="sub_sub_head" value="{{$REMARK->sub_sub_head}}">
                        </div>
                    </div>  --}}

                    <div class="form-group row">          
                        <label for="table_title" class="col-sm-3 col-form-label"> Table Title </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="table_title" id="table_title" value="{{$REMARK->table_title}}" readonly>
                            <input type="hidden" class="form-control" name="page_no" id="page_no" value="{{$REMARK->page_no}}">
                        </div>
                    </div> 
                


                  

             <div class="form-group row">
                <div class="col-sm-12">
                    <label for="remark" class="col-form-label"> Remark </label>
                    <textarea rows="2" class="summernote" placeholder="Remark" name="remark" id="remark" style="min-height: 200px; max-height: 400px">{{$REMARK->remark}}</textarea>
                </div>
             </div>

                        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="update_btn" id="update_remark_btn" class="btn btn-info" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Remark </button>
      </div>

</form>









    @php


        $file = public_path('assets/images/publications/NOGIAR 2012.pdf/NOGIAR 2012.pdf');
        $r = test($file);
        function test($file)
        {
            $r = [];

            // Parse pdf file and build necessary objects.
            $parser = new \Smalot\PdfParser\Parser();
            $pdf    = $parser->parseFile($file);
             
            // Retrieve all pages from the pdf file.
            $pages  = $pdf->getPages();
             
            // Loop over each page to extract text.
            foreach ($pages as $k=>$page) 
            {
                // echo $page->getText() . '<hr /><br />';
                $r[] = [
                  'data'=>$page->getText(),
                  'page'=>($k + 1)
                ];

            }

            // dd($r);
            return $r;

        }

        function test2($file)
        {                        
            // Parse pdf file and build necessary objects.
            $parser = new \Smalot\PdfParser\Parser();
            $pdf    = $parser->parseFile($file);
             
            // Retrieve all details from the pdf file.
            $details = $pdf->getDetails();
             
            // Loop over each property to extract values (string or array).
            foreach ($details as $property => $value) 
            {
                if (is_array($value)) 
                {
                    $value = implode(', ', $value);
                }
                echo $property . ' => ' . $value . "\n";
            }
        }

    @endphp



<script>   
  
    $(function()
    {
        $('.summernote').summernote(
        {
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
        });
    });

             
//PHOTO PREVIEW JQUERY FUNCTIONALITY
    function readURL(input) 
    {

      if (input.files && input.files[0]) 
      {
        var reader = new FileReader();

        reader.onload = function(e) 
        {
          $('#newPicture').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

$("#picture").change(function() 
{
  readURL(this);
});







    // GET PAGE NO
    $(function()
    {
        // var $plus = $('#plus');
        var $table_title = $('.table_title');
        var $page_no = $('#page_no');
        var $update_remark_btn = $('#update_remark_btn');


        function doFind()
        {
            var query = findText($table_title.val());
             if (query.found)
             {
               $page_no.val(query.page);
             }
             else
             {
               $page_no.val('');
             }            
        }


        $update_remark_btn.on('mouseover', function()
        {
            var $table_title = $('#table_title');

            //put page number if found
            var query = findText($table_title.val());
            if (query.found)
            {
               $page_no.val(query.page);
            }
            else
            {
               $page_no.val('NULL');
            }   
        });

    });


    let pdfData = {!! json_encode($r) !!};

    pdfData.forEach(function(v, k)
    {
        var rr = v.data.split(/\s/).join('');
        pdfData[k].data = rr;
    });

    function buildQuery(txt)
    {
        var rr = txt.split('');
        rr = '[.| ]*' + rr.join('[.| ]*') + '[.| ]*';
        // console.log(rr);
        return rr;   
    } 

    function findText(txt)
    {
      var found = false;
      var page = 0;
      pdfData.forEach(function(value, key)
      {
        if(value.data.search(new RegExp(buildQuery(txt.split(' ').join('')))) != -1)
        {
           found = true;
           page = value.page;
        }
      });

      return {
        found: found,
        page: page
      }; 
    }


    function generateTableOfContent(i)
    {
        $(function()
        {
            for (var j = 0; j <= i; j++) 
            {
                var $table_title = $('.table_title'+j+'');
                var $page_no = $('#page_no'+j+'');

                //put page number if found
                var query = findText($table_title.val());
                if (query.found)
                {
                   $page_no.val(query.page);
                }
                else
                {
                   $page_no.val('');
                } 

            }

        });
    }







    //function to process form data
    function processForm(formid, route, modalid) 
    {

        formdata = new FormData($('#' + formid)[0]);
        formdata.append('_token', '{{csrf_token()}}');

        $.ajax(
            {
                // Your server script to process the upload
                url: route,
                type: 'POST',
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data, status, xhr) 
                {
                    if(data.status == 'ok') 
                    {
                        $('#' + modalid).modal('hide');
                        toastr.success(data.message, {timeOut: 10000});                        
                    }
                    else
                    {
                        toastr.error(data.message, {timeOut: 10000});
                    }                    

                },
            })

    }



    $(function() 
    {
        //
        $("#remarkUpdateForm").on('submit', function (e) 
        {
            e.preventDefault();
            processForm('remarkUpdateForm', "{{url('/publication/nogiar/admin/add_publication_remark')}}", 'edit_remark');

            //clear form
            var position = document.getElementsByName("position");
            $('#section_id').val('');
            $('input[name=position]').attr('checked', false);
            $('#header').val('');
            $('#sub_head').val('');
            $('#sub_sub_head').val('');
            $('#table_title').val('');
            $('#content_reg').summernote('code', '');
            $('#page_no').val('');

            //APPENDING TEMP COMMENTS
            var t_id = $('#table_id').val();   var remark_content = $('#remark').val();   
            var position = $('#posit').val();
            if(position == 1){ $('#topTab_'+t_id).html(remark_content); }
            else if(position == 0){ $('#bottomTab_'+t_id).html(remark_content); }

        });
    });

</script>