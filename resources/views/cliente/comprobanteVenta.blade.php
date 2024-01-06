<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-details {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        .invoice-details th, .invoice-details td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .invoice-details th {
            background-color: #4CAF50;
            color: white;
        }

        .invoice-footer {
            width: 80%;
            margin-top: 20px;
            text-align: right;
        }

        .signature {
            border-top: 2px solid #333;
            padding-top: 10px;
            margin-top: 30px;
        }


    </style>
    <title>Comprobante de venta Online</title>
</head>
<body>

<div class="invoice-header">
    <h1>Comprobante de venta Online</h1>
    <p>Fecha de la compra: {{$userVentaPedido->created_at}}</p>
    <p>Fecha Actual: {{$fecha}}</p>
    <p>Código venta Online: {{$userVentaPedido->codVenta}}</p>

    @if ($userVentaPedido->estado == "porAceptar")
    <p>Estado: <span style="color: #C52100"> Solicitado </span></p>
    @elseif ($userVentaPedido->estado == "aceptado")
    <p>Estado: <span style="color: #00C5A7"> En camino</span></p>
    @else
    <p>Estado: <span style="color: #09C500">Entregado</span> </p>
    @endif


</div>

<table class="invoice-details">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($compraOnline as $compra)

        <tr>



            <td>{{$compra->productos->nombreProd}}</td>
            <td>{{$compra->cant_Producto}}</td>
            <td>$ {{$compra->productos->precioProd}}</td>
            <td>$ {{$compra->cant_Producto*$compra->productos->precioProd}}</td>

        </tr>

        @endforeach


    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" style="text-align: right;">Total:</td>
            <td>$ {{$userVentaPedido->total}}</td>
        </tr>
    </tfoot>
</table>

<div class="invoice-footer">
    <p>Gracias por su compra.</p>
</div>

<div class="signature">
    <div class="signature-box" style="margin-top: 50px;">
        <p>Firma del Cliente: ______________________</p>
    </div>
    <div class="signature-box" style="margin-top: 50px;">

        <p>Equipo FEDAC: _<img src="https://w7.pngwing.com/pngs/653/334/png-transparent-tuesdays-with-morrie-writer-brandeis-university-signature-block-playwright-junine-angle-white-text-thumbnail.png" alt="" width="150px" height="80px">_</p>
    </div>
</div>

<div class="footer-text">
    <p>Por favor, conserve este comprobante para futuras referencias.</p>
</div>

</body>
</html>
