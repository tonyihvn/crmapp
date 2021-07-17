@extends('layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')

<div class="list-grooup">
    @foreach($members as $member)
        <div class="list-group-item">
            <h3><a href="{{ url('/member/'.$member->id) }}">{{$member->name}}</a><small style="color: green;"> ({{$member->category}})</small></h3>
            <small>{{$member->location}}, {{$member->address}}</small><br>
            <small>Tel: <a href="tel:{{$member->phoneno}}">{{$member->phoneno}}</a></small>
            <h6><em><small style="color: orange;">Assigned To:</small></em> {{$member->assignedto}}</h5>
            <div style="text-align: right">
                <a href="{{ url('/member/'.$member->id) }}" class="btn btn-xs btn-success">Member Info</a> | <a href="{{url('/mfollowup/'.$member->id) }}" class="btn btn-xs btn-primary">View Followups Activities</a>
            </div>
            
        </div>
    @endforeach
</div>
@endsection