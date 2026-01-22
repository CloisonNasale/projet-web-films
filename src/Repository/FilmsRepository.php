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

    public function findByFilters(?int $genreId, ?string $year, ?string $search = null, string $sort = 'alpha')
    {
        $qb = $this->createQueryBuilder('f')
            ->leftJoin('f.prix', 'p'); // Join necessary for price sorting

        if ($genreId) {
            $qb->join('f.genres', 'g')
               ->andWhere('g.id_Genre = :genreId')
               ->setParameter('genreId', $genreId);
        }

        if ($year) {
            $qb->andWhere('f.annee = :year')
               ->setParameter('year', $year);
        }

        if ($search) {
            $qb->andWhere('f.titre LIKE :search')
               ->setParameter('search', $search . '%');
        }

        // Apply Sorting
        switch ($sort) {
            case 'price_asc':
                $qb->orderBy('p.prix', 'ASC');
                break;
            case 'rating_desc':
                $qb->orderBy('f.classementIMDB', 'DESC');
                break;
            case 'alpha':
            default:
                $qb->orderBy('f.titre', 'ASC');
                break;
        }

        return $qb->getQuery();
    }
}
