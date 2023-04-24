<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Processing Unit</th>
            <th>Refinery</th>
            <th>Location</th>
            <th>Value</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}} </th>
                     <th>{{$detail->processing_unit}} </th>
                     <th>@if($detail->refinery) {{$detail->refinery->plant_location_name}} @endif</th>
                     <th>{{$detail->location}} </th>
                     <th>{{$detail->value}} </th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>