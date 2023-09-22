@extends('layout.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Member</div>
  <div class="card-body">
       
      <form action="{{ url('/member/create') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Email Address</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>School</label></br>
        <select id="school_id" name="school_id">
            @foreach($schools as $school)
                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Save" class="btn btn-success"></br>
        
  
      </form>
    
  </div>
</div>
@stop