@extends('layouts.app')
@section('title')
New Followup Activity
@endsection
@section('content')
<form action="/newfollowup" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <div class="col-md-12">
      <label for="member_id">Member Name</label>
      <select class="form-control" name="member_id" id="member_id">
        @if(isset($memberid))
            <option value="{{$memberid}}">{{$membername}}</option>
        @else
            @foreach($members as $member)
                <option value="{{$member->id}}">{{$member->name}}</option>
            @endforeach
        @endif
      </select>
    </div>
    <div class="col-md-12">
      <label for="title">Activity Title</label>
      <input value="{{ old('title') }}" placeholder="Enter Activity Title" type="text" name="title" id="title" class="form-control" />
    </div>
  </div>
  
  <div class="form-group col-md-12">
    <label for="description">Activity Details</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
  </div>

  <div class="form-group col-md-12">
    <label for="type">Type of Followup</label>
        <select class="form-control" name="type" id="type">
            <option value="Call">Call</option>
            <option value="Visitation">Visitation</option>
            <option value="Outreach">Outreach</option>
            <option value="Counselling">Counselling</option>            
        </select>
  </div>

  <div class="form-group">
    <div class="col-md-12">
      <label for="doneby">Activity Done by</label>
      <select class="form-control" name="doneby" id="doneby">
        @foreach($members as $member)
            <option value="{{$member->id}}">{{$member->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-12">
        <label for="nextaction">Next Action</label>
        <input value="{{ old('nextaction') }}" placeholder="Recommended next action" type="text" name="nextaction" id="nextaction" class="form-control" />
    </div>

    <div class="col-md-12">
      <label for="todoby">Next Task By</label>
      <select class="form-control" name="todoby" id="todoby">
        @foreach($members as $member)
            <option value="{{$member->id}}">{{$member->name}}</option>
        @endforeach
      </select>
    </div>

   
   
  </div> 
    


        <div class="form-group">

            <div class="col-md-6">
                <label for="followupdate">Activity Date</label>
                <input type="date" name="followupdate" id="followupdate" class="form-control" placeholder="Due of activity">
            </div>

            <div class="col-md-6">
                <label for="tododate">Next To do Date</label>
                <input type="date" name="tododate" id="tododate" class="form-control" placeholder="Due date for next action">
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