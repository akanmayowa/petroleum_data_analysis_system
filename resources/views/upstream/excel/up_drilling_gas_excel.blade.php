
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Field</th>
            <th>Company</th>
            <th>Concession</th>
            <th>Well</th>
            <th>Type</th>
            <th>Terrain</th>
            <th>Facility</th>
            <th>Reserves (Bscf)</th>
            <th>Off-Take (MMSCFD)</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th> 
                    <th>{{$detail->month}}</th> 
                    <th>@if($detail->field) {{$detail->field->field_name}} @endif </th> 
                    <th>@if($detail->company) {{$detail->company->company_name}} @endif </th> 
                    <th>@if($detail->concession) {{$detail->concession->concession_name}} @endif </th> 
                    <th>{{$detail->well}}</th> 
                    <th>
                        @if($detail->type_id == 1)Appraisal/ Development
                        @elseif($detail->type_id == 2)Initial Completion @else @endif
                    </th> 
                    <th>@if($detail->terrain) {{$detail->terrain->terrain_name}} @endif </th>
                    <th>@if($detail->facility) {{$detail->facility->facility_name}} @endif </th>
                    <th>{{$detail->reserves}}</th> 
                    <th>{{$detail->off_take}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>