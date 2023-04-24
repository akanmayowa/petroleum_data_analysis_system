@extends('layouts.app')

<br>  <br>  <br>  <br>  <br>  

{{-- <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script> --}}
 
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>


<textarea class="form-control" name="article"></textarea>

    <script>
        CKEDITOR.replace( 'article' );
    </script>



@section('content')

<div class="row">
   
</div>





@endsection




