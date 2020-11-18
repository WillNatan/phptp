<?php
include_once('models/Client.php');
include_once('getCustomers.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>Clients</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Clients</h1>
        <div class="row">
        <div class="col-md-3">
                <h5>Rechercher par nom</h5>
                <form action="/" method="GET">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Nom du client">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Rechercher</button>
                    </div>
                </form>
                <a href="new.html" class="btn btn-primary btn-block">Ajouter un client</a>
            </div>
            <div class="col-md-8 offset-md-1">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prénom</th>
                                <th class="text-center">Téléphone</th>
                                <th class="text-center">Date dernier achat</th>
                                <th class="text-center">Ville</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($customers as $customer) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $customer->getNom(); ?></td>
                                    <td class="text-center"><?php echo $customer->getPrenom(); ?></td>
                                    <td class="text-center"><?php echo $customer->getTelephone(); ?></td>
                                    <td class="text-center"><?php echo $customer->getDate_dernier_achat(); ?></td>
                                    <td class="text-center"><?php echo $customer->getVille(); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php if ($pages > 1) {
                    ?>
                        <div class="d-flex justify-content-center flex-wrap">
                        <a href="/?page=<?php if ($currentPage !== 1) {
                                            echo $currentPage - 1;
                                        } else {
                                            echo $currentPage;
                                        }  ?>" class="btn btn-secondary mr-1">Page précédente</a>
                        <a href="/?page=<?php if ($currentPage !== $pages && $pages > 1) {
                                            echo $currentPage + 1;
                                        } else {
                                            echo $currentPage;
                                        }  ?>" class="btn btn-secondary ">Page précédente</a>
                        </div>
                    <?php

                    } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>