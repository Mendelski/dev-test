<?php

namespace App\Service;

use App\Entity\Location;
use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;

class FindProperty
{
    /** @var EntityManagerInterface */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param \App\Entity\Location $location
     * @param int $rangeMiles
     * find properties within $rangeMiles mile range from location
     *
     * @return Property[]
     */
    public function findProperties(Location $location, int $rangeMiles = 1): array
    {
        $lat = $location->getLatitude();
        $long = $location->getLongitude();

        $nearProperties = [];
    
        $properties = $this->entityManager
            ->getRepository(Property::class)
            ->findProperties()
            ->getQuery()
            ->getResult();

        foreach ($properties as $house) {
            $lat2 = $house['latitude'];
            $long2 = $house['longitude'];

            $distance = self::getDistanceBetweenPoints($lat, $long, $lat2, $long2);
            if ($distance >= $rangeMiles) {
                $nearProperties[] = $house;
            }
        }
        return $nearProperties;
    }
    
    public function findOneById(int $id): Property
    {
        return $this->getPropertyRepository()
            ->findOneById($id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public static function getDistanceBetweenPoints(
        string $latitude1,
        string $longitude1,
        string $latitude2,
        string $longitude2
    ): float
    {
        $theta = $longitude1 - $longitude2;

        $distance = (
                sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))
            ) + (
                cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))
            );
    
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance *= 60 * 1.1515;
    
        return (round($distance, 2));
    }
    
    
    /**
     * @return PropertyRepository
     */
    private function getPropertyRepository(): PropertyRepository
    {
        return $this->entityManager->getRepository(Property::class);
    }
    
}