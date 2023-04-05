<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../view/ajout.css">
        <title>Document</title>
    </head>
    <body>
        <div id="main-frame">
            <form method="post">
                <fieldset>
                <h1>Ajout d'une infraction</h1>
                    <label for="input_idInf">Id Infraction</label>
                    <input type="text" name="input_idInf" value="<?= $inputId ?>">
                    <br>
                    <label for="input_dateInf">Date</label>
                    <input type="date" name="input_dateInf" value="<?= $dateInput ?>">
                    <br>
                    <label for="select_permis">N° Permis (optionnel)</label>
                    <select name="select_permis">
                        <option value=""></option>
                        <?php
                            foreach($lesPermis as $lePermis) {
                                echo "<option value=\"$lePermis\"";
                                if ($lePermis === $selectPermis) {
                                    echo "selected";
                                }
                                echo ">$lePermis</option>";
                            }
                        ?>
                    </select>
                    <br>
                    <label for="select_voiture">Immatriculation</label>
                    <select name="select_voiture">
                        <option value=""></option>
                        <?php
                            foreach($lesImmats as $leImmats) {
                                echo "<option value=\"$leImmats\"";
                                if ($leImmats === $selectVoiture) {
                                    echo "selected";
                                }
                                echo ">$leImmats</option>";
                            }
                        ?>
                    </select>
                    <br><br>
                    <div>
                        <?php
                            foreach($lesDelits->getDelitsTab() as $leDelit) {
                                echo "<div>";
                                echo "<label for=\"" . $leDelit->getIdDelit() . "\">" . $leDelit->getNature() . "</label>";
                                echo "<input id=\"" . $leDelit->getIdDelit() . "\"" . "type=\"checkbox\" name=\"check_delit[" . $leDelit->getNature() . "]\" value=\"" . $leDelit->getIdDelit() . "\" ";
                                if (is_null($checkDelit) === false) {
                                    foreach($checkDelit as $checkLeDelit) {
                                        if ($leDelit->getIdDelit() === (int)$checkLeDelit) {
                                            echo "checked";
                                        }
                                    }
                                }
                                echo ">";
                                echo "</div>";
                            }  
                        ?>
                    </div>
                    <br>
                    <input type="submit" id="submit" value="Valider">
                </fieldset>
                <p class="erreurMsg"><?= $messageErreur ?></p>
            </form>
        </div>
    </body>
</html>