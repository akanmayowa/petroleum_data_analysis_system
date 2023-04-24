
<table>
	<thead>
		<tr>
            <th>Year</th>
            <th>Month</th>
            <th>Petitioner</th>
            <th>Petitionee</th>
            <th>Category</th>
            <th>Action Taken</th>
            <th>Status</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th> 
                    <th>{{$detail->petitioner}}</th>
                    <th>{{$detail->petitionee}}</th>
                    <th>{{$detail->category?$detail->category->category_name:''}}</th>
                    <th>{{$detail->action?$detail->action->action_name:''}}</th>
                    <th>{{$detail->status?$detail->status->status_name:''}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>