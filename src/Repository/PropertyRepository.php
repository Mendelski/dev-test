<?php

namespace App\Repository;

use App\Entity\Property;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Property::class);
    }
    
    /**
     * @return \Doctrine\ORM\QueryBuilder
     * Returns an array of Property objects
     */
    
    public function findProperties(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->select('p.id', 'p.title', 'p.bedrooms', 'p.point', 'p.latitude', 'p.longitude')
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10);
    }
    
    
    public function findOneById(int $id): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $id);
    }
}
