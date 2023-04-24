
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Laboratory Name</th>
            <th>Laboratory Services</th>
            <th>Zones</th>
            {{-- <th>Number of Accredited Lab</th> --}}
            <th>Request</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th>
                    <th>{{$detail->laboratory_name}}</th>
                    <th>{{$detail->laboratory_services}}</th> 
                    <th>{{$detail->field_office?$detail->field_office->field_office_name:''}}</th>
                    {{-- <th>{{$detail->no_of_accredited_lab}}</th>  --}}
                    <th>{{$detail->request_type}}</th> 
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>
