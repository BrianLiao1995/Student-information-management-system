<?php
header("Content-Type: text/html; charset=UTF-8");

/**
 * 数据库
 */
class Database
{
    protected static $sql = '';
    protected static $link = null;
    protected static $current_link = null; // 当前连接标识
    protected static $query;
    protected static $query_count = 0;

    /**
     * 连接数据库
     */
    protected static function init_mysql()
    {
        if (empty(self::$$link)) {
            try {
                //配置参数
                $db_host = 'localhost';
                $db_user = 'root';
                $db_pwd = '';
                $db_name = 'brian_lib';
                $db_charset = 'utf8';
                //

                self::$link = @mysql_connect($db_host, $db_user, $db_pwd, 1);
                if (empty(self::$link)) {
                    throw new Exception(mysql_error(), 10);
                } else {
                    if (mysql_get_server_info() > '4.1') {
                        $db_charset = str_replace('-', '', strtolower($db_charset));
                        mysql_query("SET character_set_connection=" . $db_charset . ", character_set_results=" . $db_charset . ", character_set_client=binary");
                    }
                    if (mysql_get_server_info() > '5.0') {
                        mysql_query("SET sql_mode=''");
                    }
                    if (@mysql_select_db($db_name) === false) {
                        throw new Exception($db_host . "\t" . mysql_error(), 11);
                    }
                }
            } catch (Exception $e) {
                if ($e->getCode() == 10) {
                    echo $db_host . "\t" . '数据库连接失败，可能是数据库服务器地址、账号或密码错误';
                } elseif ($e->getCode() == 11) {
                    echo $db_host . "\t" . '数据库' . $db_name . '不存在';
                } else {
                    echo $db_host . "\t" . '无法连接到 MySQL 数据库服务器';
                }
                exit;
            }
        }
        return self::$link;
    }


    /**
     * 执行
     */
    public static function query($sql)
    {
        $sql = trim($sql);
        self::$current_link = self::init_mysql();
        try {
            self::$sql = $sql;
            self::$query = @mysql_query($sql, self::$current_link);
            if (self::$query === false) {
                throw new Exception(mysql_error());
            } else {
                self::$query_count++;
                return self::$query;
            }
        } catch (Exception $e) {
            echo $e->getMessage(), '<br/>';
            echo '<pre>';
            echo $e->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    /**
     * 取得最后一次插入记录的ID值
     */
    public static function insert_id()
    {
        return mysql_insert_id(self::$current_link);
    }

    /**
     * 返回受影响数目
     */
    public static function affected_rows()
    {
        return mysql_affected_rows(self::$current_link);
    }

    /**
     * 返回本次查询所得的总记录数
     */
    public static function num_rows($query = false)
    {
        (empty($query)) && $query = self::$query;
        return mysql_num_rows($query);
    }

    /**
     * 返回单条记录数据
     */
    public static function fetch_one($query = false)
    {
        (empty($query)) && $query = self::$query;
        return mysql_fetch_array($query, MYSQL_ASSOC);
    }

    /**
     * 返回多条记录数据
     */
    public static function fetch_all($query = false)
    {
        (empty($query)) && $query = self::$query;
        $row = $rows = array();
        while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
            $rows[] = $row;
        }
        return (empty($rows)) ? false : $rows;
    }

    /**
     * 获取当前执行的 SQL
     */
    public static function get_sql()
    {
        return self::$sql;
    }

    /**
     * 获取查询的总次数
     */
    public static function total_query()
    {
        return self::$query_count;
    }
}

?>