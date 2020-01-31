<?php

namespace App\Twig;

use App\Repository\ArticleRepository;
use App\Repository\RepositoryInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    /**
     * @var ArticleRepository
     */
    private $repository;
    private $env;

    public function __construct($env)
    {
        $this->env = $env;
    }

    /**
     * @param ArticleRepository $repository
     */
    public function setRepository(RepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }


    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('stringLength', [$this, 'stringLength']),
        ];
    }

    public function getFunctions(): array
    {
        return [
           // new TwigFunction('function_name', [$this, 'stringLength']),
        ];
    }

    public function stringLength($value): int
    {
        dump($this->env);
        return strlen($value);
    }
}
