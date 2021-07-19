@extends('layouts.app')
@section('title')
{{$member->name}} <small style="color: green;"> ({{$member->category}})</small>
@endsection
@section('content')

<div class="list-grooup">
    @if(isset($member))
        <div class="list-group-item">
            <small>{{$member->location}}, {{$member->address}}</small><br>
            <small>Tel: <a href="tel:{{$member->phoneno}}">{{$member->phoneno}}</a></small>
            <h6><em><small style="color: red;">Assigned To:</small></em> {{$members->where('id',$member->assignedto)->first()->name}} - <a href="tel:{{$members->where('id',$member->assignedto)->first()->phoneno}}">{{$members->where('id',$member->assignedto)->first()->phoneno}}</a></h6>
            <hr>
            <p><em><small style="color: red;">About Member:</small></em>  <br>{{$member->about}}</p>
            <hr>
            <p>Email:  {{$member->email}}</p>
            <p><em><small style="color: red;">Ministry:</small></em>  {{$member->ministry}}</p>

            <p><em><small style="color: red;">Group:</small></em>  {{$member->group}}</p>

            <p><em><small style="color: red;">Date joined CRM:</small></em>  {{$member->datejoined}}</p>


        </div>
    @endif
    <div class="list-group-item">
        <h3>Follow-up Activities</h3><hr>
        @foreach($followups as $followup)
        <div class="list-group-item">
            <small>{{$followup->title}}</small><small> ({{$followup->followupdate}} - {{$followup->type}})</small><br>
            <small>{{$followup->description}}</small><br>
            <small>By: {{$members->where('id',$followup->doneby)->first()->name}}</small><br>
            <h6><em><small style="color: orange;">Next Action:</small></em><br> {{$followup->nextaction}} - {{$followup->tododate}} - By: {{$members->where('id',$followup->todoby)->first()->name}}</h5>      
            
        </div>
    @endforeach

    <a href="{{url('/addfollowup/'.$member->id.'/'.$member->name) }}" class="btn btn-xs btn-primary">Add New Followup Activity</a>
    
    </div>
</div>
@endsection