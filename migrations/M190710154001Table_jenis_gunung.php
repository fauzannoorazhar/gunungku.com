<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190710154001Table_jenis_gunung
 */
class M190710154001Table_jenis_gunung extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "M190710154001Table_jenis_gunung cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%jenis_gunung}}',[
            'id' => $this->primaryKey(),
            'nama' => $this->string(225)->notNull(),
            'deskripsi' => $this->text(),
        ]);
    }

    public function down()
    {
        echo "M190710154001Table_jenis_gunung cannot be reverted.\n";

        return false;
    }

}
