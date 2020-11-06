@extends('layouts.app')

@section('content')
    <vehicle :id="{{ json_encode($id) }}"></vehicle>
@endsection