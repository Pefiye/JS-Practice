@include('components.header', ['title' => 'Edit Makanan'])

<body>
    <nav>
        <a href="/">
            <h1>List Makanan ESEMKAH</h1>
        </a>
        <a href="{{ route('add-produk') }}">
            <h1>Tambahkan Produk</h1>
        </a>
    </nav>
    <main>
        <form action="{{ route('edit-produk-put', ['product' => $product['id']]) }}" 
            method="POST" 
            class="form-input"
            id="form_input"
        >           
            @csrf
            @method('PUT')
            <h1>Edit Produk</h1>
            <input type="hidden" name="id" id="id" minlength="1"  value="{{  $product['id'] }}"  readonly>
            <label for="name">Name</label>
            <input type="text" name="nama" id="nama" minlength="1" placeholder="Masukkan Nama Produk Disini" value="{{  $product['nama'] }}" required>
            <label for="stock">Stock</label>
            <input type="text" inputmode="numeric" name="stock" id="stock" minlength="1"
                placeholder="Masukkan Stock Nama Produk Disini" value="{{ $product['stock'] }}" required>
            <label for="type">Type</label>
            <select name="type" id="type" required>
                <option value="food" @selected($product['type'] == 'food') >Food</option>
                <option value="drink" @selected($product['type'] == 'food')>Drink</option>
            </select>
            <br>
            <button type="submit">Submit</button>
        </form>
    </main>
</body>

</html>