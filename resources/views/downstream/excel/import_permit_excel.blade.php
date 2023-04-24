
<table>
	<thead>
		<tr>
			<th>Market Segment</th>
			<th>Product</th>
			<th>Year</th>
			<th>Jan</th>
			<th>Feb</th>
			<th>Mar</th>
			<th>Apr</th>
			<th>May</th>
			<th>Jun</th>
			<th>Jul</th>
			<th>Aug</th>
			<th>Sep</th>
			<th>Oct</th>
			<th>Nov</th>
			<th>Dec</th>
			<th>Total</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->market_segment?$detail->market_segment->market_segment_name:''}}</td>
					<td>{{$detail->product?$detail->product->product_name:''}}</td>
					<td>{{$detail->year}}</td>
					<td>{{$detail->january}}</td>
					<td>{{$detail->febuary}}</td>
					<td>{{$detail->march}}</td>
					<td>{{$detail->april}}</td>
					<td>{{$detail->may}}</td>
					<td>{{$detail->june}}</td>
					<td>{{$detail->july}}</td>
					<td>{{$detail->august}}</td>
					<td>{{$detail->september}}</td>
					<td>{{$detail->october}}</td>
					<td>{{$detail->november}}</td>
					<td>{{$detail->december}}</td>
					<td>{{$detail->total}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>