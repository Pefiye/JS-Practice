@include('components.header', ['title' => 'Tambahkan Makanan'])

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
        <form action="{{ route('add-produk-post') }}" method="POST" 
            class="form-input"
            id="form_input"
        >
            @csrf
            <h1>Tambah Produk</h1>
            <label for="name">Name</label>
            <input type="text" name="nama" id="nama" minlength="1" placeholder="Masukkan Nama Produk Disini" required>
            <label for="stock">Stock</label>
            <input type="text" inputmode="numeric" name="stock" id="stock" minlength="1"
                placeholder="Masukkan Stock Nama Produk Disini" required>
            <label for="type">Type</label>
            <select name="type" id="type" required>
                <option value="food">Food</option>
                <option value="drink">Drink</option>
            </select>
            <br>
            <button type="submit">Submit</button>
        </form>
        <div class="right">

        </div>
    </main>


</body>

</html>