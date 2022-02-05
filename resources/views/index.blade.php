@extends('layouts.app')


@section('content')

<div class="notif my-3">
@if(session()->has('berhasil'))
      <div class="alert alert-success" role="alert">
          {{ session('berhasil') }}
      </div>
@endif
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 table-responsive">
        <table class="table mt-3" id="usertable" name="usertable">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Telephone Number</th>
                    <th scope="col">Downline</th>
                    <th scope="col">Upline</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user as $users)
                <tr>
                    <td>{{ $users->id }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->address }}</td>
                    <td>{{ $users->nmr_telepon }}</td>
                    <td> @foreach($users->Downline as $downline){{ $downline->User->name }}, @endforeach</td>
                    <td> {{ $users->Upline->User->name ?? ''}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        
        <div class="action">
            <a href="{{ route('add') }}" class="btn btn-primary">Tambah Member</a>
            <a href="{{ route('addatasan') }}" class="btn btn-primary">Tambah Atasan</a>
            <a href="{{ route('addbawahan') }}" class="btn btn-primary">Tambah Bawahan</a>
        </div>

        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
    $('#usertable').DataTable();
} );
</script>

@endsection