@include('navbar')
<p style="display: none">{{$c=1}} {{$c1=1}}</p>
@if (session('status'))
    <div class="alert alert-success container">
        {{ session('status') }}
    </div>
@endif
@if(\App\Models\User::where('id',Auth::id())->get()->first()->groups)
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">STU-Count</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <tr>
                    <th>{{$c1++}}</th>
                    @if(\App\Models\User::where('id',Auth::id())->get()->first()->groups == $group->id)
                        <th>{{$group->name}}</th>
                        <th>{{$group->count_}}</th>
                    @else
                        <td>{{$group->name}}</td>
                        <td>{{$group->count_}}</td>
                    @endif

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else

    <table class="table container">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">STU-Count</th>
            <th scope="col">Apply</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
            <tr>
                <th>{{$c++}}</th>
                <td>{{$group->name}}</td>
                <td>{{$group->count_}}</td>
                <td>
                    <button class="btn btn-success">
                       <a href="{{Route('groups',$group->id)}}" style="color: white">
                           choose
                       </a>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
