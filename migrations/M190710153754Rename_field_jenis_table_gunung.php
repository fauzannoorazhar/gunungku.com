<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190710153754Rename_field_jenis_table_gunung
 */
class M190710153754Rename_field_jenis_table_gunung extends Migration
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
        echo "M190710153754Rename_field_jenis_table_gunung cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->renameColumn('gunung','jenis','id_jenis_gunung');
    }

    public function down()
    {
        echo "M190710153754Rename_field_jenis_table_gunung cannot be reverted.\n";

        return false;
    }

}
