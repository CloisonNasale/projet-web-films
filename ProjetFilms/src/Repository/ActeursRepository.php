<?php
namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Acteurs;

class ActeursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Acteurs::class);
    }

    /** Récupère les acteurs pour un film donné*/
    public function findByFilmId(int $idFilm): array
    {
        return $this->createQueryBuilder('a')
            ->join('a.films', 'f')  // uniquement si la relation existe
            ->where('f.idFilm = :idFilm')
            ->setParameter('idFilm', $idFilm)
            ->getQuery()
            ->getResult();
    }
}
