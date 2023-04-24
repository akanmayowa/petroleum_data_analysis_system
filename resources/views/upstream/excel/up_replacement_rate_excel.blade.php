
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Contract</th>
			<th>Oil Condensate Reserves</th>
			<th>Oil Condensate Production</th>			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->contract?$detail->contract->contract_name:''}}</td>
					<td>{{$detail->oil_condensate_reserve}}</td>
					<td>{{$detail->oil_condensate_production}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>