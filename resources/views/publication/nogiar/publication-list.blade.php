@extends('layouts.app')

    @section('search')
    <div class="search-wrap" id="search-wrap">
        <div class="search-bar">          
            <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" />
            <a href="#" class="close-search toggle-search" data-target="#search-wrap">  <i class="mdi mdi-close-circle" style="font-size:20px"></i> </a>
        </div>
    </div>
    @endsection

@section('content')





<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> PUBLICATIONS PENDING APPROVAL </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                  <div class="table-responsive">   
                    <h5 style="margin-left: 5px; color: #aaa"> Publications.   <span class="unit-header">  </span> </h5>  
                        <table class="table table-striped table-sm mb-0" id="">
                            <thead class="table-dark">
                            <tr>
                                <th>Year</th>
                                <th>Stage</th>
                                <th>Initiated By</th>
                                <th>Date Initiated</th>
                                {{-- <th>To Be Approve By</th> --}}
                                <th style="text-align: right"> Action </th>
                            </tr>

                            </thead>
                            <tbody>
                                @forelse($pending_approvals as $pending_approval)
                                    <tr> 
                                        <th>{{$pending_approval->year}}</th>
                                        <th>
                                            @if($pending_approval->status_id == 1) 
                                                <span class="badge badge-pill badge-danger"> Approval Rejected </span>
                                            @elseif($pending_approval->status_id == 3) 
                                            <span class="badge badge-pill badge-danger"> Publishing Rejected </span>
                                            @elseif($pending_approval->stage_id == 4 && $pending_approval->status_id == 0) 
                                                <span class="badge badge-pill badge-warning"> Awaiting Approval </span>
                                            @endif
                                        </th>
                                        <th>{{$pending_approval->initiator?$pending_approval->initiator->name:''}}</th>
                                        <th>{{date("F j, Y", strtotime($pending_approval->created_at))}}</th>
                                        {{-- <th>{{$pending_approval->approve_by}}</th> --}}
                                        <th>   
                                          {{-- {{$pending_approval->stage->position}} --}}
                                          {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'approve_publication') || (\Auth::user()->delegate_role == 'Publication' && \Auth::user()->end_date >= date('Y-m-d') )) --}}
                                            @if(Auth::user()->role_obj->permission->contains('constant', 'manage_publication') 
                                                || Auth::user()->role == 28 || Auth::user()->role == 29 )
                                            <a href="{{ url('/publication/nogiar/approve?year='.$pending_approval->year) }}" target="_blank" data-toggle="tooltip" style="font-size: 12px; border: none;" tooltip="true" class="btn-info waves-effect btn-sm pull-right" title="Goto Approval Page"> <i class="fa fa-arrow-right"></i>   Goto Approval Page  </a>
                                          @endif
                                        </th>  
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="5" style="text-align: center;"> NO PUBLICATION PENDING APPROVAL </th>
                                    </tr>                                
                                @endforelse
                            </tbody>
                        </table>
                        {{$pending_approvals->render() }} 
                </div> <!-- end col -->   




                

            </div>
        </div>
    </div>

</div>


















@endsection

@section('script')

  <script>  
         
      $(function()
      {
          $('[data-toggle="tooltip"]').tooltip(); 
      });

      //SORT SCRIPT
      sortAscDesc();

  </script>





    @if(Session::has('info'))
        <script>
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif


@endsection