<?php

namespace App\Repository;

use App\Entity\Location;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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

//     /**
//      * @return ?Location[] Returns an array of Location objects where
//      */
//    public function findLocationByName(string $name): ?array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.name = :name')
//            ->setParameter('name', $name)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    /**
     * @return ?Location[] Returns an array of all Location objects
     */
    public function findLocations(): ?array
    {
        return $this->createQueryBuilder('l')
            ->select('l.id', 'l.name', 'l.slug', 'l.latitude', 'l.longitude')
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @param string $name
//     * @return Location|null
//     * @throws \Doctrine\ORM\NonUniqueResultException
//     */
//    public function findOneLocationByName(string $name): ?Location
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.name = :val')
//            ->setParameter('val', $name)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

}
