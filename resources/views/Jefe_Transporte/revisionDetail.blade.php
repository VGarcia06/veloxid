@extends('layouts.app')

@section('content')
    <revisiondetail :detail="{{ json_encode($revision) }}"></revisiondetail>
@endsection