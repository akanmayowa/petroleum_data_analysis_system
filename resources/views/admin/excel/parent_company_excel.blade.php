<table>
	<thead>
		<tr>
			<th>Company Code</th>
			<th>Company</th>
			<th>ddress</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->company_code}}</td>
					<td>{{$detail->company_name}}</td>
					<td>{{$detail->address}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>