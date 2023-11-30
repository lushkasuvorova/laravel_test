@extends('layouts.main')
@section('content')
<h1>продукты</h1>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
    Добавить
</button><br>
@if(Auth::check()){{ Auth::user()->name }}@endif
<table class="table table-striped">
    <thead>
        <tr class="table-success">
            <th scope="col">Артикул</th>
            <th scope="col">Название</th>
            <th scope="col">Статус</th>
            <th scope="col">Атрибуты</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <!--
            <td><a href="{{route('product.show',$product->id)}}">{{$product->article}}</a></td>
            -->
            <td><button type="button" data-bs-toggle="modal" data-bs-target="#modalShow{{$product->id}}">
                    {{$product->article}}</button></td>
            <td>{{$product->name}}</td>
            <td>{{$product->status}}</td>
            <td>@foreach ($product->data as $key=>$value){{$key.':'.$value}}<br>@endforeach</td>

            <td>
                @include('modal.show')
                @include('modal.edit')
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('modal.create')
@endsection
