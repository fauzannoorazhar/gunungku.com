<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190710144233Table_gunung_kuota
 */
class M190710144233Table_gunung_kuota extends Migration
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
        echo "M190710144233Table_gunung_kuota cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%gunung_kuota}}',[
            'id' => $this->primaryKey(),
            'id_gunung' => $this->integer()->notNull(),
            'kuota' => $this->integer()->notNull(),
            'tanggal' => $this->date(),
        ]);
    }

    public function down()
    {
        echo "M190710144233Table_gunung_kuota cannot be reverted.\n";

        return false;
    }

}
