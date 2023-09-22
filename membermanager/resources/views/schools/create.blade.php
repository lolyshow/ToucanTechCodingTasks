@extends('layout.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New School</div>
  <div class="card-body">
       
      <form action="{{ url('/school/create') }}" method="post">
        {!! csrf_field() !!}
        <label>School Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>

        <label for="school">Country:</label></br>
        <select id="id" name="id">
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop