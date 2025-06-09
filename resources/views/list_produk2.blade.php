<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Menu Makanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-white to-gray-500 min-h-screen text-gray-800">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-indigo-600">Daftar Menu Makanan</h1>

        <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200 bg-white">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs text-white font-semibold uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs text-white font-semibold uppercase tracking-wider">Nama Produk</th>
                        <th class="px-6 py-3 text-left text-xs text-white font-semibold uppercase tracking-wider">Deskripsi Produk</th>
                        <th class="px-6 py-3 text-left text-xs text-white font-semibold uppercase tracking-wider">Harga Produk</th>
                        <th class="px-6 py-3 text-left text-xs text-white font-semibold uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($nama as $index => $item)
                    <tr class="hover:bg-indigo-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-indigo-700">{{ $item }}</td>
                        <td class="px-6 py-4 text-sm">{{ $desc[$index] }}</td>
                        <td class="px-6 py-4 font-semibold text-green-600">Rp{{ $harga[$index] }}</td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <!-- Tombol Edit -->
                                <button onclick="openEditModal({{ $id[$index] }}, '{{ $item }}', '{{ $desc[$index] }}', '{{ $harga[$index] }}')" 
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm font-medium transition duration-200">
                                    Edit
                                </button>
                                <!-- Tombol Delete -->
                                <form action="{{ route('produk.delete', $id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        onclick="return confirm('Are you sure you want to delete {{ $item }}?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm font-medium transition duration-200">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Edit (dipindahkan ke luar loop) -->
    <div id="modalEdit" class="fixed inset-0 hidden items-center justify-center bg-black/70 backdrop-blur-sm z-50 p-4">
        <div class="bg-gradient-to-br from-slate-800 to-slate-900 border border-slate-700/50 p-8 rounded-2xl shadow-2xl w-full max-w-lg relative transform transition-all duration-300 scale-95">
            <button onclick="closeModal('modalEdit')" 
                class="absolute top-4 right-4 text-slate-400 hover:text-white p-2 rounded-full hover:bg-slate-700/50 transition-all duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            
            <div class="flex items-center gap-3 mb-6">
                <div class="w-3 h-3 bg-amber-500 rounded-full animate-pulse"></div>
                <h2 class="text-2xl font-bold text-white">Edit Produk</h2>
            </div>
            
            <form id="editForm" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="space-y-2">
                    <label class="text-blue-300 font-semibold text-sm">Nama Produk</label>
                    <input type="text" name="nama" id="editNama" required 
                        class="w-full bg-slate-700/50 border border-slate-600/50 text-white p-4 rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200" />
                </div>
                
                <div class="space-y-2">
                    <label class="text-blue-300 font-semibold text-sm">Deskripsi</label>
                    <textarea name="deskripsi" id="editDeskripsi" rows="3"
                        class="w-full bg-slate-700/50 border border-slate-600/50 text-white p-4 rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 resize-none"></textarea>
                </div>
                
                <div class="space-y-2">
                    <label class="text-blue-300 font-semibold text-sm">Harga</label>
                    <input type="number" name="harga" id="editHarga" required 
                        class="w-full bg-slate-700/50 border border-slate-600/50 text-white p-4 rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200" />
                </div>
                
                <button type="submit" 
                    class="w-full bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-500 hover:to-orange-500 text-white px-6 py-4 rounded-xl font-semibold shadow-lg transform hover:scale-105 transition-all duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    Update Produk
                </button>
            </form>
        </div>
    </div>

    <!-- Input Produk -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-8">
            <h2 class="text-2xl font-bold mb-6 text-indigo-600 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Input Produk
            </h2>
            
            <form method="POST" action="{{ route('produk.simpan') }}" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                        <input type="text" 
                               id="nama" 
                               name="nama" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                               placeholder="Masukkan nama produk">
                    </div>
                    
                    <div class="space-y-2">
                        <label for="harga" class="block text-sm font-medium text-gray-700">Harga Produk</label>
                        <input type="number" 
                               id="harga" 
                               name="harga" 
                               required
                               min="0"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                               placeholder="Masukkan harga (Rp)">
                    </div>
                </div>
                
                <div class="space-y-2">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200 resize-none"
                              placeholder="Masukkan deskripsi produk"></textarea>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" 
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg font-semibold transition duration-200 flex items-center shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, nama, deskripsi, harga) {
            document.getElementById('editNama').value = nama;
            document.getElementById('editDeskripsi').value = deskripsi;
            document.getElementById('editHarga').value = harga;
            document.getElementById('editForm').action = `/listproduk/${id}`;
            document.getElementById('modalEdit').classList.remove('hidden');
            document.getElementById('modalEdit').classList.add('flex');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.getElementById(modalId).classList.remove('flex');
        }

        // Close modal when clicking outside
        document.getElementById('modalEdit').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal('modalEdit');
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal('modalEdit');
            }
        });
    </script>

</body>
</html>