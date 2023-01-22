<?php

require_once 'credentials.php';

// Dabatase connection class
class lal {  

    // Function to connect to local alcohol laws database
    function connect() {
        $credentials = credentials();
        
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $dsn = "mysql:host=" . $credentials['HOST'] . ";dbname=" . $credentials['DATABASE'] . ";charset=" . $credentials['CHARSET'] . ";port=" . $credentials['PORT'] . ";";
        try {
            $pdo = new \PDO($dsn, $credentials['USERNAME'], $credentials['PASSWORD'], $options);
        }
        catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        return $pdo;
    }

    // Function to query local alcohol 
    function get(string $state, string $place) {
        $credentials = credentials();
        $pdo = $this->connect();
        $stmt = $pdo->prepare("SELECT * FROM `" . $credentials['TABLE'] . "` WHERE `state`=:state AND `place`=:place;");
        $stmt->bindParam(':state', $state, PDO::PARAM_STR);
        $stmt->bindParam(':place', $place, PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($stmt->rowCount() == 0)
            return "No results for " . $place . " in " . $state . " state";
        else
            return json_encode($stmt->fetchall());
    }

    // Function to validate API token
    function validate_token(string $token) {
        $credentials = credentials();
        return $token == $credentials['TOKEN'];
    }
}

$lal = new lal();

// Check for token
if (!isset($_GET['token']))
    echo "Need to supply a token for use of the Local Alcohol Laws API";
// Check for state and place
else if (!(isset($_GET['state']) && isset($_GET['place'])))
    echo "Need to specify both state and place";
// Validate token
else if (!$lal->validate_token($_GET['token']))
    echo "Token not valid";
// Perform query and output json
else {
    $state = $_GET['state'];
    $place = $_GET['place'];
    echo $lal->get($state, $place);
}
?>