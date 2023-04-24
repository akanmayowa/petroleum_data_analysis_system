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

    .tab-nav-link
    {
        background-color: #008B8B; 
        color: #ffffff;
    }

    .marg
    { 
      margin-right: -25px !important;
    }

    .init:hovel
    {
        color: #fff;
    }


    .list-comment
    {
        border: thin dotted #eee;
        background: #eee;
        font-size: 14px;
        padding: 5px 15px;
    }

    .user
    {
        text-align: right;
        padding: 10px 0px;
        /*color: #ccc;*/
    }
</style>

<div class="row" style="">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body"> 

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Publication Comments </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->


                <ul class="nav nav-pills" role="tablist">                  
                    <li class="nav-item nav-pad">
                        <a class="nav-link init" data-toggle="tab" href="#art" style="cursor: pointer;"> ARTICLES Comment</a>
                    </li>    

                    <li class="nav-item nav-pad">
                        <a class="nav-link init" data-toggle="tab" href="#ups" style="cursor: pointer;"> UPSTREAM Comment</a>
                    </li>       

                    <li class="nav-item nav-pad">
                        <a class="nav-link" data-toggle="tab" id="dir" href="#mid" role="tab"> MIDSTREAM Comment</a>
                    </li> 

                    <li class="nav-item nav-pad">
                        <a class="nav-link" data-toggle="tab" id="reg" href="#dow"e="tab"> DOWNSTREAM Comment</a>
                    </li>

                    <li class="nav-item nav-pad">
                        <a class="nav-link" data-toggle="tab" id="mod" href="#hse"e="tab"> HSE Comment</a>
                    </li> 

                    <li class="nav-item nav-pad">
                        <a class="nav-link" data-toggle="tab" id="glo" href="#rev"e="tab"> REVENUE Comment</a>
                    </li>
                </ul>




                    <div class="col-lg-9 col-md-9 col-sm-7 pull left" style="border-left: thin solid #ddd;">
                        <!-- Tab panes -->
                        <div class="tab-content">          

                            <div class="tab-pane p-3" id="art" role="tabpanel">
                                <p class="font-14 mb-0">  <h5> Notes and Comment for ARTICLES </h5>
                                    @forelse($comments as $comment)
                                        @if($comment->division == 'ARTICLES') 
                                            Year {{$comment->year}} 
                                            <div class="list-comment"> {{$comment->comment}} </div>
                                            <div class="user">
                                                {{date_format($comment->created_at, 'D, j - M, Y')}} : By {{$comment->user->name}} 
                                            </div>
                                        @endif
                                    @empty
                                    @endforelse
                                </p>
                            </div>     

                            <div class="tab-pane p-3" id="ups" role="tabpanel">
                                <p class="font-14 mb-0">  <h5> Notes and Comment for UPSTREAM </h5>
                                    @forelse($comments as $comment)
                                        @if($comment->division == 'UPSTREAM') Year {{$comment->year}} 
                                            <div class="list-comment"> {{$comment->comment}} </div>
                                            <div class="user">
                                                {{date_format($comment->created_at, 'D, j - M, Y')}} : By {{$comment->user->name}} 
                                            </div>
                                        @endif
                                    @empty
                                    @endforelse
                                </p>
                            </div>                   
                              
                            <div class="tab-pane p-3" id="mid" role="tabpanel">
                                <p class="font-14 mb-0">  <h5> Notes and Comment for MIDSTREAM </h5>
                                    @forelse($comments as $comment)
                                        @if($comment->division == 'MIDSTREAM') Year {{$comment->year}} 
                                            <div class="list-comment"> {{$comment->comment}} </div>
                                            <div class="user">
                                                {{date_format($comment->created_at, 'D, j - M, Y')}} : By {{$comment->user->name}} 
                                            </div>
                                        @endif
                                    @empty
                                    @endforelse
                                </p>
                            </div>                
                              
                            <div class="tab-pane p-3" id="dow" role="tabpanel">
                                <p class="font-14 mb-0">  <h5> Notes and Comment for DOWNSTREAM </h5>
                                    @forelse($comments as $comment)
                                        @if($comment->division == 'DOWNSTREAM') Year {{$comment->year}} 
                                            <div class="list-comment"> {{$comment->comment}} </div>
                                            <div class="user">
                                                {{date_format($comment->created_at, 'D, j - M, Y')}} : By {{$comment->user->name}} 
                                            </div>
                                        @endif
                                    @empty
                                    @endforelse
                                </p>
                            </div>                
                              
                            <div class="tab-pane p-3" id="hse" role="tabpanel">
                                <p class="font-14 mb-0">  <h5> Notes and Comment for HSE </h5>
                                    @forelse($comments as $comment)
                                        @if($comment->division == 'HSE') Year {{$comment->year}} 
                                            <div class="list-comment"> {{$comment->comment}} </div>
                                            <div class="user">
                                                {{date_format($comment->created_at, 'D, j - M, Y')}} : By {{$comment->user->name}} 
                                            </div>
                                        @endif
                                    @empty
                                    @endforelse
                                </p>
                            </div>                
                              
                            <div class="tab-pane p-3" id="rev" role="tabpanel">
                                <p class="font-14 mb-0">  <h5> Notes and Comment for REVENUE </h5>
                                    @forelse($comments as $comment)
                                        @if($comment->division == 'REVENUE') Year {{$comment->year}} 
                                            <div class="list-comment"> {{$comment->comment}} </div>
                                            <div class="user">
                                                {{date_format($comment->created_at, 'D, j - M, Y')}} : By {{$comment->user->name}} 
                                            </div>
                                        @endif
                                    @empty
                                    @endforelse
                                </p>
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