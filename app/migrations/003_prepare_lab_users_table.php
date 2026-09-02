<?php

class Prepare_lab_users_table
{
    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
    }

    public function up()
    {
        $this->_lava->db->query("ALTER TABLE users ADD COLUMN firstname VARCHAR(100) NOT NULL DEFAULT '' AFTER id");
        $this->_lava->db->query("ALTER TABLE users ADD COLUMN lastname VARCHAR(100) NOT NULL DEFAULT '' AFTER firstname");

        $users = [
            ['Juan', 'Dela Cruz', 'juan@example.com', 'juandelacruz'],
            ['Maria', 'Santos', 'maria@example.com', 'mariasantos'],
            ['Pedro', 'Garcia', 'pedro@example.com', 'pedrogarcia'],
            ['Ana', 'Reyes', 'ana@example.com', 'anareyes'],
            ['Jose', 'Mendoza', 'jose@example.com', 'josemendoza'],
        ];

        foreach ($users as [$firstname, $lastname, $email, $username]) {
            $exists = $this->_lava->db->where('username', $username)->get('users');
            if (!$exists->row()) {
                $this->_lava->db->table('users')->insert([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'username' => $username,
                    'password' => password_hash('password', PASSWORD_DEFAULT),
                ]);
            }
        }
    }

    public function down()
    {
        $this->_lava->db->query('ALTER TABLE users DROP COLUMN firstname');
        $this->_lava->db->query('ALTER TABLE users DROP COLUMN lastname');
    }
}