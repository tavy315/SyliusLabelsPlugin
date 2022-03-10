<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class LabelRepository extends EntityRepository implements LabelRepositoryInterface
{
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

        if (null !== $locale) {
            $queryBuilder->andWhere('translation.locale = :locale')
                         ->setParameter('locale', $locale);
        }

        return $queryBuilder;
    }
}
