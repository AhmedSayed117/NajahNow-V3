@include('navbar')
<p style="display: none">{{date_default_timezone_set('Africa/Cairo')}}</p>

@if (session('succ'))
    <div class="alert alert-success container">
        {{ session('succ') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success container">
        {{ session('status') }}
    </div>
@endif
@if (session('status1'))
    <div class="alert alert-success container">
        {{ session('status1') }}
    </div>
@endif

@if( !$user || $user->checkin==null  || (date("m/d")!=$user->Currentday))
    <form class="container" method="post" action="{{Route('checkin')}}">
    @csrf
    <div class="input-group mb-3">
        Check in &nbsp;
        <label class="input-group-text" for="inputGroupSelect02">
            <input type="checkbox" required name="checkin" value="{{date("h:i:a")}}">
        </label>
    </div>
    <button style="display: inline" type="submit" class="btn btn-success">check in</button>
</form>
@elseif($user->CheckOut==null || (date("m/d")!=$user->Currentday))
    <form class="container" method="post" action="{{Route('checkout')}}">
        @csrf
        <div class="input-group mb-3">
            Check out &nbsp;
            <label class="input-group-text" for="inputGroupSelect02">
                <input type="checkbox" required name="checkout" value="{{date("h:i:a")}}">
            </label>
        </div>
        <button style="display: inline" type="submit" class="btn btn-success">check out</button>
    </form>
@else
    <div class="alert alert-success container">
        <strong>You Checked in At {{$user->checkin}} and Checked out At {{$user->CheckOut}} Today </strong>
    </div>
@endif

<br>
<div class="container">
     <strong>Today {{date("m/d")}}</strong>
     <strong>{{date("h:i:a")}}</strong>
</div>
