@extends('layouts.app_statistics')

@section('content')







<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">  

                <h4 class="mt-0 header-title"> Add Publications </h4>
                
                <form id="pubForm" action="{{url('statistics/publication/add_publication')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}


                  <div class="form-group row">
                    <label for="year_pub" class="col-sm-1 col-form-label"> Year </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" placeholder="Year Of Export" name="year" id="year_pub" required="">
                    </div>

                    <label for="section" class="col-sm-1 col-form-label"> Section </label>
                    <div class="col-sm-2">
                        <select class="form-control" name="section" id="section" required>
                            <option value=""> Select Section </option>
                            @if(count($sections)>0)
                                @foreach($sections as $sections)
                                    <option value="{{$sections->id}}">{{$sections->section_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="header" class="col-sm-1 col-form-label"> Header </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="Publication Header" name="header" id="header">
                    </div>
                  </div>   


                  <div class="form-group row">
                    <label for="title" class="col-sm-1 col-form-label"> Title </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Title" name="title" id="title"></textarea>
                    </div>

                    <label for="sub_title" class="col-sm-1 col-form-label"> Subtitle </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Subtitle" name="sub_title" id="sub_title"></textarea>
                    </div>
                  </div> 


                  <div class="form-group row">
                    <label for="content_1" class="col-sm-1 col-form-label"> Content </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Content" name="content_1" id="content_1"></textarea>
                    </div>

                    <label for="content_2" class="col-sm-1 col-form-label"> Content </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Content" name="content_2" id="content_2"></textarea>
                    </div>
                  </div>    


                  <div class="form-group row">
                    <label for="content_3" class="col-sm-1 col-form-label"> Content </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Content" name="content_3" id="content_3"></textarea>
                    </div>

                    <label for="content_4" class="col-sm-1 col-form-label"> Content </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Content" name="content_4" id="content_4"></textarea>
                    </div>
                  </div>  


                  <div class="form-group row">
                    <label for="content_5" class="col-sm-1 col-form-label"> Content </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Content" name="content_5" id="content_5"></textarea>
                    </div>

                    <label for="content_6" class="col-sm-1 col-form-label"> Content </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Content" name="content_6" id="content_6"></textarea>
                    </div>
                  </div> 


                  <div class="form-group row">
                    <label for="content_7" class="col-sm-1 col-form-label"> Content </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Content" name="content_7" id="content_7"></textarea>
                    </div>

                    <label for="content_8" class="col-sm-1 col-form-label"> Content </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Content" name="content_8" id="content_8"></textarea>
                    </div>
                  </div> 


                  <div class="form-group row">
                    <label for="content_9" class="col-sm-1 col-form-label"> Content </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Content" name="content_9" id="content_9"></textarea>
                    </div>

                    <label for="content_10" class="col-sm-1 col-form-label"> Content </label>
                    <div class="col-sm-5">
                        <textarea rows="3" class="form-control" placeholder="Publication Content" name="content_10" id="content_10"></textarea>
                    </div>
                  </div>   


                  <div class="form-group row">
                    <label for="content_9" class="col-sm-1 col-form-label"> Photo </label>
                    <div class="col-sm-5" style="border: thin dotted #ccc">
                        <input name="picture_1" id="picture_1" type="file" multiple="multiple">
                    </div>

                    <label for="content_10" class="col-sm-1 col-form-label"> Photo </label>
                    <div class="col-sm-5" style="border: thin dotted #ccc">
                        <input name="picture_2" id="picture_2" type="file" multiple="multiple">
                    </div>
                  </div> 


                  <div class="modal-footer" id="add_footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_pub_btn" id="add_pub_btn" class="btn btn-primary"> <i class="fa fa-plus"></i> Upload Content </button>
                  </div>
                  </form>

            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->



<div class="row">
    
</div>




<script type="text/javascript">
    $(document).ready(function()
    {
        $('#year_pub').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })

    });
</script> 





@endsection