@extends('layouts.app')


@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">

        <form method="post" action="{{ route('addmember') }}" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
            <label for="Member" class="form-label">Tambah Member</label>
            </div>
            <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"  id="name" name="name" class="form-control mb-2 @error('name') is-invalid @enderror" placeholder="name" required autofocus value="{{ old('name') }}">
            </div>
            <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="text"  id="email" name="email" class="form-control mb-2 @error('email') is-invalid @enderror" placeholder="email" required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password"  id="password" name="password" class="form-control mb-2 @error('password') is-invalid @enderror" placeholder="password" required value="{{ old('password') }}">
            </div>
            <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text"  id="address" name="address" class="form-control mb-2 @error('address') is-invalid @enderror" placeholder="address" required value="{{ old('address') }}">
            </div>
            <div class="mb-3">
            <label for="nmr_telepon" class="form-label">Phone Number</label>
            <input type="text"  id="nmr_telepon" name="nmr_telepon" class="form-control mb-2 @error('nmr_telepon') is-invalid @enderror" placeholder="nmr_telepon" required value="{{ old('nmr_telepon') }}">
            </div>
            
            <button type="submit" class="btn btn-info">Add Member</button>
        </form>

        </div>
    </div>
</div>



@endsection