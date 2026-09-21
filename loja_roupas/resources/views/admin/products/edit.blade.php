@extends('layouts.admin', ['heading' => 'Editar produto'])
@section('content')<form class="admin-form" method="POST" action="{{ route('admin.products.update', $product) }}">@csrf @method('PUT') @include('admin.products._form', ['buttonText' => 'Salvar alterações'])</form>@endsection
