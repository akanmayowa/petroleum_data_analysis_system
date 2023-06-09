<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Company</th>
			<th>Description</th>
			<th>AG</th>			
			<th>NAG</th>			
			<th>Total</th>			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->description}}</td>
					<td>{{$detail->associated_gas}}</td>
					<td>{{$detail->non_associated_gas}}</td>
					<td>{{$detail->total_gas}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>