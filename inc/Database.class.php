<?php 

    class Database{
        public      $isConn;
        protected   $datab;

        /*------------------------- START OPTIONS -----------------------------*/

        private      $DB_userName    = 'root';          // Write Database Username
        private      $DB_bassWord    = '';              // Write Database PassWord
        private      $DB_host        = 'localhost';     // Write Your Host
        private      $DB_Name        = 'wordpress';     // Write Database Name

        /*------------------------- END OPTIONS -------------------------------*/
        
        // connect to db
        public function __construct($username = 'root', $password = '', $host = 'localhost', $dbname = 'shop', $options = []){
            $this->isConn = TRUE;
            try {
                $this->datab = new PDO("mysql:host={$this->DB_host};dbname={$this->DB_Name};charset=utf8", $username = $this->DB_userName, $password = $this->DB_bassWord, $options);
                $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
            
        }
        
        // disconnect from db
        public function Disconnect(){
            $this->datab = NULL;
            $this->isConn = FALSE;
        }
        // get row
        public function getRow($query, $params = []){
            try {
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return $stmt->fetch();
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
        // get rows
        public function getRows($query, $params = []){
            try {
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
        // insert row
        public function insertRow($query, $params = []){
            try {
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return TRUE;
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
        // update row
        public function updateRow($query, $params = []){
            try {
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return TRUE;
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
        // delete row
        public function deleteRow($query, $params = []){
            try {
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return TRUE;
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
    }

?>