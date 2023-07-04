<?php
require __DIR__.'/partials/hotels.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hotels</title>
</head>
<body>
    <Header>
        <?php include __DIR__.'/partials/header.php'?>
    </Header>
    <Main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrizione</th>
                                <th scope="col">Parcheggio</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Distanza P.o.I.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($hotels as $hotel) {?>
                            <tr>
                                <th scope="row">
                                    <?php echo $hotel['name']?>
                                </th>
                                <td>
                                    <a href="#"><?php echo $hotel['description'].'...'?></a>
                                </td>
                                <td>
                                    <?php echo ($hotel['parking'] == true) ? 'si' : 'no' ?>
                                </td>
                                <td>
                                    <?php  
                                    for ($i = 1; $i <= $hotel['vote']; $i++) {
                                        echo '<i class="fa-solid fa-star fa-xs" style="color: #fad000;"></i>';
                                    } 
                                    ?>
                                </td>
                                <td>
                                    <?php echo $hotel['distance_to_center'].'km'?>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </Main>
    
</body>
</html>

