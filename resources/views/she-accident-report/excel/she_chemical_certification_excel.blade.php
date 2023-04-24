
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Company</th>
            <th>Chemical Name</th>
            <th>Certificate Category</th>
            <th>Chemical Type</th>
            <th>Certification Date</th>
            <th>Status</th>
            <th>Remark</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
                    <th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th>
                    @if($detail->company_id == 0)
                    <th>{{$detail->others}}</th> 
                    @else                             
                    <th>@if($detail->company) {{substr($detail->company->company_name, 0, 30)}}... @endif </th> 
                    @endif
                    <th>{{$detail->chemical_name}}</th> 
                    <th>{{$detail->category?$detail->category->category_name:''}}</th>
                    <th>{{$detail->chemical_type}}</th>
                    <th>{{$detail->certification_date}}</th>
                    <th>{{$detail->status_id}}</th>
                    <th>{{$detail->remark}}</th>
                </tr>
			@endforeach
		@endif		
	</tbody>
</table>