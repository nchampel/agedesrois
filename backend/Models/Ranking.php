<?php

namespace Models;

class Ranking
{
    static function giveRanking()
    {
        try {
            $statement = MySQL::getInstance()->prepare('SELECT * FROM `player` LEFT JOIN town ON player.id = town.id_player 
            LEFT JOIN stock ON player.id = stock.id_player
            LEFT JOIN level_constructs_town ON player.id = level_constructs_town.id_player
            LEFT JOIN level_constructs_stock ON player.id = level_constructs_stock.id_player
            LEFT JOIN level_army ON player.id = level_army.id_player');
            $statement->execute();

            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $result) {
                // $fin[] = [
                //     'points' => $result['level_castle'] + $result['level_farm'] + $result['level_sawmill'] +
                //         $result['level_extractor'] + $result['level_quarry'] + $result['level_mine'] +
                //         $result['level_barracks'] + $result['level_workshop'] + floor($result['town_food'] / 1000) +
                //         floor($result['town_wood'] / 1000) + floor($result['town_metal'] / 1000) + floor($result['town_stone'] / 1000) + floor($result['town_gold'] / 1000) +
                //         floor($result['town_bow'] / 1000) + floor($result['town_crossbow'] / 1000) + floor($result['stock_food'] / 1000) + floor($result['stock_wood'] / 1000) +
                //         floor($result['stock_metal'] / 1000) + floor($result['stock_stone'] / 1000) + floor($result['stock_gold'] / 1000),
                //     'pseudo' => $result['pseudo']
                // ];
                $fin[] = [
                    'points' => (80 + 20 * $result['level_castle']) * $result['level_castle'] + (10 + $result['level_farm']) * $result['level_farm'] +
                        (12 + 2 * $result['level_sawmill']) * $result['level_sawmill'] + (20 + 3 * $result['level_extractor']) * $result['level_extractor'] +
                        (30 + 5 * $result['level_quarry']) * $result['level_quarry'] + (40 + 6 * $result['level_mine']) * $result['level_mine'] +
                        (50 + 6 * $result['level_barracks']) * $result['level_barracks'] + (60 + 6 * $result['level_workshop']) * $result['level_workshop'],
                    'pseudo' => $result['pseudo']
                ];
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        // return $count;
        // arsort($fin, SORT_NUMERIC);

        // ksort($fin);
        // $a = array(3, 2, 5, 6, 1);
        // $arraySorted = $this->cmp();
        // usort($fin, array(self, 'cmp'));
        usort($fin, function ($a, $b) {
            return $b['points'] - $a['points'];
        });
        return $fin;
    }
    static function giveRankingPlayer($id)
    {
        try {
            $statement = MySQL::getInstance()->prepare('SELECT * FROM `player` LEFT JOIN town ON player.id = town.id_player 
            LEFT JOIN stock ON player.id = stock.id_player
            LEFT JOIN level_constructs_town ON player.id = level_constructs_town.id_player
            LEFT JOIN level_constructs_stock ON player.id = level_constructs_stock.id_player
            LEFT JOIN level_army ON player.id = level_army.id_player WHERE player.id = :id');
            $statement->bindParam(':id', $id);
            $statement->execute();

            $result = $statement->fetch(\PDO::FETCH_ASSOC);

            // $fin =      $result['level_castle'] + $result['level_farm'] + $result['level_sawmill'] +
            //     $result['level_extractor'] + $result['level_quarry'] + $result['level_mine'] +
            //     $result['level_barracks'] + $result['level_workshop'] + floor($result['town_food'] / 1000) +
            //     floor($result['town_wood'] / 1000) + floor($result['town_metal'] / 1000) + floor($result['town_stone'] / 1000) + floor($result['town_gold'] / 1000) +
            //     floor($result['town_bow'] / 1000) + floor($result['town_crossbow'] / 1000) + floor($result['stock_food'] / 1000) + floor($result['stock_wood'] / 1000) +
            //     floor($result['stock_metal'] / 1000) + floor($result['stock_stone'] / 1000) + floor($result['stock_gold'] / 1000);
            $fin =      (80 + 20 * $result['level_castle']) * $result['level_castle'] + (10 + $result['level_farm']) * $result['level_farm'] +
                (12 + 2 * $result['level_sawmill']) * $result['level_sawmill'] + (20 + 3 * $result['level_extractor']) * $result['level_extractor'] +
                (30 + 5 * $result['level_quarry']) * $result['level_quarry'] + (40 + 6 * $result['level_mine']) * $result['level_mine'] +
                (50 + 6 * $result['level_barracks']) * $result['level_barracks'] + (60 + 6 * $result['level_workshop']) * $result['level_workshop'];
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        // return $count;
        // arsort($fin, SORT_NUMERIC);

        // ksort($fin);
        // $a = array(3, 2, 5, 6, 1);
        // $arraySorted = $this->cmp();
        // usort($fin, array(self, 'cmp'));

        return $fin;
    }
}
