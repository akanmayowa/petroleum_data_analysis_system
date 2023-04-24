
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Company</th>
			<th>Performance Obligation</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->performance_obligation}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>