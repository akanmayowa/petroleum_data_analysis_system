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
</style>

<div class="row" style="">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body"> 

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Publication Section </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->


                        <ul class="nav nav-pills" role="tablist">                     
                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" id="dir" href="#director" role="tab"> Directors Remarks</a>
                            </li>   

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" id="reg" href="#regulatory" role="tab"> NOGIAR Article I</a>
                            </li> 

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" id="mod" href="#modular" role="tab"> NOGIAR Article II </a>
                            </li> 

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" id="glo" href="#glossary" role="tab"> Glossary</a>
                            </li>

                            {{-- <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" id="lot" href="#lot" role="tab"> List of Table</a>
                            </li>

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" id="fot" href="#lof" role="tab"> List of Figure</a>
                            </li> --}}

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" id="cot" href="#toc" role="tab"> Table of Content</a>
                            </li>
                        </ul>
                  



                        <!-- Tab panes -->
                        <div class="tab-content">                   

                            <div class="tab-pane p-3" id="director" role="tabpanel">
                                <h3 style="color: #bbb; text-align: center;">
                                    Sorry, Directors' Remark Section is currently been modified by another user, please try later
                                </h3>
                            </div>               

                            <div class="tab-pane p-3" id="regulatory" role="tabpanel">
                                <h3 style="color: #bbb; text-align: center;">
                                    Sorry, NOGIAR Article I Section is currently been modified by another user, please try later
                                </h3>
                            </div>               

                            <div class="tab-pane p-3" id="modular" role="tabpanel">
                                <h3 style="color: #bbb; text-align: center;">
                                    Sorry, NOGIAR Article II Section is currently been modified by another user, please try later
                                </h3>
                            </div>               

                            <div class="tab-pane p-3" id="glossary" role="tabpanel">
                                <h3 style="color: #bbb; text-align: center;">
                                    Sorry, Glossary Section is currently been modified by another user, please try later
                                </h3>
                            </div>               

                            <div class="tab-pane p-3" id="toc" role="tabpanel">
                                <h3 style="color: #bbb; text-align: center;">
                                    Sorry, Table of Content Section is currently been modified by another user, please try later
                                </h3>
                            </div>
                            
                        </div>
                 
               

                <!-- Nav tabs -->
                
           

           




          
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->









@endsection



@section('script')



 

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









