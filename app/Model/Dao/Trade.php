<?php

namespace Model\Dao;

use Doctrine\DBAL\DBALException;
use PDO;

/**
 * Class Trade
 *
 * Tradeテーブルを扱う Classです
 * DAO.phpに用意したCRUD関数以外を実装するときに、記載をします。
 *
 * @copyright Ceres inc.
 * @author y-fukumoto <y-fukumoto@ceres-inc.jp>
 * @since 2019/08/14
 * @package Model\Dao
 */
class Trade extends Dao
{

    /**
     * getTradeList Function
     *
     * Tradeテーブルにあるアイテム一覧を取得するためのサンプルです。
     *
     * @return array $result 結果情報を連想配列で指定します。
     * @throws DBALException
     * @since 2019/08/14
     * @copyright Ceres inc.
     * @author y-fukumoto <y-fukumoto@ceres-inc.jp>
     */
    public function getTradeList()
    {

        //全件取得するクエリを作成
        $sql = "select * from trade";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //SQLを実行
        $statement->execute();

        //結果レコードを全件取得し、返送
        return $statement->fetchAll();

    }

    /**
     * getTrade Function
     *
     * Tradeテーブルから指定idのレコードを一件取得するクエリです。
     *
     * @param int $id 引数として、取得したい商品のアイテムIDを指定します。
     * @return array $result 結果情報を連想配列で指定します。
     * @throws DBALException
     * @copyright Ceres inc.
     * @author y-fukumoto <y-fukumoto@ceres-inc.jp>
     * @since 2019/08/14
     */

    public function getTrade($id)
    {

        //全件取得するクエリを作成
        $sql = "select * from trade where id =:id";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //idを指定します
        $statement->bindParam(":id", $id, PDO::PARAM_INT);

        //SQLを実行
        $statement->execute();

        //結果レコードを一件取得し、返送
        return $statement->fetch();

    }

    /**
     * deleteByUser Function
     *
     * Tradeテーブルから指定ユーザーのレコードを削除するクエリです。
     *
     * @param int $user_id 引数として、取得したい商品のアイテムIDを指定します。
     * @return array $result 結果情報を連想配列で指定します。
     * @throws DBALException
     * @copyright Ceres inc.
     * @author y-fukumoto <y-fukumoto@ceres-inc.jp>
     * @since 2019/08/14
     */

    public function deleteByUser($user_id)
    {

        //全件取得するクエリを作成
        $sql = "delete from trade where user_id =:user_id";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //idを指定します
        $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);

        //SQLを実行
        return $statement->execute();
    }
}
