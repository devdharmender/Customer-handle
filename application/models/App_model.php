<?php
class App_model extends CI_Model
{
    public function create($formArray)
    {
        $this->db->insert('main_table', $formArray);
    }


    public function getData($params = [])
    {
        if (isset($params['id'])) {
            
            $this->db->where('mid', $params['id']);
        }

        if (isset($params['queryString'])) {
            $this->db->like('name', ($params['queryString']));
            $this->db->or_like('phone', trim($params['queryString']));
        }
        $this->db->order_by('date', 'desc');

        if (isset($params['offset']) && isset($params['limit'])) {
            $this->db->limit($params['offset'], $params['limit']);
        }
        $this->db->where('status', $params['status']);
        $result = $this->db->get('main_table')->result_array();
        return $result;
    }
    public function self($params = [])
    {
        if (isset($params['id'])) {
            
            $this->db->where('mid', $params['id']);
        }

        if (isset($params['queryString'])) {
            $this->db->like('name', ($params['queryString']));
            $this->db->or_like('phone', trim($params['queryString']));
            
        }
        $this->db->order_by('date', 'desc');

        if (isset($params['offset']) && isset($params['limit'])) {
            $this->db->limit($params['offset'], $params['limit']);
        }
       
        $this->db->where('status', $params['status']);
        $result = $this->db->get('main_table')->result_array();
        return $result;
    }
    public function getFilterData($params = [])
    {
        if (isset($params['queryString'])) {
            $this->db->like('name', ($params['queryString']));
            $this->db->where('status', $params['status']);
            $this->db->or_like('phone', trim($params['queryString']));
        }
        $this->db->order_by('date', 'desc');
        $this->db->where('status', $params['status']);
        $result = $this->db->get('main_table')->result_array();
        return $result;
    }
    public function getEditData($id,$params = [])
    {
        $this->db->where('mid', $id);
        $editdata = $this->db->get('main_table')->row_array();
        return $editdata;
    }
    public function update($id, $formArray)
    {
        $this->db->where('mid', $id);
        $this->db->update('main_table', $formArray);
    }


    public function delete($id)
    {
        $this->db->where('mid', $id);
        $this->db->delete('main_table');
    }


    public function getDataCount($params = [])
    {
        if (isset($params['queryString'])) {
            $this->db->where('name', ($params['queryString']));
            $this->db->where('phone', ($params['queryString']));
            $this->db->or_like('name', ($params['queryString']));
            $this->db->or_like('phone', trim($params['queryString']));
        }
        $this->db->where('status', $params['status']);
        $count = $this->db->count_all_results('main_table');

        return $count;
    }


    public function user_view($params = [])
    {
        if (isset($params['id'])) {
            $this->db->where('mid', $params['id']);
        }
        $this->db->where('status', $params['status']);
        $user_view = $this->db->get('main_table')->row_array();
        return $user_view;
    }

    public function notification($table,$data)
    {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->like('date',$data['date']);
        $this->db->where_in('status',$data['status']);
        return $this->db->get()->result_array();
    }

    public function notic_rows($table,$data)
    {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->like('date',$data['date']);
        $this->db->where_in('status',$data['status']);
        return $this->db->get()->num_rows();
    }

}
