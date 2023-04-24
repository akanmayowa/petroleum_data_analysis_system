
<table>
	<thead>
		<tr>
            <th>Year</th>
            <th>Project Name</th>
            <th>Location</th>
            <th>Capacity <i class="units">(BPSD)</i> </th>   
            <th>Refinery Type </th>  
            <th>License Granted</th>                          
            <th>Commissioning Date</th>                           
            <th>License Validity</th>                          
            <th>License Expiry Date</th>                           
            <th>Status Remark</th> 
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
                    <th>{{$detail->year}}</th> 
                    <th>{{$detail->project_name}}</th> 
                    <th>{{$detail->field_id}} </th>  
                    <th data-toggle="tooltip" title="In BPSD">{{$detail->capacity}}</th> 
                    <th>{{$detail->refinery_type}}</th> 
                    <th>{{$detail->license_granted}}</th> 
                    <th>{{$detail->estimated_completion}}</th>
                    <th>{{$detail->validity?$detail->validity->status_name:''}}</th> 
                    <th>{{$detail->license_expiration_date}}</th> 
                    <th>{{$detail->status_remark}}</th>
                </tr>
			@endforeach
		@endif		
	</tbody>
</table>