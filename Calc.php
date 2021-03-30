<html>
    <head>
    <title>simple calculator</title>
    </head>
    <body>
        <form action = "Calc.php" method ="POST">
            <input type="text" name = "a" placeholder ="First">
            <select name="operator" id="op">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="/">/</option>
                <option value="*">*</option>
                <option value="%">%</option>
            </select>
            <input type="text" name = "b" placeholder ="Second">
           
            <button type ="submit" Value ="Submit" name = "submit">Submit</button>
        </form>

        <?php
        /*the form above is used to get 2 variables say a and b and then the php code 
         below is declares a variable
         that accepts the two inputs and then does computation fo the what is needed*/
    
    if(isset($_POST['submit'])){
        $a = $_POST['a'];
        $b = $_POST['b'];
        $opp = $_POST['operator'];
    
        $sum = $a+$b;
        
        $quotient = $a/$b;
        
        $product = $a * $b;
        
        $difference = $a - $b;
        
        $modulus = $a % $b;
    if($opp == '+'){
        echo "$a + $b =  $sum <br> <br>";
    }
    elseif($opp == "-"){
        echo "$a / $b = $quotient <br> <br>";
    }
    elseif($opp == "/"){
        echo "$a / $b = $quotient <br> <br>";
    }
    elseif($opp == "*"){
        echo "$a * $b = $product  <br><br>";
    }
    elseif($opp == "-"){
        echo "$a - $b = $difference <br> <br>";
    }
    elseif($opp == "%"){
        echo "$a % $b = $modulus";
    }
    else{
        echo "please try again";
    }
}
    ?>
    </body>
</html>