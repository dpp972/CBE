<?php
/**
 * Created by PhpStorm.
 * User: Dpp
 * Date: 22/08/2015
 * Time: 19:28
 */

namespace Dpp\Cbe\MainBundle;


class ModelManager {

    //Tri un tableau de rubrique selon l'ordre défini par la colonne
    //dont le nom est fourni par le paramètre $sOrderColName
    function sortMenu( $aMenuSections, $sOrderColName) {
        //TODO : Amliorer l'algo de tri :
        // - verifier la structure du tableau en paramètre
        // - verifier qu'il y a bien une entree $aMenuSections[$sOrderColName] valide
        // - pour ceux qui n'ont pas de $aMenuSections[$sOrderColName] valide, les mettre
        // a la fin du tableau de sortie.
        //----------------------------------
        //Initialisation
        $change = true;
        $maxi = count( $aMenuSections)-2;
        $limit = 0;

        //Tri bulle
        while( $change){
            $change = false;
            for($i=$maxi; $i>=$limit; $i--) {
                if( $aMenuSections[$i][$sOrderColName] > $aMenuSections[$i+1][$sOrderColName]){
                    $tempr = $aMenuSections[$i];
                    $aMenuSections[$i] = $aMenuSections[$i+1];
                    $aMenuSections[$i+1] = $tempr;
                    $change = true;
                }
            }
            $limit++;
        }
        //Retour
        return $aMenuSections;
    }
}