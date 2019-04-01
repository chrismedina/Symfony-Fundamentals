<?php
/**
 * Created by PhpStorm.
 * User: Godspleb
 * Date: 4/1/2019
 * Time: 12:02 AM
 */

namespace CoreBundle\Entity;


// src/AppBundle/Entity/User.php
namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $apiKey;

    public function getUsername()
    {
        return $this->username;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getPassword()
    {
    }
    public function getSalt()
    {
    }
    public function eraseCredentials()
    {
    }

    // more getters/setters
}