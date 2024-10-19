<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator kredytowy</title>
</head>
<body>
    <h1>Kalkulator kredytowy</h1>
    <form action="app/calc.php" method="post">
        <label for="kwota">Kwota kredytu (zł):</label>
        <input type="number" id="kwota" name="kwota" required><br><br>

        <label for="lata">Okres kredytu (lata):</label>
        <input type="number" id="lata" name="lata" required><br><br>

        <label for="oprocentowanie">Oprocentowanie (% rocznie):</label>
        <input type="number" step="0.01" id="oprocentowanie" name="oprocentowanie" required><br><br>

        <button type="submit">Oblicz ratę</button>
    </form>
</body>
</html>
