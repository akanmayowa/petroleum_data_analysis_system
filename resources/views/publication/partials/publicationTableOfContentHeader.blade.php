
@php    
    //function odd
    function odd($i)
    {
        if($i % 2 == 0){ return true; }
    }
@endphp

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            @if(isset($nogiar->content))
                @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager' || \Auth::user()->role_obj->role_name == 'Admin')
                    <span class="alert alert-{{$nogiar->status_html[1] }}">{{$nogiar->status_html[0] }}</span>
                @endif 
            @endif

            @if($nogiar)
                <div class="card-body" id="editableSummer">

                    


                    <table class="table table-sm mb-0 no-print" style="background: transparent; -webkit-print-color-adjust: exact!important;"> 
                        <tr>
                            <td style="width: 70%">

                            </td>
                            <td style="width: 30%">

                                @if($stage)
                                    {{-- @if($stage->save_upload == 0) --}}
                                        {{-- <button type="button" id="saveFileBtn" class="btn btn-default pull-right no-print"
                                                onclick="window.print(); return false;" onmouseup="window._year = ({{ $yrs }})" 
                                                onmouseover="hideshow()"><i class="fa fa-save"></i> Save
                                        </button> --}}
                                    {{-- @elseif($stage->save_upload == 1) --}}
                                        {{-- <button type="button" id="uplFileBtn" class="btn btn-default pull-right no-print" 
                                        data-toggle="modal" data-target="#upl_pub" style="margin: 0px 10px; display: none;"><i
                                                    class="fa fa-upload"></i> Upload
                                        </button> --}}
                                    {{-- @endif --}}
                                @endif
                            </td>
                        </tr>
                    </table>
                    {{--   --}}


                    {{-- coat of arms --}}
                    <center>
                        <img src="{{URL::asset('assets/images/coat_of_arms.jpg')}}" class="img-responsive" width="50%"
                             alt="Coat of Arms" style="margin: 20% auto 4% auto;">
                        <br>
                        <h2 style="margin-bottom: 10%"> {{$yrs}} OIL & GAS ANNUAL REPORT </h2>
                    </center>
                    <br> <br>


                    {{-- TABLE OF CONTENT --}}
                    @php
                        function toc_section($year)
                        {
                            $toc_sections = \App\NOGIARPublicationSection::where('year', $year)
                                            ->where('section_type', '<', 4)->orderBy('section_type', 'asc')->get();

                            //check if table of content already exist
                            if(!count($toc_sections))
                            {
                                $toc_sections = \App\NOGIARPublicationSection::where('year', 2012)
                                            ->where('section_type', '<', 4)->orderBy('section_type', 'asc')->get();
                            }
                            return $toc_sections;
                        }

                        function toc_title($year, $section_id)
                        {
                            $toc_titles = \App\NOGIARpublicationRemark::where('year', $year)->where('section_id', $section_id)
                                         ->where('sub_head', '<>', '')->first();

                            //check if table of content already exist
                            if(!$toc_titles)
                            {
                                $toc_titles = \App\NOGIARpublicationRemark::where('year', 2012)->where('section_id', $section_id)
                                         ->where('sub_head', '<>', '')->first();
                            }
                            return $toc_titles;
                        }
                    @endphp

                    

                    <div class="table-responsive col-md-12"><br> <br> <br>
                        @if($director_remark)
                            <h3> {!!  $director_remark->section_type !!}. &nbsp; {!!  $director_remark->title !!} </h3>
                            <span style="font-size: 15 !important"> {!!  $director_remark->content !!} </span>
                        @endif

                        {{-- <div class="row"> 
                            <div class="col-md-12" style="text-align-right"> <br>
                            <a data-toggle="tooltip" onclick="showmodal('add_comment_div')" onmousedown="setDivision('Director Remark')" style="color:#fff; font-size: 12px" class="btn btn-dark btn-sm pull-right no-print" data-original-title="Comment on NOGIAR Director Remark">  <i class="fa fa-check"></i> Approve Director Remark </a>
                            </div> 
                        </div> --}}



                        <br> <br> <br>
                        @if($regulatory_structure)
                            <h3> {!!  $regulatory_structure->section_type !!}.
                                &nbsp; {!!  $regulatory_structure->title !!} </h3>

                            <div style="font-size: 13 !important"> {!!  $regulatory_structure->content !!} </div>
                        @endif

                        {{-- <div class="row"> 
                            <div class="col-md-12" style="text-align-right"> <br>
                            <a data-toggle="tooltip" onclick="showmodal('add_comment_div')" onmousedown="setDivision('DPR Structure')" style="color:#fff; font-size: 12px" class="btn btn-dark btn-sm pull-right no-print" data-original-title="Comment on NOGIAR DPR Structure">  <i class="fa fa-check"></i> Approve DPR Structure </a>
                            </div> 
                        </div> --}}

                        <br> <br> <br>
                        @if($modular_refinery)
                            <h3> {!!  $modular_refinery->section_type !!}.
                                &nbsp; {!!  $modular_refinery->title !!} </h3>

                            <div style="font-size: 13 !important"> {!!  $modular_refinery->content !!} </div>
                        @endif
                        <br>

                        {{-- <div class="row"> 
                            <div class="col-md-12" style="text-align-right"> <br>
                            <a data-toggle="tooltip" onclick="showmodal('add_comment_div')" onmousedown="setDivision('Main Article')" style="color:#fff; font-size: 12px" class="btn btn-dark btn-sm pull-right no-print" data-original-title="Comment on NOGIAR Main Article">  <i class="fa fa-check"></i> Approve Main Article </a>
                            </div> 
                        </div> --}}
                    </div>
                </div>  
            @else
                <h4>No Publiction For {{$yrs}}</h4>
            @endif  
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

{{-- <div class="row"> <div class="col-md-12" style="text-align-right"> <br>
    <a data-toggle="tooltip" onclick="showmodal('add_comment_div')" onmousedown="setDivision('ARTICLES')" style="color:#fff; font-size: 12px" class="btn btn-dark btn-sm pull-right no-print" data-original-title="Comment on NOGIAR Articles">  <i class="fa fa-check"></i> Approve Article </a>
</div> </div> --}}



@if(isset($nogiar->content) &&  $nogiar->status==0)
    @if(\Auth::user()->role_obj->role_name == 'Nogiar Report Manager' || \Auth::user()->role_obj->role_name == 'Admin')
        <script>
            $(function () 
            {
                $('#editableSummer').summernote({airMode: true,});

                $('#editableSummer').summernote({
                    callbacks: {
                        onKeyup: function (e) {
                            savePublication();
                        }
                    }
                });

                // summernote.keyup
                $('#editableSummer').on('summernote.keyup', function (we, e) {
                    savePublication();
                });
            })

            function savePublication() {
                year = $('#nogiar_year').val();
                content = $('#editableSummer').summernote('code');

                created_by = '';
                formData = {
                    year: year,
                    _token: '{{csrf_token()}}',
                    content: content,
                    created_by: created_by,
                    type: 'addDwp'
                }
                $.post('{{url('nogiar')}}', formData, function (data, status, xhr) {

                })
            }


            //PRINT CLICK TO HIDE
            // $(function()
            // {
            //     $('.printBtn').mouseover(function()
            //     {
            //         $('#topBtn').hide();     $('#botDiv').hide();   $('#nogiar_year').hide();   $('.btn-sm').hide();
            //     });

            //     $('.printBtn').mouseup(function()
            //     {
            //         $('.printBtn').css("background-color", "white");

            //     });
            // });
        </script>
    @endif
@endif