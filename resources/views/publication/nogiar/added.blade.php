
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
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">  

                <div class="row">
                    <div class="col-md-2">
                        <input type="text" class="form-control" value="{{date('Y')}}" placeholder="NOGIAR Report Date" readonly="" name="" id="nogiar_year">
                    </div> 
                    <div class="col-md-2"> 
                        {{-- <input type="text" class="form-control pull-right" id="price" name="price" value="0"> --}}
                        <button id="prevYear" class="btn btn-default btn-sm pull-left">Use Previous Year Template </button>
                    </div> 
                    {{-- <div class="col-md-4">                </div>  --}}
                    <div class="col-md-8" style="text-align: right; padding-right: 0px!important">
                        {{-- <input type="text" class="form-control" id="str" name="str">
                        <button id="find" class="btn btn-dark btn-sm pull-right mg-l mg-r">Find </button>
                        <div id="result"></div>
                        <div>
                            <button class="btn btn-sm btn-success" id="add_toc">Add to TOC</button>
                        </div> --}}

                        {{-- <span style="font-size: 16px"> Price &#8358; </span> --}}
                        <button id="l-figure" class="btn btn-dark btn-sm pull-right mg-l mg-r">List of Figures </button>
                        <button id="l-table" class="btn btn-dark btn-sm pull-right mg-r">List of Tables </button>
                        <button id="t-content" class="btn btn-dark btn-sm pull-right mg-r">Table of Content </button>
                    </div> 


                    <div class="col-md-12" style="padding: 2px 0px">
                        <div id="tab-content" class="row col-md-10 offset-1 col-sm-12" style="display: none;"> 
                            <div class="col-md-1 col-sm-3" style="padding: 2px 0px">
                                <input type="number" class="form-control frm" id="idd0" name="idd0">
                            </div> 
                            <div class="col-md-9 col-sm-3" style="padding: 2px 0px">
                                <input type="text" class="form-control frm title" id="title0" name="title0">
                            </div> 
                            <div class="col-md-1 col-sm-3" style="padding: 2px 0px">
                                <input type="text" class="form-control frm" id="page_no0" name="page_no0">
                            </div> 
                            <div class="col-md-1 col-sm-3" style="padding: 2px 0px"> 
                                <button id="0" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style="">
                                    X</button>
                            </div> 
                        </div> 


                            <div class="col-md-10 offset-1" style="padding: 3px 15px; text-align: right!important"> 
                                <button id="plus" class="btn btn-default btn-sm pull-right round" title="Add a new table row">
                                    <i class="fa fa-plus"></i></button>
                            </div> 

                        <div id="list-table" class="row col-md-8 offset-2" style="border: thin dotted #ddd; display: none;"> 
                            <div class="col-md-1" style="border: thin dotted #ddd">
                                DD
                            </div> 
                            <div class="col-md-10" style="border: thin dotted #ddd">
                                EE
                            </div> 
                            <div class="col-md-1" style="border: thin dotted #ddd">
                                FF
                            </div> 
                        </div> 

                        <div id="list-figure" class="row col-md-8 offset-2" style="border: thin dotted #ddd; display: none;"> 
                            <div class="col-md-1" style="border: thin dotted #ddd">
                                GG
                            </div> 
                            <div class="col-md-10" style="border: thin dotted #ddd">
                                HH
                            </div> 
                            <div class="col-md-1" style="border: thin dotted #ddd">
                                KK
                            </div> 
                        </div>
                    </div> 




                    <div class="col-lg-12" style="margin-top: 10px">
                      {{-- <textarea id="content" class="summernote"></textarea>               --}}
                      <div class="adjoined-bottom">
                        <div class="grid-container">
                            <div class="grid-width-100">
                                <div id="editor">
                                    
                                    <textarea id="content" class="summernote"></textarea> 
                                    
                                    @php $file = public_path('assets/images/NOGIAR-2017.pdf');  @endphp 
                                    <br>  <br>
                                      
                                    <br>  <br>
                                     {{-- {{test2($file)}}  --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                

              <div class="col-lg-12" style="margin-top: 10px; padding: 0px">
                <button id="saveNogiarPublication" class="btn btn-dark btn-sm pull-right">Save Publication 
                    @php $file = public_path('assets/images/NOGIAR-2017.pdf');  @endphp  {{getNumPagesInPDF($file)}} 
                </button>

                @php
                    function getNumPagesInPDF($file) 
                    {
                        if(!file_exists($file))return null;
                        if (!$fp = @fopen($file, "r"))return null;
                        $max = 0;
                        while(!feof($fp)) 
                        {
                            $line = fgets($fp, 255);
                            if (preg_match('/\/Count [0-9]+/', $line, $matches))
                            {
                                preg_match('/[0-9]+/', $matches[0], $matches2);
                                if ($max < $matches2[0]) $max = $matches2[0];
                            }
                        }
                        fclose($fp);
                        return (int)$max;
                    }

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

                    $file = public_path('assets/images/NOGIAR-2017.pdf');
                    $r = test($file);

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

                    {{-- @php
                        $image = new Imagick();
                        $image->pingImage("asset('assets/images/NOGIAR-2017.pdf')");
                        echo $image->getNumberImages();
                    @endphp  --}}
              </div>



          
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->









@endsection



@section('script')

<script>   

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


    $(function()
    { 
        //for using previous year
        loadNogiarPub('{{date('Y')}}');

        $('#nogiar_year').change(function()
        {
            loadNogiarPub($('#nogiar_year').val());             
        });

        $('#nogiar_year').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#saveNogiarPublication').click(function()
        {
            year=$('#nogiar_year').val();
            price=$('#price').val();
            workflow_id=1;
            content=$('#content').val();

            created_by='';
            formData = 
            {
                year:year,
                price:price,
                workflow_id:workflow_id,
                _token:'{{csrf_token()}}',
                content:content,
                created_by:created_by,
                type:'addNogiar'
            }
            $.post('{{route('addNogiar')}}', formData,function(data,status,xhr)
            {
                if(data.status=='success')
                {
                    return toastr.success(data.message);
                }
                return toastr.error(data.message);
            })

        })

    });




    //hide and show div
    $(function()
    {
        $('#t-content').click(function()
        {
            $('#tab-content').toggle();
        });

        $('#l-table').click(function()
        {
            $('#list-table').toggle();
        });

        $('#l-figure').click(function()
        {
            $('#list-figure').toggle();
        });
    });



    //dublicate
    $(function()
    {
        var i = 0;      var c = 0;
        $('#plus').on('click', function () //
        {
            i++;  
            $('#tab-content').append(
            '<div class="col-md-1 col-sm-3" style="padding: 2px 0px"> <input type="number" class="form-control frm" id="idd'+i+'"  name="idd'+i+'" > </div>  <div class="col-md-9 col-sm-3" style="padding: 2px 0px">  <input type="text" class="form-control frm title" id="title'+i+'" name="title'+i+'"> </div>  <div class="col-md-1 col-sm-3" style="padding: 2px 0px"> <input type="text" class="form-control frm" id="page_no'+i+'" name="page_no'+i+'"> </div>  <div class="col-md-1 col-sm-3" style="padding: 2px 0px"> <button name="remove" id="'+i+'" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style=""> X</button> </div>'
            );
            
        });
    });

</script> 





{{-- Table of content script --}}
<script>
    $(function()
    {
        var $plus = $('#plus');
        var $title = $('.title0');
        var $page_no = $('#page_no0');

        // $addToTOC.hide();

        function doFind()
        {
            var query = findText($title.val());
            console.log(query);
             if (query.found)
             {
               $page_no.val(query.page);
             }
             else
             {
               $page_no.val('');
             }            
        }

        $plus.on('mouseover',function()
        {
            doFind();
        });

    });


    let pdfData = {!! json_encode($r) !!};

    pdfData.forEach(function(v, k)
    {
        var rr = v.data.split(/\s/).join('');
        pdfData[k].data = rr;
    });

    //function to split, join and remove all spaces and special characters
    function buildQuery(txt)
    {
        var rr = txt.split('');
        rr = '[.| ]*' + rr.join('[.| ]*') + '[.| ]*';
        // console.log(rr);
        return rr;   
    }    
       
// if(value.data.indexOf(txt) != -1)
    
    // toUpperCase().trim().indexOf(txt.toUpperCase().trim())
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

</script>

 

@endsection









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
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">  

                <div class="row">
                    <div class="col-md-2">
                        <input type="text" class="form-control" value="{{date('Y')}}" placeholder="NOGIAR Report Date" readonly="" name="" id="nogiar_year">
                    </div> 
                    <div class="col-md-2"> 
                        {{-- <input type="text" class="form-control pull-right" id="price" name="price" value="0"> --}}
                        <button id="prevYear" class="btn btn-default btn-sm pull-left">Use Previous Year Template </button>
                    </div> 
                    {{-- <div class="col-md-4">                </div>  --}}
                    <div class="col-md-8" style="text-align: right; padding-right: 0px!important">
                        {{-- <input type="text" class="form-control" id="str" name="str">
                        <button id="find" class="btn btn-dark btn-sm pull-right mg-l mg-r">Find </button>
                        <div id="result"></div>
                        <div>
                            <button class="btn btn-sm btn-success" id="add_toc">Add to TOC</button>
                        </div> --}}

                        {{-- <span style="font-size: 16px"> Price &#8358; </span> --}}
                        <button id="l-figure" class="btn btn-dark btn-sm pull-right mg-l mg-r">List of Figures </button>
                        <button id="l-table" class="btn btn-dark btn-sm pull-right mg-r">List of Tables </button>
                        <button id="t-content" class="btn btn-dark btn-sm pull-right mg-r">Table of Content </button>
                    </div> 


                    <div class="col-md-12" style="padding: 2px 0px">
                        <div id="tab-content" class="row col-md-10 offset-1 col-sm-12" style="display: none;"> 
                            <div class="col-md-1 col-sm-3" style="padding: 2px 0px">
                                <input type="number" class="form-control frm" id="idd0" name="idd0">
                            </div> 
                            <div class="col-md-9 col-sm-3" style="padding: 2px 0px">
                                <input type="text" class="form-control frm title" id="title" name="title">
                            </div> 
                            <div class="col-md-1 col-sm-3" style="padding: 2px 0px">
                                <input type="text" class="form-control frm" id="page_no" name="page_no">
                            </div> 
                            <div class="col-md-1 col-sm-3" style="padding: 2px 0px"> 
                                <button id="0" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style="">
                                    X</button>
                            </div> 
                        </div> 


                            <div class="col-md-10 offset-1" style="padding: 3px 15px; text-align: right!important"> 
                                <button id="plus" class="btn btn-default btn-sm pull-right round" title="Add a new table row">
                                    <i class="fa fa-plus"></i></button>
                            </div> 

                        <div id="list-table" class="row col-md-8 offset-2" style="border: thin dotted #ddd; display: none;"> 
                            <div class="col-md-1" style="border: thin dotted #ddd">
                                DD
                            </div> 
                            <div class="col-md-10" style="border: thin dotted #ddd">
                                EE
                            </div> 
                            <div class="col-md-1" style="border: thin dotted #ddd">
                                FF
                            </div> 
                        </div> 

                        <div id="list-figure" class="row col-md-8 offset-2" style="border: thin dotted #ddd; display: none;"> 
                            <div class="col-md-1" style="border: thin dotted #ddd">
                                GG
                            </div> 
                            <div class="col-md-10" style="border: thin dotted #ddd">
                                HH
                            </div> 
                            <div class="col-md-1" style="border: thin dotted #ddd">
                                KK
                            </div> 
                        </div>
                    </div> 




                    <div class="col-lg-12" style="margin-top: 10px">
                      {{-- <textarea id="content" class="summernote"></textarea>               --}}
                      <div class="adjoined-bottom">
                        <div class="grid-container">
                            <div class="grid-width-100">
                                <div id="editor">
                                    
                                    <textarea id="content" class="summernote"></textarea> 
                                    
                                    @php $file = public_path('assets/images/NOGIAR-2017.pdf');  @endphp 
                                    <br>  <br>
                                      
                                    <br>  <br>
                                     {{-- {{test2($file)}}  --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                

              <div class="col-lg-12" style="margin-top: 10px; padding: 0px">
                <button id="saveNogiarPublication" class="btn btn-dark btn-sm pull-right">Save Publication 
                    @php $file = public_path('assets/images/NOGIAR-2017.pdf');  @endphp  {{getNumPagesInPDF($file)}} 
                </button>

                @php
                    function getNumPagesInPDF($file) 
                    {
                        if(!file_exists($file))return null;
                        if (!$fp = @fopen($file, "r"))return null;
                        $max = 0;
                        while(!feof($fp)) 
                        {
                            $line = fgets($fp, 255);
                            if (preg_match('/\/Count [0-9]+/', $line, $matches))
                            {
                                preg_match('/[0-9]+/', $matches[0], $matches2);
                                if ($max < $matches2[0]) $max = $matches2[0];
                            }
                        }
                        fclose($fp);
                        return (int)$max;
                    }

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

                    $file = public_path('assets/images/NOGIAR-2017.pdf');
                    $r = test($file);

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

                    {{-- @php
                        $image = new Imagick();
                        $image->pingImage("asset('assets/images/NOGIAR-2017.pdf')");
                        echo $image->getNumberImages();
                    @endphp  --}}
              </div>



          
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->









@endsection



@section('script')

<script>   

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


    $(function()
    { 
        //for using previous year
        loadNogiarPub('{{date('Y')}}');

        $('#nogiar_year').change(function()
        {
            loadNogiarPub($('#nogiar_year').val());             
        });

        $('#nogiar_year').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#saveNogiarPublication').click(function()
        {
            year=$('#nogiar_year').val();
            price=$('#price').val();
            workflow_id=1;
            content=$('#content').val();

            created_by='';
            formData = 
            {
                year:year,
                price:price,
                workflow_id:workflow_id,
                _token:'{{csrf_token()}}',
                content:content,
                created_by:created_by,
                type:'addNogiar'
            }
            $.post('{{route('addNogiar')}}', formData,function(data,status,xhr)
            {
                if(data.status=='success')
                {
                    return toastr.success(data.message);
                }
                return toastr.error(data.message);
            })

        })

    });




    //hide and show div
    $(function()
    {
        $('#t-content').click(function()
        {
            $('#tab-content').toggle();
        });

        $('#l-table').click(function()
        {
            $('#list-table').toggle();
        });

        $('#l-figure').click(function()
        {
            $('#list-figure').toggle();
        });
    });



    //dublicate
    $(function()
    {
        //for Part
        var i = 0;      var c = 0;
        $('#plus').on('click', function () //
        {
            i++;  
            $('#tab-content').append(
            '<div class="col-md-1 col-sm-3" style="padding: 2px 0px"> <input type="number" class="form-control frm" id="idd'+i+'"  name="idd'+i+'" > </div>  <div class="col-md-9 col-sm-3" style="padding: 2px 0px">  <input type="text" class="form-control frm title" id="title'+i+'" name="title'+i+'"> </div>  <div class="col-md-1 col-sm-3" style="padding: 2px 0px"> <input type="text" class="form-control frm" id="page_no'+i+'" name="page_no'+i+'"> </div>  <div class="col-md-1 col-sm-3" style="padding: 2px 0px"> <button name="remove" id="'+i+'" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style=""> X</button> </div>'
            );
        });
    });

</script> 





{{-- Table of content script --}}
<script>
    $(function()
    {
        var $button = $('#find');
        var $plus = $('#plus');
        var $str = $('#str');
        var $title = $('.title');
        var $result = $('#result');
        var $page_no = $('#page_no');
        var $addToTOC = $('#add_toc');

        $addToTOC.hide();

        function doFind()
        {
            var query = findText($title.val());
             if (query.found)
             {
               $page_no.val('Page ' + query.page);
             }
             else
             {
               $page_no.val('');
             }            
        }

        $plus.on('click',function()
        {
            doFind();
        });

    });


    let pdfData = {!! json_encode($r) !!};

    pdfData.forEach(function(v,k){
        var rr = v.data.split(/\s/).join('');
        pdfData[k].data = rr;
    });

    function buildQuery(txt)
    {
       var rr = txt.split('');
           rr = '[.| ]*' + rr.join('[.| ]*') + '[.| ]*';
           console.log(rr);
       return rr;   
    }    
       
// if(value.data.indexOf(txt) != -1)
    
    // toUpperCase().trim().indexOf(txt.toUpperCase().trim())
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

</script>

 

@endsection















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
        padding:4px 35px;
        border: #e1e1e1 thin solid;
    }
    .nav-pad a:hover
    {
        padding:4px 35px;
        border: #e1e1e1 thin solid;
        background-color: #008B8B;          /*36454F*/
        color: #fff;
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
</style>

<div class="row" style="">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body"> 

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Publication Section </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->


                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-5 pull left" style="border-right: thin solid #ddd">
                        <ul class="nav flex-column" role="tablist">                  
                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" href="#director" role="tab"> Directors Remarks</a>
                            </li>   

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" href="#regulatory" role="tab"> Regulatory Structure</a>
                            </li> 

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" href="#modular" role="tab"> Modular Refinery</a>
                            </li> 

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" href="#toc" role="tab"> Table of Content</a>
                            </li>

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" href="#lot" role="tab"> List of Table</a>
                            </li>

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" href="#lof" role="tab"> List of Figure</a>
                            </li>

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" href="#glossary" role="tab"> Glossary</a>
                            </li>
                        </ul>
                    </div>




                    <div class="col-lg-9 col-md-9 col-sm-7 pull left" style="border-left: thin solid #ddd; margin-top: -20px">
                        <!-- Tab panes -->
                        <div class="tab-content">                   

                            <div class="tab-pane p-3" id="director" role="tabpanel">
                                <p class="font-14 mb-0">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-4" style="">
                                            <h5 style="margin-left: 5px; color: #aaa"> Directors Remarks </h5>
                                        </div>

                                        {{-- <div class="col-md-3 col-sm-0"> </div> --}}

                                        <div class="row col-md-5 col-sm-8" style=""> 
                                            <div class="col-xl-11 col-sm-9" style="text-align: left"> 
                                                <input type="text" class="form-control" value="{{date('Y')}}" placeholder="NOGIAR Report Date" readonly="" name="nogiar_year" id="nogiar_year">
                                            </div>

                                            <div class="col-xl-1 col-md-2 col-sm-3" style="text-align: right"> 
                                                <button id="prevYear" class="btn btn-dark btn-sm round" data-toggle="tooltip" tooltip="true" title="Use Previous Year Template"> <i class="fa fa-calendar"></i> </button>
                                            </div> 
                                        </div>




                                        <div class="col-lg-12" style="margin-top: 10px">
                                            <div class="adjoined-bottom">
                                                <div class="grid-container">
                                                    <div class="grid-width-100">
                                                        <div id="editor">
                                                            
                                                            <textarea id="content" class="summernote"></textarea> 

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12" style="margin-top: 10px;">
                                            <button id="" class="btn btn-dark btn-sm pull-right" onclick="return confirm('Are you sure you want to Save as the final copy?')"> Save </button>
                                            <button id="saveNogiarPublication" class="btn btn-default btn-sm pull-right mg-l" onclick="return confirm('Are you sure you want to save this as a draft copy?')"> Save as Draft </button>
                                        </div>
                                             
                                    </div> <!-- end row -->
                                </p>
                            </div>

                            <div class="tab-pane p-3" id="regulatory" role="tabpanel">
                                <p class="font-14 mb-0">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-4" style="">
                                            <h5 style="margin-left: 5px; color: #aaa"> Regulatory Structure </h5>
                                        </div>

                                        {{-- <div class="col-md-3 col-sm-0"> </div> --}}

                                        <div class="row col-md-5 col-sm-8" style=""> 
                                            <div class="col-xl-11 col-sm-9" style="text-align: left"> 
                                                <input type="text" class="form-control" value="{{date('Y')}}" placeholder="NOGIAR Report Date" readonly="" name="nogiar_year" id="nogiar_year">
                                            </div>

                                            <div class="col-xl-1 col-md-2 col-sm-3" style="text-align: right"> 
                                                <button id="prevYear" class="btn btn-dark btn-sm round" data-toggle="tooltip" tooltip="true" title="Use Previous Year Template"> <i class="fa fa-calendar"></i> </button>
                                            </div> 
                                        </div>




                                        <div class="col-lg-12" style="margin-top: 10px">
                                            <div class="adjoined-bottom">
                                                <div class="grid-container">
                                                    <div class="grid-width-100">
                                                        <div id="editor">
                                                            
                                                            <textarea id="content" class="summernote"></textarea> 

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12" style="margin-top: 10px;">
                                            <button id="" class="btn btn-dark btn-sm pull-right" onclick="return confirm('Are you sure you want to Save as the final copy?')"> Save </button>
                                            <button id="saveNogiarPublication" class="btn btn-default btn-sm pull-right mg-l" onclick="return confirm('Are you sure you want to save this as a draft copy?')"> Save as Draft </button>
                                        </div>
                                             
                                    </div> <!-- end row -->
                                </p>
                            </div>                   

                            <div class="tab-pane p-3" id="modular" role="tabpanel">
                                <p class="font-14 mb-0">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-4" style="">
                                            <h5 style="margin-left: 5px; color: #aaa"> Modular Refinery </h5>
                                        </div>

                                        {{-- <div class="col-md-3 col-sm-0"> </div> --}}

                                        <div class="row col-md-5 col-sm-8" style=""> 
                                            <div class="col-xl-11 col-sm-9" style="text-align: left"> 
                                                <input type="text" class="form-control" value="{{date('Y')}}" placeholder="NOGIAR Report Date" readonly="" name="nogiar_year" id="nogiar_year">
                                            </div>

                                            <div class="col-xl-1 col-md-2 col-sm-3" style="text-align: right"> 
                                                <button id="prevYear" class="btn btn-dark btn-sm round" data-toggle="tooltip" tooltip="true" title="Use Previous Year Template"> <i class="fa fa-calendar"></i> </button>
                                            </div> 
                                        </div>




                                        <div class="col-lg-12" style="margin-top: 10px">
                                            <div class="adjoined-bottom">
                                                <div class="grid-container">
                                                    <div class="grid-width-100">
                                                        <div id="editor">
                                                            
                                                            <textarea id="content" class="summernote"></textarea> 

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12" style="margin-top: 10px;">
                                            <button id="" class="btn btn-dark btn-sm pull-right" onclick="return confirm('Are you sure you want to Save as the final copy?')"> Save </button>
                                            <button id="saveNogiarPublication" class="btn btn-default btn-sm pull-right mg-l" onclick="return confirm('Are you sure you want to save this as a draft copy?')"> Save as Draft </button>
                                        </div>
                                             
                                    </div> <!-- end row -->
                                </p>
                            </div>

                            <div class="tab-pane p-3" id="toc" role="tabpanel">
                                <p class="font-14 mb-0">

                                <form id="tocForm" action="{{ route('add-table-of-content') }}" method="POST">
                                    @csrf
                                    <input type="hidden" class="form-control frm" id="type_id" name="type_id" value="1">
                                    <input type="hidden" class="form-control frm" id="first" name="first">
                                    <input type="hidden" class="form-control frm" id="last" name="last">
                                    <input type="text" class="form-control frm" id="id" name="toc_count" value="0">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-4" style="padding: 0px;">
                                            <h5 style="color: #aaa"> Table of Content </h5>
                                        </div>

                                        {{-- <div class="col-md-3 col-sm-0"> </div> --}}

                                        <div class="row col-md-4 col-sm-8" style="padding: 0px"> 
                                            <div class="col-xl-12 col-sm-12" style="text-align: right; padding: 0px"> 
                                                <input type="text" class="form-control" value="" placeholder="Pick a Year" readonly="" name="toc_year" id="toc_year" required>
                                            </div>

                                            {{-- <div class="col-xl-1 col-md-2 col-sm-3" style="text-align: right"> 
                                                <button id="prevYear" class="btn btn-dark btn-sm round" data-toggle="tooltip" tooltip="true" title="Use Previous Year Template"> <i class="fa fa-calendar"></i> </button>
                                            </div> --}} 
                                        </div>

                                        <div class="table-responsive" style="padding:0px">
                                            <table class="table table-sm mb-0" style="border: none;">
                                                <thead id="tab-content">
                                                    <tr style="border: none;">
                                                        <th style="width: 80%">Content Title</th>
                                                        <th style="width: 10%">Page No</th>
                                                        <th style="width: 10%">Actions</th>
                                                    </tr>
                                                    <tr style="padding: 1px; border: none;">
                                                        <th>
                                                            <input type="text" class="form-control frm title" id="title0" name="title0">
                                                        </th>
                                                        <th>                      
                                                            <input type="text" class="form-control frm" id="page_no0" name="page_no0">
                                                        </th>
                                                        <th>  
                                                            <button type="button" id="0" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style="">
                                                        X</button>                                                          
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div> 


                                        <div class="row col-md-12" style="padding: 2px 0px">
                                            <div class="col-md-10 col-sm-6" style="padding: 3px 15px; text-align: right!important">
                                                 
                                            </div>

                                            <div class="col-md-1 col-sm-3" style="padding: 3px 15px; text-align: right!important">
                                                <button type="button" id="plus" class="btn btn-default btn-sm pull-right round" title="Add a new table row">  <i class="fa fa-plus"></i></button> 
                                            </div> 
                                            <div class="col-md-1 col-sm-3" style="padding: 3px 1px; text-align: right!important">
                                                <button type="button" id="generateBtn" class="btn btn-default btn-sm pull-right gen" title="Generate Table of Content">
                                                    <i class="fa fa-check"> Generate</i>
                                                 </button>
                                            </div>
                                        </div> 



                                        <div class="col-lg-12" style="margin-top: 10px;">
                                            <input type="hidden" class="form-control frm" id="count" name="count">
                                            <button type="submit" id="toc_save" class="btn btn-dark btn-sm pull-right" onclick="return confirm('Are you sure you want to Save as the final copy?')"> Save </button>
                                            <button type="submit" id="toc_update" class="btn btn-dark btn-sm pull-right" onclick="return confirm('Are you sure you want to Update as the final copy?')" style="display: none;"> Update </button>
                                            <button type="submit" id="" class="btn btn-default btn-sm pull-right mg-l" onclick="return confirm('Are you sure you want to save this as a draft copy?')"> Save as Draft </button>
                                        </div>
                                             
                                    </div> <!-- end row -->
                                </form>

                                </p>
                            </div>                   

                            <div class="tab-pane p-3" id="lot" role="tabpanel">
                                <p class="font-14 mb-0">
                                    <div class="row">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> List of Table </h5>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" value="{{date('Y')}}" placeholder="NOGIAR Report Date" readonly="" name="" id="nogiar_year">
                                                </div> 
                                                <div class="col-md-2"> 
                                                    {{-- <input type="text" class="form-control pull-right" id="price" name="price" value="0"> --}}
                                                    <button id="prevYear" class="btn btn-default btn-sm pull-left">Use Previous Year Template </button>
                                                </div> 
                                                {{-- <div class="col-md-4">                </div>  --}}
                                                <div class="col-md-8" style="text-align: right; padding-right: 0px!important">

                                                </div> 


                                                <div class="row col-md-12" style="padding: 2px 0px">
                                                    <div id="" class="row col-md-10 offset-1 col-sm-12" style="display: none;"> 
                                                        <input type="hidden" class="form-control frm" id="id" name="id">

                                                        <div class="col-md-10 col-sm-6 col-xs-8" style="padding: 2px 0px">
                                                            <input type="text" class="form-control frm title" id="title" name="title">
                                                        </div> 
                                                        <div class="col-md-1 col-sm-3 col-xs-2" style="padding: 2px 0px">
                                                            <input type="text" class="form-control frm" id="page_no" name="page_no">
                                                        </div> 
                                                        <div class="col-md-1 col-sm-3 col-xs-2" style="padding: 2px 0px"> 
                                                            <button id="0" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style="">
                                                                X</button>
                                                        </div> 
                                                    </div> 


                                                    <div class="col-md-10 col-sm-6" style="padding: 3px 15px; text-align: right!important">
                                                         
                                                    </div>
                                                    <div class="col-md-1 col-sm-3" style="padding: 3px 15px; text-align: right!important">
                                                        <button id="plus" class="btn btn-default btn-sm pull-right round" title="Add a new table row">
                                                            <i class="fa fa-plus"></i></button> 
                                                    </div> 
                                                    <div class="col-md-1 col-sm-3" style="padding: 3px 15px; text-align: right!important">
                                                        <button id="generateBtn" class="btn btn-default btn-sm pull-right gen" title="Generate Table of Content">
                                                            <i class="fa fa-check"> Generate</i>
                                                         </button>
                                                    </div>
                                                </div> 

                                                




                                                <div class="col-lg-12" style="margin-top: 10px">
                                                  {{-- <textarea id="content" class="summernote"></textarea>               --}}
                                                  <div class="adjoined-bottom">
                                                    <div class="grid-container">
                                                        <div class="grid-width-100">
                                                            <div id="editor">
                                                                
                                                                <textarea id="content" class="summernote"></textarea> 
                                                                
                                                                @php $file = public_path('assets/images/NOGIAR-2017.pdf');  @endphp 
                                                                <br>  <br>
                                                                  
                                                                <br>  <br>
                                                                 {{-- {{test2($file)}}  --}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>


                                                  <div class="col-lg-12" style="margin-top: 10px; padding: 0px">
                                                    <button id="saveNogiarPublication" class="btn btn-dark btn-sm pull-right">Save Publication 
                                                        {{-- @php $file = public_path('assets/images/NOGIAR-2017.pdf');  @endphp  {{getNumPagesInPDF($file)}}  --}}
                                                    </button>
                                                  </div>
                                                  
                                            </div>

                                        </div> 

                                    </div> <!-- end row -->
                                </p>
                            </div>

                            <div class="tab-pane p-3" id="lof" role="tabpanel">
                                <p class="font-14 mb-0">
                                    <div class="row">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> List of Figure </h5>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" value="{{date('Y')}}" placeholder="NOGIAR Report Date" readonly="" name="" id="nogiar_year">
                                                </div> 
                                                <div class="col-md-2"> 
                                                    {{-- <input type="text" class="form-control pull-right" id="price" name="price" value="0"> --}}
                                                    <button id="prevYear" class="btn btn-default btn-sm pull-left">Use Previous Year Template </button>
                                                </div> 
                                                {{-- <div class="col-md-4">                </div> --}} 
                                                <div class="col-md-8" style="text-align: right; padding-right: 0px!important">
                                                </div> 


                                                <div class="row col-md-12" style="padding: 2px 0px">
                                                    <div id="" class="row col-md-10 offset-1 col-sm-12" style="display: none;"> 
                                                        <input type="hidden" class="form-control frm" id="id" name="id">

                                                        <div class="col-md-10 col-sm-6 col-xs-8" style="padding: 2px 0px">
                                                            <input type="text" class="form-control frm title" id="title" name="title">
                                                        </div> 
                                                        <div class="col-md-1 col-sm-3 col-xs-2" style="padding: 2px 0px">
                                                            <input type="text" class="form-control frm" id="page_no" name="page_no">
                                                        </div> 
                                                        <div class="col-md-1 col-sm-3 col-xs-2" style="padding: 2px 0px"> 
                                                            <button id="0" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style="">
                                                                X</button>
                                                        </div> 
                                                    </div> 


                                                    <div class="col-md-10 col-sm-6" style="padding: 3px 15px; text-align: right!important">
                                                         
                                                    </div>
                                                    <div class="col-md-1 col-sm-3" style="padding: 3px 15px; text-align: right!important">
                                                        <button id="plus" class="btn btn-default btn-sm pull-right round" title="Add a new table row">
                                                            <i class="fa fa-plus"></i></button> 
                                                    </div> 
                                                    <div class="col-md-1 col-sm-3" style="padding: 3px 15px; text-align: right!important">
                                                        <button id="generateBtn" class="btn btn-default btn-sm pull-right gen" title="Generate Table of Content">
                                                            <i class="fa fa-check"> Generate</i>
                                                         </button>
                                                    </div>
                                                </div> 

                                                




                                                <div class="col-lg-12" style="margin-top: 10px">
                                                  {{-- <textarea id="content" class="summernote"></textarea>               --}}
                                                  <div class="adjoined-bottom">
                                                    <div class="grid-container">
                                                        <div class="grid-width-100">
                                                            <div id="editor">
                                                                
                                                                <textarea id="content" class="summernote"></textarea> 
                                                                
                                                                @php $file = public_path('assets/images/NOGIAR-2017.pdf');  @endphp 
                                                                <br>  <br>
                                                                  
                                                                <br>  <br>
                                                                 {{-- {{test2($file)}}  --}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>


                                                  <div class="col-lg-12" style="margin-top: 10px; padding: 0px">
                                                    <button id="saveNogiarPublication" class="btn btn-dark btn-sm pull-right">Save Publication 
                                                        {{-- @php $file = public_path('assets/images/NOGIAR-2017.pdf');  @endphp  {{getNumPagesInPDF($file)}}  --}}
                                                    </button>
                                                  </div>
                                                  
                                            </div>
                                        </div> 

                                    </div> <!-- end row -->
                                </p>
                            </div>                   

                            <div class="tab-pane p-3" id="glossary" role="tabpanel">
                                <p class="font-14 mb-0">
                                    <div class="row">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> Glossary </h5>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" value="{{date('Y')}}" placeholder="NOGIAR Report Date" readonly="" name="" id="nogiar_year">
                                                </div> 
                                                <div class="col-md-2"> 
                                                    {{-- <input type="text" class="form-control pull-right" id="price" name="price" value="0"> --}}
                                                    <button id="prevYear" class="btn btn-default btn-sm pull-left">Use Previous Year Template </button>
                                                </div> 
                                                {{-- <div class="col-md-4">                </div>  --}}
                                                <div class="col-md-8" style="text-align: right; padding-right: 0px!important">
                                                </div> 


                                                <div class="row col-md-12" style="padding: 2px 0px">
                                                    <div id="" class="row col-md-10 offset-1 col-sm-12" style="display: none;"> 
                                                        <input type="hidden" class="form-control frm" id="id" name="id">

                                                        <div class="col-md-10 col-sm-6 col-xs-8" style="padding: 2px 0px">
                                                            <input type="text" class="form-control frm title" id="title" name="title">
                                                        </div> 
                                                        <div class="col-md-1 col-sm-3 col-xs-2" style="padding: 2px 0px">
                                                            <input type="text" class="form-control frm" id="page_no" name="page_no">
                                                        </div> 
                                                        <div class="col-md-1 col-sm-3 col-xs-2" style="padding: 2px 0px"> 
                                                            <button id="0" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style="">
                                                                X</button>
                                                        </div> 
                                                    </div> 


                                                    <div class="col-md-10 col-sm-6" style="padding: 3px 15px; text-align: right!important">
                                                         
                                                    </div>
                                                    <div class="col-md-1 col-sm-3" style="padding: 3px 15px; text-align: right!important">
                                                        <button id="plus" class="btn btn-default btn-sm pull-right round" title="Add a new table row">
                                                            <i class="fa fa-plus"></i></button> 
                                                    </div> 
                                                    <div class="col-md-1 col-sm-3" style="padding: 3px 15px; text-align: right!important">
                                                        <button id="generateBtn" class="btn btn-default btn-sm pull-right gen" title="Generate Table of Content">
                                                            <i class="fa fa-check"> Generate</i>
                                                         </button>
                                                    </div>
                                                </div> 

                                                




                                                <div class="col-lg-12" style="margin-top: 10px">
                                                  {{-- <textarea id="content" class="summernote"></textarea>               --}}
                                                  <div class="adjoined-bottom">
                                                    <div class="grid-container">
                                                        <div class="grid-width-100">
                                                            <div id="editor">
                                                                
                                                                <textarea id="content" class="summernote"></textarea> 
                                                                
                                                                @php $file = public_path('assets/images/NOGIAR-2017.pdf');  @endphp 
                                                                <br>  <br>
                                                                  
                                                                <br>  <br>
                                                                {{-- {{test2($file)}}  --}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>


                                                  <div class="col-lg-12" style="margin-top: 10px; padding: 0px">
                                                    <button id="saveNogiarPublication" class="btn btn-dark btn-sm pull-right">Save Publication 
                                                        {{-- @php $file = public_path('assets/images/NOGIAR-2017.pdf');  @endphp  {{getNumPagesInPDF($file)}}  --}}
                                                    </button>
                                                  </div>
                                                  
                                            </div>
                                        </div> 

                                    </div> <!-- end row -->
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- Nav tabs -->
                
           

                


                @php
                    function getNumPagesInPDF($file) 
                    {
                        if(!file_exists($file))return null;
                        if (!$fp = @fopen($file, "r"))return null;
                        $max = 0;
                        while(!feof($fp)) 
                        {
                            $line = fgets($fp, 255);
                            if (preg_match('/\/Count [0-9]+/', $line, $matches))
                            {
                                preg_match('/[0-9]+/', $matches[0], $matches2);
                                if ($max < $matches2[0]) $max = $matches2[0];
                            }
                        }
                        fclose($fp);
                        return (int)$max;
                    }

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

                    $file = public_path('assets/images/NOGIAR-2017.pdf');
                    $r = test($file);

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



          
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->









@endsection



@section('script')

<script>   

    function loadNogiarPub(year)
    {
        $('#content').summernote('code','');
        //loadNogiarPublication
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


    $(function()
    { 
        //for using previous year
        loadNogiarPub('{{date('Y')}}');
        $('#nogiar_year').change(function()
        {
            loadNogiarPub($('#nogiar_year').val());             
        });


        $('#nogiar_year').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#saveNogiarPublication').click(function()
        {
            year=$('#nogiar_year').val();
            price=$('#price').val();
            workflow_id=1;
            content=$('#content').val();

            created_by='';
            formData = 
            {
                year:year,
                price:price,
                workflow_id:workflow_id,
                _token:'{{csrf_token()}}',
                content:content,
                created_by:created_by,
                type:'addNogiar'
            }
            $.post('{{route('addNogiar')}}', formData,function(data,status,xhr)
            {
                if(data.status=='success')
                {
                    return toastr.success(data.message);
                }
                return toastr.error(data.message);
            })

        })

    });




    //hide and show div
    $(function()
    {
        $('#t-content').click(function()
        {
            $('#tab-content').toggle();
        });

        $('#l-table').click(function()
        {
            $('#list-table').toggle();
        });

        $('#l-figure').click(function()
        {
            $('#list-figure').toggle();
        });
    });



    //dublicate
    $(function()
    {
        $('#plus').on('click', function()
        {
            var count = $('#count').val();
            if(count > 0){ var i = count; }else{ var i = 0; }
            // var i = 0;      var c = 0;
            i++;  
            $('#tab-content').append(
            '<tr style="padding: 1px">  <th> <input type="text" class="form-control frm title" id="title'+(i-1)+'" name="title'+(i-1)+'">  </th>  <th>     <input type="text" class="form-control frm" id="page_no'+(i-1)+'" name="page_no'+(i-1)+'">   </th>  <th>    <button id="'+(i-1)+'" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style=""> X</button>    </th> </tr>'
            );

            console.log(i);
            $('#id').val(i);
            $('#count').val(i);
            // generateTableOfContent(i);
        });
    });

</script> 





{{-- Table of content script --}}
<script>
    $(function()
    {
        $('[data-toggle="tooltip"]').tooltip();

        $('#toc_year').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });

        var $plus = $('#plus');
        var $title = $('.title');
        var $page_no = $('#page_no0');
        var $generateBtn = $('#generateBtn');


        function doFind()
        {
            var query = findText($title.val());
             if (query.found)
             {
               $page_no.val(query.page);
             }
             else
             {
               $page_no.val('');
             }            
        }

        $plus.on('click', function()
        {
            doFind();
        });

        $generateBtn.on('click', function()
        {
            var i = $('#id').val();
            for (var j = 1; j <= i; j++) 
            {
                var $title = $('#title'+j+'');
                var $page_no = $('#page_no'+j+'');

                //put page number if found
                var query = findText($title.val());
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
       
    // if(value.data.indexOf(txt) != -1)
    
    // toUpperCase().trim().indexOf(txt.toUpperCase().trim())
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
                var $title = $('.title'+j+'');
                var $page_no = $('#page_no'+j+'');

                //put page number if found
                var query = findText($title.val());
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


    $(function()
    {

        $('#toc_year').change(function()
        {
          var year = $(this).val();  //alert(year);

          $.get('{{url('getATableOfContent')}}?year=' + year, function(data)
          {  
            //success data
            $('#tab-content').empty();
            $('#tab-content').append('<tr style="border: none;">  <th style="width: 80%">Content Title</th>  <th style="width: 10%">Page No</th>  <th style="width: 10%">Actions</th>  </tr>');
            $.each(data, function(index, TOCObj)
            {
                $('#tab-content').append('<tr style="padding: 1px; border: none;"> <th>  <input type="hidden" class="form-control frm" id="id'+ TOCObj.id +'" name="id'+ TOCObj.id +'" value="'+ TOCObj.id +'">  <input type="text" class="form-control frm title" id="title'+ index +'" name="title'+ index +'" value="'+ TOCObj.title +'"></th>  <th>   <input type="text" class="form-control frm" id="page_no'+ index +'" name="page_no'+ index +'" value="'+ TOCObj.page_no +'"> </th>  <th>   <button type="button" id="'+ index +'" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style=""> X</button> </th> </tr>');
            });            
          });

          //count
          $.get('{{url('getATableOfContentCount')}}?year=' + year, function(data)
          {  
            //success data
            $('#count').val(data);           
          });

          //first
          $.get('{{url('getATableOfContentFirst')}}?year=' + year, function(data)
          {  
            //success data
            $('#first').val(data.id); 
            if(data.id != null)   
            {

            }
            else
            {
                $('#tab-content').append('<tr style="padding: 1px; border: none;"> <th>  <input type="text" class="form-control frm title" id="title0" name="title0">  </th>  <th>  <input type="text" class="form-control frm" id="page_no0" name="page_no0">  </th> <th>   <button type="button" id="0" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style="">X</button>    </th> </tr>');
            }       
          });

          //last
          $.get('{{url('getATableOfContentLast')}}?year=' + year, function(data)
          {  
            //success data
            $('#last').val(data.id);           
          });
                        
        });

    });

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