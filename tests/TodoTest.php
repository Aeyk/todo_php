<?php

declare(strict_types=1);

namespace com\mksybr;

use PHPUnit\Framework\TestCase;

class TodoTest extends TestCase {
    protected function setUp(): void {
    }
    protected function setDown(): void {}

    public function testTodoListCanBeCreated(): TodoList {
        $todo = new TodoList();
        $this->assertNotNull($todo);
        return $todo;
    }
  /** @depends testTodoListCanBeCreated */
    public function testTodoItemCanBeAppendedToTodoList(TodoList $todo): void {
        $todo->addTodoItem([":content" => "Finish todo app"]);
        $this->assertNotNull($todo);
    }
  /** @depends testTodoListCanBeCreated */
    public function testTodoListCanBeShown(TodoList $todo): void {
      // $this->assertNotEquals(0, strcmp("", $todo->getTodoItems()));
    }
}
