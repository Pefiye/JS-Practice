@include('components.header', ['title' => 'Data Makanan'])

<body>
    <nav>
        <a href="/">
            <h1>List Makanan ESEMKAH</h1>
        </a>
        <a href="{{ route('add-produk') }}">
            <h1>Tambahkan Produk</h1>
        </a>
    </nav>
    <div class="wrapper-data wrapper-search-engine">
        <h2>Total Produk: {{ count($products) }}</h2>
        <form class="wrapper-search">
            {{-- <label for="search">Temukan: </label> --}}
            <input type="text" name="search" id="search" placeholder="Cari Nama Produk disini">
            <button type="submit">Cari Produk</button>
        </form>
    </div>
    <main>
        <div class="right">
            @if (count($products) > 0)
                <div class="wrapper-product">
                    @foreach ($products as $product)
                        <div class="food_tab">
                            <h3>ID: <label>{{ $product->id }}</label></h3>
                            <h2>Nama: <label>{{ $product->nama }}</label></h2>
                            <h3>Tipe: <label>{{ $product->type }}</label></h3>
                            <h3>Stok: <label>{{ $product->stock }}</label></h3>

                            <div class="submit-form">
                                <form action="{{ route('edit-produk', ['product' => $product->id]) }}" id="add-form">
                                    @csrf
                                    <button class="edit-product" id="edit_produt-{{ $product->id }}">Edit Produk</button>
                                </form>
                            </div>
                            <div class="submit-form">
                                <form action="{{ route('delete-produk-delete', ['product' => $product->id]) }}" method="post"
                                    id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="delete-product" id="delete_produt-{{ $product->id }}">Delete
                                        Produk</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="wrapper-data">
                    <div class="pagination">
                        @for ($index = 1; $index <= $totalPage; $index++)
                            <form>
                                <button class="{{ $currentPage == $index ? "selected-number" : '' }}" type="submit" name="page"
                                    value="{{ $index }}">{{ $index }}</button>
                            </form>
                        @endfor
                    </div>
                </div>
            @else
                <h2 style="color:white;">Belum ada data nih, Tambahkan Produk Dulu yuk!</h2>
            @endif
        </div>
    </main>

</body>

</html>

<script defer>
    document.querySelectorAll('.delete-product').forEach(btn_delete => {
        btn_delete.addEventListener('click', (e) => {
            if (confirm('yakin ingin menghapus produk?')) {
                e.target.parentElement.submit();
            }
        });
    });
</script>