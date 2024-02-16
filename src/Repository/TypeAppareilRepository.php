<?php

namespace App\Repository;

use App\Entity\TypeAppareil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeAppareil>
 *
 * @method TypeAppareil|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAppareil|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAppareil[]    findAll()
 * @method TypeAppareil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAppareilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeAppareil::class);
    }

    public function findMarquesByTypeAppareil($idTypeAppareil)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('m')
            ->from('App\Entity\Marque', 'm')
            ->join('m.idTypeAppareils', 't')
            ->where('t.idTypeAppareil = :idTypeAppareil')
            ->setParameter('idTypeAppareil', $idTypeAppareil);

        return $qb->getQuery()->getResult();
    }


//    /**
//     * @return TypeAppareil[] Returns an array of TypeAppareil objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeAppareil
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
