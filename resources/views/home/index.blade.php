@section('title', $homepage->title)
@section('description', $homepage->meta_description)
@section('keywords', $homepage->meta_keywords)

@extends('layouts.master')

@section('content')
    <home-page :page="{{ $homepage }}"></home-page>
@stop