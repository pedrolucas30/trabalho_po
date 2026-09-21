@extends('layouts.admin', ['heading' => 'Novo produto'])
@section('content')<form class="admin-form" method="POST" action="{{ route('admin.products.store') }}">@csrf @include('admin.products._form', ['buttonText' => 'Criar produto'])</form>@endsection
