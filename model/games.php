<?php
    require_once("base.php");

    class Games extends Base {

        public function createGame( $game) {

            $game = $this->sanitize( $game );
            
           
            $img_name = $_FILES['my_image']['name'];
            $img_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            
            if ($img_size > 125000) {
       
                return false;
                               
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'images/'.$new_img_name;

                    move_uploaded_file($tmp_name, $img_upload_path);
                    
                    // Insert into Database
                    if(
                        
                        !empty($game["description"]) &&
                        !empty($game["name"]) &&
                        /*!empty($game["lat1"]) &&
                        !empty($game["lon1"]) &&
                        !empty($game["lat2"]) &&
                        !empty($game["lon2"]) &&
                        !empty($game["vel1"]) &&
                        !empty($game["vel2"]) &&*/
                      
                        mb_strlen($game["name"]) > 2 &&
                        mb_strlen($game["name"]) <= 64 &&
                        
                        mb_strlen($game["description"]) > 10 &&
                        mb_strlen($game["description"]) <= 65535 
                        
                    ) {
        
                        $query = $this->db->prepare("
                            INSERT INTO games
                            (name, description, image, lat1, lon1, lat2, lon2, vel1, vel2)
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)
                        ");
        
                        return $query->execute([
                            $game["name"],
                            $game["description"],
                            $new_img_name,
                            $game["lat1"],
                            $game["lon1"],
                            $game["lat2"],
                            $game["lon2"],
                            $game["vel1"],
                            $game["vel2"]/**/
                            
                        ]);
                    }
                }
            }
            
            return false;

        }

        public function editGame( $newgame, $game, $oldGame ) {

            $newgame = $this->sanitize( $newgame );
            
            $edimg_name = $_FILES['my_image']['name'];
            $edimg_size = $_FILES['my_image']['size'];
            $edtmp_name = $_FILES['my_image']['tmp_name'];
            $ederror = $_FILES['my_image']['error'];

            if ($edimg_size > 125000) {
                
                return false;
                
                
            }else {
                $edimg_ex = pathinfo($edimg_name, PATHINFO_EXTENSION);
                $edimg_ex_lc = strtolower($edimg_ex);
    
                $edallowed_exs = array("jpg", "jpeg", "png"); 

                if (in_array($edimg_ex_lc, $edallowed_exs)) {
                    $ednew_img_name = uniqid("IMG-", true).'.'.$edimg_ex_lc;
                    $edimg_upload_path = 'images/'.$ednew_img_name;

                    move_uploaded_file($edtmp_name, $edimg_upload_path);
                     
                    // Insert into Database
                    if(
                        
                        !empty($newgame["description"]) &&
                        !empty($newgame["name"]) &&
                        /*!empty($newgame["lat1"]) &&
                        !empty($newgame["lon1"]) &&
                        !empty($newgame["lat2"]) &&
                        !empty($newgame["lon2"]) &&
                        !empty($newgame["vel1"]) &&
                        !empty($newgame["vel2"]) &&*/
                       
                        mb_strlen($newgame["name"]) > 2 &&
                        mb_strlen($newgame["name"]) <= 64 &&
                        
                        mb_strlen($newgame["description"]) > 10 &&
                        mb_strlen($newgame["description"]) <= 65535 
                        
                                         
                    ) {
                $query = $this->db->prepare("
                    UPDATE games
                    SET name = ?,
                        description = ?,
                        image = ?,
                        lat1 = ?,
                        lon1 = ?,
                        lat2 = ?,
                        lon2 = ?,
                        vel1 = ?,
                        vel2 = ?
                    WHERE game_id = ?
                ");

                return $query->execute([
                    $newgame["name"],
                    $newgame["description"],
                    $ednew_img_name,
                    $newgame["lat1"],
                    $newgame["lon1"],
                    $newgame["lat2"],
                    $newgame["lon2"],
                    $newgame["vel1"],
                    $newgame["vel2"],
                   
                    $game
                ]);
            }
            }
        }
        
        return false;

        }
        
        public function getGames() {

            $query = $this->db->prepare("
                SELECT *
                       
                FROM games 
                
                ORDER BY created_at DESC
            ");

            $query->execute();

            return $query->fetchAll( PDO::FETCH_ASSOC );
            
        }

        public function searchGamestype($search) {

            if(
                mb_strlen($search) > 0 &&
                mb_strlen($search) <= 20
            ) {
                $query = $this->db->prepare("
                    SELECT *
                         
                    FROM games 
                     
                    WHERE type LIKE CONCAT('%',?,'%')
                    ORDER BY created_at DESC
                ");

                $query->execute([
                    $search
                    
                ]);

                return $query->fetchAll( PDO::FETCH_ASSOC );
            }

            return false;

        }
        
        public function getGame($id) {

            $query = $this->db->prepare("
                SELECT 
                *
                         
                FROM games
                
                WHERE game_id = ?
            ");
    
            $query->execute([ $id ]);
    
            return $query->fetch( PDO::FETCH_ASSOC );
        }

        public function delete( $id ) {

            $id = $this->sanitize( $id );

            if(
                !empty($id) &&
                filter_var($id, FILTER_VALIDATE_INT)
            ) {

                $query = $this->db->prepare("
                    DELETE FROM user_play
                    WHERE game_id = ?
                "); 

                $query->execute([$id]);

                $query = $this->db->prepare("
                    DELETE FROM games
                    WHERE game_id = ?
                ");
                
                return $query->execute([$id]);
            }

            return false;
        }

    }
?>