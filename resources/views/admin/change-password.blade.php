@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body col-md-4">

                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Change Password </h4>

                <form action="{{route('admin.update_password')}}" method="post">       
                   {{ csrf_field() }}     <input type="hidden" name="id" id="id" value="{{\Auth::user()->id}}">
                    <p> <b style="color:green">Email</b></p>
                    <input type="email" placeholder="Email" name="email" id="email" style="height:30px;" class="form-control" value="{{\Auth::user()->email}}" readonly="" required>
                     <p> <b style="color:green">New Password</b></p>
                     <div id="passchh" class="help-block" style="color:red"></div>
                   <input type="password" placeholder="New Password" name="newpass" id="newpass" style="height:30px;" class="form-control" required>
                     <p> <b style="color:green">Confirm Password</b></p>
                    <input type="password" placeholder="New Password Confirm" name="passconf" id="passconf" style="height:30px;" class="form-control" required>
                    <br>

                    <button class="btn btn-primary pull-right" id="savepasschn" data-toggle="tooltip" title="Click To Save And Check Your Email">Save changes</button>
                    <button type="reset" class="btn btn-default">Clear</button>
                </form>               

            </div>
        </div>
    </div>

</div>





@endsection


@section('script')



<script type="text/javascript">
    function loadUrl(url)
    {
       
    }
</script>

  



@endsection



