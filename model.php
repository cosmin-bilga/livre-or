<?php

if (file_exists("config.php"))
    include "config.php";
else {
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "livreor";
}


// Connects to DB and returns connection or null if connection failed
function connect_database()
{
    global $server, $user, $password, $database;
    $conn = new mysqli($server, $user, $password, $database);

    if ($conn->connect_errno) {
        echo "Database connection failed. Try again later: " . $conn->connect_error;
        return null;
    }
    return $conn;
}


// Function who executes the sql query and returns the value
function sql_exec(string $sql, object $conn)
{
    try {
        echo "QUERY" . $sql;
        $result = $conn->query($sql);
    } catch (mysqli_sql_exception $e) {
        echo 'Error: ' . $conn->error;
    }

    return $result;
}

// Function that checks if login is respecting the requirements
function check_login_requirements(string $login): bool
{
    preg_match('/^[a-zA-Z0-9]{5,}$/', $login, $matches);
    if (!$matches)
        return false;
    return true;
}


// Function that checks if login is unique in database
function check_login_unique(string $login, object $conn): bool
{
    $sql = "SELECT * FROM utilisateurs WHERE login='" . htmlentities($login) . "';";

    $result = sql_exec($sql, $conn);
    if ($result->fetch_assoc())
        return false;
    return true;
}

// Checks if password is following the right pattern
function check_password($password): bool
{
    preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-+=()[\]{}]).{8,}$/", $password, $matches);
    if ($matches) {
        return true;
    } else
        return false;
}

// Function that escapes html characters to avoid sql injections and more
function secure_string($string): string
{
    $string = htmlspecialchars(trim($string), ENT_QUOTES, "UTF-8");
    return $string;
}


// Function that returns the name of current page
function get_current_page()
{
    $current_page = explode("/", $_SERVER["REQUEST_URI"]);
    $current_page = end($current_page);
    return $current_page;
}

// Function that checks if the registration form has be properly filled; returns a boolean and a message
function check_registration(array $form): array
{

    if (count($form) > 0) {

        if (!$conn = connect_database())
            return ["ok" => false, "message" => "Database connection failed"];

        // Avoid injections
        $form['login'] = secure_string($form['login']);

        if (!check_login_requirements($form["login"]))
            return ["ok" => false, "message" => "Login needs to be atleast 5 characters long, using letters and numbers only"];

        if (!check_login_unique($form["login"], $conn))
            return ["ok" => false, "message" => "Login is already taken. Please choose another."];

        if (!check_password($form["password"]))
            return ["ok" => false, "message" => "Password needs to be atleast 8 characters long, contain atleast one lowercase, one uppercase, one number and one special character #?!@$%^&*-+=()[]{}"];

        if ($form["password"] !== $form["password-repeat"])
            return ["ok" => false, "message" => "Password and Repeat Password do not match."];

        $form["password"] = password_hash($form["password"], PASSWORD_DEFAULT);

        $sql = "INSERT INTO utilisateurs(login,password) VALUES('" . $form["login"] . "','" .
            $form["password"] . "');";
        sql_exec($sql, $conn);
        $conn->close();

        return ["ok" => true, "message" => "Registration succesful!"];
    }

    return ["ok" => false, "message" => "Form is empty."];
}


// Function used in connection to the website
function check_connection(array $form): array
{
    if ($form) {
        if (!$conn = connect_database())
            return ["ok" => false, "message" => "Database connection failed"];

        // Avoid injections
        $form['login'] = secure_string($form['login']);

        $sql = "SELECT password,id FROM utilisateurs WHERE login='" . $form["login"] . "';";

        $result = sql_exec($sql, $conn);
        $pass = $result->fetch_assoc();
        $conn->close();



        if (isset($pass["password"]) and (password_verify($_POST["password"], $pass["password"])))
            return ["ok" => true, "message" => "Welcome " . $form["login"], "id_user" => $pass["id"]];
        return ["ok" => false, "message" => "Please verify login and password."];
    }
    return ["ok" => false, "message" => null];
}

// Function used for user profile modifications
function check_modification(array $form, string $current_user): array
{

    if ($form) {
        $conn = connect_database();

        if (!$conn = connect_database())
            return ["ok" => false, "message" => "Database connection failed"];

        // Avoid injections
        $form['login'] = secure_string($form['login']);

        if (!check_login_requirements($form["login"]))
            return ["ok" => false, "message" => "Login needs to be atleast 5 characters long, using letters and numbers only"];

        if ($form['login'] !== $current_user)
            if (!check_login_unique($form["login"], $conn))
                return ["ok" => false, "message" => "Login is already taken. Please choose another."];

        $sql = "UPDATE utilisateurs SET login='" . $form["login"] . "' ";

        if ($form['password'] !== "") {
            if (!check_password($form["password"]))
                return ["ok" => false, "message" => "Password needs to be atleast 8 characters long, contain atleast one lowercase, one uppercase, one number and one special character #?!@$%^&*-+=()[]{}"];

            if ($form["password"] !== $form["password-repeat"])
                return ["ok" => false, "message" => "Password and Repeat Password do not match."];

            $form["password"] = password_hash($form["password"], PASSWORD_DEFAULT);

            $sql .= ",password='" . password_hash($form["password"], PASSWORD_DEFAULT) . "' ";
        }

        $sql .= "WHERE login='" . $_SESSION["logged_user"] . "';";

        //echo $sql;
        sql_exec($sql, $conn);
        $conn->close();

        return ["ok" => true, "message" => "Modification succesful!"];
    }

    return ["ok" => false, "message" => null];
}


// Used for submit comment form
function submit_comment(string $comment, string $user_id): array
{
    if (strlen($comment) > 10) {
        $conn = connect_database();

        if (!$conn = connect_database())
            return ["ok" => false, "message" => "Database connection failed"];

        // Avoid injections
        $comment = secure_string($comment);

        $sql = "INSERT INTO commentaires(commentaire,id_utilisateur) VALUES('" . $comment . "','" . $user_id . "');";
        sql_exec($sql, $conn);
        $conn->close();

        return ["ok" => true, "message" => "The comment has been succesfully added."];
    }
    return ["ok" => false, "message" => "The comment must be atleast 10 characters long."];
}

// Used to retrieve comments made in livre d'or
function get_commentaires(int $amount = 0): array
{

    $conn = connect_database();

    if (!$conn = connect_database())
        return ["ok" => false, "message" => "Database connection failed", "data" => []];

    $sql = "SELECT date, login, commentaire FROM commentaires INNER JOIN utilisateurs on commentaires.id_utilisateur=utilisateurs.id";

    if ($amount > 0)
        $sql .= " LIMIT " . $amount . ";";
    else
        $sql .= ";";

    $result = sql_exec($sql, $conn);
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return ["ok" => true, "message" => "Data succesfully retrieved", "data" => $result];
}
