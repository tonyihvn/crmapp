@extends('layouts.app')
@section('title')
Add New Member
@endsection
@section('content')
<form action="/newmember" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <div class="col-md-6">
      <label for="name">Name</label>
      <input required="required" value="{{ old('name') }}" placeholder="Enter Name here" type="text" name="name" id="name" class="form-control" />      
    </div>
    <div class="col-md-6">
      <label for="phoneno">Phone Number</label>
      <input value="{{ old('phoneno') }}" placeholder="Phone Number" type="text" name="phoneno" id="phoneno" class="form-control" />
    </div>
  </div>
  
  <div class="form-group col-md-12">
    <label for="address">Address</label>
    <input value="{{ old('address') }}" placeholder="Address" type="text" name="address" id="address" class="form-control" />
  </div>

  <div class="form-group col-md-12">
    <label for="about">About Member</label>
    <input value="{{ old('about') }}" placeholder="About Member" type="text" name="about" id="about" class="form-control" />
  </div>

  <div class="form-group">
    <div class="col-md-6">
      <label for="assignedto">Assigned To</label>
      <select class="form-control" name="assignedto" id="assignedto">
      <option value="1">None</option>
        @foreach($members as $member)
            <option value="{{$member->id}}">{{$member->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
      <label for="category">Category</label>
      <select class="form-control" name="category" id="category">
          <option value="New Member">New Member</option>
          <option value="Bonafide">Bonafide</option>
          <option value="Evangelized">Evangelized</option>
          <option value="Worker">Worker</option>
          <option value="Visitor">Visitor</option>
          <option value="Traveled">Traveled</option>
          <option value="Minister">Minister</option>
          <option value="Member" selected>Member</option>
      </select>
    </div>
  </div>

  
      <div class="form-group">

        <div class="col-md-6">
          <label for="ministry">Ministry</label>
          <select class="form-control" name="ministry" id="ministry">
            <option value="Evangelism">Evangelism</option>
            <option value="Prison">Prison</option>
            <option value="Medical">Medical</option>
            <option value="Usher">Usher</option>
            <option value="Chior">Chior</option>
                <option value="Sanctuary Keepers">Sanctuary Keepers</option>
                <option value="Pastor">Pastor</option>
                <option value="Administration">Administration</option>
                <option value="None">None</option>
              </select>
        </div>
        
        <div class="col-md-6">
          <label for="group">Age Group</label>
          <select class="form-control" name="group" id="group">
            <option value="TKM">TKM</option>
            <option value="CWL">CWL</option>
            <option value="Youth">Youth</option>
            <option value="Teenager">Teenager</option>
            <option value="Children Also">Children Also</option>
            <option value="Others">Others</option>
          </select>
        </div>
      </div>

        <div class="form-group">

          <div class="col-md-6">
            <label for="datejoined">Date Joined</label>
            <input type="date" name="datejoined" id="datejoined" class="form-control" placeholder="Date Joined" aria-describedby="dj">
            <small id="dj" class="text-muted">The first day in church</small>
          </div>

          <div class="col-md-6">
            <label for="location">Location</label>
            <input value="{{ old('location') }}" placeholder="Location, e.g. Jabi" type="text" name="location" id="location" class="form-control" />
          </div>
        </div>
     
        
    
  
  <div class="form-group">
  <label for="">.</label>
    <div class="col-md-6">
      
    <input type="submit" class="btn btn-success" value="Save" />
    </div>
  </div>
</form>
@endsection