
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Company</th>
			<th>Contract</th>
			<th>Value</th>
			
			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->contract?$detail->contract->contract_name:''}}</td>
					<td>{{$detail->value}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>