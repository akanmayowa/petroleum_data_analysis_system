
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Company</th>
            <th>Field</th>
            <th>Anticipated Production Rate (Bopd/MMscf/d)</th>
            <th>Expected Reserves (MMSTB/BSCF)</th>
            <th>Commencement Date</th>
            <th>Number of Well</th>
            <th>Remarks/Status</th>
			
			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th> 
                    <th>@if($detail->company) {{$detail->company->company_name}} @endif </th> 
                    <th>@if($detail->field) {{$detail->field->field_name}} @endif </th> 
                    <th>{{$detail->production_rate}}</th> 
                    <th>{{$detail->expected_reserves}}</th> 
                    <th>{{$detail->commencement_date}}</th> 
                    <th>{{$detail->no_of_well}}</th> 
                    <th>{{$detail->remark}}</th> 
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>