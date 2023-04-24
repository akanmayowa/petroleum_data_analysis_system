
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Incidents</th>
            <th>Work Related</th>
            <th>Non Work Related</th>
            <th>Fatal Incident</th>
            <th>Non Fatal Incident</th>
            <th>Work Related Fatal Incident</th>
            <th>Non Work Related Fatal Incident</th>
            <th>Fatality</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th>
                    <th>{{$detail->incidents}}</th> 
                    <th>{{$detail->work_related}}</th>
                    <th>{{$detail->non_work_related}}</th>
                    <th>{{$detail->fatal_incident}}</th>
                    <th>{{$detail->non_fatal_incident}}</th>
                    <th>{{$detail->work_related_fatal_incident}}</th> 
                    <th>{{$detail->non_work_related_fatal_incident}}</th>
                    <th>{{$detail->fatality}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>