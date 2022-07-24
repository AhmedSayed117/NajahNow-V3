@include('navbar')
<p style="display: none">{{$C=1}}</p>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name of Group</th>
            <th scope="col">STU-Count</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$group->name}}</td>
            <td>{{$group->count_}}</td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>
    <table class="table container" id="sortTable">
        <thead>
        <tr>
            <th>#</th>
            <th>Students</th>
            <th>Check in</th>
            <th>Check out</th>
            <th>Day</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <p style="display: none">{{$u = \App\Models\checkinout::where('user_id',$user->id)->get()}}</p>
            @foreach($u as $user1)
                <tr>
                    <td>{{$C++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user1->checkin}}</td>
                    <td>{{$user1->CheckOut}}</td>
                    <td>{{$user1->Currentday}}</td>
                </tr>
            @endforeach

        @endforeach
        </tbody>
    </table>
</div>
<script>
    $('#sortTable').DataTable();
</script>
