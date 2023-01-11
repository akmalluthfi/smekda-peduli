@extends('errors.layout')

@section('title', __('Forbidden'))
@section('code', '403')
@section('location', '/')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
