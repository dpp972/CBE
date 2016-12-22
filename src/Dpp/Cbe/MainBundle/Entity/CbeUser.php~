<?php
/**
 * Created by PhpStorm.
 * User: Dpp
 * Date: 01/09/2015
 * Time: 10:43
 */

namespace Dpp\Cbe\MainBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cbe_fos_user")
 */
class CbeUser extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function setSalt( $sSalt){
        $this->salt = $sSalt;
    }
}
