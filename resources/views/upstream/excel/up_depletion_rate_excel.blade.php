
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Company</th>
			<th>Contract</th>
			<th>Prev Oil + Condensate</th>
			<th>Prev Oil + Condensate</th>
			<th>Production</th>
			<th>Net Addition</th>
			<th>% Net Addition</th>
			<th>Depletion Rate</th>
			<th>Life Index</th>			
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
					<td>{{$detail->prev_oil_condensate}}</td>
					<td>{{$detail->curr_oil_condensate}}</td>
					<td>{{$detail->production}}</td>
					<td>{{$detail->net_addition}}</td>
					<td>{{$detail->percent_net_addition}}</td>
					<td>{{$detail->depletion_rate}}</td>
					<td>{{$detail->life_index}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>