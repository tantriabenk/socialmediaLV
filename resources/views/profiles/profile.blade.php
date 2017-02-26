@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-4">
        <div class="panel panel-default">

            <div class="panel-heading">
                {{ $user->name }}'s Profile
            </div>
        
            <div class="panel-body">
                <center>
                    <img src="{{ Storage::url($user->avatar) }}" width="140px" height="140px" style="border-radius: 50%; margin-bottom:30px;" alt="">
                </center>
                <p class="text-center">
                    {{ $user->profile->location }}
                </p>
                <br/>
                <p class="text-center">
                    @if(Auth::id() == $user->id)
                        <a href="{{ route('profile.edit') }}" class="btn btn-md btn-info">Edit your profile</a>
                    @endif
                </p>
            </div>
        </div>

        <div class="panel panel-default">   
            <div class="panel-heading">
                <center>About Me</center>       
            </div>

            <div class="panel-body">
                <p class="text-center">
                    {{ $user->profile->about }}
                </p>
            </div>

        </div>
    </div>
</div>
@stop