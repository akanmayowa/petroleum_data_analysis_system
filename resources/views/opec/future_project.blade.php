@extends('layouts.app')

@section('content')



<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
@if(!request()->has('excel'))
<style type="text/css">
    body, div, table, thead, tbody, tfoot, tr, th, td, p {
        font-family: "Calibri";
        font-size: x-small
    }

    a.comment-indicator:hover + comment {
        background: #ffd;
        position: absolute;
        display: block;
        border: 1px solid black;
        padding: 0.5em;
    }

    a.comment-indicator {
        background: red;
        display: inline-block;
        border: 1px solid black;
        width: 0.5em;
        height: 0.5em;
    }

    comment {
        display: none;
    }
</style>
@endif


@include('opec.partials.searchHeader',['action'=>url('opecFutureProduct').'/manageFutureProduct','formId'=>'submitFutureProductForm','url'=>url('opecFutureProduct')])
{{--    action="{{url('opecNgl')}}" --}}
{{--
    opecFutureProduct/manageFutureProduct--}}
<form method="POST"  id="submitFutureProductForm">
    <input type="hidden" value="{{$year}}" name="year">
    <input type="hidden" value="{{Auth::user()->id}}" name="a_id">
    <input type="hidden" value="saveFutureProject" name="type">
    @csrf
    <div style="overflow-x: auto">


<table cellspacing="0" border="1">
    <colgroup span="2" width="64"></colgroup>
    <colgroup width="184"></colgroup>
    <colgroup span="3" width="64"></colgroup>
    <colgroup span="2" width="76"></colgroup>
    <colgroup width="127"></colgroup>
    <tbody><tr>
        <td colspan="3" rowspan="2" height="42" align="left" valign="middle" bgcolor="#92CDDC"><b><font face="Courier New" size="4" color="#000000">Table 2.2 Future upstream projects</font></b></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom"><font color="#FFFFFF"><br></font></td>
        <td align="right" valign="middle" bgcolor="#D9D9D9"><u><font face="Courier New" size="3" color="#FFFFFF"><br></font></u></td>
    </tr>
    <tr>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#FFFFFF"><br></font></td>
        <td align="right" valign="middle" bgcolor="#D9D9D9"><u><font face="Courier New" size="3" color="#FFFFFF"><br></font></u></td>
    </tr>
    <tr>
        <td colspan="3" height="21" align="right" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#FFFFFF"><br></font></td>
        <td align="left" valign="middle" bgcolor="#92CDDC"><b><font face="Courier New">Total</font></b></td>
        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left"  valign="bottom" bgcolor="#92CDDC"><font face="Courier New"><B>FIELD {{$loop->index+1}}</B></font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">Field name/project</font></td>
        <td align="left" valign="middle" bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">{{ucfirst(strtolower($project->project))}}</font></td>
            @endforeach
        @endif

    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New">Operator name</font></td>
        <td align="left" valign="middle" bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New">{{ucfirst(strtolower($project->company->company_name))}}</font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">Terrain</font></td>
        <td align="left" valign="middle" bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">{{ucfirst(strtolower($project->terrain_id))}}</font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New">Liquid type</font></td>
        <td align="left" valign="middle" bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
        @if(count($projects)>0)
            @foreach($projects as $project)

                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New">{{ucfirst(strtolower($project->liquid_type))}}</font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">Quality type</font></td>
        <td align="left" valign="middle" bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New"><input  value="{{$project->quality}}" name="quality[]" /></font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New">Project Status</font></td>
        <td align="left" valign="middle" bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New">{{ucfirst(strtolower($project->status->status_name))}}</font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="23" align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000">Date of project</font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="middle" bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>

    @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New"></font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" color="#000000">Start</font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000">Year</font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">{{$project->start_date}}</font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="20" align="left" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Quarter</font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New">{{$project->start_date_quarter}}</font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" color="#000000">Completion</font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000">Year</font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">{{$project->completion_date}}</font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="21" align="left" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Quarter</font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>

        @if(count($projects)>0)
            @foreach($projects as $project)
                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New">
                        <input type="hidden" value="{{$project->id}}" name="id[]">
                        <select name="end_quarter[]" style="width:100%" >
                        @for($i=1; $i<=4; $i++)
                            <option value="{{$i}}" {{$project->end_quarter==$i ? 'selected' : ''}}>{{$i}}</option>
                            @endfor
                        </select>
                    </font></td>
            @endforeach
        @endif
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000">Total capacity increment (1,000 b/d)</font></td>
        <td align="right" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000" align="right" valign="bottom" bgcolor="#92CDDC" sdval="0" sdnum="1033;0;#,##0.00" id="capacity_increment"><font face="Courier New" color="#000000">{{$projects->sum('capacity_increment')}}</font></td>
        @foreach($projects as $project)
        <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000" align="left" valign="bottom" bgcolor="#92CDDC" sdnum="1033;0;#,##0.00" ><font face="Courier New" color="#000000"><input type="number"  name="capacity_increment[]" class="capacity_increment" value="{{$project->capacity_increment}}" ><br></font></td>
        @endforeach
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Total capex investment (Million US$)</font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF" sdval="0" sdnum="1033;0;#,##0.00" id="capex_investment"><font face="Courier New" color="#000000">{{$projects->sum('capex_investment')}}</font></td>
        @foreach($projects as $project)
            <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><input type="number"  name="capex_investment[]" class="capex_investment" value="{{$project->capex_investment}}" ><br></font></td>
        @endforeach

    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000">Additional information</font></td>
        <td align="right" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    </tbody></table>


    </div>
     <!-- ************************************************************************** -->
</form>
@endsection
@section('script')
<script>
    $(function(){
        $('.datepicker').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });


        $('.capacity_increment').keyup(function(){
            calculateTotal('capacity_increment');
        })

        $('.capex_investment').keyup(function(){
            calculateTotal('capex_investment');
        })

    })

    function calculateTotal(className){

        $total=$(`.${className}`).map(function(){ return this.value; });
        tt=0;
        $.each($total,function(index,element){
            tt +=parseFloat(element);
        });
        $(`#${className}`).text(tt);
    }
</script>
@endsection
