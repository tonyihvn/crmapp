@extends('layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')


<div class="list-group">
    <div class="list-group-item">
        <form action="/search-member" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            
                <div class="form-group row">
                    <div class="col-md-8">
                        <input type="text" name="keyword" placeholder="Search Member, location, info" class="form-control"> 
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-sm btn-primary" value="Search">
                    </div>
                </div>
                
            
        </form>
    </div>

    
    @foreach($members as $member)
        <div class="list-group-item">
            <h3><a href="{{ url('/member/'.$member->id) }}">{{$member->name}}</a><small style="color: green;"> ({{$member->category}})</small></h3>
            <small>{{$member->location}}, {{$member->address}}</small><br>
            <small>Tel: <a href="tel:{{$member->phoneno}}">{{$member->phoneno}}</a></small>
            <h6><em><small style="color: orange;">Assigned To:</small></em> {{$members->where('id',$member->assignedto)->first()->name}}</h5>
            <div style="text-align: right">
                <a href="{{ url('/member/'.$member->id) }}" class="btn btn-xs btn-success">Member Info</a> | <a href="{{url('/addfollowup/'.$member->id.'/'.$member->name) }}" class="btn btn-xs btn-primary">Add Followup Activity</a>
            </div>
            
        </div>
    @endforeach
</div>
@endsection