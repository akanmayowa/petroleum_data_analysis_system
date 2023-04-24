@extends('layouts.app_statistics')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">  

                <div class="row">
                    <div class="col-md-2">
                    <input type="text" class="form-control" value="{{ $year }}" placeholder="NOGIAR Report Date" readonly="" name="nogiar_year" id="nogiar_year">
                    </div> 
                    <div class="col-md-7">                </div> 
                    <div class="col-md-1" style="text-align: right; padding-right: 0px!important">
                        <span style="font-size: 16px"> Price &#8358; </span>
                    </div> 
                    <div class="col-md-2">
                        <input type="text" class="form-control pull-right" id="price" name="price" value="0">
                    </div> 


                    <div class="col-lg-12" style="margin-top: 10px">
                      <textarea id="content" class="summernote"></textarea>              
                    </div>
                </div>

                

              <div class="col-lg-12" style="margin-top: 10px; padding: 0px">
                @if(Auth::user()->role_obj->permission->contains('constant', 'approve_publication') || (\Auth::user()->delegate_role == 'Publication' && \Auth::user()->end_date >= date('Y-m-d') ))
                        <input type="hidden" class="form-control" id="publication_id" name="publication_id" value="">
                        <button id="approveNogiarPublication" class="btn btn-sm pull-right" style="background-color: #008B8B; color: #fff">Approve Publication</button>
                @endif
                        <button id="saveNogiarPublication" class="btn btn-dark btn-sm pull-right" style="margin-right: 10px">Update Publication</button>
              </div>
          
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->









@endsection



@section('script')

<script type="text/javascript">   

function loadNogiarPub(year)
{
    $('#content').summernote('code','');
    // loadNogiarPublication
    $.get('{{url('loadNogiarPublication')}}?year='+year, function(data)
    {
        $('#content').summernote('code', data.content);
        $('#price').val(data.price);
        $('#publication_id').val(data.id);
    });
}


    $(function()
    {  
        loadNogiarPub('{{$year}}');

        $('#nogiar_year').change(function()
        {
            loadNogiarPub($('#nogiar_year').val());             
        });

        $('#nogiar_year').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });

        // Save
        $('#saveNogiarPublication').click(function()
        {
            year=$('#nogiar_year').val();
            price=$('#price').val();
            workflow_id=1;
            content=$('#content').val();

            created_by='';
            formData = 
            {
                year:year,
                price:price,
                workflow_id:workflow_id,
                _token:'{{csrf_token()}}',
                content:content,
                created_by:created_by,
                type:'addNogiar'
            }
            $.post('{{route('addNogiar')}}', formData,function(data,status,xhr)
            {

                if(data.status=='success')
                {
                    return toastr.success(data.message);
                }
                return toastr.error(data.message);
            })

        });

        // Approval
        $('#approveNogiarPublication').click(function()
        {
            status = '1';
            publication_id = $('#publication_id').val();

            formData = 
            {
                status:status, publication_id:publication_id, _token:'{{csrf_token()}}', type:'approveNogiar'
            }

            $.post('{{route('approveNogiar')}}', formData,function(data, status, xhr)
            {

                if(data.status=='success')
                {
                    return toastr.success(data.message);
                }
                return toastr.error(data.message);
            })

        });

    });

</script> 


<!--script for dublicating form -->
 

@endsection