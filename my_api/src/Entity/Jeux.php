<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JeuxRepository")
 */
class Jeux
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min =3, minMessage="Le nom doit avoir 3 caractères au minimum")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=10, minMessage="Le nom doit avoir 10 caractères au minimum")
     */
    private $commentaire;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url()
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateDeSortie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Console", inversedBy="jeux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Console;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDateDeSortie(): ?string
    {
        return $this->dateDeSortie;
    }

    public function setDateDeSortie(string $dateDeSortie): self
    {
        $this->dateDeSortie = $dateDeSortie;

        return $this;
    }

    public function getConsole(): ?Console
    {
        return $this->Console;
    }

    public function setConsole(?Console $Console): self
    {
        $this->Console = $Console;

        return $this;
    }
}
