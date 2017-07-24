<?php

use yii\db\Migration;

class m170516_160723_first extends Migration
{
    public function up()
    {
        $this->createTable("users", [
            "id" => $this->primaryKey(),
            "name" => $this->string(30)->notNull(),
            "surname" => $this->string(30)->notNull(),
            "login" => $this->string(30)->notNull(),
            "password" => $this->char(32)->notNull(),
        ]);
        $this->createTable("news", [
            "id" => $this->primaryKey(),
            "title" => $this->string(150)->notNull(),
            "text" => $this->string(3000),
            "tags" => $this->string(100),
            "date_create" => $this->date(),
        ]);
    }

    public function down()
    {
        echo "m170516_160723_first cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
