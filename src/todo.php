<?php

declare(strict_types=1);

namespace com\mksybr;

class TodoList {
    public function __construct() {
        $this->db = new \PDO('sqlite::memory:');
        $sql_init = file_get_contents("db/create_todo_list_tables.sql");

        $todo_list_sql = $this->db->exec($sql_init);
        return $this->list = $todo_list_sql->execute();
    }
    public function addTodoItem(array $todo_data) {
        $todo_item_sql = $this->db->prepare("INSERT INTO todo_item (content, todo_list_id) VALUES " .
                                            "(:content, :todo_list_id)", [":content" => "123",
                                                                          ":todo_list_id" => $this->list["id"]]);
        return $this->list = $todo_item_sql->execute([":content" => "123"]);
    }
}
