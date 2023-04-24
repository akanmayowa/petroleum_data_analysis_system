<table>
	<thead>
		<tr>
			<th>Company</th>
			<th>Field</th>
			<th>OML Number</th>
			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->field?$detail->field->field_name:''}}</td>
					<td>{{$detail->blocks}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>