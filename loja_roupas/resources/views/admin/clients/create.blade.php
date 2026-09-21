@extends('layouts.admin', ['heading' => 'Novo cliente'])
@section('content')<form class="admin-form" method="POST" action="{{ route('admin.clients.store') }}">@csrf @include('admin.clients._form', ['buttonText' => 'Criar cliente'])</form>@endsection
