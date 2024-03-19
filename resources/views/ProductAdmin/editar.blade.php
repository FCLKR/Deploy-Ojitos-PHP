<style>
    #confirmationModal {
    display: none;
    position: fixed;
    z-index: 1000;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.93);
    }

    #confirmationBox {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #1c2c34 ;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    }

    #confirmationBox h2{
    margin-top: 0;
    }

    #confirmationBox button {
    margin: 10px;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }

    #confirmButton {
    background-color: green;
    color: white;
    }

    #cancelButton {
    background-color: red;
    color: white;
    }

    .con {
    color: #ffffff;
    }

    .parcon{
    color: #ffffff;
    }
</style>
@extends('layouts.newlayout')

@section('title', 'Editar Producto')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">{{ __('Editar Producto') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id_product) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="product_name" class="form-label">{{ __('Nombre del producto') }}</label>
                                <input type="text" id="product_name" class="form-control" name="product_name" value="{{ old('product_name', $product->product_name) }}" required autofocus>
                                @error('product_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_price" class="form-label">{{ __('Precio del producto') }}</label>
                                <input type="number" id="product_price" class="form-control" name="product_price" value="{{ old('product_price', $product->product_price) }}" required>
                                @error('product_price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">{{ __('Descripción del producto') }}</label>
                                <input type="text" id="descripcion" class="form-control" name="descripcion" value="{{ old('descripcion', $product->descripcion) }}" required>
                                @error('descripcion')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">{{ __('Stock del producto') }}</label>
                                <input type="number" id="stock" class="form-control" name="stock" value="{{ old('stock', $product->stock) }}" required>
                                @error('stock')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="current_img" class="form-label">{{ __('Imagen actual del producto') }}</label>
                                @if($product->img)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $product->img) }}" alt="Current Image" class="img-fluid" style="max-width: 200px;">
                                    </div>
                                @else
                                    <p>No hay imagen actual</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">{{ __('Nueva imagen del producto') }}</label>
                                <input type="file" id="img" class="form-control" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
