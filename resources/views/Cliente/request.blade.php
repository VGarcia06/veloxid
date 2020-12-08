@extends('layouts.app')

@section('content')
    <request 
        :serviceq="{{ json_encode($service_req) }}" 
        :user="{{ json_encode($user) }}"
    >
    </request>
@endsection