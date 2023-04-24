@php  $total=0; @endphp
@for($i=1; $i<=4; $i++)

<tr>
    <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"></td>
    <td  align="center" valign=middle bgcolor="#FFFFFF"> </td>
    <td  align="right" valign=bottom bgcolor="{{$i%2==0 ? '#FFFFFF' : '#B8FFE3'}}"><font face="Courier New" color="#000000">Q{{$i}}</font></td>
    <td   align="center" valign=bottom bgcolor="{{$i%2==0 ? '#FFFFFF' : '#B8FFE3'}}" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{collect(@$data)->pluck("Q$i")->flatten()->sum()}}   </font></td>
    @foreach($headers as $key=>$header)

    <td  align="center" valign=bottom bgcolor="{{$i%2==0 ? '#FFFFFF' : '#B8FFE3'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"> <span class="{{$class."Q$i"}} "
                                                                                                                                                            id="{{$class."Q$i"}}{{$loop->index+1}}"> {{@$data[$header]["Q$i"]}} </span></font></td>
   @endforeach
</tr>
@endfor
<tr>
    <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
    <td  align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" size=3 color="#000000"><br></font></td>
    <td  align="right" valign=bottom bgcolor="#B8FFE3" sdval="2019" sdnum="1033;"><font face="Courier New" color="#000000">{{$year}}</font></td>
    <td   align="center" valign=bottom bgcolor="#B8FFE3" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{collect(@$data)->flatten()->sum()}}</font></td>
    @foreach($headers as $key=>$header)
    <td  align="center" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{collect(@$data[$header])->flatten()->sum()}}</font></td>
    @endforeach
</tr>