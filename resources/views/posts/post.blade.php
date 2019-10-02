@section('title', $post->title)
@section('description', $post->meta_description)
@section('keywords', $post->meta_keywords)

@extends('layouts.master')

@section('content')
    <post-detail :post="{{ $post }}"></post-detail>
@stop