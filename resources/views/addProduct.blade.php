@include('components.header', ['title' => 'Tambahkan Makanan'])

<body>
    <nav>
        <h1>Food API</h1>
    </nav>
    <main>
        <form action="{{ route('add-produk-post') }}" method="post" id="form_input">
            <h1>Tambah Produk</h1>
            <label for="name">Name</label>
            <input type="text" name="name" id="name"  minlength="1" placeholder="Masukkan Nama Produk Disini" required>
            <label for="stock">Stock</label>
            <input type="text" inputmode="numeric" name="stock" id="stock"  minlength="1" placeholder="Masukkan Stock Nama Produk Disini" required>
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