<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidateRepository::class)]
class Candidate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'candidate', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\OneToMany(targetEntity: Gender::class, mappedBy: 'candidate')]
    private Collection $gender;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $adress = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $country = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $nationality = null;

    #[ORM\Column]
    private ?bool $isPassportValid = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $passportFile = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $cv = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $profilPicture = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $currentLocation = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $placeOfBirth = null;

    #[ORM\Column]
    private ?bool $isAvailable = null;

    #[ORM\OneToMany(targetEntity: Category::class, mappedBy: 'candidate')]
    private Collection $category;

    #[ORM\OneToMany(targetEntity: Experience::class, mappedBy: 'candidate')]
    private Collection $experience;

    #[ORM\Column(type: Types::TEXT, nullable:true)]
    private ?string $shortDescription = null;

    #[ORM\Column(type: Types::TEXT, nullable:true)]
    private ?string $notes = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable:true)]
    private ?\DateTimeImmutable $deletedAt = null;

    #[ORM\ManyToOne(inversedBy: 'candidate')]
    private ?Apply $apply = null;


    public function __construct()
    {
        $this->gender = new ArrayCollection();
        $this->category = new ArrayCollection();
        $this->experience = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Gender>
     */
    public function getGender(): Collection
    {
        return $this->gender;
    }

    public function addGender(Gender $gender): static
    {
        if (!$this->gender->contains($gender)) {
            $this->gender->add($gender);
            $gender->setCandidate($this);
        }

        return $this;
    }

    public function removeGender(Gender $gender): static
    {
        if ($this->gender->removeElement($gender)) {
            // set the owning side to null (unless already changed)
            if ($gender->getCandidate() === $this) {
                $gender->setCandidate(null);
            }
        }

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function isIsPassportValid(): ?bool
    {
        return $this->isPassportValid;
    }

    public function setIsPassportValid(bool $isPassportValid): static
    {
        $this->isPassportValid = $isPassportValid;

        return $this;
    }

    public function getPassportFile(): ?Media
    {
        return $this->passportFile;
    }

    public function setPassportFile(?Media $passportFile): static
    {
        $this->passportFile = $passportFile;

        return $this;
    }

    public function getCv(): ?Media
    {
        return $this->cv;
    }

    public function setCv(?Media $cv): static
    {
        $this->cv = $cv;

        return $this;
    }

    public function getProfilPicture(): ?Media
    {
        return $this->profilPicture;
    }

    public function setProfilPicture(?Media $profilPicture): static
    {
        $this->profilPicture = $profilPicture;

        return $this;
    }

    public function getCurrentLocation(): ?string
    {
        return $this->currentLocation;
    }

    public function setCurrentLocation(string $currentLocation): static
    {
        $this->currentLocation = $currentLocation;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(string $placeOfBirth): static
    {
        $this->placeOfBirth = $placeOfBirth;

        return $this;
    }

    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): static
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
            $category->setCandidate($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        if ($this->category->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCandidate() === $this) {
                $category->setCandidate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Experience>
     */
    public function getExperience(): Collection
    {
        return $this->experience;
    }

    public function addExperience(Experience $experience): static
    {
        if (!$this->experience->contains($experience)) {
            $this->experience->add($experience);
            $experience->setCandidate($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): static
    {
        if ($this->experience->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getCandidate() === $this) {
                $experience->setCandidate(null);
            }
        }

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): static
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeImmutable
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(\DateTimeImmutable $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getApply(): ?Apply
    {
        return $this->apply;
    }

    public function setApply(?Apply $apply): static
    {
        $this->apply = $apply;

        return $this;
    }


}
