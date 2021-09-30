<?php
$length_pw = 0;

function create_instant_pw()
{
    global $pw, $length_pw;
    $length_pw = rand(12, 18);

    $pw = "";

    for ($i = 0; $i <= $length_pw; $i++) {
        $small_letter = rand(97, 122);
        $big_letter = rand(65, 90);
        $character = rand(35, 38);
        $number = rand(48, 57);

        $rand_char = rand(0, 3);
        if ($rand_char === 0) {
            $next_char = $small_letter;
        } else if ($rand_char === 1) {
            $next_char = $big_letter;
        } else if ($rand_char === 2) {
            $next_char = $character;
        } else {
            $next_char = $number;
        }

        $pw = $pw . chr($next_char);
    }
    return $pw;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=200, initial-scale=1">
    <style>
        html {height: 100%;font-family: sans-serif;}
    </style>
</head>
<body>
<h2>Password Generator</h2>
<input value="<?php echo create_instant_pw(); ?>" type="text" id="pwInput"/>
<button onclick="copyPW()">Copy</button>
<h4>This password is <?php echo $length_pw ?> characters long.</h4>
<script>
    function copyPW(){let e=document.getElementById("pwInput");e.select(),e.setSelectionRange(0,99999),document.execCommand("copy")}
</script>
</body>
</html>
