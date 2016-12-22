<?php
namespace Dpp\Cbe\MainBundle\Redirection;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @param RouterInterface $router
     */
    public function __construct( RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess( Request $request, TokenInterface $token)
    {
//        // Lite des rôles d'interface
//        $roleRefTab = array( 'ROLE_WEBMASTER', 'ROLE_ELEVE', 'ROLE_MEMBRE');
//
//        // On calcule le seuil en dessous duquel l'utilisateur
//        // et conidéré comme un utilisateur multi-interface
//        $seuil = count( $roleRefTab)-1;

        // On récupère la liste des rôles d'un utilisateur
        $roles = $token->getRoles();

        // On transforme le tableau d'instance en tableau simple
        $rolesTab = array_map( function( $role){
            return $role->getRole();
        }, $roles);


        // Si l'utilisateur est un utilisateur multi-interface,
//        if( count( array_diff( $roleRefTab, $rolesTab)) < $seuil){
        if(  in_array( 'ROLE_MULTI_IHM', $rolesTab, true) || in_array( 'ROLE_ADMIN', $rolesTab, true)){
            $redirection = new RedirectResponse( $this->router->generate( 'main_portal_selection'));
        }

        // Sinon s'il s'agit d'un WEBMASTER,
        elseif  ( in_array( 'ROLE_WEBMASTER', $rolesTab, true)){
            $redirection = new RedirectResponse( $this->router->generate( 'administration_home'));
        }

        // Sinon s'il s'agit d'un MEMBRE,
        elseif ( in_array( 'ROLE_MEMBRE', $rolesTab, true)){
            $redirection = new RedirectResponse( $this->router->generate( 'membre_home'));
        }

        // Sinon s'il s'agit d'un ELEVE,
        elseif ( in_array( 'ROLE_ELEVE', $rolesTab, true)){
            $redirection = new RedirectResponse( $this->router->generate( 'eleve_home'));
        }

        // Sinon, il s'agit d'un simple utilisateur
        else{
            $redirection = new RedirectResponse( $this->router->generate( 'main_home'));
        }

        return $redirection;
    }
}