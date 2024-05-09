<?php
session_start(); // Otvorenie session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkty</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Produkty</h1>
        <?php
        // Vítať používateľa a odkaz na odhlásenie
        if(isset($_SESSION['username'])) {
            echo 'Vitaj '.$_SESSION['username'].'!<br>';
            echo 'Klikni sem pre <a href="logout.php" title="Odhlásiť sa">odhlásenie</a>.';
        }
        ?>
        <div class="filter">
            <label for="sort">Zoradiť podľa:</label>
            <select name="sort" id="sort">
                <option value="id_ASC">ID ↑</option>
                <option value="id_DESC">ID ↓</option>
                <option value="model_ASC">Model ↑</option>
                <option value="model_DESC">Model ↓</option>
                <option value="značka_ASC">Značka ↑</option>
                <option value="značka_DESC">Značka ↓</option>
                <option value="cena_ASC">Cena ↑</option>
                <option value="cena_DESC">Cena ↓</option>
            </select>
        </div>
        <div class="products" id="product-container">
            <!-- Sem sa načítajú produkty AJAXom -->
        </div>
    </div>
    <script>
        // Funkcia na načítanie produktov AJAXom
        function loadProducts(sortOption) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("product-container").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "load_products.php?sort=" + sortOption, true);
            xhttp.send();
        }

        // Funkcia na zmenu zoradenia v reálnom čase
        document.getElementById('sort').addEventListener('change', function() {
            var sortOption = this.value;
            loadProducts(sortOption);
        });

        // Načítať produkty pri načítaní stránky
        loadProducts(document.getElementById('sort').value);
    </script>
</body>
</html>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 0 20px;
}

h1 {
    text-align: center;
}

.filter {
    margin-bottom: 20px;
}

.filter label {
    margin-right: 10px;
}

.products {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.product {
    border: 1px solid #ccc;
    padding: 10px;
    background-color: #f9f9f9;
}

.product p {
    margin: 5px 0;
}

/* Link styling */
a {
    text-decoration: none;
    color: blue;
}

a:hover {
    text-decoration: underline;
}

</style>
