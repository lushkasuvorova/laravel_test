<div class="modal fade" id="modalShow{{$product->id}}" tabindex="-1" aria-labelledby="modalShowLabel{{$product->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="background:#374050">
            <div class="modal-header" style="border-color: #374050">
                <h1 class="modal-title text-white fs-5" id="modalShowLabel{{$product->id}}">{{$product->name}}</h1>
                <div style="position: absolute; right: 35px;">
                    <button data-bs-toggle="modal" data-bs-target="#modalEdit{{$product->id}}" style="background: rgb(33, 38, 48); border: none; box-shadow:none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16" style="color: gray;">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                    </button>
                </div>
                <div style="position: absolute; right: 69px;">
                    <form action="{{route('product.delete', $product->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" style="background: rgb(33, 38, 48); border: none; box-shadow:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="color: gray;">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </button>
                    </form>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>



            </div>
            <div class="modal-body">
                
                    <table class="table-dark table-borderless"style="width: 100%;">
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