@extends('layouts.app')

@section('content')
    @include('admin.artists.index')
    @include('admin.tattoos.index')
    @include('admin.piercings.index')
    @include('admin.estudio.index')
    @include('admin.map.index')
    @include('admin.info.index')
@endsection
