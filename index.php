<?php
$display = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $number1 = htmlspecialchars($_POST["num1"]);
        $number2 = htmlspecialchars($_POST["num2"]);
        $operator = htmlspecialchars($_POST["option"]);
        $result = 0;
        $flag = 0;
        
        if (is_numeric($number1) && is_numeric($number2)) {
            $flag = 1;
            switch ($operator) {
                case '+':
                    $result = $number1 + $number2;
                    break;
                case '-':
                    $result = $number1 - $number2;
                    break;
                case '*':
                    $result = $number1 * $number2;
                    break;
                case '/':
                    $result = $number1 / $number2;
                    break;
                
                default:
                    $result = 0;
                    break;
            }
        }

        if ($flag == 1) {
            $display = $number1 . $operator . $number2 . " = " . (string) $result;
        } else {
            $display = $number1 . $operator . $number2 . " = ". "Invalid Input";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="main">
            <p>Calculator</p>
            <div class="inputs">
                <input name="num1" type="text" placeholder="< NUM >">
                <select name="option" id="sl1">
                    <option value="None">< SELECT ></option>
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="/">/</option>
                    <option value="*">*</option>
                </select>
                <input name="num2" type="text" placeholder="< NUM >">
                <button type="submit">SUBMIT</button>
            </div>
            <div class="result">
                <p class="_p_">Result</p>
                <?php echo $display ?> 
            </div>
        </div>
    </form>
</body>
</html>