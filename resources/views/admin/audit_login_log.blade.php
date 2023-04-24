

<div class="table-responsive">
    <table class="table table-bordered table-dark table-hover table-sm">
        <thead>
          <tr>
            <th>User</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
            @if($users_last_log)
                 @forelse($users_last_log as $users_last_logs)
                      <tr>
                        <th>@if($users_last_logs->user) {{$users_last_logs->user->name}} @endif</th>
                        <th>{{\Carbon\Carbon::parse($users_last_logs->last_login)->format('M d, Y h:i:s A')}}</t>
                      </tr>
                 @empty
                 
                    <tr>
                        <th colspan="2"> No Login Log Found For User </th>
                    </tr>

                @endforelse
            @endif
        </tbody>
    </table> 
</div>

