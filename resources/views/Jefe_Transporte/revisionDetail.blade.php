@extends('layouts.app')

@section('content')
    <revisiondetail :detail="{{ json_encode($detail) }}"></revisiondetail>
@endsection