@extends('layouts.app_statistics')

@section('content')







<div class="row">
    <div class="col-lg-8">
        <div class="card m-b-20">
            <div class="card-body">  

                <h4 class="mt-0 header-title"> @if($sec_one) {{$sec_one->header}} @endif</h4>
                <p class="text-muted m-b-30 font-14"> @if($sec_one) {{$sec_one->title. ' ' .$sec_one->year}} @endif </p> 
                
                <p class=" text-muted">
                    1   @if($sec_one) {{$sec_one->sub_title}} @endif

                        @if($sec_one) {{$sec_one->content_1}} @endif
                    <br>  <br>

                        @if($sec_one) {{$sec_one->content_2}} @endif

                    <br> <br>
                    
                        @if($sec_one) {{$sec_one->content_3}} @endif

                    <br> <br>

                        @if($sec_one) {{$sec_one->content_4}} @endif

                    <br> <br>

                        @if($sec_one) {{$sec_one->content_5}} @endif

                    <br> <br>
                    
                        @if($sec_one) {{$sec_one->content_6}} @endif

                    <br> <br>

                    <b> @if($sec_one) {{$sec_one->content_10}} @endif </b>

                </p>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="card m-b-20">
            <div class="card-body">

                <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <h5 class="mb-0 mt-0 font-16">
                                <a data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseOne" aria-expanded="true"
                                   aria-controls="collapseOne" class="text-dark"> Upstream
                                </a>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="card-body text-muted">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life
                                accusamus terry richardson ad squid. 3 wolf moon officia
                                aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                sunt aliqua put a bird on it squid single-origin coffee
                                nulla assumenda shoreditch et. Nihil anim keffiyeh
                                helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic synth nesciunt you probably haven't heard of them
                                accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingTwo">
                            <h5 class="mb-0 mt-0 font-16">
                                <a class="collapsed text-dark" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseTwo"
                                   aria-expanded="false" aria-controls="collapseTwo">  Downstream
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" role="tabpanel"
                             aria-labelledby="headingTwo">
                            <div class="card-body text-muted">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life
                                accusamus terry richardson ad squid. 3 wolf moon officia
                                aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                sunt aliqua put a bird on it squid single-origin coffee
                                nulla assumenda shoreditch et. Nihil anim keffiyeh
                                helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic synth nesciunt you probably haven't heard of them
                                accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingThree">
                            <h5 class="mb-0 mt-0 font-16">
                                <a class="collapsed text-dark" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseThree"
                                   aria-expanded="false" aria-controls="collapseThree">
                                    Midstream
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" role="tabpanel"
                             aria-labelledby="headingThree">
                            <div class="card-body text-muted">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life
                                accusamus terry richardson ad squid. 3 wolf moon officia
                                aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                sunt aliqua put a bird on it squid single-origin coffee
                                nulla assumenda shoreditch et. Nihil anim keffiyeh
                                helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic synth nesciunt you probably haven't heard of them
                                accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingFour">
                            <h5 class="mb-0 mt-0 font-16">
                                <a class="collapsed text-dark" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseFour"
                                   aria-expanded="false" aria-controls="collapseFour">  SHE - Safety Healty and Environment
                                </a>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" role="tabpanel"
                             aria-labelledby="headingFour">
                            <div class="card-body text-muted">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life
                                accusamus terry richardson ad squid. 3 wolf moon officia
                                aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                sunt aliqua put a bird on it squid single-origin coffee
                                nulla assumenda shoreditch et. Nihil anim keffiyeh
                                helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic synth nesciunt you probably haven't heard of them
                                accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingFive">
                            <h5 class="mb-0 mt-0 font-16">
                                <a class="collapsed text-dark" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseFive"
                                   aria-expanded="false" aria-controls="collapseFive">
                                    Ministerial Performance
                                </a>
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" role="tabpanel"
                             aria-labelledby="headingFive">
                            <div class="card-body text-muted">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life
                                accusamus terry richardson ad squid. 3 wolf moon officia
                                aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                sunt aliqua put a bird on it squid single-origin coffee
                                nulla assumenda shoreditch et. Nihil anim keffiyeh
                                helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic synth nesciunt you probably haven't heard of them
                                accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingSix">
                            <h5 class="mb-0 mt-0 font-16">
                                <a class="collapsed text-dark" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseSix"
                                   aria-expanded="false" aria-controls="collapseSix">
                                    Concession
                                </a>
                            </h5>
                        </div>
                        <div id="collapseSix" class="collapse" role="tabpanel"
                             aria-labelledby="headingSix">
                            <div class="card-body text-muted">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life
                                accusamus terry richardson ad squid. 3 wolf moon officia
                                aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                sunt aliqua put a bird on it squid single-origin coffee
                                nulla assumenda shoreditch et. Nihil anim keffiyeh
                                helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic synth nesciunt you probably haven't heard of them
                                accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingSeven">
                            <h5 class="mb-0 mt-0 font-16">
                                <a class="collapsed text-dark" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseSeven"
                                   aria-expanded="false" aria-controls="collapseSeven">  Economics
                                </a>
                            </h5>
                        </div>
                        <div id="collapseSeven" class="collapse" role="tabpanel"
                             aria-labelledby="headingSeven">
                            <div class="card-body text-muted">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life
                                accusamus terry richardson ad squid. 3 wolf moon officia
                                aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                sunt aliqua put a bird on it squid single-origin coffee
                                nulla assumenda shoreditch et. Nihil anim keffiyeh
                                helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic synth nesciunt you probably haven't heard of them
                                accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->






