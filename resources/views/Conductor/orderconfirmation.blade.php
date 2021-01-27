@extends('layouts.app')

@section('content')
    <orderconfirmation :user="{{ json_encode($user) }}"></orderconfirmation>
@endsection