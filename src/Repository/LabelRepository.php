<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Tavy315\SyliusLabelsPlugin\Model\Label;

class LabelRepository extends EntityRepository implements LabelRepositoryInterface
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(Label::class));
    }

    public function findAllWithTranslation(?string $locale = null): array
    {
        return $this->createTranslationBasedQueryBuilder($locale)
                    ->getQuery()
                    ->getResult();
    }

    protected function createTranslationBasedQueryBuilder(?string $locale): QueryBuilder
    {
        $queryBuilder = $this->createQueryBuilder('l')
                             ->addSelect('translation')
                             ->leftJoin('l.translations', 'translation');

        if ($locale !== null) {
            $queryBuilder->andWhere('translation.locale = :locale')
                         ->setParameter('locale', $locale);
        }

        return $queryBuilder;
    }
}
