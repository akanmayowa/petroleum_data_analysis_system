@php  $total=0; @endphp
@for($i=1; $i<=4; $i++)
    @php  $total +=@$data["Q$i"]; @endphp
    <tr>
        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3 color="#000000"><br></font></td>
        <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" color="#000000">Q{{$i}}</font></td>
        <td style="border: 2px solid #ff0000; " align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font><b>&nbsp;&nbsp;{{@$data["Q$i"]}}</b></td>
        @foreach($streams as $key=>$stream)
        <td style="border: 2px solid #ff0000; " align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font>{{@$streamData[$key]["Q$i"]}}</td>
        @endforeach
    </tr>
@endfor
<tr>
    <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3 color="#000000"><br></font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3 color="#000000"><br></font></td>
    <td align="right" valign=bottom bgcolor="#B8FFE3" sdval="2019" sdnum="1033;"><font face="Courier New" color="#000000">{{$year}}</font></td>
    <td style="border: 2px solid #ff0000; " align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font>&nbsp;&nbsp;<b>{{$total}}</b></td>
    @foreach($streams as $key=>$stream)

    <td style="border: 2px solid #ff0000; " align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font><b>{{collect(@$streamData[$key])->flatten()->sum()}}</b></td>
    @endforeach
</tr>