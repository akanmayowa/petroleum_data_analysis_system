@php    
    //function odd
    function odd($i)
    {
        if($i % 2 == 0){ return true; }
    }
@endphp


<style type="text/css">
    .toc
    {
        font-size: 20px !important;
    }

    .bold
    {
        font-weight: bolder !important;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            @if(isset($nogiar->content))
                @if(\Auth::user()->role_obj->role_name == 'NOGIAR Report Manager' || \Auth::user()->role_obj->role_name == 'Admin')
                    <span class="alert alert-{{$nogiar->status_html[1] }}">{{$nogiar->status_html[0] }}</span>
                @endif 
            @endif

            @if($nogiar)
                <div class="card-body" id="" style="font-family: Candara !important; font-size: 20px">                    


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
                        <img src="{{URL::asset('assets/images/coat_of_arms.jpg')}}" class="img-responsive" width="50%" alt="Coat of Arms" style="margin: 20% auto 4% auto;">
                        <br>
                        <h2 style="margin-bottom: 10%"> {{$yrs}} OIL & GAS ANNUAL REPORT </h2>
                    </center>
                    <br> 





                    {{-- TABLE OF CONTENT --}}
                    @php
                        // $toc_sections $controllerName->toc_section($year);      $toc_titles = $controllerName->toc_title($year, $section_id);
                    @endphp

                    {{-- PRINT PAGE BREAK --}}    
                    <p class="page-break"></p>

                    <table class="table table-sm mb-0" style="background: transparent; -webkit-print-color-adjust: exact!important;">
                        <thead>
                            <tr>
                                <th style="background: #ACE1AF; text-align: center; font-size: 22px" colspan="3"> TABLE OF CONTENT </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($headerToc as $toc)
                                <tr style="font-size: 20px !important;">
                                    <td style="width: 5%; padding: 2px !important"><span class="toc bold"> {{$toc->id}}</span> </td>
                                    <td style="width: 90%; padding: 2px !important"><span class="toc bold"> {{$toc->header}}</span> </td>
                                    <td style="width: 5%; padding: 2px; text-align: right"><span class="toc bold"> {{$toc->page_no}}</span> </td>
                                </tr>
                            @empty
                            @endforelse

                            <tr style="padding: 10px !important;">
                                <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td>
                            </tr>

                            @forelse($upstreams as $k => $upstream)                                
                                <tr @if($k == 0) class="bold" @endif>
                                    <td style="width: 5%; padding: 2px !important"><span class="toc">{{$upstream->numbering}}</span></td>
                                    <td style="width: 90%; padding: 2px !important"><span class="toc"> {{$upstream->header}}</span> </td>
                                    <td style="width: 5%; padding: 2px !important; text-align: right"><span class="toc"> {{$upstream->page_no}}</span> </td>
                                </tr>
                            @empty
                            @endforelse

                            <tr style="padding: 10px !important;">
                                <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td>
                            </tr>

                            @forelse($midstreams as $k => $midstream)
                                <tr style="padding: 0px !important;" @if($k == 0) class="bold" @endif>
                                    <td style="width: 5%; padding: 2px !important"><span class="toc"> {{$midstream->numbering}}</span> </td>
                                    <td style="width: 90%; padding: 2px !important"><span class="toc"> {{$midstream->header}}</span> </td>
                                    <td style="width: 5%; padding: 2px !important; text-align: right"><span class="toc"> {{$midstream->page_no}}</span> </td>
                                </tr>
                            @empty
                            @endforelse

                            <tr style="padding: 10px !important;">
                                <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td>
                            </tr>

                            @forelse($downstreams as $k => $downstream)
                                <tr style="padding: 0px !important;" @if($k == 0) class="bold" @endif>
                                    <td style="width: 5%; padding: 2px !important"><span class="toc"> {{$downstream->numbering}} </span></td>
                                    <td style="width: 90%; padding: 2px !important"><span class="toc"> {{$downstream->header}} </span></td>
                                    <td style="width: 5%; padding: 2px !important; text-align: right;"><span class="toc"> {{$downstream->page_no}} </span></td>
                                </tr>
                            @empty
                            @endforelse

                            <tr style="padding: 10px !important;">
                                <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td>
                            </tr>

                            @forelse($hses as $k => $hse)
                                <tr style="padding: 0px !important;" @if($k == 0 || $hse->numbering == 4.5) class="bold" @endif>
                                    <td style="width: 5%; padding: 2px !important"><span class="toc"> {{$hse->numbering}} </span></td>
                                    <td style="width: 90%; padding: 2px !important"><span class="toc"> {{$hse->header}} </span></td>
                                    <td style="width: 5%; padding: 2px !important; text-align: right;"><span class="toc"> {{$hse->page_no}} </span></td>
                                </tr>
                            @empty
                            @endforelse

                            <tr style="padding: 10px !important;">
                                <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td>
                            </tr>

                            <tr style="padding: 0px !important;" class="bold">
                                <td style="width: 5%; padding: 2px !important"><span class="toc"> 5.1 </span></td>
                                <td style="width: 90%; padding: 2px !important"><span class="toc"> GLOSSARY OF TERMS </span></td>
                                <td style="width: 5%; padding: 2px !important; text-align: right;"><span class="toc">  </span></td>
                            </tr>
                        </tbody>

                            <tr style="padding: 10px !important;">
                                <td style="padding: 10px !important"> </td> <td style="padding: 35px 10px !important"> </td> <td style="padding: 10px !important"> </td>
                            </tr>

                        {{-- PRINT PAGE BREAK --}}    
                        <p class="page-break"></p>

                        <thead>
                            <tr>
                                <th style="background: #ACE1AF; text-align: center; font-size: 22px" colspan="3"> LIST OF TABLES </th>
                            </tr>
                        </thead>
 

                        <tbody>
                            @forelse($toc_contents as $content)
                                <tr style="padding: 0px !important;">
                                    <td style="width: 5%; padding: 2px !important"><span class="toc"> {{$content->table_no}} </span></td>
                                    <td style="width: 90%; padding: 2px !important"><span class="toc"> {{$content->table_title}} </span></td>
                                    <td style="width: 5%; padding: 2px !important; text-align: right;"><span class="toc"> {{$content->page_no}} </span></td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>

                            <tr style="padding: 10px !important;">
                                <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td> <td style="padding: 10px !important"> </td>
                            </tr>
                        {{-- PRINT PAGE BREAK --}}     
                        <p class="page-break"></p>

                        <thead>
                            <tr>
                                <th style="background: #ACE1AF; text-align: center; font-size: 22px" colspan="3"> LIST OF FIGURES </th>
                            </tr>
                        </thead>
 

                        <tbody>
                            @forelse($figures as $figure)
                                <tr style="padding: 0px !important;">
                                    <td style="width: 5%; padding: 2px !important"><span class="toc"> {{$loop->iteration}} </span></td>
                                    <td style="width: 90%; padding: 2px !important"><span class="toc"> {{$figure->figure_title_1}} </span></td>
                                    <td style="width: 5%; padding: 2px !important; text-align: right;"><span class="toc"> {{$figure->page_no}} </span></td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>

                    {{-- PRINT PAGE BREAK --}}    
                    <p class="page-break"></p>




                    

                    <div class="table-responsive col-md-12" style="font-size: 25px !important"><br> <br> <br>
                        @if($director_remark)
                            <h3> {!!  $director_remark->section_type !!}. &nbsp; {!!  $director_remark->title !!} </h3>
                            <span class="font-20" style="font-size: 20px !important"> {!!  $director_remark->content !!} </span>
                        @endif

                        {{-- <div class="row"> 
                            <div class="col-md-12" style="text-align-right"> <br>
                            <a data-toggle="tooltip" onclick="showmodal('add_comment_div')" onmousedown="setDivision('Director Remark')" style="color:#fff; font-size: 12px" class="btn btn-dark btn-sm pull-right no-print" data-original-title="Comment on NOGIAR Director Remark">  <i class="fa fa-check"></i> Approve Director Remark </a>
                            </div> 
                        </div> --}}



                        <br> <br> <br>
                        @if($regulatory_structure)
                            <h3> {!!  $regulatory_structure->section_type !!}.
                                &nbsp; {!! $regulatory_structure->title !!} </h3>

                            <div style="font-size: 20px !important"> {!!  $regulatory_structure->content !!} </div>
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

                            <div style="font-size: 20px !important"> {!!  $modular_refinery->content !!} </div>
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