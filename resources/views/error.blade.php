@extends('layouts.main')
@push('title')
    <title>Error</title>
@endpush
@section('main')
    @if (!empty($error))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h3><strong>{{ $error }}</strong></h3>
            <h6>Return to <a href="{{route('show')}}">Show Data</a></h6>
        </div>
    @endif
@endsection
