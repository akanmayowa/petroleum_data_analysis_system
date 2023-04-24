
<table>
	<thead>
		<tr>
			<th>Stream</th>
			<th>Company</th>
			<th>Production Type</th>
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
			<th>API</th>
			<th>Total</th>
			
			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->stream?$detail->stream->stream_name:''}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->prod_type?$detail->prod_type->production_type_name:''}}</td>
					<td>{{$detail->year}}</td>
					<td>{{number_format($detail->january, 2)}}</td>
					<td>{{number_format($detail->febuary, 2)}}</td>
					<td>{{number_format($detail->march, 2)}}</td>
					<td>{{number_format($detail->april, 2)}}</td>
					<td>{{number_format($detail->may, 2)}}</td>
					<td>{{number_format($detail->june, 2)}}</td>
					<td>{{number_format($detail->july, 2)}}</td>
					<td>{{number_format($detail->august, 2)}}</td>
					<td>{{number_format($detail->september, 2)}}</td>
					<td>{{number_format($detail->october, 2)}}</td>
					<td>{{number_format($detail->november, 2)}}</td>
					<td>{{number_format($detail->december, 2)}}</td>
					<td>{{number_format($detail->api, 2)}}</td>
					<td>{{number_format($detail->stream_total, 2)}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>