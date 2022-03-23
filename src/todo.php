<?php

declare(strict_types=1);

namespace com\mksybr;

class TodoList {
    public function __construct() {
        $this->db = new \PDO('sqlite::memory:');
        $sql_init_file = "db/create_todo_list_tables.sql";
        $sql_init = file_get_contents($sql_init_file);
        if(!$sql_init) {
            throw("Failed to open " . $sql_init_file);
        } else {
            $this->db->exec($sql_init);
        }
        if(!$this->db->exec("INSERT INTO todo_list DEFAULT VALUES")) {
            throw("Failed to create new todo_list entry " . $sql_init_file);
        }
        $this->list_id = $this->db->lastInsertId();
        return $this->list_id;
    }
    public function addTodoItem(array $todo_data) {
        $todo_item_sql = $this->db->prepare("INSERT INTO todo_item (content, todo_list_id) VALUES " .
                                            "(:content, :todo_list_id)");
        $this->list = $todo_item_sql->execute([":content" => $todo_data[":content"] || $todo_data["content"],
                                               ":todo_list_id" => $this->list_id]);
        return $this->list;
    }
}
