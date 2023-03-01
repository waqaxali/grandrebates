@extends('adminpanel.layout.resources.user_main')

@section('user_content')
    <div class="content-wrapper">
        <div class="double-col">
            <main>
                <h1>Referrals</h1>




                <table class="tables">
                    <thead>
                        <tr>
                            <th> User Name</th>
                            <th> Email </th>
                            <th>Phone</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)


                        <tr>
                            <td> {{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td> {{$user->phone}}</td>
                            {{-- <td class="action-column">
                                <a class="button" href="">Edit</a>
                                <a class="button">Delete</a>
                            </td> --}}
                        </tr>
                        @endforeach

                    </tbody>
                </table>







            </main>

        </div>

    </div>
@endsection
