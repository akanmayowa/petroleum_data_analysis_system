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


    @include('opec.partials.searchHeader',['action'=>url('opecUpstream').'/manageUpstream','formId'=>'submitUpstream','url'=>url('opecUpstream')])
    <form method="POST"  id="submitUpstream">
        <input type="hidden" value="{{$year}}" name="year">
        <input type="hidden" value="{{Auth::user()->id}}" name="a_id">
        <input type="hidden" value="saveUpstream" name="type">


        <div>
            <div style="overflow-x: auto">

<table cellspacing="0" border="0">
    <colgroup span="2" width="64"></colgroup>
    <colgroup width="490"></colgroup>
    <colgroup width="64"></colgroup>
    <colgroup span="4" width="76"></colgroup>
    <colgroup width="127"></colgroup>
    <tbody><tr>
        <td height="20" align="left" valign="bottom"><font color="#000000"><br></font></td>
        <td align="left" valign="bottom"><font color="#000000"><br></font></td>
        <td align="left" valign="bottom"><font color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000">TOT</font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000">FIELD1</font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000">FIELD2</font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000">FIELD3</font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000">FIELD4</font></td>
        <td align="left" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#000000">FIELD5</font></td>
    </tr>
    <tr>
        <td colspan="3" rowspan="2" height="42" align="center" valign="middle" bgcolor="#92CDDC"><b><font face="Courier New" size="4" color="#000000">Table 2.1 Upstream</font></b></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="middle" bgcolor="#92CDDC"><u><font face="Courier New" size="3" color="#44546A">
                </font></u></td>
    </tr>
    <tr>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="middle" bgcolor="#92CDDC"><u><font face="Courier New" size="3" color="#44546A">

                </font></u></td>
    </tr>
    <tr>
        <td colspan="3" height="21" align="right" valign="bottom" bgcolor="#92CDDC"><font face="Courier New" color="#FFFFFF"><br></font></td>
        <td align="center" valign="middle" bgcolor="#92CDDC"><b><font face="Courier New">Total</font></b></td>
        <td align="center" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">FIELD 1</font></td>
        <td align="center" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">FIELD 2</font></td>
        <td align="center" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">FIELD 3</font></td>
        <td align="center" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">FIELD 4</font></td>
        <td align="center" valign="bottom" bgcolor="#92CDDC"><font face="Courier New">FIELD 5</font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New">Field name (name)</font></td>
        <td align="center" valign="middle" bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New">Onshore/Offshore</font></td>
        <td align="center" valign="middle" bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New">Company name</font></td>
        <td align="center" valign="middle" bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New">Company name (drilling)</font></td>
        <td align="center" valign="middle" bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New"><br></font></td>
    </tr>
    <tr>
        <td height="23" align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000">Reserves</font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="23" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000">Gravity (oAPI)</font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Sulphur content (wt. %)</font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000">Gas/oil ratio (number)</font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Quantity (mbbl)</font></td>
        <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign="bottom" bgcolor="#FFFFFF" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{$sumReserve}}</font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="23" align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000">Exploratory drilling</font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" color="#000000">Exploratory wells (number)</font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>

        @include('opec.partials.upstream',['id'=>1,'name'=>'exploratorywell','data'=>['Oil'=>collect($wellDrillings)->where('class_id',1)->sum('total'),'Total'=>collect($wellDrillings)->where('class_id',1)->sum('total')]])
    <tr>
        <td height="23" align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000">Development drilling</font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" color="#000000">Development wells (number)</font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.upstream',['id'=>5,'name'=>'developmentwell','data'=>['Oil'=>collect($wellDrillings)->where('type_id',1)->sum('total'),'Total'=>collect($wellDrillings)->where('type_id',1)->sum('total')]])
    <tr>
        <td height="24" align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000">Drilling rigs (number)</font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.upstream',['name'=>'drilling','product1'=>$product2,'data'=>$rigDispositions])

    <tr>
        <td height="24" align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000">Enhanced oil recovery</font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000">Production wells (number) </font></td>
        <td style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign="bottom" bgcolor="#DAEEF3" sdval="0" sdnum="1033;0;#,##0"><font face="Courier New" color="#000000"><input type="number" name="eor[]" value="{{@$eor[0]}}" /></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Injection wells (number)</font></td>
        <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign="bottom" bgcolor="#FFFFFF" sdval="0" sdnum="1033;0;#,##0"><font face="Courier New" color="#000000"><input type="number" name="eor[]" value="{{isset($eor[1]) ? $eor[1] : collect($wellDrillings)->whereIn('type_id',[1,3])->sum('total')}}" /></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000">EOR wells (number)</font></td>
        <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign="bottom" bgcolor="#DAEEF3" sdval="0" sdnum="1033;0;#,##0"><font face="Courier New" color="#000000"><input type="number" name="eor[]" value="{{@$eor[2]}}" /></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Estimated recoverable reserves without EOR (mbbl)</font></td>
        <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign="bottom" bgcolor="#FFFFFF" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><input type="number" name="eor[]" value="{{@$eor[3]}}" /></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000">Estimated recoverable reserves with EOR (mbbl)</font></td>
        <td style="border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign="bottom" bgcolor="#DAEEF3" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><input type="number" name="eor[]" value="{{@$eor[4]}}" /></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Initial recovery factor (number)</font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"></font><input type="number" name="eor[]" value="{{@$eor[5]}}" /></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3"><font face="Courier New" color="#000000">Increase in recovery factor (%)</font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><input type="number" name="eor[]" value="{{@$eor[6]}}" /><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Value of EOR investment (Million US$)</font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><input type="number" name="eor[]" value="{{@$eor[7]}}" /></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="23" colspan="3" align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" size="3" color="#000000">Production capacity and expansion plans (1,000 b/d)</font></td>

        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" colspan="3" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" color="#000000">Current capacity</font></td>
         <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#DAEEF3" sdval="2019" sdnum="1033;"><font face="Courier New" color="#000000">{{$year}}</font></td>
        <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign="bottom" bgcolor="#DAEEF3" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><input type="number" step="0.01" name="capacity_{{$year}}" value="{{@collect($upstreamData)->where('year',$year)->pluck('capacity')[0]}}"></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#DAEEF3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" color="#000000">Future capacity</font></td>
        <td align="left" valign="bottom" bgcolor="#B7DEE8"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
   @for($i=$year+1; $i<=$year+4; $i++)
    <tr>
        <td height="21" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF" sdval="2024" sdnum="1033;"><font face="Courier New" color="#000000">{{$i}}</font></td>
        <td style="border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign="bottom" bgcolor="{{$i%2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><input type="number" step="0.01" name="capacity_{{$i}}" value="{{@collect($upstreamData)->where('year',$i)->pluck('capacity')[0]}}"></font></td>
        <td align="left" valign="bottom" bgcolor="{{$i%2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$i%2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$i%2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$i%2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="{{$i%2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
       @endfor
    </tbody></table>


            </div></div></form>

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