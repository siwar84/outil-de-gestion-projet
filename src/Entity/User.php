<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Serializable;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Table(name="user")
 * @UniqueEntity(fields="email")
 * @ORM\Entity()
 */
class User implements UserInterface, Serializable {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @Assert\Email()
     * Assert\NotBlank()
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private ?string $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=250)
     */
    private string $plainPassword;

    /**
     * The below length depends on the "algorithm" you use for encoding
     * the password, but this works well with bcrypt.
     *
     * @ORM\Column(type="string", length=64)
     */
    private string $password;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private ?string $username;

    /**
     * @ORM\Column(name="roles", type="array")
     */
    private array $roles = array();

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private ?Bool $isActive;

    public function __construct()
    {
        $this->isActive=true;
      // may not needed, see section on salt below
        // $this->salt = md5(('uniqid', true));
    }




    public function getUsername(): ?string
    {
        return $this->username;
    }


    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles ():array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
    function addRole($role) {
        $this->roles[] = $role;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

public function eraseCredentials()
{
    // If you store any temporary, sensitive data on the user, clear it here
    // $this->plainPassword = null;
}

    /** @see \Serializable::serialize() */
    public function serialize(): ?string
{
    return serialize(array(
        $this -> id,
        $this->email,
        $this -> username,
        $this -> password,
        //see section on salt below
        //$this->salt
    ));
}


    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->email,
            $this->username,
            $this->password,
            //see section on salt below
            //$this->salt
        ) = unserialize($serialized);
    }

    public function getId(): ?int
    {
        return $this -> id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    function getPlainPassword(): string
    {
        return $this->plainPassword;
    }

    function getIsActive(): ?bool
    {
        return $this->isActive;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setEmail($email) {
        $this->email = $email;
    }
    function setPlainPassword($plainPassword) {
        $this->plainPassword = $plainPassword;
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

}
