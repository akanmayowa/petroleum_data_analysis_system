@php  $total=0;   @endphp
@for($i=1; $i<=4; $i++)
    @php $dataInternal=explode(',',@$data[$class."Q$i"]); $totalData=array_sum(@$dataInternal); @endphp
    <tr>
        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"></td>
        <td align="center" valign=middle bgcolor="#FFFFFF"></td>
        <td align="right" valign=bottom bgcolor="{{$i%2==0 ? '#FFFFFF' : '#B8FFE3'}}"><font face="Courier New"
                                                                                            color="#000000">Q{{$i}}</font>
        </td>
        <td align="center" valign=bottom bgcolor="{{$i%2==0 ? '#FFFFFF' : '#B8FFE3'}}" sdval="0"
            sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"> <span id="{{$class."Q$i"}}Total">{{$totalData}}</span>
            </font></td>
        @foreach($headers as $key=>$header)

            <td align="center" valign=bottom bgcolor="{{$i%2==0 ? '#FFFFFF' : '#B8FFE3'}}" sdnum="1033;0;#,##0.00"><font
                        face="Courier New" color="#000000"> <input @if(in_array($class,['statisticalDifference'])) readonly @endif style="width:100px" type="number" value="{{@$dataInternal[$loop->index]}}"
                                                                  name="{{$class."Q$i"}}[]" class="{{$class."Q$i"}} "
                                                                  id="{{$class."Q$i"}}{{$loop->index+1}}"></font></td>
        @endforeach
    </tr>
@endfor
<tr>
    <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
    </td>
    <td align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" size=3 color="#000000"><br></font></td>
    <td align="right" valign=bottom bgcolor="#B8FFE3" sdval="2019" sdnum="1033;"><font face="Courier New"
                                                                                       color="#000000">{{$year}}</font>
    </td>
    <td align="center" valign=bottom bgcolor="#B8FFE3" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"> <span
                    id="{{$class}}TotalYear">0</span></font></td>
    @foreach($headers as $key=>$header)
        <td align="center" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                         color="#000000"><span
                        id="{{$class}}Total{{$loop->index+1}}">0</span></font></td>
    @endforeach
</tr>

<script>
    //dejj
    $(function () {

        @for($i=1; $i<=4; $i++)

        $('.{{$class."Q$i"}}').keyup(function () {

            let sum = $('.{{$class."Q$i"}}').map(function () {   return parseFloat(this.value)   }).get();

            total = yearTotal = 0;
            $.each(sum, function (index, element) {
                total += defaultIsNaN(element);
                idIndex = index + 1;
                individualTotal = defaultIsNaN($('#{{$class}}Q1' + idIndex).val()) + defaultIsNaN($('#{{$class}}Q2' + idIndex).val()) + defaultIsNaN($('#{{$class}}Q3' + idIndex).val()) + defaultIsNaN($('#{{$class}}Q4' + idIndex).val())
                yearTotal += defaultIsNaN(individualTotal);
                $('#{{$class}}Total' + idIndex).text(defaultIsNaN(individualTotal));

                // ['grossRef','reciepts','imports','exports','producttrans','interproduct','stockchange','demand']

                $statdiff= getValue('#grossRefQ{{$i}}'+idIndex) + getValue('#recieptsQ{{$i}}'+idIndex) + getValue('#importsQ{{$i}}'+idIndex) - getValue('#exportsQ{{$i}}'+idIndex) + getValue('#producttransQ{{$i}}'+idIndex) +getValue('#interproductQ{{$i}}'+idIndex) - getValue('#stockchangeQ{{$i}}'+idIndex) / getQday({{$i-1}}) - getValue('#demandQ{{$i}}'+idIndex) ;
               {{--console.log(getValue('#demandQ{{$i}}'+idIndex));--}}
                $('#statisticalDifferenceQ{{$i}}' + idIndex).val(defaultIsNaN($statdiff));

            });

            $('#{{$class}}TotalYear').text(yearTotal);
            $("#{{$class."Q$i"}}Total").text(total);

        });
        $('.{{$class."Q$i"}}').trigger('keyup')
        @endfor




    })


    function getQday($i) {
        if ($i == 0) {
            return {{$Q_Day[0]}}
        }
        if ($i == 1) {
            return {{$Q_Day[1]}}
        }
        if ($i == 2) {
            return {{$Q_Day[2]}}
        }
        if ($i == 3) {
            return {{$Q_Day[3]}}
        }
    }

    function getValue(id) {
        return isNaN(parseFloat($(`${id}`).text())) ? parseFloat($(`${id}`).val()) : parseFloat($(`${id}`).text());
    }
    function defaultIsNaN(value){
        return isNaN(parseFloat(value)) ? 0 :  parseFloat(parseFloat(value).toFixed(2));
    }
</script>