<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class OwnerEntity
 * @ORM\Entity()
 * @ORM\Table(name="factory_owner")
 * @package App\Entity
 */
class FactoryOwnerEntity extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id",type="integer")
     * @var int
     */
    public int $id;

    /**
     * @ORM\ManyToOne(targetEntity = "FactoryEntity", cascade = "persist")
     * @ORM\JoinColumn(name="factory_id", referencedColumnName="id")
     * @var FactoryEntity
     */
    private FactoryEntity $factory;

    /**
     * @ORM\ManyToOne(targetEntity = "OwnerEntity", cascade = "persist")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     * @var OwnerEntity
     */
    private OwnerEntity $owner;

    /**
     * @param FactoryEntity $factory
     * @return FactoryOwnerEntity
     */
    public function setFactory(FactoryEntity $factory): FactoryOwnerEntity
    {
        $this->factory = $factory;
        return $this;
    }

    /**
     * @param OwnerEntity $owner
     * @return FactoryOwnerEntity
     */
    public function setOwner(OwnerEntity $owner): FactoryOwnerEntity
    {
        $this->owner = $owner;
        return $this;
    }
}