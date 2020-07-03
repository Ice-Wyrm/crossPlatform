<?php


namespace App\Entity;

use App\DTO\AbstractDto;
use App\DTO\CountryDto;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class OwnerEntity
 * @ORM\Entity()
 * @ORM\Table(name="country")
 * @package App\Entity
 */
class CountryEntity extends AbstractEntity
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
     * @var Collection
     * @ORM\OneToMany(targetEntity= "FactoryEntity",mappedBy="country")
     */
    private $factories;

    /**
     * @return Collection
     */
    public function getFactories(): Collection
    {
        return $this->factories;
    }

    public function getDtoObject(): AbstractDto
    {
        return new CountryDto();
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
}