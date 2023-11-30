<form action="{{route('product.update', $product->id)}}" method="post">
    @csrf
    @method('patch')
    <div class="modal fade edit" id="modalEdit{{$product->id}}" tabindex="-1" aria-labelledby="modalEditLabel{{$product->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background:#374050">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEditLabel{{$product->id}}">{{$product->name}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div>
                    <div class="mb-3">
                        <label for="article" class="form-label">Артикул</label>

                        <input name="article" type="text" class="form-control" value="{{$product->article}}" @can('view', auth()->user())disabled>@endcan

                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input name="name" type="text" class="form-control" value="{{$product->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Статус</label>
                        <select class="form-select" aria-label="Status" name="status">
                            <option value="available" {{$product->status=='available'?'selected':''}}>Доступен</option>
                            <option value="unavailable" {{$product->status=='unavailable'?'selected':''}}>Не доступен</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Атрибуты</label>
                        <div id="Atributes{{$product->id}}">
                            @foreach ($product->data as $key=>$value)
                            <div id="atr{{$loop->iteration}}edit{{$product->id}}" class="oldAtribut">
                                <label for="data->atr_name{{$loop->iteration}}edit{{$product->id}}" class="form-label">Название</label>
                                <input name="data->atr_name{{$loop->iteration}}" id="data->atr_name{{$loop->iteration}}edit{{$product->id}}" type="text" class="form-control" value="{{$key}}">
                                <label for="data->atr_value{{$loop->iteration}}edit{{$product->id}}" class="form-label">Значение</label>
                                <input name="data->atr_value{{$loop->iteration}}" id="data->atr_value{{$loop->iteration}}edit{{$product->id}}" type="text" class="form-control" value="{{$value}}">
                                <a id="{{$loop->iteration}}edit{{$product->id}}" onclick="delAtributedit(this.id)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="color: gray;">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </a><br>
                            </div>
                            @endforeach
                        </div>
                        <a id="addAtributes{{$product->id}}" onclick="addAtribute(this.id)">+добавить атрибут</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</form>