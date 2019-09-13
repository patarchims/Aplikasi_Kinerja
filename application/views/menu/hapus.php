<?php

class menu
{
    public function hapusDataMenu($id)
    {
        $query = "DELETE FROM user_menu WHERE id= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
