<?php
   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Auth_client extends CI_Model {
	    protected $table = "user";
		
		/**
	     * Checks login
	     *
	     * @return bool
	     **/
	    public function login_check($login)
	    {
	        if (empty($login)) 
	        {
	            return FALSE;
	        }
	
	        return $this->db->where('email', $login)->count_all_results('user') > 0;
	    }
		
	    /**
	     * login
	     *
	     * @return bool
	     **/
	    public function login($login, $password)
	    {
	        //echo $id;
	         $pass_hash = md5($password); 
			 return $this->db->select('id_user, type, nom, id_pays, localication, longitude, latitude, email, numero, profil, pin, etat')
			 				 ->from($this->table)
			 				 ->where('email', $login)
							 ->where('pin', $pass_hash)
							 ->where('etat', "A")
							 ->get()
							 ->row();
	    }


	    public function changer($email, $password)
    {
        return $this->db->set('pin', md5($password))
            ->set('etat', "A")
            ->where('email', $email)
            ->update($this->table);

    }

    /*
		 *
		 * Activation du compte de l'utilisateur
		 *
		 */
    public function activer($email)
    {
        return $this->db->set('etat', "A")
            ->where('email', $email)
            ->update($this->table);

    }
    public function activate($id)
    {
        return $this->db->set('etat', "A")
            ->where('id_user', $id)
            ->update($this->table);

    }
	    
	    /**
	     * change password
	     *
	     * @return bool
	     **/
	    public function change_password($login, $old, $new)
	    {
	        $query = $this->db->select('pin')
	                  ->where('email', $login)
	                  ->limit(1)
	                  ->get('user');
	
	        $result = $query->row();
	
	        $db_password = $result->password;
	
	        if ($db_password === $old)
	        {
	            //store the new password
	            $data = array('pin' => $new);
	            
	            $this->db->update('user', $data, array('email' => $login));
	
	            return $this->db->affected_rows() == 1;
	        }
	
	        return FALSE;
	    }
	
	    /**
	     * logged_in
	     *
	     * @return bool
	     **/
	    public function logged_in()
	    {
	        return (bool) $this->session->userdata('email');
	    }
	}
?>