@include('components.header', ['title' => 'Edit Makanan'])
<body>
    <nav>
        <a href="/"><h1>Food API</h1></a>
    </nav>
    <main>
    <form id="form_input">
        <label>Name</label>
        <input type="text">
        <label>Stock</label>
        <input type="text">
        <label>Type</label>
        <select name="" id="">
            <option value="food">Food</option>
            <option value="drink">Drink</option>
        </select>
        <br>
        <button type="submit">Submit</button>
    </form>
    <div class="right">
        <h1>Update Data:</h1>
        <h1></h1>
    </div>
    </main>
</body>
</html>