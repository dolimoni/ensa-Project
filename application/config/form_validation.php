
<?php
$config = array(
        'ensa_rules' => array(
                array(
                        'field' => 'nom',
                        'label' => 'nom',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'prenom',
                        'label' => 'prenom',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'cne',
                        'label' => 'cne',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'cin',
                        'label' => 'cin',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'required|matches[passconf]|encode_php_tags'
                ),
                 array(
                        'field' => 'passconf',
                        'label' => 'confirmation',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'nationalite',
                        'label' => 'nationalité',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'lieu_naissance',
                        'label' => 'lieu de naissance',
                        'rules' => 'required|alpha|encode_php_tags'
                ),
                array(
                        'field' => 'date_naissance',
                        'label' => 'date de naissance',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'tel',
                        'label' => 'téléphone',
                        'rules' => 'required|integer|exact_length[10]|encode_php_tags'
                ),
                array(
                        'field' => 'gsm',
                        'label' => 'gsm',
                        'rules' => 'encode_php_tags'
                ),
                array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'required|valid_email|encode_php_tags'
                ),
                array(
                        'field' => 'adresse',
                        'label' => 'adresse',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'ville',
                        'label' => 'ville',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'profession_pere',
                        'label' => 'profession de père',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                 array(
                        'field' => 'profession_mere',
                        'label' => 'profession de mère',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'note_bac',
                        'label' => 'note de bac',
                        'rules' => 'is_numeric|encode_php_tags'
                ),
                 array(
                        'field' => 'note_1er_annee',
                        'label' => 'note de 1er année',
                        'rules' => 'is_numeric|encode_php_tags'
                ),
                 array(
                        'field' => 'classement',
                        'label' => 'classement',
                        'rules' => 'integer|encode_php_tags'
                )
                 

        ),
        'cnc_rules' => array(
              array(
                        'field' => 'nom',
                        'label' => 'Nom',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'prenom',
                        'label' => 'prenom',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'cne',
                        'label' => 'cne',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'cin',
                        'label' => 'cin',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'required|matches[passconf]|encode_php_tags'
                ),
                 array(
                        'field' => 'passconf',
                        'label' => 'confirmation',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'nationalite',
                        'label' => 'nationalité',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'lieu_naissance',
                        'label' => 'lieu de naissance',
                        'rules' => 'required|alpha|encode_php_tags'
                ),
                array(
                        'field' => 'date_naissance',
                        'label' => 'date de naissance',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'tel',
                        'label' => 'téléphone',
                        'rules' => 'required|integer|exact_length[10]|encode_php_tags'
                ),
                array(
                        'field' => 'gsm',
                        'label' => 'gsm',
                        'rules' => 'encode_php_tags'
                ),
                array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'required|valid_email|encode_php_tags'
                ),
                array(
                        'field' => 'adresse',
                        'label' => 'adresse',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'ville',
                        'label' => 'ville',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'profession_pere',
                        'label' => 'profession de père',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                 array(
                        'field' => 'profession_mere',
                        'label' => 'profession de mère',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'note_bac',
                        'label' => 'note de bac',
                        'rules' => 'is_numeric|encode_php_tags'
                ),
                 array(
                        'field' => 'filiere_cp',
                        'label' => 'filiere cp',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                 array(
                        'field' => 'etablissement_cp',
                        'label' => 'etablissement cp',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                  array(
                        'field' => 'ville_cp',
                        'label' => 'ville cp',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                 array(
                        'field' => 'range_cnc',
                        'label' => 'range cnc',
                        'rules' => 'is_numeric|encode_php_tags'
                )
                 
                 
        ),
         '3and4Year_rules' => array(
              array(
                        'field' => 'nom',
                        'label' => 'nom',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'prenom',
                        'label' => 'prenom',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'cne',
                        'label' => 'cne',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'cin',
                        'label' => 'cin',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'required|matches[passconf]|encode_php_tags'
                ),
                 array(
                        'field' => 'passconf',
                        'label' => 'confirmation',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'nationalite',
                        'label' => 'nationalité',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'lieu_naissance',
                        'label' => 'lieu de naissance',
                        'rules' => 'required|alpha|encode_php_tags'
                ),
                array(
                        'field' => 'date_naissance',
                        'label' => 'date de naissance',
                        'rules' => 'required|encode_php_tags'
                ),
                array(
                        'field' => 'tel',
                        'label' => 'téléphone',
                        'rules' => 'required|integer|exact_length[10]|encode_php_tags'
                ),
                array(
                        'field' => 'gsm',
                        'label' => 'gsm',
                        'rules' => 'encode_php_tags'
                ),
                array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'required|valid_email|encode_php_tags'
                ),
                array(
                        'field' => 'adresse',
                        'label' => 'adresse',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'ville',
                        'label' => 'ville',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'profession_pere',
                        'label' => 'profession de père',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                 array(
                        'field' => 'profession_mere',
                        'label' => 'profession de mère',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                ),
                array(
                        'field' => 'note_bac',
                        'label' => 'note de bac',
                        'rules' => 'is_numeric|encode_php_tags'
                ),
                 array(
                        'field' => 'etablissement_diplome',
                        'label' => 'etablissement du diplome',
                        'rules' => 'required|encode_php_tags'
                ),
                 array(
                        'field' => 'type_diplome',
                        'label' => 'type du diplome',
                        'rules' => 'required|alpha_dash|encode_php_tags'
                )
        )
)
?>