
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Equity Holder</th>
            <th>Terminal</th>
            <th>Product</th>
            <th>No of Vessel<i class="units"></i></th>
            <th>Volume<i class="units"> MT</i></th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th>
                    <th>{{$detail->equity_holder_id}}</th> 
                    <th>{{$detail->stream?$detail->stream->stream_name:''}}</th>
                    <th>{{$detail->product?$detail->product->product_name:''}}</th>
                    <th data-toggle="tooltip" title="">{{$detail->no_of_vessel}}</th>
                    <th data-toggle="tooltip" title="Unit in MT">{{$detail->volume}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>