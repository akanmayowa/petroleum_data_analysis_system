
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Alignment</th>
			<th>Program Priority</th>
			<th>Task & Target</th>
			<th>KPI</th>
			<th>Critical Milestone</th>
			<th>Timeline</th>
			<th>Division</th>
			<th>Critical Path Activity</th>
			<th>Acheievement Status</th>
			<th>Restricting Factor</th>
			<th>Cost Benefit Factor</th>
			<th>Key Recovery Plan</th>
			<th>Status</th>
			<th>Monitored By</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->alignment?$detail->alignment->alignment_name:''}}</td>
					<td>{{$detail->program_priority?$detail->program_priority->program_priority_name:''}}</td>
					<td>{{$detail->task_target?$detail->task_target->task_target_name:''}}</td>
					<td>{{$detail->kpi_target?$detail->kpi_target->kpi_name:''}}</td>
					<td>{{$detail->critical_milestone?$detail->critical_milestone->critical_milestone_name:''}}</td>
					<td>{{$detail->timeline?$detail->timeline->timeline_name:''}}</td>
					<td>{{$detail->division?$detail->division->division_name:''}}</td>
					<td>{{$detail->critical_path_activity}}</td>
					<td>{{$detail->achievement_status?$detail->achievement_status->achievement_status_name:''}}</td>
					<td>{{$detail->restricting_factors?$detail->restricting_factors->restricting_factor_name:''}}</td>
					<td>{{$detail->cost_benefit_factor}}</td>
					<td>{{$detail->key_recovery_plan?$detail->key_recovery_plan->key_recovery_plan_name:''}}</td>
					<td>{{$detail->status_category?$detail->status_category->status:''}}</td>
					<td>{{$detail->monitored_by}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>