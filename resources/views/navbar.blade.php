@extends('layouts.app')
@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="https://www.facebook.com/miiiiido0o0o" target="_blank">By: Ahmed Sayed</a>
        <a class="navbar-brand" href="/">HOME</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if(!Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{Route('login')}}">login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{Route('register')}}">Register</a>
                </li>
                @endif
                @if(Auth::check())
                <li class="nav-item">
                    <form action="{{Route('logout')}}" method="POST">
                        @csrf
                        <button class="nav-link" style="cursor: pointer;border: 0;background: 0" onclick="submit()" >logout</button>
                    </form>
                </li>
                        @if(Auth::id()!=1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('mygroup')}}">Your Group</a>
                            </li>
                        @endif
                @endif
                    @if(Auth::check())
                        @if(Auth::id()==1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('admin')}}">Admin</a>
                        </li>
                        @endif
                    @endif
            </ul>
        </div>
    </nav>
</div>
@endsection
