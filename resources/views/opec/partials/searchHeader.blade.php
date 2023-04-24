<div class="row">


    <form class="input-group mb-3 col-md-7"   style="margin-right: 7.2%" method="GET" action="{{$action}}" id="filterOpec">
        <input type="text" id="yearFilter" value="{{$year}}" name="year" class="form-control datepicker" readonly aria-label="Default" aria-describedby="inputGroup-sizing-default">
        <div class="input-group-append">
            <span class="input-group-text" onclick="$('#filterOpec').submit()" id="inputGroup-sizing-default" style="padding: 8px; cursor: pointer">  <i class="fa fa-search"></i></span>
        </div>
    </form>



    <div class="col-md-2">
        <button class="btn btn-success" onclick="submitForm('{{$formId}}', '{{$url}}','',false)" >  <i class="fa fa-save"></i></button>
{{--        <a class="btn btn-primary" href="{{request()->fullUrlWithQuery(['excel'=>1])}}" >  <i class="fa fa-file-excel-o"></i></a>--}}
    </div>
</div>