@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1" style="background:#374050">
            <br>
            <h6 class="text-white">Продукты</h6>
        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-10">
                    <br>
                    <h3 style="color: red; text-decoration:underline">продукты</h3>
                    <br>
                </div>
                <div class="col-md-2">
                    <br>
                    @if(Auth::check()){{ Auth::user()->name }}@endif
                    <br>
                </div>
            </div>
            <div class="row" style="background: #f2f6fa;">
                <div class="col-md-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="background: #f2f6fa;">Артикул</th>
                                <th scope="col" style="background: #f2f6fa;">Название</th>
                                <th scope="col" style="background: #f2f6fa;">Статус</th>
                                <th scope="col" style="background: #f2f6fa;">Атрибуты</th>
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
                </div>
                <div class="col-md-2">
                    <br>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                        Добавить
                    </button>
                </div>

            </div>

        </div>
        

    </div>

</div>

@include('modal.create')
@endsection