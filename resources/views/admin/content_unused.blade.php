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
            <h5 class="m-0">Categorías <button class="btn btn-primary" data-toggle="modal"
                data-target="#modal-update" id="nuevo"><i class="fas fa-file"></i> Nuevo</button> <a href=""
                class="btn btn-success"><i class="fas fa-file-csv"></i> CSV</a></h5>
        </div>
        <div class="card-body">
            <div class="mt-2 table-responsive">
            <table class="table table-striped table-bordered table-hover table-sm" id="tablaCategorias">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
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
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Nuevo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="email" class="form-control" id="nombre" placeholder="Ingrese nombre">
        </div>
        <div class="form-group">
        <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
</div>
</div>
<!--FIN MODAL UPDATE-->
<!--FIN CONTENIDO-->
@endsection()