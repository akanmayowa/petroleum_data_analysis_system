
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Stream</th>
			<th>Continent</th>
			<th>Country</th>
			<th>Company</th>
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
					<td>{{$detail->year}}</td>
					<td>{{$detail->stream?$detail->stream->stream_name:''}}</td>
					<td>{{$detail->continent?$detail->continent->continent_name:''}}</td>
					<td>{{$detail->country?$detail->country->country_name:''}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
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
					<td>{{$detail->stream_total}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>