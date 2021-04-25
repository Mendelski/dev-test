<?php

namespace App\Service;

use App\Entity\Location;
use App\Repository\LocationRepository;
use Doctrine\ORM\EntityManagerInterface;

class FindLocation
{
    /** @var EntityManagerInterface */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return Location[]
     */
    public function findLocations(): array
    {
        return $this->getLocationRepository()
            ->findLocations()
            ->getQuery()
            ->getResult();
    }

    /**
     * @param string $slug
     * @return Location
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findLocationBySlug(string $slug): Location
    {
        return $this->getLocationRepository()
            ->findOneBySlug($slug)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return LocationRepository
     */
    private function getLocationRepository(): LocationRepository
    {
        return $this->entityManager->getRepository(Location::class);
    }

}