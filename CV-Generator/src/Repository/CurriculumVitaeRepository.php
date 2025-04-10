<?php

namespace App\Repository;

use App\Entity\CurriculumVitae;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;

/**
 * @extends ServiceEntityRepository<CurriculumVitae>
 */
class CurriculumVitaeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CurriculumVitae::class);
    }

       /**
        * @return CurriculumVitae[] Returns an array of CurriculumVitae objects
        */
       public function findByUser(User $user): array
       {
           return $this->createQueryBuilder('c')
               ->where('c.user = :userId')
               ->setParameter('userId', $user->getId())
               ->orderBy('c.id', 'ASC')
               ->getQuery()
               ->getResult()
           ;
       }

    //    public function findOneBySomeField($value): ?CurriculumVitae
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
