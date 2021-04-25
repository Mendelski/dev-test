<?php

namespace App\Repository;

use App\Entity\Location;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Location|null find($id, $lockMode = null, $lockVersion = null)
 * @method Location|null findOneBy(array $criteria, array $orderBy = null)
 * @method Location[]    findAll()
 * @method Location[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Location::class);
    }
    
    /**
     * @return QueryBuilder Returns an array of all Location objects
     */
    public function findLocations(): QueryBuilder
    {
        return $this->createQueryBuilder('l')
            ->select('l.id', 'l.name', 'l.slug', 'l.latitude', 'l.longitude')
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10);
        
    }
    
    /**
     * @param string $slug
     *
     * @return QueryBuilder
     */
    public function findOneBySlug(string $slug): QueryBuilder
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.slug = :slug')
            ->setParameter('slug', $slug);
    }

}
