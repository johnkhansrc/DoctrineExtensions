<?php

declare(strict_types=1);

/*
 * This file is part of the Doctrine Behavioral Extensions package.
 * (c) Gediminas Morkevicius <gediminas.morkevicius@gmail.com> http://www.gediminasm.org
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gedmo\Tests\Tree\Fixture\Closure;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Tree\Entity\Repository\ClosureTreeRepository;

/**
 * @Gedmo\Tree(type="closure")
 * @Gedmo\TreeClosure(class="CategoryClosure")
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\ClosureTreeRepository")
 */
#[ORM\Entity(repositoryClass: ClosureTreeRepository::class)]
#[Gedmo\Tree(type: 'closure')]
#[Gedmo\TreeClosure(class: CategoryClosure::class)]
class Category
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=64)
     */
    #[ORM\Column(name: 'title', type: Types::STRING, length: 64)]
    private $title;

    /**
     * @var int|null
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     * @Gedmo\TreeLevel
     */
    #[ORM\Column(name: 'level', type: Types::INTEGER, nullable: true)]
    #[Gedmo\TreeLevel]
    private $level;

    /**
     * @var self|null
     *
     * @Gedmo\TreeParent
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     */
    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    #[ORM\JoinColumn(name: 'category_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    #[Gedmo\TreeParent]
    private $parent;

    /**
     * @var Collection<int, CategoryClosure>
     */
    private $closures;

    public function __construct()
    {
        $this->closures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setParent(self $parent = null): void
    {
        $this->parent = $parent;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function addClosure(CategoryClosure $closure): void
    {
        $this->closures[] = $closure;
    }

    public function setLevel($level): void
    {
        $this->level = $level;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }
}
