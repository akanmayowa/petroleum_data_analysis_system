
<table>
	<thead>
		<tr>
            <th>Year</th>
			<th>Facility</th>
            <th>Company</th>
            <th>Objective</th>
            <th>Service</th>
            <th>Phase</th>                             
            <th>Start Date</th>                            
            <th>Commissioning Date</th>      
			<th>Remark</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
                    <th>{{$detail->year}}</th> 
                    <th>{{$detail->facility_id}}</th>
                    <th>@if($detail->company) {{$detail->company->company_name}} @endif</th>                    
                    <th>{{$detail->objective}}</th>
                    <th>@if($detail->service) {{$detail->service->service_name}} @endif</th> 
                    <th>{{$detail->phase_id}}</th> 
                    <th>{{$detail->start_date}}</th>
                    <th>{{$detail->commissioning_date}}</th>
					<td>{{$detail->remark}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>