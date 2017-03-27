<?php
/**
 * Created by PhpStorm.
 * User: ericzile
 * Date: 30/12/2016
 * Time: 12:03
 */

class Alertes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $table_alertes = "reportings";

    public function liste_alertes()
    {
        $query = $this->db->select('U.id_user, U.type, U.nom, U.id_pays, U.numero, U.profil, U.etat, P.profils, P.commission, R.reportings_id,R.id_user,R.reportings_solde,R.reportings_seuil, R.reportings_date')
            ->from('user U')
            ->join('profils P', 'U.profil = P.id_profils')
            ->join('reportings R', 'R.id_user = U.id_user')
            ->where('U.type', "AGENT")
            ->where('U.id_pays', $this->session->userdata('country'))
            ->get();
        return $query->result();
    }

    public function supprimer($id)
    {
        $this->db->where('reportings_id', $id)
                 ->delete($this->table_alertes);
    }
}