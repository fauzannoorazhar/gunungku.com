<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190709162644Table_gunung
 */
class M190709162644Table_gunung extends Migration
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
        echo "M190709162644Table_gunung cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%gunung}}',[
            'id' => $this->primaryKey(),
            'nama' => $this->string(255)->notNull(),
            'deskripsi' => $this->text()->notNull(),
            'ketinggian' => $this->integer(11)->notNull(),
            'jenis' => $this->integer(11)->notNull(),
            'status_aktif' => $this->boolean()->defaultValue(1),
            'status' => $this->boolean()->defaultValue(1),
            'kuota' => $this->integer(11),
            'deskripsi_izin' => $this->text(),
            'deskripsi_wajib' => $this->text(),
            'deskripsi_dilarang' => $this->text(),
            'deskripsi_sanksi' => $this->text(),
            'deskripsi_kontak' => $this->text(),
         ]);
    }

    public function down()
    {
        echo "M190709162644Table_gunung cannot be reverted.\n";

        return false;
    }

}
