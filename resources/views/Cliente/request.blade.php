@extends('layouts.app')

@section('content')
    <request 
        :user="{{ json_encode($user) }}"
    >
    </request>
@endsection