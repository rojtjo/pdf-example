<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <style>
        {!! file_get_contents(public_path('tailwind.min.css')) !!}
    </style>
    <style>

        .page-header, .page-header-space {
            height: 120px;
        }

        .page-footer, .page-footer-space {
            height: 80px;
        }

        .page-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .page-header {
            position: fixed;
            top: 0;
            width: 100%;
        }

        .page {
            page-break-after: always;
        }

        @page {
            margin: {{ $pageMargin ?? '16mm' }};
        }

        @media print {
            thead {
                display: table-header-group;
            }

            tfoot {
                display: table-footer-group;
            }

            button {
                display: none;
            }

            body {
                margin: 0;
            }
        }
    </style>
</head>
<body class="text-sm text-gray-900">

@if ($withHeader ?? false)
    <div class="page-header bg-blue-400">
        My Header
    </div>
@endif

@if ($withFooter ?? false)
    <div class="page-footer bg-red-400">
        My Footer
    </div>
@endif

<table class="w-full">
    @if ($withHeader ?? false)
        <thead>
        <tr>
            <td>
                <div class="page-header-space"></div>
            </td>
        </tr>
        </thead>
    @endif

    <tbody>
    <tr>
        <td>
            {{ $slot }}
        </td>
    </tr>
    </tbody>

    @if ($withFooter ?? false)
        <tfoot>
        <tr>
            <td>
                <div class="page-footer-space"></div>
            </td>
        </tr>
        </tfoot>
    @endif
</table>
</body>
</html>
