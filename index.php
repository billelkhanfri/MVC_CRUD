<?php 
require_once(__DIR__ . '/db_connection.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/variables.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    <style>
        h1 {
            text-align: center;
            margin: 40px;
        }
        .wrapper {
            width: 90%;
            margin: auto;
        }
        .filter-wrapper {
            display: flex;
            gap: 20px;
        }
    </style>
</head>
<body>
    <div class="wrapper"> 
        <h1> Connection to Database</h1>

        <form action="" method="GET">
            <div class="filter-wrapper"> 
                <label for="inputText" class="form-label">Recherche</label>
                <input type="text" id="inputText" name="search" class="form-control">

                <select name="order" class="form-select" aria-label="Default select example">
                    <option selected disabled>Ordre Alphabétique</option>
                    <option value="ASC">A-Z</option>
                    <option value="DESC">Z-A</option>
                </select>

                <!-- Add the organism dropdown select menu -->
                <select name="gender" class="form-select" aria-label="Default select example">
                    <option selected disabled>Genre</option>
                    <?php echo generateSelectOptions($employee, 'gender'); ?>
                </select>
                 <select name="projet" class="form-select" aria-label="Default select example">
                    <option selected disabled>Projet</option>
                    <?php echo generateSelectOptions($employee, 'projet'); ?>
                </select>

                <button type="submit" class="btn btn-primary">Filtre</button>
            </div>
        </form>

        <?php if(empty($filterData)): ?>
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Début</th>
                        <th scope="col">Fin</th>
                        <th scope="col">Organism</th>
                        <th scope="col">Projet</th>
                    </tr>
                </thead>
        </table>
            <div class="alert alert-warning" role="alert">
                Aucune donnée trouvée.
            </div>
        <?php else: ?>
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Début</th>
                        <th scope="col">Fin</th>
                        <th scope="col">Organism</th>
                        <th scope="col">Projet</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($filterData as $employee): ?>
                        <tr>
                            <td><?php echo $employee['id']; ?></td>
                             <td><?php echo $employee['last_name']; ?></td>
                            <td><?php echo $employee['first_name']; ?></td>
                           
                            <td><?php echo $employee['gender']; ?></td>
                            <td><?php echo $employee['start_date']; ?></td>
                            <td><?php echo $employee['end_date']; ?></td>
                            <td><?php echo $employee['organism']; ?></td>
                            <td><?php echo $employee['projet']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
