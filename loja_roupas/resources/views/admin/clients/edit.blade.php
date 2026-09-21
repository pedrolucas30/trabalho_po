@extends('layouts.admin', ['heading' => 'Editar cliente'])
@section('content')<form class="admin-form" method="POST" action="{{ route('admin.clients.update', $client) }}">@csrf @method('PUT') @include('admin.clients._form', ['buttonText' => 'Salvar alterações'])</form>@endsection
