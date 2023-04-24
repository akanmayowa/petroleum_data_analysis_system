
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Field</th>
            <th>Type</th>
            <th>Company</th>
            <th>Block</th>
            <th>Wells</th>
            <th>Processing Facility</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
                    <th>{{$detail->year}}</th>  
                    <th>{{$detail->month}}</th> 
                    <th>@if($detail->field) {{$detail->field->field_name}} @endif </th> 
                    <th>
                        @if($detail->type_id == 1) Repairs 
                        @elseif($detail->type_id == 2) Zone Change/Zone Isolation 
                        @elseif($detail->type_id == 3) Re-Completion
                        @elseif($detail->type_id == 4) Logging/PLT
                        @elseif($detail->type_id == 5) Cement Squeeze
                        @else N/A @endif 
                    </th> 
                    <th>@if($detail->company) {{$detail->company->company_name}} @endif </th> 
                    <th>@if($detail->concession) {{$detail->concession->concession_name}} @endif </th> 
                    <th>{{$detail->well}}</th>  
                    <th>@if($detail->facility) {{$detail->facility->facility_name}} @endif </th> 
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>
