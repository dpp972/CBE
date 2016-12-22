<?php

namespace Dpp\Cbe\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dpp\Cbe\MainBundle\Entity\CbeUser as User;

class UserLoad implements FixtureInterface {

    public function load(ObjectManager $manager)
    {
        // L'admin
        $adminName = 'admin';

        // Les chargés d'inscription
        $inscriptorNames = array( 'secretaire');

        // Les élèves
        $eleveNames = array( 'toto');

        // Les membres
        $membreNames = array( 'tutu');

        // Ceux qui ont 2 roles d'interface
        $twoIhmNames = array( 'meme');

        // Ceux qui ont 3 roles d'interface
        $threeIhmNames = array( 'mama');

        // Les auteurs
        $auteurNames = array( 'auteur');

        // Les redacteurs
        $redacteurNames = array( 'redacteur');

        // Les redacteurs en chef
        $redacteurChefNames = array( 'redacchef');

        // Les editeurs
        $editeurNames = array( 'editeur');

        //Installation de l'admin
        $this->addUserByName( $adminName, array( 'ROLE_ADMIN'), $manager);

        //Installation des chargés d'inscription
        foreach ( $inscriptorNames as $name) {
            $this->addUserByName( $name, array( 'ROLE_ADMIN_INCRIPTION', 'ROLE_WEBMASTER'), $manager);
        }

        //Installation des éleves
        foreach ( $eleveNames as $name) {
            $this->addUserByName( $name, array( 'ROLE_ELEVE'), $manager);
        }

        //Installation des membres
        foreach ( $membreNames as $name) {
            $this->addUserByName( $name, array( 'ROLE_MEMBRE'), $manager);
        }

        //Installation de ceux qui ont 2 roles d'interface
        foreach ( $twoIhmNames as $name) {
            $this->addUserByName( $name, array( 'ROLE_MEMBRE', 'ROLE_ELEVE', 'ROLE_MULTI_IHM'), $manager);
        }

        //Installation de ceux qui ont 3 roles d'interface
        foreach ( $threeIhmNames as $name) {
            $this->addUserByName( $name, array( 'ROLE_MEMBRE', 'ROLE_ELEVE', 'ROLE_WEBMASTER', 'ROLE_EDITEUR', 'ROLE_MULTI_IHM'), $manager);
        }

        //Installation des auteurs
        foreach ( $auteurNames as $name) {
            $this->addUserByName( $name, array( 'ROLE_WEBMASTER', 'ROLE_AUTEUR'), $manager);
        }

        //Installation des redacteurs
        foreach ( $redacteurNames as $name) {
            $this->addUserByName( $name, array( 'ROLE_WEBMASTER', 'ROLE_REDACTEUR'), $manager);
        }

        //Installation des redacteurs en chef
        foreach ( $redacteurChefNames as $name) {
            $this->addUserByName( $name, array( 'ROLE_WEBMASTER', 'ROLE_REDACTEUR_CHEF'), $manager);
        }

        //Installation des editeurs
        foreach ( $editeurNames as $name) {
            $this->addUserByName( $name, array( 'ROLE_WEBMASTER', 'ROLE_EDITEUR'), $manager);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

    //-------------------------------------------------------------------------------------------------

    private function addUserByName( $sName, $aRole, $manager) {
        // On crée l'utilisateur
        $user = new User;

        // Le nom d'utilisateur et le mot de passe sont identiques
        $user->setUsername( $sName);
        $user->setPassword( $sName);

        // L'email c'est : nom d'utilisateur + '@gmail.com'
        $user->setEmail( $sName.'@gmail.com');

        // On ne se sert pas du sel pour l'instant
        $user->setSalt( '');
        // On définit uniquement le role ROLE_USER qui est le role de base
        $user->setRoles( $aRole);

        // On active l'utilisateur
        $user->setEnabled( true);

        // On le persiste
        $manager->persist($user);
    }

}