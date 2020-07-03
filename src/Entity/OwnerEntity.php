<?php


namespace App\Entity;

use App\DTO\AbstractDto;
use App\DTO\OwnerDto;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class OwnerEntity
 * @ORM\Entity()
 * @ORM\Table(name="owner")
 * @package App\Entity
 */
class OwnerEntity extends AbstractEntity
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
     * @ORM\OneToMany(targetEntity= "FactoryOwnerEntity",mappedBy="owner")
     */
    private $factoryOwners;

    /**
     * @return Collection
     */
    public function getFactoryOwners(): Collection
    {
        return $this->factoryOwners;
    }

    public function getDtoObject(): AbstractDto
    {
        return new OwnerDto();
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