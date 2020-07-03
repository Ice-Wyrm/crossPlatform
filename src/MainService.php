<?php


namespace App;


use App\DTO\FactoryDto;
use App\Entity\CountryEntity;
use App\Entity\FactoryEntity;
use App\Entity\FactoryOwnerEntity;
use App\Entity\OwnerEntity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;

class MainService
{

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function ownerList(): array
    {
        return $this->entityManager->getRepository(OwnerEntity::class)->findAll();
    }

    public function factoriesOfOwners(int $ownerId): array
    {
        return $this->entityManager->createQueryBuilder()
            ->select('f')
            ->from(FactoryEntity::class, 'f')
            ->join('f.factoryOwners','fo')
            ->join('fo.owner', 'o')
            ->where('o.id = :id')
            ->setParameter('id', $ownerId)
            ->getQuery()
            ->getResult();
    }

    public function ownersOfFactory(int $factoryId)
    {
        $sql = file_get_contents(__DIR__.'/sql/get_owners_of_company.sql');

        $rsm = new ResultSetMapping;
        $rsm->addEntityResult(OwnerEntity::class, 'o');
        $rsm->addFieldResult('o', 'id', 'id');
        $rsm->addFieldResult('o', 'name', 'name');

        $query = $this->entityManager->createNativeQuery($sql, $rsm);
        $query->setParameter('id', $factoryId);

        return $query->getResult();
    }

    public function tankersOfFactory(int $factoryId)
    {
        return $this->entityManager->getRepository(FactoryEntity::class)->findOneById($factoryId)->getTankers()->getValues();
    }

    public function addFactory(FactoryDto $factoryDto, array $owners):FactoryEntity
    {
        $this->entityManager->beginTransaction();
        try {
            $factory = new FactoryEntity();
            $factory->setName($factoryDto->name);
            $factory->setCountry($this->entityManager->getRepository(CountryEntity::class)->findOneById($factoryDto->countryId));
            $this->entityManager->persist($factory);
            foreach ($owners as $owner){
                $factoryOwner = new FactoryOwnerEntity();
                $factoryOwner
                    ->setFactory($factory)
                    ->setOwner($this->entityManager->getRepository(OwnerEntity::class)->findOneById((int)$owner));
                $this->entityManager->persist($factoryOwner);
            }
            $this->entityManager->flush();
        } catch (\Exception $e){
            throw new \Exception("Ошибка при добавлении нового завода");
        }
        $this->entityManager->commit();
        return $factory;
    }
}