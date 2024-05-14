<div class="modal-content">
    <form id="formUpdate" action="{{$category->id ? route('category.update',$category) : route('category.store')}}" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title">Nuevo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @csrf
            @if($category->id)
                @method('PUT')
                <input type="hidden" name="id", value="{{ $category->id }}">
            @endif
            
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" placeholder="Ingrese nombre" name="name" value="{{$category->name}}">
                <div id="msg_name"></div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="textoBoton" onclick="save()">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
</div>