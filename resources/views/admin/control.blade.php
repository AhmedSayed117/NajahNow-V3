@include('navbar')
<div class="container">
    <p style="display: none">{{$c=1}}</p>

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
    <strong> GROUPS</strong>
    <a type="button" class="btn btn-outline-success border-0" href="{{Route('add.group')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
        </svg>
    </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">STU-Count</th>
            <th scope="col">More</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
            <tr>
                <th>{{$c++}}</th>
                <td>{{$group->name}}</td>
                <td>{{$group->count_}}</td>
                <td>
                    <a type="button" class="btn btn-outline-secondary" href="{{Route('showGroup',$group->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                        </svg>
                        <span class="visually-hidden">Activity</span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
