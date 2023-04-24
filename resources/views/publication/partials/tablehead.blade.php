

@php 
    use \App\Http\Controllers\PublicationController; 
    $controllerName = new PublicationController;

    $table_id_arr = [6, 11, 13, 14, 16, 18, 26, 33, 36, 39, 41, 47, 48, 50, 51, 53, 55, 56, 64, 66, 69, 70, 75, 80, 81, 82, 84, 97, 99]; 

    // $contributors = \App\publicationReviewApprove::where('year', $yrs)->first();
    // dd($contributors);
@endphp

<style>
  h1
  {
    line-height: 2px !important;
  }  

  .th_title
  {
    font-size: 20px !important;
  }
</style>




@if($t_id >= 1 && $t_id <= 42) @php $division = 'UPSTREAM'; @endphp
@elseif($t_id >= 43 && $t_id <= 62) @php $division = 'MIDSTREAM'; @endphp
@elseif($t_id >= 63 && $t_id <= 76) @php $division = 'DOWNSTREAM'; @endphp
@elseif($t_id >= 77 && $t_id <= 98) @php $division = 'HSE'; @endphp
@elseif($t_id >= 99 && $t_id <= 99) @php $division = 'REVENUE'; @endphp
@endif

 <div class="col-md-12 div-height">
    <br>



    <h2>
        <table class="th_title" cellspacing ="0" cellpadding="3">
            @if($controllerName->tableTitles($t_id, $yrs)) 
                @if($controllerName->tableTitles($t_id, $yrs)->header != NULL)
                    <tr>
                        <td style="font-size: 24px !important;"> {!! $controllerName->tableTitles($t_id, $yrs)->numbering !!} </td>
                        <td style="font-size: 24px !important;"> {!! $controllerName->tableTitles($t_id, $yrs)->header !!} </td>
                    </tr>
                @endif                          
            @endif

            @if($controllerName->tableTitles($t_id, $yrs)) 
                {{-- @if($controllerName->tableTitles($t_id, $yrs)->header != NULL)    @endif --}}
                @if($controllerName->tableTitles($t_id, $yrs)->sub_head != NULL)
                    <tr>
                        <td style="font-size: 22px !important;"> {!! $controllerName->tableTitles($t_id, $yrs)->numbering !!} </td>
                        <td style="font-size: 22px !important;"> {!! $controllerName->tableTitles($t_id, $yrs)->sub_head !!} </td>
                    </tr>
                @endif                          
            @endif

            @if($controllerName->tableTitles($t_id, $yrs)) 
                @if($controllerName->tableTitles($t_id, $yrs)->sub_sub_head != NULL)
                    <tr>
                        <td style="font-size: 20px !important;"> {!! $controllerName->tableTitles($t_id, $yrs)->numbering !!}  </td>
                        <td style="font-size: 20px !important;"> {!! $controllerName->tableTitles($t_id, $yrs)->sub_sub_head !!}  </td>
                    </tr>
                @endif                          
            @endif
        </table> 
    </h2>
    






    
    <div class="row col-md-12 remark-div" id="topTab_{{$t_id}}" style="font-size: 20px !important"> 
        @if($controllerName->topRemarks($t_id, $yrs) && $table_of_contents) {!! $controllerName->topRemarks($t_id, $yrs)->remark !!} 
        @elseif($controllerName->topRemarksTemp($t_id, $yrs)) {!! $controllerName->topRemarksTemp($t_id, $yrs)->remark !!} 
        @endif
    </div>
  

    {{-- <div class="row col-md-12 remark-div" id="topTab_{{$t_id}}" 
        @if($controllerName->topRemarks($t_id, $yrs))>  {!! $controllerName->topRemarks($t_id, $yrs)->remark !!} 
        @elseif($controllerName->topRemarksTemp($t_id, $yrs)) {!! $controllerName->topRemarksTemp($t_id, $yrs)->remark !!} 
        @endif
    </div> --}}


    <h5 class="th_title" style="padding: 0px; font-size: 22px !important;">
        @if($controllerName->tableTitles($t_id, $yrs)) Table 
            {!! $controllerName->tableNO($yrs, $t_id)!!}: {!! $controllerName->tableTitles($t_id, $yrs)->table_title !!}
        @else
            {{-- using prev year table template  --}}
            <div class="temp-table" style="font-size: 20px !important;">
                @if($controllerName->prevTemp($t_id)) Table 
                    {!! $controllerName->prevTemp($t_id, $yrs)->table_no !!}: {!!$controllerName->prevTemp($t_id)->table_title!!}
                @endif
            </div> <br>
        @endif

        @if(Auth::user()->role_obj->role_name == 'Admin' || 
            $contributors->contains('user_id', Auth::user()->id)  )
            {{-- @if($controllerName->topRemarks($t_id, $yrs) || $controllerName->bottomRemarks($t_id, $yrs))
                <a data-toggle="tooltip" onclick="load_remark({{$t_id}}, {{$yrs}})" onmouseover="getId({{$t_id}})"
                   style="color:#fff;" class="btn edit-btn btn-sm pull-right no-print" data-original-title="Edit Remark for {{$remark}}"> <i class="fa fa-commenting"></i> </a>                    
            @else  --}}
                <a data-toggle="tooltip" onclick="showmodal('add_remark')" onmouseover="getId({{$t_id}})"
                   onmouseleave="setId({{$t_id}})" style="color:#fff;" class="btn black-btn btn-sm pull-right no-print" data-original-title="Add Remark for {{$remark}}"> 
                   <i class="fa fa-commenting-o"></i> </a>
            {{-- @endif --}}
        @endif
    </h5>
