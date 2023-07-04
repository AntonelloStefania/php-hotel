<?php
require __DIR__.'/partials/hotels.php';

if(isset($_GET['rating'])){

    $rating = $_GET['rating'];
    
    $filtered_hotels = [];
    foreach ($hotels as $hotel_rated){
        if($hotel_rated['vote'] == $rating){
            $filtered_hotels [] = $hotel_rated;
        }elseif($rating == 'all'){
            $filtered_hotels = $hotels;
        }
    } 
    $hotels = $filtered_hotels ;
}

if(isset($_GET['parking'])){
    $park = $_GET['parking'];

    $hotel_with_park =[];
    foreach ($hotels as $hotel_parking){
        if($hotel_parking['parking'] == filter_var($park, FILTER_VALIDATE_BOOLEAN)){
            $hotel_with_park [] = $hotel_parking;
        }elseif($park == 'all'){
            $hotel_with_park = $hotels;
        }
    }
    $hotels = $hotel_with_park;
}


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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <div class="col-auto">
                <form action="index.php" method="GET">
                    <div>
                        <div class="form-group d-flex">
                            <label for="exampleFormControlSelect1" class="mx-3">parcheggio:</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="parking">
                                <option value="all" selected>all</option>
                                <option value="1">si</option>
                                <option value="2">no</option>
                            </select>
                         </div>
                    </div>
                    <div>
                        <div class="form-group d-flex">
                           <label for="exampleFormControlSelect1" class="mx-3">rating:</label>
                           <select class="form-control" id="exampleFormControlSelect1" name="rating">
                                <option value="all" selected>all</option>
                                <option value="1">1 stella</option>
                                <option value="2">2 stelle</option>
                                <option value="3">3 stelle</option>
                                <option value="4">4 stelle</option>
                                <option value="5">5 stelle</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <button type="submit">search</button>
                        </div>
                    </div>
                </form>
            </div>
                </div>
            </div>
        </div>
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

