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
                <h5 class="m-0">{{ __('Dashboard') }}</h5>
            </div>
            <div class="card-body">
                Escritorio 
            </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- FIN TABLA -->
<!--FIN CONTENIDO-->
@endsection()



@push('scripts')

@endpush