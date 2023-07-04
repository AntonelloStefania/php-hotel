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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;500;700;800;900&display=swap" rel="stylesheet">
    <title>Hotels</title>
</head>
<body>
    <Header>
        <?php include __DIR__.'/partials/header.php'?>
    </Header>
    <Main>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-12 form-container mb-5">
                        <form action="index.php" method="GET" class="d-flex justify-content-around  h-100 align-items-center p-1">
                            <div class="d-flex col-auto align-items-center">
                                <label  class="mx-3 d-none d-md-inline">parcheggio:</label>
                                <select class="form-control p-1"  name="parking">
                                    <option value="all" selected> no filter</option>
                                    <option value="1">si</option>
                                    <option value="2">no</option>
                                </select>
                            </div>
                            <div class=" d-flex col-auto align-items-center">
                                <label  class="mx-3 d-none d-md-inline">rating:</label>
                                <select class="form-control p-1"  name="rating">
                                        <option value="all" selected>no filter</option>
                                        <option value="1">1 stella</option>
                                        <option value="2">2 stelle</option>
                                        <option value="3">3 stelle</option>
                                        <option value="4">4 stelle</option>
                                        <option value="5">5 stelle</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-dark text-white fw-bolder bg-button">search</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 card table-container">
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
                                <td class="description">
                                    <a href="#"><?php echo $hotel['description'].'...'?></a>
                                </td>
                                <td class="ps-5">
                                    <?php echo ($hotel['parking'] == true) ? 'si' : 'no' ?>
                                </td>
                                <td>
                                    <?php  
                                    for ($i = 1; $i <= $hotel['vote']; $i++) {
                                        echo '<i class="fa-solid fa-star fa-xs" style="color: #fad000;"></i>';
                                    } 
                                    ?>
                                </td>
                                <td class="ps-4  justify-content-between">
                                    <?php echo $hotel['distance_to_center'].'km'?>
                                    <a href="#" class="d-none d-md-inline"><i class="fa fa-map-location-dot ps-3" style="color: #05070b;"></i></a>
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

