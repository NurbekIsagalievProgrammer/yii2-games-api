<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%games}}`.
 */
class m250804_192620_create_games_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%games}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->notNull()->unique(),
        'name' => $this->string()->notNull(),
        'description' => $this->text(),
        'released' => $this->date(),
        'poster' => $this->string()->defaultValue('/images/game.jpg'),
        'rating' => $this->decimal(3, 1)->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%games}}');
    }
}
