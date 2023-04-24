@extends('layouts.app_statistics')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">  

            <div class="col-md-3">
                <input type="text" class="form-control" value="{{date('Y')}}" placeholder="Dwp Report Date" readonly="" name="" id="dwp_year">
            </div> 
            <div class="col-lg-12" style="margin-top: 10px">
              <textarea id="content" class="summernote"></textarea>
              
          </div>
          <div class="col-lg-12" style="margin-top: 10px"><button id="saveDwpPublication" class="btn btn-success btn-md">Save Publication</button></div>
      
      </div>
  </div>
</div> <!-- end col -->
</div> <!-- end row -->









@endsection



@section('script')

<script type="text/javascript">   

function loadDWpPub(year)
{
    $.get('{{url('dwp')}}/loadPub?year='+year, function(data)
    {
            $('#content').summernote('code', data);
     });
}


    $(function()
    {  

        loadDWpPub('{{date('Y')}}');

        $('#dwp_year').change(function(){
                loadDWpPub($('#dwp_year').val());
             
        });

        $('#dwp_year').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
      });

        $('#saveDwpPublication').click(function()
        {

            year=$('#dwp_year').val();
            content=$('#content').val();

            created_by='';
            formData = 
            {
                year:year,
                _token:'{{csrf_token()}}',
                content:content,
                created_by:created_by,
                type:'addDwp'
            }
            $.post('{{url('dwp')}}',formData,function(data,status,xhr)
            {

                if(data.status=='success')
                {
                    return toastr.success(data.message);
                }
                return toastr.error(data.message);
            })

        })

    });

</script> 


<!--script for dublicating form -->
 

@endsection