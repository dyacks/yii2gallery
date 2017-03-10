<?php

use yii\db\Migration;

/**
 * Handles the creation of table `album`.
 */
class m170309_163251_create_album_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('album', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
            'date' => $this->date(),
            'description' => $this->string(255),
            //'imageFiles' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('album');
    }
}
