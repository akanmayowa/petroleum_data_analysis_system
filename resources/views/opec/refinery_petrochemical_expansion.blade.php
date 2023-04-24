@extends('layouts.app')

@section('content')



    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    @if(!request()->has('excel'))
        <style type="text/css">
            body, div, table, thead, tbody, tfoot, tr, th, td, p {
                font-family: "Calibri";
                font-size: x-small
            }
            .fixed_headers {
                width: 750px;
                table-layout: fixed;
                border-collapse: collapse;
            }

            .fixed_headers th,
            .fixed_headers td {
                padding: 5px;
                text-align: left;
            }
            .fixed_headers td:nth-child(1),
            .fixed_headers th:nth-child(1) {
                min-width: 200px;
            }
            .fixed_headers td:nth-child(2),
            .fixed_headers th:nth-child(2) {
                min-width: 200px;
            }
            .fixed_headers td:nth-child(3),
            .fixed_headers th:nth-child(3) {
                width: 350px;
            }

            .fixed_headers thead tr {
                display: block;
                position: relative;
            }
            .fixed_headers tbody {
                display: block;
                overflow: auto;
                width: 100%;
                height: 300px;
            }

            .old_ie_wrapper {
                height: 300px;
                width: 750px;
                overflow-x: hidden;
                overflow-y: auto;
            }
            .old_ie_wrapper tbody {
                height: auto;
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


    @include('opec.partials.searchHeader',['action'=>url('opecRefineryPetrochemical').'/manageRefineryPetrochemical','formId'=>'submitRefineryPetrochemical','url'=>url('opecRefineryPetrochemical')])
    <form method="POST"  id="submitRefineryPetrochemical">
        <input type="hidden" value="{{$year}}" name="year">
        <input type="hidden" value="{{Auth::user()->id}}" name="a_id">
        <input type="hidden" value="saveRefineryPetrochemical" name="type">

        <div>
            <div style="overflow-x: auto">

            <table cellspacing="0" border="1">
    <colgroup width="235"></colgroup>
    <colgroup span="2" width="148"></colgroup>
    <colgroup span="2" width="116"></colgroup>
    <colgroup width="145"></colgroup>
    <colgroup span="5" width="116"></colgroup>
    <tbody><tr>
        <td colspan="2" rowspan="2" height="56" align="center" valign="middle" bgcolor="#92CDDC"><b><font face="Courier New" size="4" color="#000000">Table 2.4 Refinery and Petrochemical expansions</font></b></td>
        <td align="center" valign="middle" bgcolor="#92CDDC"><b><font face="Courier New" size="4" color="#000000"><br></font></b></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#D9D9D9"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="middle" bgcolor="#D9D9D9"><u><font face="Courier New" size="3" color="#44546A"><br></font></u></td>
    </tr>
    <tr>
        <td align="center" valign="middle" bgcolor="#92CDDC"><b><font face="Courier New" size="4" color="#000000"><br></font></b></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="middle" bgcolor="#D9D9D9"><u><font face="Courier New" size="3" color="#44546A"><br></font></u></td>
    </tr>
    <tr>
        <td rowspan="3" height="61" align="center" valign="middle" bgcolor="#B7DEE8"><font face="Courier New"><br></font></td>
        <td rowspan="3" align="center" valign="middle" bgcolor="#B7DEE8"><font face="Courier New">Plant<br>site</font></td>
        <td rowspan="3" align="center" valign="middle" bgcolor="#B7DEE8"><font face="Courier New">Plant<br>name</font></td>
        <td rowspan="3" align="center" valign="middle" bgcolor="#B7DEE8"><font face="Courier New">Plant<br>type</font></td>
        <td rowspan="3" align="center" valign="middle" bgcolor="#B7DEE8"><font face="Courier New">Project description by unit</font></td>
        <td rowspan="3" align="center" valign="middle" bgcolor="#B7DEE8"><font face="Courier New">Capacity<br>by unit</font></td>
        <td rowspan="3" align="center" valign="middle" bgcolor="#B7DEE8"><font face="Courier New">Feed</font></td>
        <td rowspan="3" align="center" valign="middle" bgcolor="#B7DEE8"><font face="Courier New">Output<br>yield</font></td>
        <td rowspan="3" align="center" valign="middle" bgcolor="#B7DEE8"><font face="Courier New">Status</font></td>
        <td colspan="2" align="center" valign="middle" bgcolor="#B7DEE8"><i><font face="Courier New">Completion</font></i></td>
    </tr>
    <tr>
        <td style="border-left: 1px solid #000000; border-right: 1px dotted #808080" rowspan="2" align="center" valign="middle" bgcolor="#B7DEE8"><font face="Courier New">Starting<br>year</font></td>
        <td style="border-left: 1px dotted #808080" rowspan="2" align="center" valign="middle" bgcolor="#B7DEE8"><font face="Courier New">Estimated completion</font></td>
    </tr>
    <tr>
    </tr>
    <tr>
        <td height="23" align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000">Refineries</font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-left: 1px solid #000000; border-right: 1px dotted #808080" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-left: 1px dotted #808080" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-left: 1px solid #000000; border-right: 1px dotted #808080" align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-left: 1px dotted #808080" align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="23" align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000">Petrochemical plants</font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
    </tr>

    @foreach($down_petrochemical_plant_projects as $plant_project)
    <tr>
        <td height="20" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$loop->index%2==0? '#DAEEF3' : '#FFFFFF'}}"><font face="Courier New" color="#000000">{{$plant_project->location}}<br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$loop->index%2==0? '#DAEEF3' : '#FFFFFF'}}"><font face="Courier New" color="#000000">{{$plant_project->plant_name}}<br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$loop->index%2==0? '#DAEEF3' : '#FFFFFF'}}"><font face="Courier New" color="#000000">{{$plant_project->plant_type}}<br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$loop->index%2==0? '#DAEEF3' : '#FFFFFF'}}"><font face="Courier New" color="#000000">{{$plant_project->project_desc_by_unit}}<br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$loop->index%2==0? '#DAEEF3' : '#FFFFFF'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{$plant_project->capacity_by_unit}}<br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$loop->index%2==0? '#DAEEF3' : '#FFFFFF'}}"><font face="Courier New" color="#000000">{{$plant_project->feed}}<br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$loop->index%2==0? '#DAEEF3' : '#FFFFFF'}}"><font face="Courier New" color="#000000">{{$plant_project->output_yield}}<br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$loop->index%2==0? '#DAEEF3' : '#FFFFFF'}}"><font face="Courier New" color="#000000">{{$plant_project->status}}<br></font></td>
        <td style="border-left: 1px solid #000000; border-right: 1px dotted #808080" align="left" valign="bottom" bgcolor="{{$loop->index%2==0? '#DAEEF3' : '#FFFFFF'}}"><font face="Courier New" color="#000000">{{$plant_project->start_year}}<br></font></td>
        <td style="border-left: 1px dotted #808080" align="left" valign="bottom" bgcolor="{{$loop->index%2==0? '#DAEEF3' : '#FFFFFF'}}"><font face="Courier New" color="#000000">{{$plant_project->
estimated_completion}}<br></font></td>
    </tr>
    @endforeach


    </tbody></table>


            </div>
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
        })
    </script>
@endsection

