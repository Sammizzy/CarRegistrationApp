@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('admin.users.export') }}">
    @csrf
    ...
    <button type="submit" class="btn btn-success">Export Selected</button>
</form>
@endsection
