<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190711145944Add_column_to_all_table
 */
class M190711145944Add_column_to_all_table extends Migration
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
        echo "M190711145944Add_column_to_all_table cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('gunung','created_at',$this->integer(11)->notNull());
        $this->addColumn('gunung','updated_at',$this->integer(11)->notNull());
        $this->addColumn('gunung','created_by',$this->integer(11)->notNull());
        $this->addColumn('gunung','updated_by',$this->integer(11)->notNull());
        $this->addColumn('gunung','status_hapus',$this->boolean()->defaultValue(0));

        $this->addColumn('gunung_jalur','created_at',$this->integer(11)->notNull());
        $this->addColumn('gunung_jalur','updated_at',$this->integer(11)->notNull());
        $this->addColumn('gunung_jalur','created_by',$this->integer(11)->notNull());
        $this->addColumn('gunung_jalur','updated_by',$this->integer(11)->notNull());
        $this->addColumn('gunung_jalur','status_hapus',$this->boolean()->defaultValue(0));

        $this->addColumn('gunung_jalur_pos','created_at',$this->integer(11)->notNull());
        $this->addColumn('gunung_jalur_pos','updated_at',$this->integer(11)->notNull());
        $this->addColumn('gunung_jalur_pos','created_by',$this->integer(11)->notNull());
        $this->addColumn('gunung_jalur_pos','updated_by',$this->integer(11)->notNull());
        $this->addColumn('gunung_jalur_pos','status_hapus',$this->boolean()->defaultValue(0));

        $this->addColumn('gunung_kuota','created_at',$this->integer(11)->notNull());
        $this->addColumn('gunung_kuota','updated_at',$this->integer(11)->notNull());
        $this->addColumn('gunung_kuota','created_by',$this->integer(11)->notNull());
        $this->addColumn('gunung_kuota','updated_by',$this->integer(11)->notNull());
        $this->addColumn('gunung_kuota','status_hapus',$this->boolean()->defaultValue(0));

        $this->addColumn('jenis_gunung','created_at',$this->integer(11)->notNull());
        $this->addColumn('jenis_gunung','updated_at',$this->integer(11)->notNull());
        $this->addColumn('jenis_gunung','created_by',$this->integer(11)->notNull());
        $this->addColumn('jenis_gunung','updated_by',$this->integer(11)->notNull());
        $this->addColumn('jenis_gunung','status_hapus',$this->boolean()->defaultValue(0));

        $this->addColumn('pendaki','created_at',$this->integer(11)->notNull());
        $this->addColumn('pendaki','updated_at',$this->integer(11)->notNull());
        $this->addColumn('pendaki','status_hapus',$this->boolean()->defaultValue(0));
    }

    public function down()
    {
        echo "M190711145944Add_column_to_all_table cannot be reverted.\n";

        return false;
    }

}
