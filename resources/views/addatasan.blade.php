@extends('layouts.app')


@section('content')

<div class="notif my-3">
@if(session()->has('gagal'))
      <div class="alert alert-danger" role="alert">
          {{ session('gagal') }}
      </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <form method="post" action="{{ route('addatasanpost') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <label for="atasan_id" class="form-label">Pilih Atasan</label>
        <select class="form-select" name="atasan_id" class="atasan_id">
            @foreach($user as $users)
            <option value="{{ $users->id }}">{{ $users->name }}</option>
            @endforeach
        </select>
        </div>
            <button type="submit" class="btn btn-info">Add Atasan</button>
        </form>

        </div>
    </div>
</div>


@endsection