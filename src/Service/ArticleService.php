<?php
/**
 * This file is part of the symfony-docker package.
 *
 * (c) Solvee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Service;


use App\DTO\CreateArticleDTO;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class ArticleService
 *
 * @author Michał Rybnik <michal.rybnik@solvee.pl>
 */
class ArticleService
{
    /** @var EntityManagerInterface */
    private $doctrineManager;

    /**
     * ArticleService constructor.
     *
     * @param EntityManagerInterface $doctrineManager
     */
    public function __construct(EntityManagerInterface $doctrineManager)
    {
        $this->doctrineManager = $doctrineManager;
    }

    public function add(CreateArticleDTO $dto): Article
    {
        $article = new Article();
        $article->setTitle($dto->title);
        $article->setContent($dto->content);
        $this->doctrineManager->persist($article);
        $this->doctrineManager->flush();

        return $article;
    }
}