<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <section id="cd-timeline" class="cd-container">
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-success">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content"> 
                                    <h3> @if($sec_two) {{$sec_two->header}} @endif </h3> @if($sec_two) <?php $pic_1 = $sec_two->picture_1; ?> @endif 
                                    <p> 
                                        <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="110%" alt="{{$pic_1}}"> 
                                    </p>
                                    <span class="cd-date"> @if($sec_two) {{$sec_two->year}} @endif

                                        <p class="mb-0 text-muted font-14">
                                            @if($sec_two) {{$sec_two->sub_title}} @endif
                                            <ul style="list-style-type: upper-roman;">
                                                <li> @if($sec_two) {{$sec_two->content_1}} @endif</li>
                                                <li> @if($sec_two) {{$sec_two->content_2}} @endif</li>
                                                <li> @if($sec_two) {{$sec_two->content_3}} @endif</li>
                                                <li> @if($sec_two) {{$sec_two->content_4}} @endif</li>
                                                <li> @if($sec_two) {{$sec_two->content_5}} @endif</li>
                                                <li> @if($sec_two) {{$sec_two->content_6}} @endif</li>
                                            </ul>
                                        </p> 
                                    </span>

                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">                              

                                <div class="cd-timeline-content">
                                    <h3> @if($sec_thr) {{$sec_thr->header}} @endif </h3>
                                    <p class="m-b-20 text-muted font-14">
                                        @if($sec_thr) {{$sec_thr->content_1}} @endif
                                    </p>
                                    <p class="m-b-20 text-muted font-14">
                                        @if($sec_thr) {{$sec_thr->content_2}} @endif
                                    </p>

                                    <span class="cd-date"> @if($sec_thr) {{$sec_thr->year}} @endif </span>
                                </div> <!-- cd-timeline-content -->

                                <div class="cd-timeline-img cd-danger">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-info">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    
                                    <span class="cd-date"> @if($sec_fou) {{$sec_fou->year}} @endif </span>

                                    <h3> @if($sec_fou) {{$sec_fou->header}} @endif </h3>
                                    <p class="mb-0 text-muted font-14">
                                        @if($sec_fou) {{$sec_fou->content_1}} @endif
                                    </p>
                                    <p class="mb-0 text-muted font-14">
                                       @if($sec_fou) {{$sec_fou->content_2}} @endif
                                        <ul style="list-style-type: circle;" class=" text-muted">
                                            <li> @if($sec_fou) {{$sec_fou->content_3}} @endif</li>
                                            <li> @if($sec_fou) {{$sec_fou->content_4}} @endif</li>
                                            <li> @if($sec_fou) {{$sec_fou->content_5}} @endif </li>
                                        </ul>
                                        <span class=" text-muted"> @if($sec_fou) {{$sec_fou->content_6}} @endif </span>
                                    </p>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-pink">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3> @if($sec_fiv) {{$sec_fiv->header}} @endif </h3>
                                    <p class="m-b-20 text-muted font-14">
                                       @if($sec_fiv) {{$sec_fiv->content_1}} @endif
                                    </p>
                                    <h3> @if($sec_fiv) {{$sec_fiv->content_2}} @endif </h3>
                                    <p class="m-b-20 text-muted font-14">
                                        <ul style="list-style-type: square;" class="text-muted">
                                            <li>@if($sec_fiv) {{$sec_fiv->content_3}} @endif</li>
                                            <li>@if($sec_fiv) {{$sec_fiv->content_4}} @endif</li>
                                            <li>@if($sec_fiv) {{$sec_fiv->content_5}} @endif</li>
                                        </ul>
                                    </p>
                                    <img src="assets/images/small/img-1.jpg" alt="" class="rounded" style="width: 120px;">
                                    <img src="assets/images/small/img-2.jpg" alt="" class="rounded" style="width: 120px;">
                                    <span class="cd-date">@if($sec_fiv) {{$sec_fiv->year}} @endif</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-warning">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3>@if($sec_six) {{$sec_six->header}} @endif</h3>
                                    <p class="mb-0 text-muted font-14">
                                        @if($sec_six) {{$sec_six->content_1}} @endif
                                    </p>

                                    <h3>@if($sec_six) {{$sec_six->content_2}} @endif </h3>
                                    <p class="mb-0 text-muted font-14">
                                        @if($sec_six) {{$sec_six->content_3}} @endif                                 
                                    </p>
                                    <span class="cd-date">@if($sec_six) {{$sec_six->year}} @endif</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-primary">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3> @if($sec_sev) {{$sec_sev->header}} @endif</h3>                                   
                                    <h4> @if($sec_sev) {{$sec_sev->title}} @endif </h4>

                                    <p class="mb-0 text-muted font-14">
                                        @if($sec_sev) {{$sec_sev->content_1}} @endif
                                        <ul style="list-style: square;" class=" text-muted">
                                            <li>@if($sec_sev) {{$sec_sev->content_2}} @endif</li>
                                            <li>@if($sec_sev) {{$sec_sev->content_3}} @endif</li>
                                            <li>@if($sec_sev) {{$sec_sev->content_4}} @endif</li>
                                            <li>@if($sec_sev) {{$sec_sev->content_5}} @endif</li>
                                            <li>@if($sec_sev) {{$sec_sev->content_6}} @endif</li>
                                            <li>@if($sec_sev) {{$sec_sev->content_7}} @endif</li>
                                        </ul>

                                        <span class=" text-muted"> @if($sec_sev) {{$sec_sev->content_8}} @endif </span>

                                    </p>
                                    <span class="cd-date">@if($sec_sev) {{$sec_sev->year}} @endif</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->





                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-warning">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3>  </h3>
                                    <p class="mb-0 text-muted font-14">             @if($sec_eig) <?php $pic_1 = $sec_eig->picture_1; ?> @endif 
                                        <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="110%" alt="{{$pic_1}}">
                                    </p>
                                    <span class="cd-date">@if($sec_eig) {{$sec_eig->year}} @endif</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-primary">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3> @if($sec_nin) {{$sec_nin->header}} @endif </h3>    

                                    <p class="mb-0 text-muted font-14">        
                                        @if($sec_nin) {{$sec_nin->content_1}} @endif

                                        @if($sec_nin) <?php $pic_1 = $sec_nin->picture_1; ?> @endif 
                                        <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="110%" alt="{{$pic_1}}">
                                    </p>
                                    <span class="cd-date">@if($sec_nin) {{$sec_nin->year}} @endif</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->





                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-warning">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3> @if($sec_ten) {{$sec_ten->header}} @endif </h3>
                                    <p class="mb-0 text-muted font-14">
                                        1.  <b style="color:#202020"> 
                                            @if($sec_ten) {{$sec_ten->content_1}} @endif </b> 
                                            @if($sec_ten) {{$sec_ten->content_2}} @endif
                                    </p>
                                    <p class="mb-0 text-muted font-14">
                                        2.  <b style="color:#202020"> 
                                            @if($sec_ten) {{$sec_ten->content_3}} @endif </b> 
                                            @if($sec_ten) {{$sec_ten->content_4}} @endif

                                        <ul style="list-style: square;" class=" text-muted">
                                            <li>@if($sec_ten) {{$sec_ten->content_5}} @endif</li>
                                            <li>@if($sec_ten) {{$sec_ten->content_6}} @endif</li>
                                            <li>@if($sec_ten) {{$sec_ten->content_7}} @endif</li>
                                            <li>@if($sec_ten) {{$sec_ten->content_8}} @endif</li>
                                            <li>@if($sec_ten) {{$sec_ten->content_9}} @endif</li>
                                            <li>@if($sec_ten) {{$sec_ten->content_10}} @endif</li>
                                        </ul>
                                    </p>
                                    <span class="cd-date">@if($sec_ten) {{$sec_ten->year}} @endif</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-primary">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <p class="mb-0 text-muted font-14">
                                        3.  <b style="color:#202020"> 
                                            @if($sec_ele) {{$sec_ele->content_1}} @endif </b> 
                                            @if($sec_ele) {{$sec_ele->content_2}} @endif  
                                    </p>
                                    <p class="mb-0 text-muted font-14">
                                        4.  <b style="color:#202020"> 
                                            @if($sec_ele) {{$sec_ele->content_3}} @endif  </b> 
                                            @if($sec_ele) {{$sec_ele->content_4}} @endif  
                                    </p>  
                                    <span class="cd-date">@if($sec_ele) {{$sec_ele->year}} @endif </span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->





                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-warning">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content"> 

                                    <p class="mb-0 text-muted font-14">
                                        <ul style="list-style: square;" class=" text-muted">
                                            <li>@if($sec_twe) {{$sec_twe->content_1}} @endif </li>
                                            <li>@if($sec_twe) {{$sec_twe->content_2}} @endif </li>
                                            <li>@if($sec_twe) {{$sec_twe->content_3}} @endif</li>
                                            <li>@if($sec_twe) {{$sec_twe->content_4}} @endif </li>
                                            <li>@if($sec_twe) {{$sec_twe->content_5}} @endif</li>
                                            <li>@if($sec_twe) {{$sec_twe->content_6}} @endif </li>
                                            <li>@if($sec_twe) {{$sec_twe->content_7}} @endif </li>
                                            <li>@if($sec_twe) {{$sec_twe->content_8}} @endif</li>
                                            <li>@if($sec_twe) {{$sec_twe->content_9}} @endif </li>
                                        </ul>
                                    </p>    
                                    <span class="cd-date">@if($sec_twe) {{$sec_twe->year}} @endif</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-primary">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <p class="mb-0 font-14">
                                        5.  <b style="color:#202020" class=""> 
                                            @if($sec_thi) {{$sec_thi->content_1}} @endif </b> 
                                            <span class=" text-muted"> @if($sec_thi) {{$sec_thi->content_2}} @endif </span>

                                        <ul style="list-style: square;" class=" text-muted">
                                            <li>@if($sec_thi) {{$sec_thi->content_3}} @endif</li>
                                            <li>@if($sec_thi) {{$sec_thi->content_4}} @endif</li>
                                            <li>@if($sec_thi) {{$sec_thi->content_5}} @endif</li>
                                            <li>@if($sec_thi) {{$sec_thi->content_6}} @endif</li>
                                        </ul> 
                                    </p>
                                    <span class="cd-date">@if($sec_thi) {{$sec_thi->year}} @endif</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->











                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-warning">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content"> 

                                    <p class="mb-0 text-muted font-14">
                                        6.  <b style="color:#202020"> 
                                            @if($sec_fot) {{$sec_fot->content_1}} @endif </b> 
                                            @if($sec_fot) {{$sec_fot->content_2}} @endif
                                    </p>

                                    <p class="mb-0 text-muted font-14">
                                        @if($sec_fot) {{$sec_fot->content_3}} @endif
                                    </p>
                                    <span class="cd-date"> @if($sec_fot) {{$sec_fot->year}} @endif </span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-primary">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <p class="mb-0 text-muted font-14">
                                       <i style="">
                                        <ul style="list-style-type:decimal-leading-zero; font-size: 9px;">
                                            <li>@if($sec_fit) {{$sec_fit->content_1}} @endif</li>
                                            <li>@if($sec_fit) {{$sec_fit->content_2}} @endif
                                            </li>
                                            <li>@if($sec_fit) {{$sec_fit->content_3}} @endif
                                            </li>
                                            <li>@if($sec_fit) {{$sec_fit->content_4}} @endif 
                                                <a href="@if($sec_fit) {{$sec_fit->content_5}} @endif"> @if($sec_fit) {{$sec_fit->content_5}} @endif </a>
                                            </li>
                                            <li>@if($sec_fit) {{$sec_fit->content_6}} @endif</li>
                                            <li>@if($sec_fit) {{$sec_fit->content_7}} @endif
                                            </li>
                                            <li>@if($sec_fit) {{$sec_fit->content_8}} @endif </li>
                                        </ul>
                                        </i>
                                    </p>
                                    <span class="cd-date">@if($sec_fit) {{$sec_fit->content_10}} @endif</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->







                            <div class="cd-timeline-block" style="">
                                <div class="cd-timeline-img cd-warning">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content"> 

                                    <p class="mb-0 text-muted font-14">
                                    </p>
                                    <p class="mb-0 text-muted font-14">
                                    </p>
                                    <span class="cd-date">Jun 18</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-primary">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    

                                        
                                    </p>
                                    <span class="cd-date">Jun 30</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->


                            



                        </section> <!-- cd-timeline -->

                    </div>
                </div><!-- Row -->


                <div class="row">
                    <div class="col-md-12">

                        <div class="table-responsive" style="border: thin solid #e1e1e1; border-radius: 5px">   
                            <h5 style="margin-left: 5px; color: #aaa"> <i class="mdi mdi-adjust" style="color: blue"></i> Status Of Oil Prospective License </h5> 
                                <table class="table table-condence mb-0">
                                    <thead>
                                    <tr style="">
                                        <th>s/n</th>
                                        <th>Company</th>
                                        <th>Concession</th>
                                        <th>Equity Distribution</th>
                                        <th>Contract Type</th>
                                        <th>Award Year</th>
                                        <th>License Expires On</th>
                                        <th>Area</th>
                                        <th>Geological Terrain</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                        @if($bala_opl)
                                            @foreach($bala_opl as $bala_opl)
                                                <tr>
                                                    <th>{{$bala_opl->id}}</th>
                                                    <th>@if($bala_opl->company) {{$bala_opl->company->company_name}} @endif</th>    
                                                    <th>@if($bala_opl->concession) {{$bala_opl->concession->concession_name}} @endif</th> 
                                                    <th>{{$bala_opl->equity_distribution}}</th> 
                                                    <th>@if($bala_opl->contract) {{$bala_opl->contract->contract_name}} @endif</th> 
                                                    <th>{{$bala_opl->year_of_award}}</th> 
                                                    <th>{{$bala_opl->license_expire_date}}</th> 
                                                    <th>{{$bala_opl->area}}</th> 
                                                    <th>@if($bala_opl->terrain) {{$bala_opl->terrain->terrain_name}} @endif</th>     
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                        </div> <!-- end col -->

                    </div>
                </div>
                <br> <br>  <br>
                <div class="row">
                    <div class="col-md-12">

                        <div class="table-responsive" style="border: thin solid #e1e1e1; border-radius: 5px">   
                            <h5 style="margin-left: 5px; color: #aaa"> <i class="mdi mdi-adjust" style="color: blue"></i> Status Of Oil Mining Lease </h5> 
                                <table class="table table-condence mb-0">
                                    <thead>
                                    <tr style="">
                                        <th>s/n</th>
                                        <th>Company</th>
                                        <th>Concession</th>
                                        <th>Equity Distribution</th>
                                        <th>Contract Type</th>
                                        <th>Award Year</th>
                                        <th>License Expires On</th>
                                        <th>Area</th>
                                        <th>Geological Terrain</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                        @if($bala_oml)
                                            @foreach($bala_oml as $bala_oml)
                                                <tr>
                                                    <th>{{$bala_oml->id}}</th>
                                                    <th>@if($bala_oml->company) {{$bala_oml->company->company_name}} @endif</th>    
                                                    <th>@if($bala_oml->concession) {{$bala_oml->concession->concession_name}} @endif</th> 
                                                    <th>{{$bala_oml->equity_distribution}}</th> 
                                                    <th>@if($bala_oml->contract) {{$bala_oml->contract->contract_name}} @endif</th> 
                                                    <th>{{$bala_oml->year_of_award}}</th> 
                                                    <th>{{$bala_oml->license_expire_date}}</th> 
                                                    <th>{{$bala_oml->area}}</th> 
                                                    <th>@if($bala_oml->terrain) {{$bala_oml->terrain->terrain_name}} @endif</th>     
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                        </div> <!-- end col -->

                    </div>
                </div>
                <br> <br>  <br>
                <div class="row">
                    <div class="col-md-12">

                        <div class="table-responsive" style="border: thin solid #e1e1e1; border-radius: 5px">   
                            <h5 style="margin-left: 5px; color: #aaa"> <i class="mdi mdi-adjust" style="color: blue"></i> Summary Of Acreage Situation As At 31 December 2016 </h5> 
                                <table class="table table-condence mb-0">
                                    <thead>
                                        <tr style="">
                                            <th>s/n</th>
                                            <th>Year</th>
                                            <th>Basin / Terrain</th>
                                            <th>No of OPL Blocks Allocated</th>
                                            <th>No of OML Blocks Allocated</th>
                                            <th>No Of Blocks Open</th>
                                            <th>Total Blocks</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                            @if($bala_block)
                                                @foreach($bala_block as $bala_block)
                                                    <tr>                                                             
                                                        <th>{{$bala_block->id}}</th>              
                                                        <th>{{$bala_block->year}}</th>              
                                                        <th>{{$bala_block->terrain->terrain_name}}</th> 
                                                        <th>{{$bala_block->opl_blocks_allocated}}</th>
                                                        <th>{{$bala_block->oml_blocks_allocated}}</th>    
                                                        <th>{{$bala_block->blocks_open}}</th> 
                                                        <th>{{$bala_block->total_block}}</th>   
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                </table>
                        </div> <!-- end col -->

                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->












@endsection