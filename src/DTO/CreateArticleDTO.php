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

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CreateArticleDTO
 *
 * @author Michał Rybnik <michal.rybnik@solvee.pl>
 */
class CreateArticleDTO
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     * @Assert\Type("string")
     */
    public $title;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(min=10)
     */
    public $content;
}
