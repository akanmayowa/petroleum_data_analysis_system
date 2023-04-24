
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Field</th>
			<th>Type</th>
			<th>Number of Well</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->field?$detail->field->field_name:''}}</td>
					<td>{{$detail->type?$detail->type->type_name:''}}</td>
					<td>{{$detail->number_of_well}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>
