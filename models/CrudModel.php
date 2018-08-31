<?php
include_once('Model.php');
class CrudModel extends Model 
{
    public function update() {
        if(isset($_POST['Home'])) {
            $sql = 'UPDATE pages SET content = "' . $_POST['Home'] . '" WHERE id = 1;';
            var_dump($sql);
            $request = $this->dbConnect->prepare($sql);
            $request->execute();
            $results = $request->fetchAll(PDO::FETCH_OBJ);
            header('Location: /view/home');
        }
        if(isset($_POST['Simon'])) {
            $sql = 'UPDATE pages SET content = "' . $_POST['Simon'] . ' "WHERE id = 2';
            $request = $this->dbConnect->prepare($sql);
            $request->execute();
            $results = $request->fetchAll(PDO::FETCH_OBJ);
            header('Location: /view/simon');
        }
        if(isset($_POST['Test1'])) {
            $sql = 'UPDATE pages SET content = "' . $_POST['Test1'] . ' "WHERE id = 3';
            $request = $this->dbConnect->prepare($sql);
            $request->execute();
            $results = $request->fetchAll(PDO::FETCH_OBJ);
            header('Location: /view/test1');
        }

    }
}