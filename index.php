<?php
require_once __DIR__ . '/CLASSES/Product.php';
require_once __DIR__ . '/CLASSES/Premium.php';

$products = [
    new Product("Presa (in giro)", 20.99),
    new Product("Lucida Labrador", 5.20),
    new Product("Appunta-mento", 1.00),
    new Product("Appunta-mento PREMIUM 3", 300.00),
    new Product("Frutti di Mario", 45.55),
    new Product("Pigiama a forma di vestito", 83.00),
    new Product("Pigiama a forma di vestito Premium 1", 183.00)
];

$products[3]->set_level_sub_required(3);
$products[6]->set_level_sub_required(1);

$user_1 = new User("MamaImCraying_01", "viziatino@gmail.com", "123456789");
$user_1->set_name("Giacomo");
$user_1->set_last_name("Leopoldi");
$user_1->set_date_of_birth("18-04-2005");
$user_1->set_credit_cards([new CreditCard("4242350523523", "24-01-2030", "Giacomo", "Leopoldi"), new CreditCard("34535353515", "15-11-2052", "MadreDiGiacomo", "FiglioViziato")]);

$user_2 = new Premium("Taccagno_02", "iononpago@yahoo.it", "987654321", 2, "19-01-2022", 3);
$user_2->set_email("avevo.sbagliato.mail@smemorato.com");

$user_3 = new Premium("Spendaccione_03", "compro.tutto@hotantisoldi.com", "unaltrapassword", 3, "16-02-2022", 20);

$choosed_user;
if (!empty($_GET['user'])) {
    $variable = $_GET['user'];
    switch ($variable) {
        case '1':
            $choosed_user = $user_1;
            break;
        case '2':
            $choosed_user = $user_2;
            break;
        case '3':
            $choosed_user = $user_3;
            break;

        default:
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP - 2</title>
</head>

<body>
    <form action="">
        <select name="user" id="user">
            <option value="1">Utente 1</option>
            <option value="2">Utente 2</option>
            <option value="3">Utente 3</option>
        </select>
        <button>Go!</button>
    </form>
    <?php if (empty($_GET['user'])) : ?>
        <h1>Select a user to show different prices</h1>
    <?php else : ?>
        <h2>Benvenuto <?= $choosed_user->get_nick_name() ?>(<?= $choosed_user->get_email() ?>)</h2>
        <?php if ($choosed_user->get_name() != null && $choosed_user->get_last_name() != null) : ?>
            <h3>Nome: <?= $choosed_user->get_name() ?> <br> Cognome: <?= $choosed_user->get_last_name() ?></h2>
            <?php endif ?>
        <?php endif ?>
        <ul>
            <?php foreach ($products as $product) :
                if (get_class($choosed_user) === "Premium" && $product->get_level_sub_required() <= $choosed_user->get_level()) : ?>
                    <li>
                        <h3>Prodotto: <?= $product->get_name() ?></h3>
                        <h3>Prezzo: <?= $product->get_price() * (100 - $choosed_user->get_discount()) / 100 ?> &euro;</h3>
                    </li>
                <?php elseif (get_class($choosed_user) === "User" && $product->get_level_sub_required() === null) : ?>
                    <li>
                        <h3>Prodotto: <?= $product->get_name() ?></h3>
                        <h3>Prezzo: <?= $product->get_price() ?> &euro;</h3>
                    </li>
            <?php endif;
            endforeach ?>
        </ul>
</body>

</html>