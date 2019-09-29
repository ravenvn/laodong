@section('title', $category->name)
@section('description', $category->name)
@section('keywords', $category->name)

@extends('layouts.master')

@section('content')
    <category-posts :category="{{ $category }}"></category-posts>
@stop