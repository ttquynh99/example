@extends('backend.layouts.master')

@section('custom-css')
<style>
    h1 {
        color:blue;
    }
</style>
@endsection


@section('title')
    Trang Admin
@endsection

@section('content')
<h1>  Hello </h1>
@endsection

@section('custom-scripts')
<script>
    alert('Xin chao');
</script>
@endsection