    <div id="2" class="row col-md-12 remark-div">                                 
        @if(topRemarks(3, $yrs)) {!! topRemarks(3, $yrs)->remark !!} @endif
    </div> 
    <hr>
    <h4 class="th_title"> @if(topRemarks(3, $yrs)) {!! topRemarks(3, $yrs)->header !!} @endif  </h4>
    <h5 class="th_title" id="test"> @if(topRemarks(3, $yrs)) {!! topRemarks(3, $yrs)->sub_head !!} @endif  </h5>
    <h5 class="th_title"> @if(topRemarks(3, $yrs)) {!! topRemarks(3, $yrs)->sub_sub_head !!} @endif  </h5>
    <hr>
    <h5 class="th_title"> 
    @if(topRemarks(3, $yrs)) Table {!! topRemarks(3, $yrs)->table_no !!} : 
        {{$yrs}} {!! topRemarks(3, $yrs)->table_title !!} 
    @else
    {{-- using prev year table template  --}}
    <div class="temp-table" data-toggle="tooltip" title="Table header missing, create one now"> 
    @if(prevTemp(3)) Table {!! prevTemp(3)->table_no !!} : {!! prevTemp(3)->table_title !!}@endif
    </div> 
    @endif

        @if(Auth::user()->role_obj->permission->contains('constant', 'manage_remark'))
            @if(topRemarks(3, $yrs) || bottomRemarks(3, $yrs))  
                <a data-toggle="tooltip" onclick="load_remark(3)" onmouseover="getId(3)" style="color:#fff;" class="btn edit-btn btn-sm pull-right" 
                 data-original-title="Edit Remark for OPL Comcession">  <i class="fa fa-commenting"></i> </a>
            @else
                <a data-toggle="tooltip" onclick="showmodal('add_remark')" onmouseover="getId('3')" onmouseup="setId('3')" style="color:#fff;" class="btn black-btn btn-sm pull-right" 
                data-original-title="Add Remark for OPL Concession">  <i class="fa fa-commenting-o"></i> </a>
            @endif 
        @endif                      
    </h5>