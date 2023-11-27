<?php
include "../controller/reclamationc.php";

$c = new reclamationC();
$id_rec = $_REQUEST["id_rec"]?? null ; // get and post
$tab = $c->listreclamationunique();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation List</title>
</head>

<body>
    <section class="container">
        <main id="main">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">id_rec</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">sujet</th>
                                        <th scope="col">texte</th>
                                        <th scope="col">date</th>
                                        <th scope="col">modifier</th>
                                        <th scope="col">supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($tab)) { ?>
                                        <?php foreach ($tab as $reclamation) { ?>
                                            <tr>
                                                <td><?= $reclamation['id_rec']; ?></td>
                                                <td><?= $reclamation['nom']; ?></td>
                                                <td><?= $reclamation['sujet']; ?></td>
                                                <td><?= $reclamation['texte']; ?></td>
                                                <td><?= $reclamation['date']; ?></td>
                                                <td>
                                                    <form method="POST" action="updatereclamation.php">
                                                        <input type="submit" name="update" value="modifier">
                                                        <input type="hidden" value="<?= $reclamation['id_rec']; ?>" name="id_rec">
                                                        <input type="hidden" value="<?= $reclamation['date']; ?>" name="date">
                                                    </form>
                                                </td>
                                                <td>
                                                    <button> <a href="deletereclamation.php?id_rec=<?= $reclamation['id_rec']; ?>">supprimer</a></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="7">No reclamation data available.</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- End #main -->
    </section>
</body>

</html>
