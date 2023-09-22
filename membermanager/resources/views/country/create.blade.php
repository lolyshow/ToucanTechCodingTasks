@extends('layout.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Country</div>
  <div class="card-body">
       
      <form action="{{ url('/country/create') }}" method="post">
        {!! csrf_field() !!}
        <label>Country Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop