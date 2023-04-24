<table>
	<thead>
		<tr>
			<th>Stream Code</th>
			<th>Stream Name</th>
			<th>Company</th>
			<th>Production Type</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->stream_code}}</td>
					<td>{{$detail->stream_name}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->production_types?$detail->production_types->production_type_name:''}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>