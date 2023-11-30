<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="background:#374050">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCreateLabel">Добавить продукт</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="{{route('product.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="article" class="form-label">Артикул</label>
                            <input name="article" type="text" class="form-control" id="article" value="{{old('article')}}">
                            @error('article')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Статус</label>
                            <select class="form-select" aria-label="Status" name="status" id="status">
                                <option value="available" {{old('status')=='available'?'selected':''}}>Доступен</option>
                                <option value="unavailable" {{old('status')=='unavailable'?'selected':''}}>Не доступен</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Атрибуты</label>
                            <div id="Atributes">
                            </div>
                            <a id="addAtributes" onclick="addAtribute(this.id)">+добавить атрибут</a>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>