@extends('layouts.app')

@section('content')

    {{-- <form method="post" action="{{ url('category/update/' . $item->id) }}">
         @csrf
         @method('PUT')
         <div class="form-row">
             <div class="form-group col-md-6">
                 <label for="name">Nombre</label>
                 <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" value="{{ $item->name }}">
             </div>
             <div class="form-group col-md-6">
                 <label for="description">Descripcion</label>
                 <input type="text" class="form-control" id="description" placeholder="Descripcion" name="description" value="{{ $item->description }}">
             </div>
         </div>

         <button type="submit" class="btn btn-primary">Enviar</button>
     </form>
 --}}
    <form method="post" action="{{ url('item/update/' . $item->id) }}">

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Categoría (*)</label>
            <div class="col-md-9">
                <select class="form-control">
                    <option disabled value="0">Seleccione una categoría</option>
                    @foreach($categories as $category)
                        <option @if($category->id === $item->id_category) selected @endif value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Código (*)</label>
            <div class="col-md-9">
                <input class="form-control" placeholder="Código de barras" type="text" value="{{ $item->code }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Nombre (*)</label>
            <div class="col-md-9">
                <input class="form-control" placeholder="Nombre de artículo" type="text" value="{{ $item->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Precio Venta (*)</label>
            <div class="col-md-9">
                <input class="form-control" placeholder="Ingrese el precio del producto" type="number" value="{{ $item->price_sale }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Fecha de vencimiento (*)</label>
            <div class="col-md-9">
                <input class="form-control" type="text" value="{{ $item->expiration_date }}">
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Stock (*)</label>
            <div class="col-md-9">
                <input class="form-control" placeholder="Ingrese el stock inicial del producto" type="number" value="{{ $item->stock }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Umbral de stock (*)</label>
            <div class="col-md-9">
                <input class="form-control" placeholder="Ingrese el umbral del stock" type="number" value="{{ $item->stock_threshold }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Umbral de ventas (*)</label>
            <div class="col-md-9">
                <input class="form-control" placeholder="Ingrese el umbral de ventas" type="number" value="{{ $item->sales_threshold }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Umbral de vencimiento (*)</label>
            <div class="col-md-9">
                <input class="form-control" placeholder="Ingrese el umbral de vencimiento" type="number" value="{{ $item->expiration_threshold }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Descripción</label>
            <div class="col-md-9">
                <input class="form-control" placeholder="Ingrese descripción" type="text" value="{{ $item->description }}">
            </div>
        </div>
    </form>
@stop