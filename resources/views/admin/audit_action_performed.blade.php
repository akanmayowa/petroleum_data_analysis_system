

<div class="table-responsive">
    <table class="table table-bordered table-dark table-hover table-sm">
        <thead>
          <tr>
            <th>Division</th>
            <th>Record</th>
            <th>Action</th>
            <th>When</th>
          </tr>
        </thead>
        <tbody>
            @if($users_actions)
                 @forelse($users_actions as $users_action)
                      <tr>
                        <th>{{$users_action->section}}</th>
                        <th>{{$users_action->record}}</th>
                        <th>{{$users_action->action}}</th>
                        <th>{{$users_action->created_at->format('M d, Y h:i:s A')}}</th>
                      </tr>
                 @empty
                 
                    <tr>
                        <th colspan="2"> No Action Performed By This User </th>
                     </tr>

                @endforelse
            @endif
        </tbody>
    </table> 
</div>


