@extends('layouts.newlayout')

@section('content')
    <div class="container">
        <h1>Finalización de compra</h1>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="payment_method" class="form-label">Método de pago:</label>
                <select name="payment_method" id="payment_method" class="form-select" required>
                    <option value="">Selecciona el método de pago</option>
                    @foreach($metodoPago as $metodo)
                        <option value="{{ $metodo }}">{{ $metodo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Poner orden</button>
            </div>
        </form>
    </div>
@endsection
