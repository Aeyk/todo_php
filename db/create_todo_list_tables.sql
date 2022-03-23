-- NOTE(malik): This MUST be a subset of SQL 
CREATE TABLE todo_list (id INTEGER NOT NULL PRIMARY KEY);
CREATE TABLE todo_item
  ( id INTEGER NOT NULL PRIMARY KEY
  , content TEXT NOT NULL
  , todo_list_id INTEGER NOT NULL
  , FOREIGN KEY (todo_list_id) REFERENCES todo_list(id)
  );
