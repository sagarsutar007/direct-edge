@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Welcome {{ Auth::user()->name }}! </h1>
@stop

@section('content')
    
@stop