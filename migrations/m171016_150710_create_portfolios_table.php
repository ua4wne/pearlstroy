<?php

use yii\db\Migration;

/**
 * Handles the creation of table `portfolios`.
 */
class m171016_150710_create_portfolios_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('portfolios', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'text' => $this->string(100)->notNull(),
            'images' => $this->string(100)->notNull(),
            'filter' => $this->string(30)->unique()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('portfolios');
    }
}
