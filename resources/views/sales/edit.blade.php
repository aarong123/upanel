@extends('layouts.app')

@section('content')

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif

    <div class="wrapper">
            <form class= "formulario1" method="post" action="{{ url('sale/update/' . $sale->id) }}">
                @csrf
                @method('PUT')
                <p class="title">editar venta</p>

                <div class="form-group row">
                    <label class="col-md-3 form-control-label">id_client (*)</label>
                    <div class="col-md-9">
                        <input placeholder="id_client" type="number" name="id_client" value="{{ $sale->id_client }}">
                        <i class="fa fa-barcode"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">id_user (*)</label>
                    <div class="col-md-9">
                        <input placeholder="id_user" type="number" name="id_user" value="{{ $sale->id_user }}">
                        <i class="fa fa-signature"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">type_voucher (*)</label>
                    <div class="col-md-9">
                        <input placeholder="type_voucher" name="type_voucher" type="text" value="{{ $sale->type_voucher }}">
                        <i class="fa fa-dollar-sign"></i>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 form-control-label">series_voucher (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="series_voucher" type="text" name="series_voucher" value="{{ $sale->series_voucher }}">
                        <i class="fa fa-sort-numeric-up"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">num_voucher (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="num_voucher" type="text" name="num_voucher" value="{{ $sale->num_voucher }}">
                        <i class="fa fa-sort-amount-up"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Umbral de ventas (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="tax" type="number" name="tax" value="{{ $sale->tax }}">
                        <i class="fa fa-sort-amount-up"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">total (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="total" type="number" name="total" value="{{ $sale->total }}">
                        <i class="fa fa-clock"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">state</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="state" type="text" name="state" value="{{ $sale->state }}">
                        <i class="fa fa-file-alt"></i>
                    </div>
                </div>
                <div style="text-align:center; padding:40px 0px 0px 0px;">
                        <button type="submit" class="btn btn-primary">
                            <i class="spinner"></i>
                            Editar
                </button>
                </div>
            </form>
    </div>
    <br>
    <div> 
        <a href="{{ url('/sale') }}" class="btn btn-primary" style="text-align:center">Atr&aacute;s</a>
    </div>
    <br>
@stop