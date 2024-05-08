@extends('admin.main')
@section('content')
<!--CONTENIDO-->
<!-- TABLA -->
<div class="content">
<div class="container-fluid">
    <div class="row">
    <!-- /.col-md-6 -->
    <div class="col-lg-12">
        <div class="card">
        <div class="card-header">
            <h5 class="m-0">Categorías 
                <button class="btn btn-primary" onclick="nuevo()"><i class="fas fa-file"></i> Nuevo</button> 
                <a href=""
                    class="btn btn-success"><i class="fas fa-file-csv"></i> CSV</a>
            </h5>
        </div>
        <div class="card-body">
            <div>
                <form action="{{route('category.index')}}" method="get">
                    <div class="input-group">
                        <input type="text" name="texto" value="{{$texto}}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-info"><i class="fas fa-search"></i>
                                Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mt-2 table-responsive">
            <table class="table table-striped table-bordered table-hover table-sm" id="tablaCategorias">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Image</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($registros as $reg)
                    <tr>
                        <td>{{$reg->id}}</td>
                        <td>{{$reg->name}}</td>
                        <td>{{$reg->image}}</td>
                        <td>{{$reg->active?'Activo':'Inactivo'}}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm editar" onclick="edit({{$reg->id}})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm eliminar" onclick="delete({{$reg->id}})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$registros->appends(["texto" => $texto])}}
            </div>
        </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- FIN TABLA -->
<!--MODAL UPDATE-->
<div class="modal fade" id="modal-update">
<div class="modal-dialog modal-lg">

</div>
</div>
<!--FIN MODAL UPDATE-->
<!--FIN CONTENIDO-->
@endsection()
@push('scripts')
    <script>
        function nuevo(){
            $.ajax({
                method: 'get',
                url: `{{url('category/create')}}`,
                success: function(res){
                    $('#modal-update').find('.modal-dialog').html(res);
                    $("#modal-title").text("Nuevo");
                    $("#textoBoton").text("Guardar");
                    $("#modal-update").modal("show");
                    //save();
                }
            })
        }
        function edit(id){
            $.ajax({
                method: 'get',
                url: `{{url('category')}}/${id}/edit`,
                success: function(res){
                    $('#modal-update').find('.modal-dialog').html(res);
                    $("#textoBoton, #modal-title").text("Actualizar");
                    $("#modal-update").modal("show");
                    //save();
                }
            })
        }
        function save(){
            $('#formUpdate').on('submit',function(e){
                //e.preventDefault();
                const _form= this;
                const formData=new FormData(_form);
                const url= this.getAttribute('action');
                $.ajax({
                    method: 'POST',
                    url,
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res){
                    $('#modal-update').modal("hide");
                    Swal.fire({
                        icon: res.status,
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    },
                    error: function (res){
                        let errors = res.responseJSON?.errors;
                        $(_form).find(`[name]`).removeClass('is-invalid');
                        $(_form).find('.invalid-feedback').remove();
                        if(errors){
                            for(const [key, value] of Object.entries(errors)){
                                $(_form).find(`[name='${key}']`).addClass('is-invalid')
                                $(_form).find(`#msg_${key}`).parent().append(`<span class="invalid-feedback">${value}</span>`);
                            }
                        }
                    }
                });
            })
        }
        function delete(id) {
        Swal.fire({
            title: 'Eliminar registro',
            text: "¿Esta seguro de querer eliminar el registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: `{{url('categoria')}}/${id}`,
                        headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res){
                            window.location.reload();
                            Swal.fire({
                                icon: res.status,
                                title: res.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                        error: function (res){

                        }
                    });
                }
            })
        }
    </script>
@endpush