@extends('layouts.admin', ['heading' => 'Novo pedido'])
@section('content')<form class="admin-form" method="POST" action="{{ route('admin.orders.store') }}">@csrf @include('admin.orders._form', ['buttonText' => 'Criar pedido'])</form>@endsection
