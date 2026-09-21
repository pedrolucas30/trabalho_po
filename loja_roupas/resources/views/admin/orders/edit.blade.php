@extends('layouts.admin', ['heading' => 'Editar pedido'])
@section('content')<form class="admin-form" method="POST" action="{{ route('admin.orders.update', $order) }}">@csrf @method('PUT') @include('admin.orders._form', ['buttonText' => 'Salvar alterações'])</form>@endsection
