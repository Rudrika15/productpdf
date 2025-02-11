<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Product List - {{ $category_name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Product List for {{ $category_name }}</h1>
    <p>Date: {{ $date }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Model No</th>
                <th>Image</th>
                <th>Size</th>
                <th>color</th>

                <th>mrp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->modelno }}</td>
                    <td>
                        <img src="{{ $product->image }}" alt="Product Image"
                            style="max-width: 100px ; max-height: 100px; object-fit: contain">
                    </td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->mrp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
