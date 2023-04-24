
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Company</th>
			<th>Field</th>
			<th>Associated Gas</th>
			<th>Non Associated Gas</th>
			<th>Total</th>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->field?$detail->field->field_name:''}}</td>
					<td>{{$detail->ag}}</td>
					<td>{{$detail->nag}}</td>
					<td>{{$detail->total}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>