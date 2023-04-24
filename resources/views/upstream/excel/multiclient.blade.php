<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Company</th>
            <th>Survey Name</th>
            <th>Aggreement Date</th>
            <th>Area Of Survey</th>
            <th>Type Of Survey</th>
            <th>Quantum Of Survey</th>
            <th>Year Of Survey</th>
			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->survey_name}}</td>
					<td>{{$detail->agreement_date}}</td>
					<td>{{$detail->area_of_survey?$detail->area_of_survey->area_of_survey_name:''}}</td>
					<td>{{$detail->type_of_survey?$detail->type_of_survey->type_of_survey_name:''}}</td>
					<td>{{$detail->quantum_of_survey}}</td>
					<td>{{$detail->year_of_survey}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>