<?php
// Pripojenie k databáze
$db_host = 'localhost';
$db_user = 'andrejcak3A';
$db_pass = 'andrejcak123.';
$db_name = 'andrejcak3a';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Overenie pripojenia
if (!$conn) {
    die("Pripojenie zlyhalo: " . mysqli_connect_error());
}

// Zistenie zvoleného zoradenia
if(isset($_GET['sort'])) {
    $sortOption = $_GET['sort'];
    $sortField = substr($sortOption, 0, strpos($sortOption, "_"));
    $sortOrder = substr($sortOption, strpos($sortOption, "_") + 1);

    // Dotaz na databázu
    $sql = "SELECT id, model, značka, popis, cena FROM t_products ORDER BY $sortField $sortOrder";
    $result = mysqli_query($conn, $sql);

    // Výpis dát
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product'><p>Model: " . $row["model"] . "</p><p>Značka: " . $row["značka"] . "</p><p>Popis: " . $row["popis"] . "</p><p>Cena: " . $row["cena"] . " €</p></div>";
        }
    } else {
        echo "Žiadne produkty k dispozícii.";
    }
}

mysqli_close($conn);
?>
