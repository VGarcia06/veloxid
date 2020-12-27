@extends('layouts.app')

@section('content')
<tracking :user="{{ json_encode($user) }}"></tracking>
@endsection