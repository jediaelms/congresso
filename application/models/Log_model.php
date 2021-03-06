<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Log_model extends CI_Model{ 


    function get_client_ip_server() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }


    public function insert($descricao, $id_usuario){
        $dados['ip'] = $this->get_client_ip_server();
        $dados['id_usuario'] = $id_usuario;
        $dados['descricao'] = $descricao;

        $this->db->insert('log', $dados);
    }

    public function insert_admin($descricao, $id_administrador){
        $dados['ip'] = $this->get_client_ip_server();
        $dados['id_administrador'] = $id_administrador;
        $dados['descricao'] = $descricao;

        $this->db->insert('log_admin', $dados);
    }

    public function insert_parecerista($descricao, $id_administrador){
        $dados['ip'] = $this->get_client_ip_server();
        $dados['id_parecerista'] = $id_parecerista;
        $dados['descricao'] = $descricao;

        $this->db->insert('log_parecerista', $dados);
    }


}




?>