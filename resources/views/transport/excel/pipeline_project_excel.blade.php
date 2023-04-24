
<table>
	<thead>
		<tr>
            <th>Year</th>
			<th>Pipeline</th>
            <th>Company</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>nominal Size (In)</th>   
            <th>Length (Km)</th>  
            <th>Process Fliud</th>                           
            <th>Start Date</th>                            
            <th>Commissioning Date</th>                            
            <th>Status</th>
			<th>Remark</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
                    <th>{{$detail->year}}</th> 
					<th>{{$detail->pipeline_name}}</th> 
                    @if($detail->company_id == 0)
                    <th>{{$detail->owner_details}}</th> 
                    @else                             
                    <th>@if($detail->owner) {{$detail->owner->company_name}} @endif</th>
                    @endif                     
                    <th>{{$detail->origin}}</th>
                    <th>{{$detail->destination}}</th> 
                    <th>{{$detail->nominal_size}}</th> 
                    <th>{{$detail->length}}</th> 
                    <th>{{$detail->process_fluid}}</th> 
                    <th>{{$detail->start_date}}</th>
                    <th>{{$detail->commissioning_date}}</th>
                    <th>@if($detail->status) {{$detail->status->status_name}} @endif</th> 
					<td>{{$detail->remark}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>