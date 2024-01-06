<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 3rem;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 15px auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 10px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0EDACE;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .signature {
            border-top: 1px solid #ddd;

        }
        .footer {
            margin-top: 10rem;
            width: 80%;
            text-align: right;
        }

        .expired {
            background-color: #FFD2D2; /* Color rojo para productos caducados */
        }

        .not-expired {
            background-color: #C2FFC2; /* Color verde para productos no caducados */
        }

        .por-caducar {
            background-color: #FEFB72; /* Color verde para productos no caducados */
        }

        .por-agotarse{
            background-color: #FBC663
        }

        .legend {
            display: flex;
            justify-content: space-around;
            margin-top: 2rem;
            margin-left: 1rem;
            width: 30%;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }
        .legend-item span {
            margin-left: 5px;
        }


    </style>
    <title>Reporte de productos</title>
</head>
<body>

<h2>Reporte de productos de la fecha: <strong> {{$fecha}} </strong> </h2>


<table class="mt-5">
    <thead>
        <tr>

            <th>Cod. barras</th>
            <th>Nombre</th>
            <th>Fecha de Vencimiento</th>
            <th>Stock</th>
            <th>Precio</th>

        </tr>
    </thead>
    <tbody>
        <!-- Aquí puedes insertar datos dinámicamente desde tu base de datos o de alguna fuente de datos -->

        @foreach ($productos as $producto)
        <tr>

            <td>{{$producto->codigoBarras}}</td>
            <td>{{$producto->nombreProd}}</td>


            @if ($producto->fechaVencProd > $fecha->subDay(15))
            <td style="color: #F3EF00">{{$producto->fechaVencProd }}</td>
            @elseif ($producto->fechaVencProd < $fecha)
            <td style="color: red">{{$producto->fechaVencProd }}</td>
            @else
            <td style="color: green">>{{$producto->fechaVencProd }}</td>
            @endif


            @if ($producto->stock<16)
            <td style="color: #FFB832">{{$producto->stock}}</td>
            @else
            <td >{{$producto->stock}}</td>
            @endif



            <td>$ {{$producto->precioProd}}</td>
        </tr>
        @endforeach


        <!-- Agrega más filas según sea necesario -->
    </tbody>
</table>

<div class="legend">
    <strong>-- Leyenda --</strong>
    <div class="legend-item expired">
        <div style="width: 20px; height: 20px; border-radius: 50%; background-color: #FFD2D2;"></div>
        <span>Caducado</span>
    </div>
    <div class="legend-item not-expired">
        <div style="width: 20px; height: 20px; border-radius: 50%; background-color: #C2FFC2;"></div>
        <span>No Caducado</span>
    </div>
    <div class="legend-item por-caducar">
        <div style="width: 20px; height: 20px; border-radius: 50%; background-color: #FEFB72;"></div>
        <span>Próximos a caducar</span>
    </div>
    <div class="legend-item por-agotarse">
        <div style="width: 20px; height: 20px; border-radius: 50%; background-color: #FBC663;"></div>
        <span>Productos casi agotados</span>
    </div>
</div>



<footer>
    <div class="footer">
        <div class="signature">
            <p>Firma responsable: ______________________</p>
        </div>
    </div>

</footer>
</body>

</html>
