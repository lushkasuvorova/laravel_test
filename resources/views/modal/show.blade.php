<div class="modal fade" id="modalShow{{$product->id}}" tabindex="-1" aria-labelledby="modalShowLabel{{$product->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="background:#374050">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalShowLabel{{$product->id}}">{{$product->name}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <div>
                    <a data-bs-toggle="modal" data-bs-target="#modalEdit{{$product->id}}">Изменить</a>
                    <form action="{{route('product.delete', $product->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Удалить</button>
                    </form>
                </div>
                <table class="table table-borderless">
                    <tr>
                        <th scope="row">Артикул</th>
                        <td>{{$product->article}}</td>

                    </tr>
                    <tr>
                        <th scope="row">Название</th>
                        <td>{{$product->name}}</td>

                    </tr>
                    <tr>
                        <th scope="row">Статус</th>
                        <td>{{$product->status}}</td>

                    </tr>
                    <tr>
                        <th scope="row">Атрибуты</th>
                        <td>@foreach ($product->data as $key=>$value){{$key.':'.$value}}<br>@endforeach</td>

                    </tr>

                </table>
            </div>

        </div>
    </div>
</div>