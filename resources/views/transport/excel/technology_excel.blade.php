
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Technology</th>
            <th>Application</th>
            <th>Adoptation Date</th>
            <th>Company</th>
            <th>Location/Field</th>
            <th>Status</th>                 
			<th>Remark</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
                    <th>{{$detail->year}}</th>
                    <th>{{$detail->technology}}</th>
                    <th>{{$detail->application}}</th>
                    <th>{{$detail->adoptation_date}}</th>
                    <th>{{$detail->company_id}}</th>
                    {{-- @if($detail->company_id == 0)
                    <th>{{$detail->owner_details}}</th> 
                    @else                             
                    <th>@if($detail->company) {{$detail->company->company_name}} @endif</th> 
                    @endif --}}
                    <th>{{$detail->location_id}}</th> 
                    <th>{{$detail->status}}</th>
					<td>{{$detail->remark}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>