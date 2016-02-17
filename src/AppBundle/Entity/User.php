<?php
/**
 * Created by PhpStorm.
 * User: RPai
 * Date: 2/16/2016
 * Time: 11:28 AM
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use FR3D\LdapBundle\Model\LdapUserInterface as LdapUserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="UserRepository", )
 * @ORM\Table(name="user")
 */
class User extends BaseUser implements LdapUserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * LDAP Object Distinguished Name
     * @var
     * @ORM\Column(type="string")
     */
    protected $dn;
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    /**
     * @ORM\Column(type="string")
     */
    protected $language;


    public function __construct()
    {
        parent::__construct();

        if (empty($this->roles)) {
            $this->roles[] = 'ROLE_USER';
        }

        if (empty($this->language)) {
            $this->language = 'EN';
        }

    }

    /**
     * @param string $dn
     * {@inheritdoc}
     */
    public function setDn($dn) {
        $this->dn = $dn;
    }

    /**
     * @return mixed
     * {@inheritdoc}
     */
    public function getDn() {
        return $this->dn;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setLanguage($language) {
        $this->language = $language;
    }
}