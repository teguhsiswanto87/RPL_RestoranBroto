<?php

class Module
{
// get data from Module
    function getListModule()
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM module";
            $res = $conn->query($sql);
            if ($res) {
                $data = $res->fetch_all(MYSQLI_ASSOC);
                $res->free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

// get 1 data to put in edit form
    function getItemModule($module_id)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM module WHERE module_id='$module_id'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();
            $row_cnt = $res->num_rows;

            if ($row_cnt == 1) {
                return $data;
            }

        } else {
            return false;
        }
    }

// get 1 data with parameter column (select by)
    function getItemModuleBy($column, $value)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM module WHERE $column='$value' ";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();
            $row_cnt = $res->num_rows;

            if ($row_cnt == 1) {
                return $data;
            }

        } else {
            return false;
        }
    }

// input data module
    function insertModule($module_name, $link, $icon, $active, $access_owner, $access_pantry, $access_chef, $access_waiter, $access_cashier, $access_cs)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "INSERT INTO module(module_name, link, icon, active, access_owner, access_pantry, access_chef, access_waiter, access_cashier, access_cs)
                    VALUES('$module_name','$link','$icon','$active','$access_owner','$access_pantry','$access_chef','$access_waiter','$access_cashier','$access_cs') ";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        }

    }

// update data module
    function updateModule($module_id, $module_name, $link, $icon, $active, $access_owner, $access_pantry, $access_chef, $access_waiter, $access_cashier, $access_cs)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "UPDATE module SET module_name='$module_name',
                                        link='$link',
                                        icon='$icon',
                                        active='$active',
                                        access_owner='$access_owner',
                                        access_pantry='$access_pantry',
                                        access_chef='$access_chef',
                                        access_waiter='$access_waiter',
                                        access_cashier='$access_cashier',
                                        access_cs='$access_cs'
                        WHERE module_id='$module_id'";
            $res = $conn->query($sql);

            if ($res) return true; else return false;

        } else {
            return false;
        }
    }

//delete 1 data module
    function deleteModule($module_id)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "DELETE FROM module WHERE module_id='$module_id'";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        } else {
            return false;
        }
    }


}

?>
