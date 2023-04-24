<div class="row" style="position: fixed; z-index: 1000; right: 20px"> 
    <div class="col-xl-12 col-md-12 col-sm-12">
        @if(\Auth::user()->role_obj->role_name == 'Admin')
            {{-- <div class="row" style=""> --}}
                {{-- <div class="col-xl-6 col-md-6 col-sm-12" id="" style="">
                    <a href="{{route('testPDF')}}" id="TestPDFBtn" class="btn btn-dark pull-right no-print"> <i class="fa fa-save"></i> Test
                    </a>
                </div>            @if(\Auth::user()->id == '5')    
                <a href="{{url('/publication-converttoword?worddoc=1')}}" id="convertBtn" class="btn btn-warning pull-right no-print" style="margin-left: 5px">
                    <i class="fa fa-file"></i> Covert </a>
            @endif --}}


                {{-- <div class="col-xl-6 col-md-6 col-sm-12" id="" style="">
                    <button type="button" id="saveFileBtn" class="btn btn-default pull-right no-print" onclick="window.print(); return false;" onmousedown="window._year = ({{ $yrs }})"> <i class="fa fa-save"></i> Save
                    </button>
                </div>

                <div class="col-xl-6 col-md-6 col-sm-12" id="" style="">
                    <button type="button" id="uplFileBtn" class="btn btn-default pull-right no-print" data-toggle="modal" data-target="#upl_pub" onmouseup="hideSaveAndUpload()" style="margin: 0px 10px; display: none;"> <i class="fa fa-upload"></i> Upload
                    </button>
                </div> --}}
            {{-- </div> --}}
        @endif

        {{-- button to approve by Head of Planning HP --}}
        {{-- @if($stage->stage_id == 4)
            @if(\Auth::user()->role == 28 || \Auth::user()->role == 29 || \Auth::user()->id == 58 || \Auth::user()->id == 59)
                <button type="button" id="decPubBtn" class="btn btn-danger waves-effect waves-light pull-right no-print" data-toggle="modal" data-target="#dec_appr_modal" style="margin-left: 5px;" 
                onmouseup="setDeline()">
                    <i class="fa fa-ban"></i> Decline {{$yrs}} Publication
                </button>

                <button type="button" id="appPubBtn" class="btn btn-success waves-effect waves-light pull-right no-print" data-toggle="modal" data-target="#pub_appr_modal" style="margin-left: 5px;" 
                onmouseup="setApprove()">
                    <i class="fa fa-check"></i> Approve {{$yrs}} Publication
                </button>
            @endif
        @endif --}}
    </div>
</div>