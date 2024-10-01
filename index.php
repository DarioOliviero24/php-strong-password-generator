<?php

function generatePassword($len){

$pass = '';

$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!?^#[]@';

$firstIndex = 0;
$lastIndex = strlen($characters) - 1;

for ($i = 0; $i < $len; $i++){
    $randomIndex = rand($firstIndex, $lastIndex);

    $pass .= $characters[$randomIndex];
}

return $pass; 

}

$minLength= 5;
$maxLength= 20;

$length = null;

if (isset($_GET['length'])) {

   $lenght = intval($_GET['length']);

   var_dump($length);

   if($length >= $minLength && $length <= $maxLength) {

    $password = generatePassword($length);

    var_dump($password);

   }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
<!--BOOTSTRAP-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class='text-center py-5'>
        <h1>PHP Strong Password Generator</h1>
    </div>
    <div class='container'>
        <div class='row'>
            <div class='col col-sm-8 mx-sm-auto'>
                <form action="" method='GET'>
                    <div clas='mb-3'>
                        <label for="length" class="form-label">
                            <strong>
                                Lunghezza della password <span class="text-danger">*</span>
                            </strong>
                        </label>
                        <input 
                        type="number" 
                        class="form-control" 
                        id="lenght" 
                        name="length" 
                        placeholder="Inserisci la lunghezza della password..."
                        value= " <?php
                            if (isset($_GET['length'])) {
                                echo $_GET['length'];
                            }
                        ?>" 
                    
                        min="<?php echo $minLength; ?>" 
                        max="<?php echo $maxLength; ?>" 
                        required>
                    </div>

                    <div class="form-text mb-3">
                        <strong>
                            N.B.
                        </strong>
                        i campi contrassegnati da  <span class="text-danger">*</span> sono obbligatori
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary"> Invia</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col col-sm-8 mx-sm-auto text-center">
               <h3>
                    La tua password è : 
               </h3> 
               <p>
                   <?php echo $password; ?>
               </p>
            </div>
        </div>
    </div>
</body>
</html>