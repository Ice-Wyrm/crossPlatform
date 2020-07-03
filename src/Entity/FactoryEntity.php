<?php


namespace App\Entity;

use App\DTO\AbstractDto;
use App\DTO\FactoryDto;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class OwnerEntity
 * @ORM\Entity()
 * @ORM\Table(name="factory")
 * @package App\Entity
 */
class FactoryEntity extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id",type="integer")
     * @var int
     */
    private int $id;

    /**
     * @ORM\Column(name="name",type="string")
     * @var string
     */
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity = "CountryEntity", cascade = "persist")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * @var CountryEntity
     */
    private CountryEntity $country;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity= "TankerEntity",mappedBy="factory")
     */
    private $tankers;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity= "FactoryOwnerEntity",mappedBy="factory")
     */
    private $factoryOwners;

    /**
     * @return Collection
     */
    public function getTankers(): Collection
    {
        return $this->tankers;
    }

    /**
     * @return Collection
     */
    public function getFactoryOwners(): Collection
    {
        return $this->factoryOwners;
    }

    /**
     * @param string $name
     * @return FactoryEntity
     */
    public function setName(string $name): FactoryEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param CountryEntity $country
     * @return FactoryEntity
     */
    public function setCountry(CountryEntity $country): FactoryEntity
    {
        $this->country = $country;
        return $this;
    }

    public function getDtoObject(): AbstractDto
    {
        return new FactoryDto();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getCountryId():int
    {
        return $this->country->getId();
    }
}