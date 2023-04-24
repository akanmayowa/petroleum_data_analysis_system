    

       <table class="table table-hover mb-0" id="login_table">
            <thead>
            <tr style="background-color: #ccc">
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Login Dates</th>
            </tr>

            </thead>
            <tbody>
                @if($LOGIN)
                    @foreach($LOGIN as $LOGINS)
                        <tr>
                            <td> @if($LOGINS->user) {{$LOGINS->user->name}} @endif </td>
                            <td> @if($LOGINS->user) {{$LOGINS->user->email}} @endif </td>
                            <td> @if($LOGINS->user) {{$LOGINS->user->role_obj->role_name}} @endif </td>
                            <td> {{\Carbon\Carbon::parse($LOGINS->last_login)->diffForHumans()}} </td>                            
                        </tr>

                    @endforeach
                @endif
            </tbody>
        </table>
        {{$LOGIN->render() }} 



<script type="text/javascript">
        //SORT SCRIPT
    sortAscDesc();
</script>