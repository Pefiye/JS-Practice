@include('components.header', ['title' => 'Data Makanan'])
<body>
    <nav>
        <a href="/"><h1>Food API</h1></a>
    </nav>
    <main>
    <div class="right">
        <div class="food_tab">
                <h3>ID: <label></label></h3>
                <h2>Nama: <label></label></h2>
                <h3>Tipe: <label></label></h3>
                <h3>Stok: <label></label></h3>

                <button id="editts">Edit</button>
                <button id="deletets">Delete</button>
        </div>
    </div>
    </main>
</body>
</html>