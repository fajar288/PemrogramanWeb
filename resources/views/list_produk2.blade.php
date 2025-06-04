<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Menu Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-indigo-600">Daftar Menu Makanan</h1>

        <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200 bg-white">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs text-blue-600 font-semibold uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs text-blue-600 font-semibold uppercase tracking-wider">Nama Produk</th>
                        <th class="px-6 py-3 text-left text-xs text-blue-600 font-semibold uppercase tracking-wider">Deskripsi Produk</th>
                        <th class="px-6 py-3 text-left text-xs text-blue-600 font-semibold uppercase tracking-wider">Harga Produk</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($nama as $index => $item)
                    <tr class="hover:bg-indigo-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-indigo-700">{{ $item }}</td>
                        <td class="px-6 py-4 text-sm">{{ $desc[$index] }}</td>
                        <td class="px-6 py-4 font-semibold text-green-600">Rp{{ number_format($harga[$index], 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
