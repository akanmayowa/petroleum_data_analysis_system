@extends('layouts.app_statistics')

@section('content')




@forelse($nogiar as $section)
    @if($section->nogiar_timeline_section->type == 'Directors Remark')

        <div class="row">
            <div class="col-lg-8">
                <div class="card m-b-20">
                    <div class="card-body">  

                        <h4 class="mt-0 header-title">   {{$section->header}}  
                            <select class="form-control pull-right" name="year" id="nogiar_year" style="width: 15%">
                                <option value=""> Select Year </option>
                                @if(count($year)>0)
                                    @foreach($year as $nogiar_year)
                                        <option value="{{$nogiar_year->year}}">{{$nogiar_year->year}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </h4>
                        <span class="text-muted m-b-30 font-14"> {{$section->title}} </span> 
                        
                            @forelse($section->nogiar_publication_contents as $section_1_content )
                                @if($section->id == $section_1_content->nogiar_id) 
                                    <p class="text-muted m-b-30 font-14"> {{$section_1_content->content}} </p> 
                                @endif 
                            @empty
                            @endforelse

                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit Directors Remarks" style="font-size: 10px; background-color: #C0C0C0; color:#202020"><i class="fa fa-pencil"> Edit</i></button>
                            @endif
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
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    @endif

@empty
@endforelse





<div class="row">
     <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <section id="cd-timeline" class="cd-container">

                            @forelse($nogiar as $section)
                                <!-- SESSION 2   content with list -->
                                @if($section->id == '2')

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-success">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height"> 
                                            <h3> {{$section->header}} </h3>
                                            <p> 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif
                                            </p>
                                            <span class="cd-date"> {{$section->year}}
                                                <p class="mb-0 text-muted font-14">  {{$section->title}}  </p> 

                                                    @forelse($section->nogiar_publication_contents as $section_content)
                                                         <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p>
                                                    @empty
                                                    @endforelse

                                                    @if($section->nogiar_publication_lists)
                                                        <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                            @forelse($section->nogiar_publication_lists as $section_list)
                                                                <li> {{$section_list->list}} </li> 
                                                            @empty
                                                            @endforelse
                                                        </ul>
                                                    @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>   

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                            </span>
                                        </div> <!-- cd-timeline-content -->


                                    </div> <!-- cd-timeline-block -->  

                                @endif



                                <!-- SECTION 3  content with list -->
                                @if($section->id == '3')

                                    <div class="cd-timeline-block">                              

                                        <div class="cd-timeline-content timeline-height">
                                            <h3> {{$section->header}} </h3>
                                            <p class="mb-0 text-muted font-14"> {{$section->title}} </p>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <span class="cd-date"> {{$section->year}} 
                                             <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif 
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->

                                        <div class="cd-timeline-img cd-danger">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->
                                    </div> <!-- cd-timeline-block -->   

                                @endif



                                <!-- SECTION 4  content with list -->
                                @if($section->id == '4')

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-info">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">
                                            
                                            <span class="cd-date"> {{$section->year}}
                                             <?php $pic_1 = $section->picture_1; ?>
                                            @if($pic_1)
                                            <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                            @else
                                            <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                            @endif 
                                            </span>

                                            <h3> {{$section->header}} </h3>
                                            <p class="mb-0 text-muted font-14"> {{$section->title}}  </p>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                                @if($section->nogiar_publication_lists)
                                                    <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                        @forelse($section->nogiar_publication_lists as $section_list)
                                                            <li> {{$section_list->list}} </li> 
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                          </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->                                 

                                @endif



                                <!-- SECTION 5  content with list -->
                                @if($section->id == '5')

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-pink">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">
                                            <h3> {{$section->header}} </h3>
                                            <p class="m-b-20 text-muted font-14"> {{$section->title}} </p>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <img src="assets/images/small/img-1.jpg" alt="" class="rounded" style="width: 120px;">
                                            <img src="assets/images/small/img-2.jpg" alt="" class="rounded" style="width: 120px;">
                                            <span class="cd-date"> {{$section->year}} 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="95%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="95%" alt="Pic"> 
                                                @endif
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                @endif


                                <!-- SECTION 6 content with list -->
                                @if($section->id == '6')

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-warning">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">
                                            <h3> {{$section->header}} </h3>
                                            <p class="mb-0 text-muted font-14"> {{$section->title}}  </p>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <span class="cd-date"> {{$section->year}} 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                @endif


                                <!-- SECTION 7 content with list -->
                                @if($section->id == '7')  

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-primary">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">
                                            <h3> {{$section->header}} </h3>                                   
                                            <h4> {{$section->title}} </h4>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <span class="cd-date"> {{$section->year}} 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="90%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="90%" alt="Pic"> 
                                                @endif 
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->                      

                                @endif


                                <!-- SECTION 8 content with list -->
                                @if($section->id == '8')  

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-warning">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">
                                            <h3> {{$section->header}} </h3>
                                            <p class="mb-0 text-muted font-14"> {{$section->title}}  </p>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <span class="cd-date"> {{$section->year}} 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->                   

                                @endif


                                <!-- SECTION 9 content with list -->
                                @if($section->id == '9') 

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-primary">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">
                                            <h3> {{$section->header}} </h3>                                   
                                            <h4> {{$section->title}} </h4>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}} </p>

                                            <span class="cd-date"> {{$section->year}} 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif 
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                @endif


                                <!-- SECTION 10 content with list -->
                                @if($section->id == '10') 

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-warning">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">

                                            <h3> {{$section->header}} </h3>                                   
                                            <h4> {{$section->title}} </h4>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <span class="cd-date"> {{$section->year}}
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                @endif


                                <!-- SECTION 11 content with list -->
                                @if($section->id == '11') 

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-primary">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">
                                            <h3> {{$section->header}} </h3>                                   
                                            <h4> {{$section->title}} </h4>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <span class="cd-date"> {{$section->year}} 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif 
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block --> 

                                @endif


                                <!-- SECTION 12 content with list -->
                                @if($section->id == '12') 

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-warning">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">

                                            <h3> {{$section->header}} </h3>                                   
                                            <h4> {{$section->title}} </h4>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <span class="cd-date"> {{$section->year}} 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                @endif


                                <!-- SECTION 13 content with list -->
                                @if($section->id == '13') 

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-primary">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">
                                            <h3> {{$section->header}} </h3>                                   
                                            <h4> {{$section->title}} </h4>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <span class="cd-date"> {{$section->year}} 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif 
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                @endif


                                <!-- SECTION 14 content with list -->
                                @if($section->id == '14') 

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-warning">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">

                                            <h3> {{$section->header}} </h3>                                   
                                            <h4> {{$section->title}} </h4>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <span class="cd-date"> {{$section->year}} 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                @endif


                                <!-- SECTION 15 content with list -->
                                @if($section->id == '15') 

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-primary">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">
                                            <h3> {{$section->header}} </h3>                                   
                                            <h4> {{$section->title}} </h4>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <span class="cd-date"> {{$section->year}} 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif 
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                @endif


                                <!-- SECTION 16 content with list -->
                                @if($section->id == '16') 

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-warning">
                                            <i class="mdi mdi-adjust"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content timeline-height">

                                            <h3> {{$section->header}} </h3>                                   
                                            <h4> {{$section->title}} </h4>

                                            @forelse($section->nogiar_publication_contents as $section_content)
                                                 <p class="mb-0 text-muted font-14"> {{$section_content->content}} </p> <br>
                                            @empty
                                            @endforelse

                                            @if($section->nogiar_publication_lists)
                                                <ul style="list-style-type: circle;" class="mb-0 text-muted">
                                                    @forelse($section->nogiar_publication_lists as $section_list)
                                                        <li> {{$section_list->list}} </li> 
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif  <br>

                                                <p class="mb-0 text-muted font-14"> {{$section->footer}}  </p>
                                                <p class="mb-0 text-muted font-14"> {{$section->sub_footer}}  </p>

                                            <span class="cd-date"> {{$section->year}} 
                                                <?php $pic_1 = $section->picture_1; ?>
                                                @if($pic_1)
                                                <img src="{{asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                                                @else
                                                <img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                                                @endif
                                            </span>

                                            @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager')
                                                <button type="button" class="btn btn-default pull-right" id="" onclick="load_sections({{$section->id}})" data-toggle="tooltip" data-placement="left" title data-original-title="Edit This Section" style="font-size: 10px; background-color:#202020; color:#fff; padding: 2px 3px"><i class="fa fa-pencil"> Edit</i></button>
                                            @endif
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                @endif
                                


                            @empty
                            @endforelse

                        </section>
                    </div>
                </div>

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


<script type="text/javascript">
    $(function()
    {  
         //
        $('#nogiar_year').on('change', function() 
        {
            var year = this.value;
            window.location="{{url('/publication/nogiar')}}?year="+year;
        });
    });


    function showmodal(modalid)
    {
        $('#'+modalid).modal('show');
    }


    function load_sections(id)
    {   
        $('#editsection').load("{{url('publication')}}/modals/editSection?id="+id);
        $('#edit_section').modal('show');
    }

</script>

@endsection