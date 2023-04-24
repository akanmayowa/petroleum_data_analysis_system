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


    @include('opec.partials.searchHeader',['action'=>url('opecExportByDestination').'/manageExportByDestination','formId'=>'submitExportByDestination','url'=>url('opecExportByDestination')])
    <form method="POST" id="submitExportByDestination">
        <input type="hidden" value="{{$year}}" name="year">
        <input type="hidden" value="{{Auth::user()->id}}" name="a_id">
        <input type="hidden" value="saveExportByDestination" name="type">


        <div>
            <div style="overflow-x: auto">

                <table cellspacing="0" border="1">
                    <colgroup span="2" width="65"></colgroup>
                    <colgroup width="389"></colgroup>
                    <colgroup span="2" width="116"></colgroup>
                    <colgroup width="106"></colgroup>
                    <colgroup span="3" width="116"></colgroup>
                    <colgroup span="2" width="94"></colgroup>
                    <tbody><tr>
                        <td colspan="3" rowspan="2" height="40" align="center" valign="middle" bgcolor="#5DD289"><b><font face="Courier New" size="4" color="#000000">Table 1.6 Exports by destination</font></b></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    </tr>
{{--                    <tr>--}}
{{--                        <td height="20" align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New" color="#000000"><br></font></td>--}}
{{--                        <td align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New" color="#000000"><br></font></td>--}}
{{--                        <td align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New"><br></font></td>--}}
{{--                        <td style="border-right: 1px solid #000000" colspan="6" align="center" valign="middle" bgcolor="#5DD289"><font face="Courier New">Crude oil</font></td>--}}
{{--                        <td rowspan="2" align="center" valign="middle" bgcolor="#5DD289"><font face="Courier New">NGL</font></td>--}}
{{--                        <td style="border-right: 2px solid #000000" rowspan="2" align="center" valign="middle" bgcolor="#5DD289"><font face="Courier New">Other primary</font></td>--}}
{{--                    </tr>--}}
                    <tr>
                        <td height="21" align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#5DD289"><b><font face="Courier New">Total</font></b></td>
                        @foreach($streamHeaders as $stream_id=>$stream)
                        <td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New"></font></td>
                        @endforeach
{{--                        <td height="20" align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New" color="#000000"><br></font></td>--}}
{{--                        <td align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New" color="#000000"><br></font></td>--}}
{{--                        <td align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New"><br></font></td>--}}
{{--                        <td style="border-right: 1px solid #000000" colspan="6" align="center" valign="middle" bgcolor="#5DD289"><font face="Courier New">Crude oil</font></td>--}}
{{--                        <td rowspan="2" align="center" valign="middle" bgcolor="#5DD289"><font face="Courier New">NGL</font></td>--}}
{{--                        <td style="border-right: 2px solid #000000" rowspan="2" align="center" valign="middle" bgcolor="#5DD289"><font face="Courier New">Other primary</font></td>--}}

                    </tr>
                    <tr>
                        <td height="23" align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        <td align="right" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000">Major crude stream (name)</font></td>
                        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" size="3" color="#000000"><br></font></td>
{{--                        <td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>--}}
                        @foreach($streamHeaders as $stream_id=>$stream)
                        <td align="left" style="border:solid 1px;" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000">{{$stream}}<br></font></td>
                             @endforeach
                               </tr>
                    <tr>
                        <td height="23" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Specification</font></td>
                        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                        <td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                        <td style="border-right: 1px solid #000000" align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="23" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="right" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" color="#000000">Gravity (oAPI)</font></td>
                        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                        @foreach($streamHeaders as $stream_id=>$stream)
                        <td style="border-left: 0px solid #000000" align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                         @endforeach
                           </tr>
                    <tr>
                        <td height="20" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Sulphur content (%)</font></td>
                        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                        <td style="border-left: 1px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
                        <td style="border-right: 1px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="24" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Exports by destination  (1,000 b/d)</font></td>
                        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        <td align="right" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        @foreach($streamHeaders as $stream_id=>$stream)
                        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                            @endforeach

                    </tr>
                    <tr>
                        <td height="24" align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        <td align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        <td align="right" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000">Total</font></td>
                        <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000" align="right" valign="bottom" bgcolor="#B8FFE3" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" size="3" color="#000000">{{collect($streamDatas)->sum('total')}}</font></td>

                    @foreach($streamHeaders as $stream_id=>$stream)
                        <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000" align="right" valign="bottom" bgcolor="#B8FFE3" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" size="3" color="#000000">{{collect($streamDatas)->where('stream_id',$stream_id)->sum('total')}}</font></td>
                    @endforeach
                    </tr>
                    <tr>
                        <td height="24" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Regions</font></td>
                        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        <td align="right" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        @foreach($streamHeaders as $stream_id=>$stream)
                        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                       @endforeach
                           </tr>
                    <?php $i=0; ?>
        @foreach($regions as $region)
                    <tr>
                        <td height="23" align="left" valign="bottom" bgcolor="#FFFFFF"><b><font face="Courier New" size="3" color="#000000"><br></font></b></td>
                        <td align="left" valign="bottom" bgcolor="#B8FFE3"><b><font face="Courier New" size="3" color="#000000"><br></font></b></td>
                        <td align="right" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000">{{$region->name}}</font></td>
                        <td style="" align="right" valign="bottom" bgcolor="{{$i%2==0 ? '#FFFFFF' : '#B8FFE3' }}" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" size="3" color="#000000">{{collect($streamDatas)->where('country.region_id',$region->id)->sum('total')}}</font></td>
                    @foreach($streamHeaders as $stream_id=>$stream)
                        <td style="" align="right" valign="bottom" bgcolor="{{$i%2==0 ? '#FFFFFF' : '#B8FFE3' }}" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" size="3" color="#000000">{{collect($streamDatas)->where('country.region_id',$region->id)->where('stream_id',$stream_id)->sum('total')}}</font></td>
                        @endforeach
                    </tr>
            <?php $i++ ?>
        @endforeach

                    <tr>
                        <td height="30" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Countries</font></td>
                        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        <td align="right" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000"><br></font></td>
                        @foreach($streamHeaders as $stream_id=>$stream)
                        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                       @endforeach
                              </tr>
                    <?php $i=0; ?>
                    @foreach($countries as $country_id=>$country)
                    <tr>
                        <td height="30" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="1" color="#000000"><br></font></td>
                        <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" size="7" color="#000000"><br></font></td>
                        <td align="right" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" color="#000000">{{$country}}</font></td>
                        <td align="right" valign="bottom"  bgcolor="{{$i%2==0 ? '#FFFFFF' : '#B8FFE3' }}" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{collect($streamDatas)->where('country_id',$country_id)->sum('total')}}</font></td>

                    @foreach($streamHeaders as $stream_id=>$stream)
                            <td align="right" valign="bottom"  bgcolor="{{$i%2==0 ? '#FFFFFF' : '#B8FFE3' }}" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{collect($streamDatas)->where('country_id',$country_id)->where('stream_id',$stream_id)->sum('total')}}</font></td>
                         @endforeach
                            </tr>
                    <?php $i++ ?>
                    @endforeach
                    </tbody></table>


            </div>
        </div>
        <!-- ************************************************************************** -->
    </form>
@endsection
@section('script')
    <script>
        $(function () {


            $('.datepicker').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            })
 
            })




            </script>
    @endsection