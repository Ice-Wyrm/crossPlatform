<?php


namespace App\Entity;

use App\DTO\AbstractDto;
use App\DTO\TankerDto;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class OwnerEntity
 * @ORM\Entity()
 * @ORM\Table(name="tanker")
 * @package App\Entity
 */
class TankerEntity extends AbstractEntity
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
     * @ORM\ManyToOne(targetEntity = "FactoryEntity", cascade = "persist")
     * @ORM\JoinColumn(name="factory_id", referencedColumnName="id")
     * @var FactoryEntity
     */
    private FactoryEntity $factory;

    public function getDtoObject(): AbstractDto
    {
        return new TankerDto();
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