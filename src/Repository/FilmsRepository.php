<?php

namespace App\Repository;

use App\Entity\Films;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FilmsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Films::class);
    }

    // Recherche et filtre les films selon plusieurs critères (genre, année, recherche textuelle, tri)
    public function findByFilters(?int $genreId, ?string $year, ?string $search = null, string $sort = 'alpha')
    {
        $queryBuilder = $this->createQueryBuilder('f')
            ->leftJoin('f.prix', 'p'); 

        if ($genreId) {
            $queryBuilder->join('f.genres', 'g')
                ->andWhere('g.id_Genre = :genreId')
                ->setParameter('genreId', $genreId);
        }

        if ($year) {
            $queryBuilder->andWhere('f.annee = :year')
                ->setParameter('year', $year);
        }

        if ($search) {
            $queryBuilder->andWhere('f.titre LIKE :search')
                ->setParameter('search', $search . '%');
        }

        switch ($sort) {
            case 'price_asc':
                $queryBuilder->orderBy('p.prix', 'ASC');
                break;
            case 'rating_desc':
                $queryBuilder->orderBy('f.classementIMDB', 'DESC');
                break;
            case 'alpha':
            default:
                $queryBuilder->orderBy('f.titre', 'ASC');
                break;
        }

        return $queryBuilder->getQuery();
    }
}
