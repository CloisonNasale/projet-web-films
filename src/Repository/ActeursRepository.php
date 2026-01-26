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

    // Récupère la liste des acteurs associés à un film spécifique
    public function findByFilmId(int $idFilm): array
    {
        return $this->createQueryBuilder('a')
            ->join('a.films', 'f')
            ->where('f.idFilm = :idFilm')
            ->setParameter('idFilm', $idFilm)
            ->getQuery()
            ->getResult();
    }
}
