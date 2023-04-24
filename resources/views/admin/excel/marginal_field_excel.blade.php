<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Company</th>
			<th>Field</th>
			<th>Block Name</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->field?$detail->field->field_name:''}}</td>
					<td>{{$detail->blocks}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>