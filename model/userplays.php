<?php
    require_once("base.php");

    class Userplays extends Base {

        public function userPlay( $userPlayed, $user) {


            /**/if(
                !empty($userPlayed["game"]) &&
                mb_strlen($userPlayed["game"]) <= 10 &&
                filter_var($userPlayed["game"], FILTER_VALIDATE_INT)

            ) {

                $finish_at = date('Y-m-d H:i:s'); 
                
                $query = $this->db->prepare("
                    INSERT INTO user_play
                    (user_id, game_id, finish_at, game_time)
                    VALUES(?, ?, ?, ?)
                ");

                return $query->execute([
                    $user,
                    $userPlayed["game"],                  
                    $finish_at,
                    $userPlayed["game_time"],
                   
                ]);
            }

            return false;
        }

         public function getUserPlayed($id) {

            $query = $this->db->prepare("
                SELECT p.play_id, p.user_id, p.finish_at, p.game_time, u.name AS username
                FROM user_play p
                INNER JOIN users u USING(user_id)
                WHERE game_id = ?
            ");

            $query->execute([ $id ]);

            return $query->fetchAll( PDO::FETCH_ASSOC );
        }

       
    }
?>