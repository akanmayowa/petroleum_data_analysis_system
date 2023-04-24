
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Sector</th>
			<th>Value</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->sector}}</td>
					<td>{{$detail->value}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>