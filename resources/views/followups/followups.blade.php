@extends('layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="list-grooup">
    @foreach($followups as $followup)
        <div class="list-group-item">
            <h3><a href="{{ url('/member/'.$followup->member_id) }}">{{$followup->title}}</a><br><small style="color: green;"> {{$followup->member->name}}</small></h3>
            <small>{{$followup->description}}</small><br>
            <small>By: {{$followup->doneby}}</small><br>

            <h6><em><small style="color: orange;">Next Action:</small></em> {{$followup->nextaction}}</h5>      
            
        </div>
    @endforeach
</div>
@endsection