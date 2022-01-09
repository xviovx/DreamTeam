<?php

namespace App\Entity;

use App\Repository\UserProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserProfileRepository::class)
 */
class UserProfile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity=UserProfile::class, inversedBy="friendsReceived")
     * @ORM\JoinTable(name="friendship",
     *  joinColumns={
     *      @ORM\JoinColumn(name="send_id", referencedColumnName="id")
     * },
     * inverseJoinColumns={
     *     @ORM\JoinColumn(name="received_id", referencedColumnName="id")
     * }
     * )
     */
    private $friendsRequested;

    /**
     * @ORM\ManyToMany(targetEntity=UserProfile::class, mappedBy="friendsRequested")
     */
    private $friendsReceived;

    public function __construct()
    {
        $this->friendsRequested = new ArrayCollection();
        $this->friendsReceived = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getFriendsRequested(): Collection
    {
        return $this->friendsRequested;
    }

    public function addFriendsRequested(self $friendsRequested): self
    {
        if (!$this->friendsRequested->contains($friendsRequested)) {
            $this->friendsRequested[] = $friendsRequested;
        }

        return $this;
    }

    public function removeFriendsRequested(self $friendsRequested): self
    {
        $this->friendsRequested->removeElement($friendsRequested);

        return $this;
    }

    //merge tables to get all friends
    public function getFriends(): ?array
    {
        return array_merge(
            $this->getFriendsRequested()->toArray(),
            $this->getFriendsReceived()->toArray()
        );
    }

    /**
     * @return Collection|self[]
     */
    public function getFriendsReceived(): Collection
    {
        return $this->friendsReceived;
    }

    public function addFriendsReceived(self $friendsReceived): self
    {
        if (!$this->friendsReceived->contains($friendsReceived)) {
            $this->friendsReceived[] = $friendsReceived;
            $friendsReceived->addFriendsRequested($this);
        }

        return $this;
    }

    public function removeFriendsReceived(self $friendsReceived): self
    {
        if ($this->friendsReceived->removeElement($friendsReceived)) {
            $friendsReceived->removeFriendsRequested($this);
        }

        return $this;
    }
}
