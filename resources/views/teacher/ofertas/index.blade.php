@extends('teacher.app')

@section('content')
    <style>
        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: separate;
            border-spacing: 0;
            /*
                                               * Header and footer styles
                                               */
            /*
                                               * Body styles
                                               */
        }

        table.dataTable thead th,
        table.dataTable tfoot th {
            font-weight: bold;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 10px 18px;
            border-bottom: 1px solid #111111;
        }

        table.dataTable thead th:active,
        table.dataTable thead td:active {
            outline: none;
        }

        table.dataTable tfoot th,
        table.dataTable tfoot td {
            padding: 10px 18px 6px 18px;
            border-top: 1px solid #111111;
        }

        table.dataTable thead .sorting,
        table.dataTable thead .sorting_asc,
        table.dataTable thead .sorting_desc,
        table.dataTable thead .sorting_asc_disabled,
        table.dataTable thead .sorting_desc_disabled {
            cursor: pointer;
            *cursor: hand;
            background-repeat: no-repeat;
            background-position: center right;
        }

        table.dataTable tbody tr {
            background-color: #ffffff;
        }

        table.dataTable tbody tr.selected {
            background-color: #b0bed9;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 8px 10px;
        }

        table.dataTable.row-border tbody th,
        table.dataTable.row-border tbody td,
        table.dataTable.display tbody th,
        table.dataTable.display tbody td {
            border-top: 1px solid #dddddd;
        }

        table.dataTable.row-border tbody tr:first-child th,
        table.dataTable.row-border tbody tr:first-child td,
        table.dataTable.display tbody tr:first-child th,
        table.dataTable.display tbody tr:first-child td {
            border-top: none;
        }

        table.dataTable.cell-border tbody th,
        table.dataTable.cell-border tbody td {
            border-top: 1px solid #dddddd;
            border-right: 1px solid #dddddd;
        }

        table.dataTable.cell-border tbody tr th:first-child,
        table.dataTable.cell-border tbody tr td:first-child {
            border-left: 1px solid #dddddd;
        }

        table.dataTable.cell-border tbody tr:first-child th,
        table.dataTable.cell-border tbody tr:first-child td {
            border-top: none;
        }

        table.dataTable.stripe tbody tr.odd,
        table.dataTable.display tbody tr.odd {
            background-color: #f9f9f9;
        }

        table.dataTable.stripe tbody tr.odd.selected,
        table.dataTable.display tbody tr.odd.selected {
            background-color: #acbad4;
        }

        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #f6f6f6;
        }

        table.dataTable.hover tbody tr:hover.selected,
        table.dataTable.display tbody tr:hover.selected {
            background-color: #aab7d1;
        }

        table.dataTable.order-column tbody tr>.sorting_1,
        table.dataTable.order-column tbody tr>.sorting_2,
        table.dataTable.order-column tbody tr>.sorting_3,
        table.dataTable.display tbody tr>.sorting_1,
        table.dataTable.display tbody tr>.sorting_2,
        table.dataTable.display tbody tr>.sorting_3 {
            background-color: #fafafa;
        }

        table.dataTable.order-column tbody tr.selected>.sorting_1,
        table.dataTable.order-column tbody tr.selected>.sorting_2,
        table.dataTable.order-column tbody tr.selected>.sorting_3,
        table.dataTable.display tbody tr.selected>.sorting_1,
        table.dataTable.display tbody tr.selected>.sorting_2,
        table.dataTable.display tbody tr.selected>.sorting_3 {
            background-color: #acbad5;
        }

        table.dataTable.display tbody tr.odd>.sorting_1,
        table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
            background-color: #f1f1f1;
        }

        table.dataTable.display tbody tr.odd>.sorting_2,
        table.dataTable.order-column.stripe tbody tr.odd>.sorting_2 {
            background-color: #f3f3f3;
        }

        table.dataTable.display tbody tr.odd>.sorting_3,
        table.dataTable.order-column.stripe tbody tr.odd>.sorting_3 {
            background-color: whitesmoke;
        }

        table.dataTable.display tbody tr.odd.selected>.sorting_1,
        table.dataTable.order-column.stripe tbody tr.odd.selected>.sorting_1 {
            background-color: #a6b4cd;
        }

        table.dataTable.display tbody tr.odd.selected>.sorting_2,
        table.dataTable.order-column.stripe tbody tr.odd.selected>.sorting_2 {
            background-color: #a8b5cf;
        }

        table.dataTable.display tbody tr.odd.selected>.sorting_3,
        table.dataTable.order-column.stripe tbody tr.odd.selected>.sorting_3 {
            background-color: #a9b7d1;
        }

        table.dataTable.display tbody tr.even>.sorting_1,
        table.dataTable.order-column.stripe tbody tr.even>.sorting_1 {
            background-color: #fafafa;
        }

        table.dataTable.display tbody tr.even>.sorting_2,
        table.dataTable.order-column.stripe tbody tr.even>.sorting_2 {
            background-color: #fcfcfc;
        }

        table.dataTable.display tbody tr.even>.sorting_3,
        table.dataTable.order-column.stripe tbody tr.even>.sorting_3 {
            background-color: #fefefe;
        }

        table.dataTable.display tbody tr.even.selected>.sorting_1,
        table.dataTable.order-column.stripe tbody tr.even.selected>.sorting_1 {
            background-color: #acbad5;
        }

        table.dataTable.display tbody tr.even.selected>.sorting_2,
        table.dataTable.order-column.stripe tbody tr.even.selected>.sorting_2 {
            background-color: #aebcd6;
        }

        table.dataTable.display tbody tr.even.selected>.sorting_3,
        table.dataTable.order-column.stripe tbody tr.even.selected>.sorting_3 {
            background-color: #afbdd8;
        }

        table.dataTable.display tbody tr:hover>.sorting_1,
        table.dataTable.order-column.hover tbody tr:hover>.sorting_1 {
            background-color: #eaeaea;
        }

        table.dataTable.display tbody tr:hover>.sorting_2,
        table.dataTable.order-column.hover tbody tr:hover>.sorting_2 {
            background-color: #ececec;
        }

        table.dataTable.display tbody tr:hover>.sorting_3,
        table.dataTable.order-column.hover tbody tr:hover>.sorting_3 {
            background-color: #efefef;
        }

        table.dataTable.display tbody tr:hover.selected>.sorting_1,
        table.dataTable.order-column.hover tbody tr:hover.selected>.sorting_1 {
            background-color: #a2aec7;
        }

        table.dataTable.display tbody tr:hover.selected>.sorting_2,
        table.dataTable.order-column.hover tbody tr:hover.selected>.sorting_2 {
            background-color: #a3b0c9;
        }

        table.dataTable.display tbody tr:hover.selected>.sorting_3,
        table.dataTable.order-column.hover tbody tr:hover.selected>.sorting_3 {
            background-color: #a5b2cb;
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid #111111;
        }

        table.dataTable.nowrap th,
        table.dataTable.nowrap td {
            white-space: nowrap;
        }

        table.dataTable.compact thead th,
        table.dataTable.compact thead td {
            padding: 4px 17px;
        }

        table.dataTable.compact tfoot th,
        table.dataTable.compact tfoot td {
            padding: 4px;
        }

        table.dataTable.compact tbody th,
        table.dataTable.compact tbody td {
            padding: 4px;
        }

        table.dataTable th.dt-left,
        table.dataTable td.dt-left {
            text-align: left;
        }

        table.dataTable th.dt-center,
        table.dataTable td.dt-center,
        table.dataTable td.dataTables_empty {
            text-align: center;
        }

        table.dataTable th.dt-right,
        table.dataTable td.dt-right {
            text-align: right;
        }

        table.dataTable th.dt-justify,
        table.dataTable td.dt-justify {
            text-align: justify;
        }

        table.dataTable th.dt-nowrap,
        table.dataTable td.dt-nowrap {
            white-space: nowrap;
        }

        table.dataTable thead th.dt-head-left,
        table.dataTable thead td.dt-head-left,
        table.dataTable tfoot th.dt-head-left,
        table.dataTable tfoot td.dt-head-left {
            text-align: left;
        }

        table.dataTable thead th.dt-head-center,
        table.dataTable thead td.dt-head-center,
        table.dataTable tfoot th.dt-head-center,
        table.dataTable tfoot td.dt-head-center {
            text-align: center;
        }

        table.dataTable thead th.dt-head-right,
        table.dataTable thead td.dt-head-right,
        table.dataTable tfoot th.dt-head-right,
        table.dataTable tfoot td.dt-head-right {
            text-align: right;
        }

        table.dataTable thead th.dt-head-justify,
        table.dataTable thead td.dt-head-justify,
        table.dataTable tfoot th.dt-head-justify,
        table.dataTable tfoot td.dt-head-justify {
            text-align: justify;
        }

        table.dataTable thead th.dt-head-nowrap,
        table.dataTable thead td.dt-head-nowrap,
        table.dataTable tfoot th.dt-head-nowrap,
        table.dataTable tfoot td.dt-head-nowrap {
            white-space: nowrap;
        }

        table.dataTable tbody th.dt-body-left,
        table.dataTable tbody td.dt-body-left {
            text-align: left;
        }

        table.dataTable tbody th.dt-body-center,
        table.dataTable tbody td.dt-body-center {
            text-align: center;
        }

        table.dataTable tbody th.dt-body-right,
        table.dataTable tbody td.dt-body-right {
            text-align: right;
        }

        table.dataTable tbody th.dt-body-justify,
        table.dataTable tbody td.dt-body-justify {
            text-align: justify;
        }

        table.dataTable tbody th.dt-body-nowrap,
        table.dataTable tbody td.dt-body-nowrap {
            white-space: nowrap;
        }

        table.dataTable,
        table.dataTable th,
        table.dataTable td {
            box-sizing: content-box;
        }

        /*
                                             * Control feature layout
                                             */
        .dataTables_wrapper {
            position: relative;
            clear: both;
            *zoom: 1;
            zoom: 1;
        }

        .dataTables_wrapper .dataTables_length {
            float: left;
        }

        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            padding: 4px;
        }

        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            margin-left: 3px;
        }

        .dataTables_wrapper .dataTables_info {
            clear: both;
            float: left;
            padding-top: 0.755em;
        }

        .dataTables_wrapper .dataTables_paginate {
            float: right;
            text-align: right;
            padding-top: 0.25em;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            box-sizing: border-box;
            display: inline-block;
            min-width: 1.5em;
            padding: 0.5em 1em;
            margin-left: 2px;
            text-align: center;
            text-decoration: none !important;
            cursor: pointer;
            *cursor: hand;
            color: #333333 !important;
            border: 1px solid transparent;
            border-radius: 2px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #333333 !important;
            border: 1px solid #979797;
            background-color: white;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, white), color-stop(100%, #dcdcdc));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, white 0%, #dcdcdc 100%);
            /* Chrome10+,Safari5.1+ */
            background: -moz-linear-gradient(top, white 0%, #dcdcdc 100%);
            /* FF3.6+ */
            background: -ms-linear-gradient(top, white 0%, #dcdcdc 100%);
            /* IE10+ */
            background: -o-linear-gradient(top, white 0%, #dcdcdc 100%);
            /* Opera 11.10+ */
            background: linear-gradient(to bottom, white 0%, #dcdcdc 100%);
            /* W3C */
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
            cursor: default;
            color: #666 !important;
            border: 1px solid transparent;
            background: transparent;
            box-shadow: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: white !important;
            border: 1px solid #111111;
            background-color: #585858;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111111));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, #585858 0%, #111111 100%);
            /* Chrome10+,Safari5.1+ */
            background: -moz-linear-gradient(top, #585858 0%, #111111 100%);
            /* FF3.6+ */
            background: -ms-linear-gradient(top, #585858 0%, #111111 100%);
            /* IE10+ */
            background: -o-linear-gradient(top, #585858 0%, #111111 100%);
            /* Opera 11.10+ */
            background: linear-gradient(to bottom, #585858 0%, #111111 100%);
            /* W3C */
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            outline: none;
            background-color: #2b2b2b;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #2b2b2b), color-stop(100%, #0c0c0c));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
            /* Chrome10+,Safari5.1+ */
            background: -moz-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
            /* FF3.6+ */
            background: -ms-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
            /* IE10+ */
            background: -o-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
            /* Opera 11.10+ */
            background: linear-gradient(to bottom, #2b2b2b 0%, #0c0c0c 100%);
            /* W3C */
            box-shadow: inset 0 0 3px #111;
        }

        .dataTables_wrapper .dataTables_paginate .ellipsis {
            padding: 0 1em;
        }

        .dataTables_wrapper .dataTables_processing {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 40px;
            margin-left: -50%;
            margin-top: -25px;
            padding-top: 20px;
            text-align: center;
            font-size: 1.2em;
            background-color: white;
            background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255, 255, 255, 0)), color-stop(25%, rgba(255, 255, 255, 0.9)), color-stop(75%, rgba(255, 255, 255, 0.9)), color-stop(100%, rgba(255, 255, 255, 0)));
            background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
            background: -moz-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
            background: -ms-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
            background: -o-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: #333333;
            padding: 15px
        }

        .dataTables_wrapper .dataTables_scroll {
            clear: both;
        }

        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody {
            *margin-top: -1px;
            -webkit-overflow-scrolling: touch;
        }

        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>th,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>td,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>th,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>td {
            vertical-align: middle;
        }

        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>th>div.dataTables_sizing,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>td>div.dataTables_sizing,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>th>div.dataTables_sizing,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>td>div.dataTables_sizing {
            height: 0;
            overflow: hidden;
            margin: 0 !important;
            padding: 0 !important;
        }

        .dataTables_wrapper.no-footer .dataTables_scrollBody {
            border-bottom: 1px solid #111111;
        }

        .dataTables_wrapper.no-footer div.dataTables_scrollHead table.dataTable,
        .dataTables_wrapper.no-footer div.dataTables_scrollBody>table {
            border-bottom: none;
        }

        .dataTables_wrapper:after {
            visibility: hidden;
            display: block;
            content: "";
            clear: both;
            height: 0;
        }

        @media screen and (max-width: 767px) {

            .dataTables_wrapper .dataTables_info,
            .dataTables_wrapper .dataTables_paginate {
                float: none;
                text-align: center;
            }

            .dataTables_wrapper .dataTables_paginate {
                margin-top: 0.5em;
            }
        }

        @media screen and (max-width: 640px) {

            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter {
                float: none;
                text-align: center;
            }

            .dataTables_wrapper .dataTables_filter {
                margin-top: 0.5em;
            }
        }

    </style>
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <!-- {{ __('home.menu.tablero') }} Headline -->
            <div class="dashboard-headline">
                <h3>{{ __('home.menu.ofertas') }}</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">{{ __('home.menu.tablero') }}</a></li>
                        <li>{{ __('home.menu.ofertas') }}</li>
                    </ul>
                </nav>
            </div>

            @include('includes.notify')

            <!-- Row -->
            <div class="row">

                <!-- {{ __('home.menu.tablero') }} Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">

                        <div class="content">
                            <table class="basic-table" id="ofertasTabla">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Titulo</th>
                                        <th>Localización</th>
                                        <th>Tipo</th>
                                        <th>Categoría</th>
                                        <th>Salario</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ofertas as $item)
                                        <tr>
                                            <td>{{ ucfirst($item->nombre . $item->apellidos) }}</td>
                                            <td>{{ ucfirst($item->titulo) }}</td>
                                            <td>{{ ucfirst($item->localizacion) }}</td>
                                            <td>{{ ucfirst($item->nombre_tipo) }}</td>
                                            <td>{{ ucfirst($item->nombre_cat) }}</td>
                                            @if ($item->salario_min && $item->salario_max)
                                                <td>{{ $item->salario_min }}€ - {{ $item->salario_max }}€</td>
                                            @else
                                                <td>Sin especificar</td>
                                            @endif
                                            <td> {{ Date::parse($item->created_at)->format('j \\' . __('date.de') . ' F \\' . __('date.de') . ' Y - H:i') }}
                                            </td>
                                            <td>
                                                <a class="button dark ripple-effect" style="color: white"
                                                    href="{{ route('teacher.oferta.editar', ['id' => $item->id]) }}"><i
                                                        class="icon-feather-edit"></i></a>

                                                <a class="button red ripple-effect" style="color: white"
                                                    href="{{ route('teacher.oferta.eliminar', ['id' => $item->id]) }}"><i
                                                        class="icon-feather-trash-2"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Titulo</th>
                                        <th>Localización</th>
                                        <th>Tipo</th>
                                        <th>Categoría</th>
                                        <th>Salario</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Row / End -->

            <div class="dashboard-footer-spacer"></div>
            <div class="small-footer margin-top-15">
                <div class="small-footer-copyrights">
                    © 2021 <strong>JobSierra</strong>. {{ __('home.derechos') }}
                </div>
    
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

@section('menu')
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $('#ofertas').addClass('active')
        $('#ofertasTabla').DataTable({
            "language": {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "1": "Mostrar 1 fila",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio",
                            "not": "Diferente de"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío",
                            "not": "Diferente de"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con",
                            "not": "Diferente de"
                        },
                        "array": {
                            "not": "Diferente de",
                            "equals": "Igual",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "notEmpty": "No Vacío",
                            "without": "Sin"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d"
                },
                "select": {
                    "1": "%d fila seleccionada",
                    "_": "%d filas seleccionadas",
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "$d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    }
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Proximo",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "am",
                        "pm"
                    ]
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear Nuevo Registro",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar Registro",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Eliminar",
                        "title": "Eliminar Registro",
                        "submit": "Eliminar",
                        "confirm": {
                            "_": "¿Está seguro que desea eliminar %d filas?",
                            "1": "¿Está seguro que desea eliminar 1 fila?"
                        }
                    },
                    "error": {
                        "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                    },
                    "multi": {
                        "title": "Múltiples Valores",
                        "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                        "restore": "Deshacer Cambios",
                        "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                    }
                },
                "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
            }
        })

    </script>
@endsection
