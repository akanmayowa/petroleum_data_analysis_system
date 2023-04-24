
<table>
	<thead>
		<tr>
        <th>Year</th>
        <th>Month</th>
        <th>Company</th>
        <th>Study Title</th>
        <th>Type</th>
        <th>Status</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
             <th>{{$detail->year}}</th>
             <th>{{$detail->month}}</th>
			       <th>{{$detail->company?$detail->company->company_name:''}}</th>
             <th>{{$detail->study_title}}</th>
             <th>{{$detail->type?$detail->type->type_name:''}}</th>
             <th>{{$detail->status?$detail->status->type_name:''}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>
