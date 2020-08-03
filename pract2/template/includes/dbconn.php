

<?
    /*=======================================DB_CONECT=================================== */
    function getDBConnection()
    {  
        $dsn = "mysql:host=".host."; dbname=".db;
        try
        {  
            $pdoobj = new PDO ($dsn, user, pass);  
            $pdoobj ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            return $pdoobj;
        }   
        catch (PDOException $e)
        {
            return "При подключении произошла ошибка: ". $e->getMessage();
            die();
        }         
    }
?>