
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Terrain</th>
			<th>Class</th>
			<th>Type</th>
			<th>Contract</th>
			<th>No of Wells</th>
			
			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->terrain?$detail->terrain->terrain_name:''}}</td>
					<td>{{$detail->class?$detail->class->class_name:''}}</td>
					<td>{{$detail->type?$detail->type->type_name:''}}</td>
					<td>{{$detail->contract?$detail->contract->contract_name:''}}</td>
					<td>{{$detail->no_of_well}}</td>
					
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>
