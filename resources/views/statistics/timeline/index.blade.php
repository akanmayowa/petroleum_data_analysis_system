@extends('layouts.app_statistics')

@section('content')





    @if($section_1)
        <?php     $pic_1 = $section_1->picture_1;     $pic_2 = $section_1->picture_2;     $pic_3 = $section_1->picture_3;   ?>
    @endif


<div class="row">
    <div class="col-lg-8">
        <div class="card m-b-20">
            <div class="card-body">  

                <h4 class="mt-0 header-title">@if($section_1)  {{$section_1->header}}  @endif</h4>
                <p class="text-muted m-b-30 font-14">@if($section_1)  {{$section_1->subheader}}.  @endif</p> 
                

                <div id="carouselExampleCaption" class="carousel slide" data-ride="carousel" style="">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            @if($section_1) <img src="{{URL::asset('assets/images/user/'.$pic_1)}}" class="img-responsive"> @endif
                            <div class="carousel-caption d-none d-md-block">
                                <h3>@if($section_1) {{$section_1->caption_1}} @endif</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            @if($section_1) <img src="{{URL::asset('assets/images/pix/'.$pic_2)}}" class="img-responsive"> @endif
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Second slide label</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            @if($section_1) <img src="{{URL::asset('assets/images/pix/'.$pic_3)}}" class="img-responsive"> @endif
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Third slide label</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
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
                                   aria-controls="collapseOne" class="text-dark">
                                    Year 2016
                                </a>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="card-body">
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
                                   aria-expanded="false" aria-controls="collapseTwo">
                                    Year 2017
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" role="tabpanel"
                             aria-labelledby="headingTwo">
                            <div class="card-body">
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
                                    Year 2018
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" role="tabpanel"
                             aria-labelledby="headingThree">
                            <div class="card-body">
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
                                    <h3>Timeline Event One</h3>
                                    <p class="mb-0 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                    <span class="cd-date">May 23</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-danger">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3>Timeline Event Two</h3>
                                    <p class="m-b-20 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
                                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light m-t-5">See more detail</button>

                                    <span class="cd-date">May 30</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-info">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3>Timeline Event Three</h3>
                                    <p class="mb-0 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat ... <a href="#">Read more</a></p>
                                    <span class="cd-date">Jun 05</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-pink">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3>Timeline Event Four</h3>
                                    <p class="m-b-20 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                    <img src="assets/images/small/img-1.jpg" alt="" class="rounded" style="width: 120px;">
                                    <img src="assets/images/small/img-2.jpg" alt="" class="rounded" style="width: 120px;">
                                    <span class="cd-date">Jun 14</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-warning">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3>Timeline Event Five</h3>
                                    <p class="m-b-20 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
                                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">See more detail</button>
                                    <span class="cd-date">Jun 18</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->

                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-primary">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3>Timeline Event End</h3>
                                    <p class="mb-0 text-muted font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>
                                    <span class="cd-date">Jun 30</span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->
                        </section> <!-- cd-timeline -->
                    </div>
                </div><!-- Row -->

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->









<!-- ADD NEW CONTENT MODAL -->
<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('statistics.addnewcontent') }}">
@csrf
    <div id="adduser" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">  <h4 class="modal-title"> <i class="fa fa-briefcase"></i> Add New Content </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
        </div>
        <div class="modal-body">       
        

        <!-- Begin page -->

            <div class="p-3">
                <form class="form-horizontal m-t-20" action="#">

                    <div class="form-group row">
                        <div class="col-6">
                            <select class="form-control" name="page" id="page" focused required>
                                <option value="">Select Page</option>
                                <option value="1">Timeline</option>
                                <option value="2">Others</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <select class="form-control" name="section" id="section" required>
                                <option value="">Select Page Section/Position</option>
                                <option value="1">Section 1</option>
                                <option value="2">Section 2</option>
                                <option value="3">Section 3</option>
                                <option value="4">Section 4</option>
                                <option value="5">Section 5</option>
                                <option value="6">Section 6</option>
                                <option value="7">Section 7</option>
                                <option value="8">Section 8</option>
                                <option value="9">Section 9</option>
                                <option value="10">Section 10</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <textarea class="form-control" type="text" rows="3" placeholder="Header" name="header" id="header" ></textarea>
                        </div>

                        <div class="col-6">
                            <textarea class="form-control" type="text" rows="3" placeholder="Sub Header" name="subheader" id="subheader" ></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <textarea class="form-control" type="text" rows="5" placeholder="Section Content" name="content" id="content" ></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <textarea class="form-control" type="text" rows="2" placeholder="Content Footer" name="footer" id="footer"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-5">
                            <input class="form-control" type="file" name="picture_1" id="picture_1">
                        </div>
                        <div class="col-7">
                            <input class="form-control" type="text" placeholder="Picture Caption" name="caption_1" id="caption_1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-5">
                            <input class="form-control" type="file" name="picture_2" id="picture_2">
                        </div>
                        <div class="col-7">
                            <input class="form-control" type="text" placeholder="Picture Caption" name="caption_2" id="caption_2">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-5">
                            <input class="form-control" type="file" name="picture_3" id="picture_3">
                        </div>
                        <div class="col-7">
                            <input class="form-control" type="text" placeholder="Picture Caption" name="caption_3" id="caption_3">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-5">
                            <input class="form-control" type="file" name="picture_4" id="picture_4">
                        </div>
                        <div class="col-7">
                            <input class="form-control" type="text" placeholder="Picture Caption" name="caption_4" id="caption_4">
                        </div>
                    </div>









                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label font-weight-normal" for="customCheck1"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Publish Content</button>
                            <button class="btn btn-default btn-block waves-effect waves-light" type="reset">Clear</button>
                        </div>
                    </div>

                   
                </form>
            </div>

             


    
  

        </div>
        </div>

        </div>
        </div>
        
</form>



@endsection