@extends('layouts.app', ['activePage' => 'buscar_folio', 'menuParent' => 'forms', 'titlePage' => __('Buscar Folio')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Buscar Folio') }}</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="folio">Número de Folio</label>
                                <input type="text" class="form-control" id="folio" name="folio" placeholder="Ingrese el número de folio">
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                    </div>
                </div>

                @if(isset($folio))
                <div class="card mt-4">
                    <div class="card-body">
                        <h4>Folio Encontrado: {{ $folio->numero }}</h4>
                        <p>Información del folio...</p>
                        <!-- Aquí puedes agregar más detalles del folio -->
                        <a href="{{ route('imprimir_folio', $folio->id) }}" class="btn btn-primary">Imprimir</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
