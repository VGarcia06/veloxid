@extends('layouts.app')

@section('content')
    <detail-vehicle :user="{{ json_encode($user) }}"></detail-vehicle>
@endsection