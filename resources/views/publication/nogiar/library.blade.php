@extends('external.layouts.app')

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
        max-height: 100%;
        min-height: 100%;
        overflow: hidden;
        border-radius: 8px;
        max-width: 100%;
        min-width: 100%;
        margin: auto auto;
        padding: 5%;
    }
    .price_
    {
        color: #fff;
        top: 68%;
        position: relative;
        left: 0%;
        right: 2%;
        font-size: 15px;
        padding: 3px 10px;
        border-radius: 4px;
    }
    .name_
    {
        background-color: transparent;
        /*margin-top: 10% !important;*/
        position: relative;
        /*left: 5%;
        right: 2%;*/
        font-size: 13px;
        padding: 3px 0px;
    }


    .tool-container:hover #tool
    {
        display: inline-block !important;
    }






    /* Customize the label (the container) */
    .container 
    {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 22px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input 
    {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom radio button */
    .checkmark 
    {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
      border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark 
    {
      background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked ~ .checkmark 
    {
      background-color: #008B8B;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after 
    {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container input:checked ~ .checkmark:after 
    {
      display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after 
    {
      top: 9px;
      left: 9px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: white;
    }







    /*3-D IMAGING*/
    @import url(https://fonts.googleapis.com/css?family=Lato:300,400,900);
    @font-face 
    {
        font-family: 'codropsicons';
        src:url('../fonts/codropsicons/codropsicons.eot');
        src:url('../fonts/codropsicons/codropsicons.eot?#iefix') format('embedded-opentype'),
            url('../fonts/codropsicons/codropsicons.woff') format('woff'),
            url('../fonts/codropsicons/codropsicons.ttf') format('truetype'),
            url('../fonts/codropsicons/codropsicons.svg#codropsicons') format('svg');
        font-weight: normal;
        font-style: normal;
    }

    .clearfix:before,
    .clearfix:after {
        content: " ";
        display: table;
    }

    .clearfix:after {
        clear: both;
    }


    .row > header,
    .codrops-top {
        font-family: 'Lato', Arial, sans-serif;
    }

    .row > header {
        margin: 0 auto;
        padding: 2em;
        text-align: center;
        background: rgba(0,0,0,0.01);
    }

    .row > header h1 {
        font-size: 2.625em;
        line-height: 1.3;
        margin: 0;
        font-weight: 300;
    }

    .row > header span {
        display: block;
        font-size: 60%;
        opacity: 0.7;
        padding: 0 0 0.6em 0.1em;
    }

    /* To Navigation Style */
    .codrops-top {
        background: #fff;
        background: rgba(255, 255, 255, 0.6);
        text-transform: uppercase;
        width: 100%;
        font-size: 0.69em;
        line-height: 2.2;
    }

    .codrops-top a {
        text-decoration: none;
        padding: 0 1em;
        letter-spacing: 0.1em;
        color: #888;
        display: inline-block;
    }

    .codrops-top a:hover {
        background: rgba(255,255,255,0.95);
        color: #333;
    }

    .codrops-top span.right {
        float: right;
    }

    .codrops-top span.right a {
        float: left;
        display: block;
    }

    .codrops-icon:before {
        font-family: 'codropsicons';
        margin: 0 4px;
        speak: none;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
    }

    .codrops-icon-drop:before {
        content: "\e001";
    }

    .codrops-icon-prev:before {
        content: "\e004";
    }

    /* Demo Buttons Style */
    .codrops-demos {
        padding-top: 1em;
        font-size: 0.9em;
    }

    .codrops-demos a {
        text-decoration: none;
        outline: none;
        display: inline-block;
        margin: 0.5em;
        padding: 0.7em 1.1em;
        border: 3px solid #b1aea6;
        color: #b1aea6;
        font-weight: 700;
    }

    .codrops-demos a:hover,
    .codrops-demos a.current-demo,
    .codrops-demos a.current-demo:hover {
        border-color: #89867e;
        color: #89867e;
    }

    @media screen and (max-width: 25em) {

        .codrops-icon span {
            display: none;
        }

    }

    *, *:after, *:before { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }

    body 
    {
        /*background: #fbc73b;*/
        font-family: 'Lato', Arial, sans-serif;
        color: #fff;
        /*background-color: #fff!important;*/
    }

    .wrapper {
        margin: 0 auto 100px auto;
        max-width: 100%;
        min-width: 100%;
    }

    .stage {
        list-style: none;
        padding: 0;
    }

    /*************************************
    Build the scene and rotate on hover
    **************************************/

    .scene 
    {
        /*width: 250px;*/
        /*height: 350px;*/
        margin: 0px 2%;
        float: left;
        -webkit-perspective: 1000px;
        -moz-perspective: 1000px;
        perspective: 1000px;
        /*border: #ccc thin dotted;*/
        border-radius: 4px;
        padding: 0%;
    }
    .scene:hover
    {
        width: 200px;
        height: 300px;
        margin: 0px 2%;
        float: left;
        -webkit-perspective: 1000px;
        -moz-perspective: 1000px;
        perspective: 1000px;
        /*border: #B2BEB5 thin solid;*/
        border-radius: 4px;
        padding: 1%;
    }

    .movie 
    {
        width: 200px;
        height: 300px;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-transform: translateZ(-130px);
        -moz-transform: translateZ(-130px);
        transform: translateZ(-130px);
        -webkit-transition: -webkit-transform 350ms;
        -moz-transition: -moz-transform 350ms;
        transition: transform 350ms;
    }

    /*.movie:hover 
    {
        -webkit-transform: rotateY(-78deg) translateZ(20px);
        -moz-transform: rotateY(-78deg) translateZ(20px);
        transform: rotateY(-78deg) translateZ(20px);
    }*/

    /*************************************
    Transform and style the two planes
    **************************************/

    .movie .poster, 
    .movie .info {
        position: absolute;
        width: 200px;
        height: 300px;
        background-color: #fff;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .movie .poster  {
        -webkit-transform: translateZ(130px);
        -moz-transform: translateZ(130px);
        transform: translateZ(130px);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .movie .info {
        -webkit-transform: rotateY(90deg) translateZ(130px);
        -moz-transform: rotateY(90deg) translateZ(130px);
        transform: rotateY(90deg) translateZ(130px);
        border: 1px solid #B8B5B5;
        font-size: 0.75em;
    }

    /*************************************
    Shadow beneath the 3D object
    **************************************/

    .csstransforms3d .movie::after {
        content: '';
        width: 150px;
        height: 250px;
        position: absolute;
        bottom: 0;
        box-shadow: 0 30px 50px rgba(0,0,0,0.3);
        -webkit-transform-origin: 100% 100%;
        -moz-transform-origin: 100% 100%;
        transform-origin: 100% 100%;
        -webkit-transform: rotateX(90deg) translateY(130px);
        -moz-transform: rotateX(90deg) translateY(130px);
        transform: rotateX(90deg) translateY(130px);
        -webkit-transition: box-shadow 350ms;
        -moz-transition: box-shadow 350ms;
        transition: box-shadow 350ms;
    }

    .csstransforms3d .movie:hover::after {
        box-shadow: 20px -5px 50px rgba(0,0,0,0.3);
    }

    /*************************************
    Movie information
    **************************************/

    .info header {
        color: #FFF;
        padding: 7px 10px;
        font-weight: bold;
        height: 195px;
        background-size: contain;
        background-repeat: no-repeat;
        text-shadow: 0px 1px 1px rgba(0,0,0,1);
    }

    .info header h1 {
        margin: 0 0 2px;
        font-size: 1.4em;
    }

    .info header .rating {
        border: 1px solid #FFF;
        padding: 0px 3px;
    }

    .info p {
        padding: 1.2em 1.4em;
        margin: 2px 0 0;
        font-weight: 700;
        color: #666;
        line-height: 1.4em;
        /*border-top: 10px solid #555;*/
    }


    /*************************************
    Generate "lighting" using box shadows
    **************************************/

    .movie .poster,
    .movie .info,
    .movie .info header {
        -webkit-transition: box-shadow 350ms;
        -moz-transition: box-shadow 350ms;
        transition: box-shadow 350ms;
    }

    .csstransforms3d .movie .poster {
        box-shadow: inset 0px 0px 40px rgba(255,255,255,0);
    }

    .csstransforms3d .movie:hover .poster {
        box-shadow: inset 300px 0px 40px rgba(255,255,255,0.8);
    }

    .csstransforms3d .movie .info, 
    .csstransforms3d .movie .info header {
        box-shadow: inset -300px 0px 40px rgba(0,0,0,0.5);
    }

    .csstransforms3d .movie:hover .info, 
    .csstransforms3d .movie:hover .info header {
        box-shadow: inset 0px 0px 40px rgba(0,0,0,0);
    }

    /*************************************
    Posters and still images
    **************************************/

    .scene .movie .poster 
    {
      background-image: url({{URL::asset('assets/images/book.png')}});
      /*background-color: #dedfeb; */

    }

    /*.scene:nth-child(2) .poster {
      background-image: url(https://s3.amazonaws.com/ooomf-com-files/LGhxuAbT5Wop4JYcrMpV_IMG_3808.jpg);
    }

    .scene:nth-child(3) .poster {
      background-image: url(https://s3.amazonaws.com/ooomf-com-files/bXoAlw8gT66vBo1wcFoO_IMG_9181.jpg);
    }

    .scene:nth-child(4) .poster {
      background-image: url(https://s3.amazonaws.com/ooomf-com-files/bXoAlw8gT66vBo1wcFoO_IMG_9181.jpg);
    }

    .scene:nth-child(5) .poster {
      background-image: url(https://s3.amazonaws.com/ooomf-com-files/bXoAlw8gT66vBo1wcFoO_IMG_9181.jpg);
    }

    .scene:nth-child(1) .info header {
        background-image: url(https://s3.amazonaws.com/ooomf-com-files/2MwGKhLETRSQoHP9UWE4_IMG_1348-3.jpg);
    }

    .scene:nth-child(2) .info header {
        background-image: url(https://s3.amazonaws.com/ooomf-com-files/yEWFnFQRqfmY9l9efJ6g_Snap01-web.jpg);
    }

    .scene:nth-child(3) .info header {
        background-image: url(https://s3.amazonaws.com/ooomf-com-files/5k0CgVoIS2SUJGNZKYos__DSC2198.jpg);
    }

    .scene:nth-child(4) .info header {
        background-image: url(https://s3.amazonaws.com/ooomf-com-files/5k0CgVoIS2SUJGNZKYos__DSC2198.jpg);
    }

    .scene:nth-child(5) .info header {
        background-image: url(https://s3.amazonaws.com/ooomf-com-files/5k0CgVoIS2SUJGNZKYos__DSC2198.jpg);
    }*/

    /*************************************
    Fallback
    **************************************/
    .no-csstransforms3d .movie .poster, 
    .no-csstransforms3d .movie .info 
    {
        position: relative;
    }

    /*************************************
    Media Queries
    **************************************/
    @media screen and (max-width: 60.75em)
    {
        .scene 
        {
            float: none;
            margin: 20px auto 60px;
        }
    }


    /*66vh*/





</style>




<div class="card m-b-30" style="">
    <div class="row card-body" style="padding: 0px">
        <div class="col-xl-9 col-md-6" style="border: thin dotted #e1e1e1">
                <!-- Top Navigation -->
            {{-- <header>
                <h1>{!!  $publication->nogiar_id !!}</h1>  
            </header> --}}            
            <div class="wrapper" style="padding: 1%!important">

                <ul class="stage clearfix" id="shelve">

                    @forelse($publications as $publication)
                        <li class="scene" style="margin: 2% 1.1%!important">
                            <div class="movie" onclick="return true">
                                <div class="poster" id="{{$publication->nogiar_id}}">
                                    
                                    {{-- <img style="width: 75px;position: relative;left: 60px;top: 60px;" src="{{ URL::asset('assets/images/coa.png') }}" /> --}}

                                    <div data-tool id="prev{{$publication->nogiar_id}}" class="tool" 
                                        style="position: absolute; top: 35%; left: 35%; display: none">
                                        {{-- <a href="#" id="{{$publication->id}}" class="btn btn-sm pub_id" style="background: #008B8B; color: #fff" title="Preview {{$publication->year}} Publication" data-toggle="modal" data-target="#preview-publication">
                                            Preview
                                        </a>  --}} 

                                        @if($publication->price > 0)  
                                            <div class="price_">                                         
                                                <button type="button" class="btn btn-danger btn-sm pull-left" 
                                                style="width: 100%; margin-left: -60%;"> &#8358; {{$publication->price}} </button> 

                                                <a href="{{ route('add-to-cart-view', $publication->id) }}" id="{{$publication->id}}" 
                                                    class="btn btn-warning btn-sm pub_id pull-right" style="color: #fff; margin-right: 0%" title="Add {{$publication->year}} Publication To Cart" target="_blank">
                                                    Buy
                                                </a>
                                            </div>
                                        @else
         
                                            <div class="price_"> 
                                                <button type="button" class="btn btn-danger btn-sm pull-left" 
                                                style="width: 100%; margin-left: -60%;"> Free </button>

                                                <a href="{{ route('add-to-cart-view', $publication->id) }}" id="{{$publication->id}}" 
                                                    class="btn btn-warning btn-sm pub_id pull-right" style="color: #fff; margin-right: 0%" title="Add {{$publication->year}} Publication To Cart" target="_blank">
                                                    Buy
                                                </a>
                                            </div>
                                        @endif

                                        <button type="button" class="btn btn-sm pull-left name_" 
                                            style="width: 100%; margin: 10% auto 1% -41% !important; color: #E52B50"> {{$publication->nogiar_id}} 
                                        </button>      
                                    </div> 
                                    {{-- <div class="name_">
                                       {{$publication->nogiar_id}}
                                    </div>  --}}


                                </div>
                                {{-- <div class="info">
                                    <p class="book book-leaf" style="background-image: url({{URL::asset('assets/images/leaves.jpg')}});background-size: cover; height: 100%;">
                                        <img src="?9090" alt="user-img" class="img-fluid" />
                                        
                                        {!!  $publication->nogiar_id !!}
                                    </p>
                                </div> --}}
      
                            </div>
                        </li>
                    @empty
                        No Publication In Shelve Yet !
                    @endforelse

                    {{$publications->render() }}

                </ul>
            </div><!-- /wrapper -->
        </div>


        <div class="col-xl-3 col-md-6" style="border: thin dotted #e1e1e1"> 
            <div class="col-md-12">  
                <form method="get" action="{{ route('content.search') }}">
                    <input type="text" class="form-control" name="year" id="year" placeholder="Search by year" readonly 
                    style="margin: 15px 0px">
                </form>
            </div>

            <div class="col-md-12">  
                <div class="col-xl-8 col-md-6 pull-left" style="padding: 0px">  
                    <form method="get" action="{{ route('content.search') }}">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Search by All Fields" 
                        style="">
                    </form>
                </div>

                <div class="col-xl-4 col-md-6 pull-right" style="padding: 0px">  
                    <button type="button" class="btn btn-sm btn-info pull-right" id="filter"> <i class="fa fa-search"></i> Filter</button>
                </div>
            </div>

            <div class="col-md-12">  
                <form method="get" action="{{ route('content.search') }}">
                    <div class="col-xl-3 col-md-6 pull-left" style="padding:15px 0px; color: #999">  
                        <h4 style="margin-top: 5px" id=""> Sort By </h4>
                    </div>

                    <div class="col-xl-4 col-md-6 pull-left" style="padding:15px 0px">  
                        <label class="container pull-right" style="color: #999"> <h4 style="margin-top: 5px"> Free </h4>
                          <input type="radio" class="is_free" name="is_free" id="is_free_0" value="0">
                          <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="col-xl-4 col-md-6 pull-left" style="padding:15px 0px">  
                        <label class="container pull-right" style="color: #999"> <h4 style="margin-top: 5px"> Paid </h4>
                          <input type="radio" class="is_free" name="is_free" id="is_free_1" value="1">
                          <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="col-xl-1 col-md-6 pull-right" style="padding:15px 0px">  
                        <button type="button" class="btn btn-sm btn-warning pull-right btn-round" id="clear" title="Clear Sort"> <i class="fa fa-remove"></i></button>
                    </div>
                    
                </form>
            </div>            
        </div>
    </div>
</div>

  








@endsection

@section('script')

<!-- AJAX TO POPULATE CONTENT-->
<script>

    (function($)
    {
        $(function()
        {
            $('.poster').mouseover(function() 
            { 
                var id = $(this).attr('id');
                $('#prev'+id+'').show();
                $('#add'+id+'').show();
            });
            $('.poster').mouseout(function() 
            { 
                var id = $(this).attr('id');
                $('#prev'+id+'').hide();
                $('#add'+id+'').hide();
            });
        });
    })(jQuery);  


//search
(function($)
{
    $(function()
    {
        // Search By Year
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
                    handleToolHovers();
                    wrapEvent();            
                }
            });
        });

        // FILTER
        $(document).on('click', "#filter", function() 
        { 
            var price = $('#search').val(); 
            $('#shelve').empty();

            $.ajax({
                url:'{{url('publication')}}/nogiar/load-content?price=' + price,
                type:'GET',
                success:function(response)
                {
                    $('#shelve').html(response);
                    handleToolHovers();
                    wrapEvent();            
                }
            });
        });

        // SORT
        $(document).on('change', ".is_free", function() 
        { 
            var id = $(this).attr('id');
            var is_free = $('#'+id).val(); 
            $('#shelve').empty();

            $.ajax({
                url:'{{url('publication')}}/nogiar/load-content?is_free=' + is_free,
                type:'GET',
                success:function(response)
                {
                    $('#shelve').html(response);
                    handleToolHovers();
                    wrapEvent();            
                }
            });
        });


        function handleToolHovers(){
          $('.poster').each(function(){
            $(this).on('mouseover',function(){
                var $el = $(this).find('[data-tool]');
                $el.show();
                // alert(1);
            });
            $(this).on('mouseout',function(){
                var $el = $(this).find('[data-tool]');
                $el.hide();                
                // alert(2);

            });
          });
        }


        $(document).on('click', "#clear", function() 
        { 
            $('#shelve').empty();
            $('.is_free').prop('checked', false);

            $.ajax({
                url:'{{url('publication')}}/nogiar/load-content?is_free=' + 2,
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

       handleToolHovers();

    });
})(jQuery); 



    function getId(id)
    {
        $('#ID').val(id);   
    }



    $('#year').datepicker(
    {
      autoclose: true,startView: 'decade',format: "yyyy",
      viewMode: "years", 
      minViewMode: "years"
    })
        
</script>



    @if(Session::has('info'))
        <script">
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