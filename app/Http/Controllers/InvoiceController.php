<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductoVacuna;


class InvoiceController extends Controller
{
    public function index()
    {
        $facturas = Factura::with('facturaDetails.product')->get();
        return view('invoices.index', compact('facturas'));
    }

    public function show($id)
    {
        $factura = Factura::with(['facturaDetails.product.productoVacunas.vacuna', 'users'])
            ->select('factura.*', 'especificacion', 'metodoPago')
            ->findOrFail($id);

        return view('invoices.show', compact('factura'));
    }

    public function userInvoices(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $userId = Auth::id();
        $facturas = Factura::with('facturaDetails.product')
            ->where('usuarios_id_usuario', $userId)
            ->paginate(6); // Cambia 10 por el número de facturas que deseas mostrar por página

        return view('invoices.user-invoices', compact('facturas'));
    }


    public function userInvoiceDetails($id)
    {
        $userId = Auth::id();
        $factura = Factura::with(['facturaDetails.product.productoVacunas.vacuna', 'users'])
            ->select('factura.*', 'especificacion', 'metodoPago')
            ->where('usuarios_id_usuario', $userId)
            ->findOrFail($id);

        return view('invoices.user-invoice-details', compact('factura'));
    }
}
