<?php
include_once('Model.php');
/**
 *
 */
class UserModel extends Model
{
    function __construct()
    {
        $ini = parse_ini_file('/var/www/html/config/dev.ini');
        $this->tableName = 'users';
        // Execute the direct parent constructor
        parent::__construct();
    }
    public function checkConnection($username)
    {
        $request = $this->dbConnect->prepare('SELECT is_connected FROM ' . $this->tableName . ' WHERE username = :username LIMIT 1');
        $request->execute( array(':username' => $username));
        $results = $request->fetchAll(PDO::FETCH_OBJ);
        if($results[0]->is_connected !== '1') {
            header('Location: ' . $ini["logout_url"]);
        }

    }

    public function connectUser()
    {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $request = $this->dbConnect->prepare('SELECT username FROM ' . $this->tableName . ' WHERE username = :username AND password = :password LIMIT 1');
            $request->execute( array(':username' => $_POST['username'], ':password' => $_POST['password']));
            $results = $request->fetchAll(PDO::FETCH_OBJ);
            if(count($results) === 1) {
                $update = $this->dbConnect->prepare('UPDATE ' . $this->tableName . ' SET is_connected = 1 WHERE username = :username AND password = :password');
                $bool = $update->execute( array(':username' => $_POST['username'], ':password' => $_POST['password']));
                if($bool) {
                    return $results[0]->username;
                }
            }
        }
        header('Location: ' . $ini["login_url"]);
    }
}
