
<table>
	<thead>
		<tr>
			<th>Stream</th>
			<th>Company</th>
			<th>Contract</th>
			<th>Sulphur Content</th>
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
					<td>{{$detail->contract?$detail->contract->contract_name:''}}</td>
					<td>{{$detail->sulphur_content}}</td>
					<td>{{$detail->prod_type?$detail->prod_type->production_type_name:''}}</td>
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
					<td>{{$detail->api}}</td>
					<td>{{$detail->stream_total}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>